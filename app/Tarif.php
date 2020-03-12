<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = ['period', 'month_pay', 'body_pay', 'percent'];
    public function user()
    {
        return $this->hasMany(Bank::class);
    }

//    protected $alias = 'articleOne';
//
//    public function link()
//    {
//        return route($this->alias, $this);
//
//    }
}
