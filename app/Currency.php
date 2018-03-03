<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Currency
 *
 * @package App
 * @property string $title
 * @property string $symbol
 * @property string $money_format
 * @property string $created_by
*/
class Currency extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'symbol', 'money_format_thousands', 'money_format_decimal'];
    
}
