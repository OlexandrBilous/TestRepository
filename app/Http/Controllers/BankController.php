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
    public function addTarif()
    {
        return view('addTarif');
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
        $banks = Bank::all();
        return view('welcome', [
            'bank' => $banks,
        ]);
    }

    public function filtrationOfTarif(Request $request)
    {
        $rule= $request->input('select');
        switch ($rule) {
            case 1:
                $period =(int) $request->input('test');
                $banks = Bank::query();
                if ($period != null) {
                    $banks->where('period', '<=', $period);
                    return view('welcome',
                        [
                            'bank' => $banks->get(),
                            'period' => $period
                        ]);
                }
                break;
            case 2:
                $period =(int) $request->input('test');
                $banks = Bank::query();
                if ($period != null) {
                    $banks->where('percent', '=', $period);
                    return view('welcome',
                        [
                            'bank' => $banks->get(),
                            'period' => $period
                        ]);
                }
                break;
            case 3:
                $period =(int) $request->input('test');
                $banks = Bank::query();
                if ($period != null) {
                    $banks->where('Month_pay', '=', $period);
                    return view('welcome',
                        [
                            'bank' => $banks->get(),
                            'period' => $period
                        ]);
                }
                break;
            case 4:
                $period =(int) $request->input('test');
                $banks = Bank::query();
                if ($period != null) {
                    $banks->where('Body_pay', '=', $period);
                    return view('welcome',
                        [
                            'bank' => $banks->get(),
                            'period' => $period
                        ]);
                }
                break;
            case 5:
                $period = $request->input('test');
                $banks = Bank::query();
                if ($period != null) {
                    $banks->where('bank', '=', $period);
                    return view('welcome',
                        [
                            'bank' => $banks->get(),
                            'period' => $period
                        ]);
                }
                break;
            case 6:
                $period = $request->input('test');
                $banks = Bank::query();
                if ($period != null) {
                    $banks->where('credit_type', '=', $period);
                    return view('welcome',
                        [
                            'bank' => $banks->get(),
                            'period' => $period
                        ]);
                }
                break;
        }}}
