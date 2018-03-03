<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait FilterByUser
{
    protected static function bootFilterByUser()
    {
        if(! app()->runningInConsole()) {
            static::creating(function ($model) {
                $model->created_by_id = Auth::check() ? Auth::getUser()->id : null;
            });

            $currentUser = Auth::user();
            if (!$currentUser) return;
            $modelName = class_basename(self::class);


            if (((new self)->getTable()) == 'users') {
                static::addGlobalScope('created_by_id', function (Builder $builder) use ($currentUser) {
                    $builder->where('created_by_id', $currentUser->id)
                        ->orWhere('id', $currentUser->id);
                });
            } else {
                static::addGlobalScope('created_by_id', function (Builder $builder) use ($currentUser) {
                    $builder->where('created_by_id', $currentUser->id);
                });
            }

        }
    }
}