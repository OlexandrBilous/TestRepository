<?php

namespace App\Models;

use App\Http\Requests\StoreCredit_typePost;
use Illuminate\Database\Eloquent\Model;

class Credit_type extends Model
{
    protected $fillable = ['credit_type_name'];


    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }

    public function saveCredit_type($request) {
        Credit_type::create($request->validated());
    }






//    protected $alias = 'articleOne';

//    public function link()
//    {
//        return route($this->alias, $this);
////
//    }
}
