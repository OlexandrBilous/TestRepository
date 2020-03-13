<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = ['period', 'month_pay', 'body_pay', 'percent', 'bank_id','credit_type_id'];
    public function bank()
    {
        return $this->belongsTo(Bank::class);

    }
    public function credit_type()
    {
        return $this->belongsTo(Credit_type::class);

    }
//    protected $alias = 'articleOne';
//
//    public function link()
//    {
//        return route($this->alias, $this);
//
//    }
}
