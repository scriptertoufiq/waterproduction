<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use App\Models\Salary;
use App\Models\Sell;
use App\Models\Staff;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchresult = null;
        $debitammount = null;
        $creditammount = null;
        return view('report.dc',compact('searchresult','debitammount','creditammount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sr = Staff::where('post','sr')->pluck('name','id');
        return view('report.srdaily',compact('sr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dcSearch()
    {
        $date = $_GET['reportrange'];
        $date = explode('-', $date);
        $firstdate = $date['0'];
        $lastdate = $date['1'];

        $firstdate = explode('/', $firstdate);
        $firstdate = trim($firstdate['2']) . '-' . trim($firstdate['0']) . '-' . trim($firstdate['1']);

        $lastdate = explode('/', $lastdate);
        $lastdate = trim($lastdate['2']) . '-' . trim($lastdate['0']) . '-' . trim($lastdate['1']);

        if ($firstdate == $lastdate) {
            $searchresult = Account::whereDate('created_at', $firstdate)->get();
            $debitammount = Account::whereDate('created_at', $firstdate)->sum('debit');
            $creditammount = Account::whereDate('created_at', $firstdate)->sum('credit');
            return view('report.dc', compact('searchresult','debitammount','creditammount'));
        }elseif ($firstdate != $lastdate) {
            $searchresult = Account::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->get();
            $debitammount = Account::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('debit');
            $creditammount = Account::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('credit');
            return view('report.dc', compact('searchresult','debitammount','creditammount'));
        }else {
            $searchresult = null;
            $debitammount = null;
            $creditammount = null;
            return view('report.dc', compact('searchresult','debitammount','creditammount'));
        }
    }


    public function sellReport(){
        $searchresult = null;
        $totalsellammount = null;
        return view('report.sell',compact('searchresult','totalsellammount'));
    }

    public function sellReportSearch(){

        $date = $_GET['reportrange'];
        $date = explode('-', $date);
        $firstdate = $date['0'];
        $lastdate = $date['1'];

        $firstdate = explode('/', $firstdate);
        $firstdate = trim($firstdate['2']) . '-' . trim($firstdate['0']) . '-' . trim($firstdate['1']);

        $lastdate = explode('/', $lastdate);
        $lastdate = trim($lastdate['2']) . '-' . trim($lastdate['0']) . '-' . trim($lastdate['1']);
        $sr = $_GET['sr'];

        if ($firstdate == $lastdate) {
            $searchresult = Sell::whereDate('created_at', $firstdate)->get();
            $totalsellammount = Sell::whereDate('created_at', $firstdate)->sum('sell_ammount');
            return view('report.sell', compact('searchresult','totalsellammount'));
        } elseif ($firstdate == $lastdate && isset($sr)) {
            $searchresult = Sell::whereDate('created_at', $firstdate)->andWhere('staff_id', $sr)->get();
            $totalsellammount = Sell::whereDate('created_at', $firstdate)->andWhere('staff_id', $sr)->sum('sell_ammount');
            return view('report.sell', compact('searchresult','totalsellammount'));
        } elseif ($firstdate != $lastdate) {
            $searchresult = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->get();
            $totalsellammount = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('sell_ammount');
            return view('report.sell', compact('searchresult','totalsellammount'));
        } elseif ($firstdate != $lastdate && isset($sr)) {
            $searchresult = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->andWhere('staff_id', $sr)->get();
            $totalsellammount = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->andWhere('staff_id', $sr)->sum('sell_ammount');
            return view('report.sell', compact('searchresult','totalsellammount'));
        }elseif (isset($sr)) {
            $searchresult = Sell::Where('staff_id', $sr)->get();
            $totalsellammount = Sell::Where('staff_id', $sr)->sum('sell_ammount');
            return view('report.sell', compact('searchresult','totalsellammount'));
        } else {
            $searchresult = null;
            $totalsellammount = null;
            return view('report.sell', compact('searchresult','totalsellammount'));
        }
    }


    public function moneyCollection(){
        $searchresult = null;
        $totalsellammount = null;
        return view('report.collection',compact('searchresult','totalsellammount'));
    }

    public function moneyCollectionSearch(){

        $date = $_GET['reportrange'];
        $date = explode('-', $date);
        $firstdate = $date['0'];
        $lastdate = $date['1'];

        $firstdate = explode('/', $firstdate);
        $firstdate = trim($firstdate['2']) . '-' . trim($firstdate['0']) . '-' . trim($firstdate['1']);

        $lastdate = explode('/', $lastdate);
        $lastdate = trim($lastdate['2']) . '-' . trim($lastdate['0']) . '-' . trim($lastdate['1']);
        $sr = $_GET['sr'];

        if ($firstdate == $lastdate) {
            $searchresult = Payment::whereDate('created_at', $firstdate)->get();
            $totalsellammount = Payment::whereDate('created_at', $firstdate)->sum('payment');
            return view('report.collection', compact('searchresult','totalsellammount'));
        } elseif ($firstdate == $lastdate && isset($sr)) {
            $searchresult = Payment::whereDate('created_at', $firstdate)->andWhere('staff_id', $sr)->get();
            $totalsellammount = Payment::whereDate('created_at', $firstdate)->andWhere('staff_id', $sr)->sum('payment');
            return view('report.collection', compact('searchresult','totalsellammount'));
        } elseif ($firstdate != $lastdate) {
            $searchresult = Payment::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->get();
            $totalsellammount = Payment::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('payment');
            return view('report.collection', compact('searchresult','totalsellammount'));
        } elseif ($firstdate != $lastdate && isset($sr)) {
            $searchresult = Payment::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->andWhere('staff_id', $sr)->get();
            $totalsellammount = Payment::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->andWhere('staff_id', $sr)->sum('payment');
            return view('report.collection', compact('searchresult','totalsellammount'));
        }elseif (isset($sr)) {
            $searchresult = Payment::Where('staff_id', $sr)->get();
            $totalsellammount = Payment::Where('staff_id', $sr)->sum('payment');
            return view('report.collection', compact('searchresult','totalsellammount'));
        } else {
            $searchresult = null;
            $totalsellammount = null;
            return view('report.collection', compact('searchresult','totalsellammount'));
        }
    }


    public function clientReport(){
        $searchresult = null;
        $totalsellammount = null;
        return view('report.client',compact('searchresult','totalsellammount'));
    }

    public function clientReportSearch(){

        $date = $_GET['reportrange'];
        $date = explode('-', $date);
        $firstdate = $date['0'];
        $lastdate = $date['1'];

        $firstdate = explode('/', $firstdate);
        $firstdate = trim($firstdate['2']) . '-' . trim($firstdate['0']) . '-' . trim($firstdate['1']);

        $lastdate = explode('/', $lastdate);
        $lastdate = trim($lastdate['2']) . '-' . trim($lastdate['0']) . '-' . trim($lastdate['1']);
        $client = $_GET['client'];

        if ($firstdate == $lastdate) {
            $searchresult = Sell::whereDate('created_at', $firstdate)->get();
            $totalsellammount = Sell::whereDate('created_at', $firstdate)->sum('sell_ammount');
            return view('report.client', compact('searchresult','totalsellammount'));
        } elseif ($firstdate == $lastdate && isset($client)) {
            $searchresult = Sell::whereDate('created_at', $firstdate)->andWhere('staff_id', $client)->get();
            $totalsellammount = Sell::whereDate('created_at', $firstdate)->andWhere('staff_id', $client)->sum('sell_ammount');
            return view('report.client', compact('searchresult','totalsellammount'));
        } elseif ($firstdate != $lastdate) {
            $searchresult = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->get();
            $totalsellammount = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('sell_ammount');
            return view('report.client', compact('searchresult','totalsellammount'));
        } elseif ($firstdate != $lastdate && isset($client)) {
            $searchresult = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->andWhere('staff_id', $client)->get();
            $totalsellammount = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->andWhere('staff_id', $client)->sum('sell_ammount');
            return view('report.client', compact('searchresult','totalsellammount'));
        }elseif (isset($client)) {
            $searchresult = Sell::Where('staff_id', $client)->get();
            $totalsellammount = Sell::Where('staff_id', $client)->sum('sell_ammount');
            return view('report.client', compact('searchresult','totalsellammount'));
        } else {
            $searchresult = null;
            $totalsellammount = null;
            return view('report.client', compact('searchresult','totalsellammount'));
        }
    }


    public function profitLoss(){
        $totalincome = null;
        $earnfromwater = null;
        $earnfromother = null;
        $costofsalary = null;
        $costofother = null;
        $totalcost = null;
        return view('report.los_profit',compact('totalincome','earnfromwater','earnfromother','costofsalary','costofother','totalcost'));
    }

    public function profitLossSearch(){

        $date = $_GET['reportrange'];
        $date = explode('-', $date);
        $firstdate = $date['0'];
        $lastdate = $date['1'];

        $firstdate = explode('/', $firstdate);
        $firstdate = trim($firstdate['2']) . '-' . trim($firstdate['0']) . '-' . trim($firstdate['1']);

        $lastdate = explode('/', $lastdate);
        $lastdate = trim($lastdate['2']) . '-' . trim($lastdate['0']) . '-' . trim($lastdate['1']);

        if ($firstdate == $lastdate) {
            $earnfromwater = Sell::whereDate('created_at', $firstdate)->sum('sell_ammount');
            $earnfromother = Account::whereDate('created_at', $firstdate)->sum('credit');
            $totalincome = $earnfromwater+$earnfromother;

            $costofsalary = Salary::whereDate('created_at', $firstdate)->sum('salary');
            $costofother = Account::whereDate('created_at', $firstdate)->sum('debit');
            $totalcost = $costofsalary+$costofother;

            return view('report.los_profit',compact('totalincome','earnfromwater','earnfromother','costofsalary','costofother','totalcost'));

        }  elseif ($firstdate != $lastdate) {

            $earnfromwater = Sell::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('sell_ammount');
            $earnfromother = Account::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('credit');
            $totalincome = $earnfromwater+$earnfromother;

            $costofsalary = Salary::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('salary');
            $costofother = Account::whereBetween('created_at', ["$firstdate 00:00:00", "$lastdate 23:59:59"])->sum('debit');
            $totalcost = $costofsalary+$costofother;

            return view('report.los_profit',compact('totalincome','earnfromwater','earnfromother','costofsalary','costofother','totalcost'));
        }else {
            $totalincome = null;
            $earnfromwater = null;
            $earnfromother = null;
            $costofsalary = null;
            $costofother = null;
            $totalcost = null;
            return view('report.los_profit',compact('totalincome','earnfromwater','earnfromother','costofsalary','costofother','totalcost'));
        }
    }

}
