<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCurrenciesRequest;
use App\Http\Requests\Admin\UpdateCurrenciesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of Currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('currency_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Currency.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Currency.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('currency_delete')) {
                return abort(401);
            }
            $currencies = Currency::onlyTrashed()->get();
        } else {
            $currencies = Currency::all();
        }

        return view('admin.currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating new Currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('currency_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.currencies.create', compact('created_bies'));
    }

    /**
     * Store a newly created Currency in storage.
     *
     * @param  \App\Http\Requests\StoreCurrenciesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrenciesRequest $request)
    {
        if (! Gate::allows('currency_create')) {
            return abort(401);
        }
        $currency = Currency::create($request->all());



        return redirect()->route('admin.currencies.index');
    }


    /**
     * Show the form for editing Currency.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('currency_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $currency = Currency::findOrFail($id);

        return view('admin.currencies.edit', compact('currency', 'created_bies'));
    }

    /**
     * Update Currency in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrenciesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrenciesRequest $request, $id)
    {
        if (! Gate::allows('currency_edit')) {
            return abort(401);
        }
        $currency = Currency::findOrFail($id);
        $currency->update($request->all());



        return redirect()->route('admin.currencies.index');
    }


    /**
     * Display Currency.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('currency_view')) {
            return abort(401);
        }
        $currency = Currency::findOrFail($id);

        return view('admin.currencies.show', compact('currency'));
    }


    /**
     * Remove Currency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('currency_delete')) {
            return abort(401);
        }
        $currency = Currency::findOrFail($id);
        $currency->delete();

        return redirect()->route('admin.currencies.index');
    }

    /**
     * Delete all selected Currency at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('currency_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Currency::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Currency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('currency_delete')) {
            return abort(401);
        }
        $currency = Currency::onlyTrashed()->findOrFail($id);
        $currency->restore();

        return redirect()->route('admin.currencies.index');
    }

    /**
     * Permanently delete Currency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('currency_delete')) {
            return abort(401);
        }
        $currency = Currency::onlyTrashed()->findOrFail($id);
        $currency->forceDelete();

        return redirect()->route('admin.currencies.index');
    }
}
