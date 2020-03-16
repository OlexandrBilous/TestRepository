<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankPost;
use App\Http\Requests\StoreCredit_typePost;
use App\Models\Bank;
use App\Http\Requests\StoreBlogPost;
use App\Models\Credit_type;
use App\Models\Tarif;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function show(Request $request)
    {
        return view('welcome');
    }


    public function addBank()
    {
        return view('addBank');
    }

    public function addCredit_type()
    {
        return view('addCredit_type');
    }

    public function saveTarif(StoreBlogPost $request)
    {


            $tarif = new Tarif();
            $tarif->saveTarif($request);
        return redirect()->back()->with('message', 'Тариф добавлен!');
    }

    public function saveBank(StoreBankPost $request)
    {
        $bank=new Bank();
        $bank->saveBank($request);
        return redirect()->back()->with('message', 'Банк добавлен!');
    }

    public function saveCredit_type(StoreCredit_typePost $request)
    {
        $credit_type=new Credit_type();
        $credit_type->saveCredit_type($request);
        return redirect()->back()->with('message', 'Тип кредитования добавлен!');
    }

    public function showTarif(Bank $banks)
    {
        $tarifs = Tarif::all();
        $banks = Bank::all();
        $credit_types = Credit_type::all();
        return view('welcome', [
            'bank' => $banks, 'tarif' => $tarifs, 'credit_type' => $credit_types
        ]);
    }


    public function addTarif(Bank $banks)
    {
        $banks = Bank::all();
        $credit_types = Credit_type::all();
        return view('addTarif', [
            'bank' => $banks,  'credit_type' => $credit_types
        ]);
    }
    public function filtrationOfTarif(Request $request)
    {
        $tarif = new Tarif();
        $filterData=$tarif->filterValues($request);

        if (array_key_exists('Введите корректное значение', $filterData)){
            return redirect('/')->with('Введите корректное значение', $filterData['Введите корректное значение'] );
        } else{
            return view('welcome',
                [
                    'tarif' => $filterData[0],
                    'param' => $filterData[1],
                ]);
        }

    }
}
