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
        $tarif = Tarif::create($request->validated());
        return redirect()->back();
    }

    public function saveBank(StoreBankPost $request)
    {
        $tarif = Bank::create($request->validated());
        return redirect()->back();
    }

    public function saveCredit_type(StoreCredit_typePost $request)
    {
        $tarif = Credit_type::create($request->validated());
        return redirect()->back();
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
        $rule = $request->input('variables');
        switch ($rule) {
            case 1:
                $param = (int)$request->input('filter');
                $tarif = Tarif::query();
                $bank = Bank::query();
                $credit_type = Credit_type::query();
                if ($param != null) {
                    $tarif->where('period', '<=', $param);
//                    $bank->where('id', '=', 'bank_id');
//                    $credit_type->where('id', '=', 'credit_type_id');
                    return view('welcome',
                        [
                            'tarif' => $tarif->get(),
                            'bank' => $bank->get(),
                            'credit_type' => $credit_type->get(),
                            'period' => $param
                        ]);
                }
                break;
            case 2:
                $param = (int)$request->input('filter');
                $tarif = Tarif::query();
                $bank = Bank::query();
                $credit_type = Credit_type::query();
                if ($param != null) {
                    $tarif->where('percent', '=', $param);
                    return view('welcome',
                        [
                            'tarif' => $tarif->get(),
                            'bank' => $bank->get(),
                            'credit_type' => $credit_type->get(),
                            'period' => $param
                        ]);
                }
                break;
            case 3:
                $param = (int)$request->input('filter');
                $tarif = Tarif::query();
                $bank = Bank::query();
                $credit_type = Credit_type::query();
                if ($param != null) {
                    $tarif->where('month_pay', '=', $param);
                    return view('welcome',
                        [
                            'tarif' => $tarif->get(),
                            'bank' => $bank->get(),
                            'credit_type' => $credit_type->get(),
                            'period' => $param
                        ]);
                }
                break;
            case 4:
                $param = (int)$request->input('filter');
                $tarif = Tarif::query();
                $bank = Bank::query();
                $credit_type = Credit_type::query();
                if ($param != null) {
                    $tarif->where('body_pay', '=', $param);
                    return view('welcome',
                        [
                            'tarif' => $tarif->get(),
                            'bank' => $bank->get(),
                            'credit_type' => $credit_type->get(),
                            'period' => $param
                        ]);
                }
                break;
            case 5:
                $param = $request->get('filter');
                $tarif = Tarif::query();
                $bank = Bank::query();
                $credit_type = Credit_type::query();
                if ($param != null) {;
                    $tarif->leftJoin('banks', 'tarifs.bank_id', '=', 'banks.id')
                    ->where('banks.bank_name', 'like', '%' . $param  . '%');
                    return view('welcome',
                        [
                            'tarif' => $tarif->get(),
                            'bank' => $bank->get(),
                            'credit_type' => $credit_type->get(),
                            'period' => $param
                        ]);
                }
                break;
            case 6:
                $param = (int)$request->input('filter');
                $tarif = Tarif::query();
                $bank = Bank::query();
                $credit_type = Credit_type::query();
                if ($param != null) {
                    $tarif->where('credit_type_id', '=', $param);
                    return view('welcome',
                        [
                            'tarif' => $tarif->get(),
                            'bank' => $bank->get(),
                            'credit_type' => $credit_type->get(),
                            'period' => $param
                        ]);
                }
                break;
        }
    }
}
