<?php

namespace App\Models;

use App\Http\Requests\StoreBlogPost;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tarif extends Model
{
    protected $fillable = ['period', 'month_pay', 'body_pay', 'percent', 'bank_id','credit_type_id'];
    public function bank()
    {
        return $this->belongsTo(Bank::class);

    }

    public function saveTarif($request) {
        Tarif::create($request->validated());
    }
    public function TypeFromUser($request) {
        $request->input('variables');
    }
    public function TarifFromDatabase() {
        return self::query();
    }
    // Функция для фильтра значений
    public function filterValues(Request $request)
    {
        $rule = $request->input('variables');
        $param = $request->input('filter');
        switch ($rule) {
            case 1:
                $filtrCollection=$this->sortByPeriod($param);
                break;
            case 2:
                $filtrCollection=$this->sortByPercent($param);
                break;
            case 3:
                $filtrCollection=$this->sortByMonthPay($param);
                break;
            case 4:
                $filtrCollection=$this->sortByBodyPay($param);
                break;
            case 5:
                $filtrCollection=$this->sortByBankName($param);
                break;
            case 6:
                $filtrCollection= $this->sortByTypeCredit($param);
                break;
        }
        return [$filtrCollection, $param];

    }







    // Получение числа-условия с клавиватуры
//    public function IntRule($request) {
//        $param = (int)$request->input('filter');
//    }
    // Получение строки-условия с клавиватуры
    public function StringRule($request) {
        $param = $request->input('filter');
    }
    // Сортировка по периоду
    public function sortByPeriod($param) {
         return self::where('period', '<=', $param)->get();

        }
    // Сортировка по проценту
    public function sortByPercent($param) {
        return self::where('percent', '=', $param)->get();
    }
    // Сортировка по оплате за месяц
    public function sortByMonthPay($param) {
        return self::where('month_pay', '=', $param)->get();
    }
    // Сортировка по единовременной оплате
    public function sortByBodyPay($param) {
        return self::where('body_pay', '=', $param)->get();
    }
    // Сортировка по имени банка
    public function sortByBankName($param) {
            return self::leftJoin('banks', 'tarifs.bank_id', '=', 'banks.id')
                ->where('banks.bank_name', 'like', '%' . $param  . '%')->get();
    }
    // Сортировка по типу кредитования
    public function sortByTypeCredit($param) {
        return self::leftJoin('credit_types', 'tarifs.credit_type_id', '=', 'credit_types.id')
                ->where('credit_types.credit_type_name', 'like', '%' . $param  . '%')->get();
    }


    public function credit_type()
    {
        return $this->belongsTo(Credit_type::class);

    }

}
