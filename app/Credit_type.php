<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit_type extends Model
{
    protected $fillable = ['credit_type_name'];


    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
//    protected $alias = 'articleOne';

//    public function link()
//    {
//        return route($this->alias, $this);
////
//    }
}