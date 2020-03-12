<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['bank_name'];
//    protected $alias = 'articleOne';

    public function link()
    {
        return route($this->alias, $this);
}
    public function credit_type()
    {
        return $this->hasMany(Credit_type::class);
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }



}
