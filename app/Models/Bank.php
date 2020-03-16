<?php

namespace App\Models;

use App\Http\Requests\StoreBankPost;
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

    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
    public function saveBank($request) {
        Bank::create($request->validated());
    }

//    public static function getAll(){
//        return self::all();
//    }


}
