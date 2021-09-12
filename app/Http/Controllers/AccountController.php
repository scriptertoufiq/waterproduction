<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\BankAccount;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Salary;
use App\Models\Transection;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = Account::all();
        return view('account.index',compact('account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounttypedebit = Category::where('type','debit')->orWhere('type','both')->pluck('name', 'id');
        $accounttypecredit = Category::where('type', 'credit')->orWhere('type', 'both')->pluck('name', 'id');

        $sell_earn = Payment::sum('payment');
        $account_earn = Account::sum('credit');
        $bank_width = Transection::sum('debit');
        $total_hand_cash = $sell_earn+$account_earn+$bank_width;
        $paysalary = Salary::sum('salary');
        $account_cost = Account::sum('debit');
        $bank_add = Transection::sum('credit');
        $total_cost = $paysalary+$account_cost+$bank_add;
        $hand_cash = $total_hand_cash-$total_cost;

        return view('account.create',compact('accounttypedebit','accounttypecredit','hand_cash'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->debit)) {
            $account = new Account();
            $account->debit = $request->debit;
            $account->category_id = $request->category_id;
            $account->description = $request->description;
            $account->save();
            return Redirect()->back()->with('insertsuccess', 'Added Successfully');
        }

        if (isset($request->credit)) {
            $account = new Account();
            $account->credit = $request->credit;
            $account->category_id = $request->category_id;
            $account->description = $request->description;
            $account->save();
            return Redirect()->back()->with('insertsuccess', 'Added Successfully');
        }
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
    public function edit(Account $account)
    {
        $accounttypedebit = Category::where('type','debit')->orWhere('type','both')->pluck('name', 'id');
        $accounttypecredit = Category::where('type', 'credit')->orWhere('type', 'both')->pluck('name', 'id');
        return view('account.edit',compact('account','accounttypedebit','accounttypecredit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Account $account)
    {
        $id = $account->id;
        if (isset($request->debit)) {
            $account = Account::find($id);
            $account->debit = $request->debit;
            $account->category_id = $request->category_id;
            $account->description = $request->description;
            $account->save();
            return Redirect('/accounts')->with('updatesuccess', 'Updated Successfully');
        }

        if (isset($request->credit)) {
            $account = Account::find($id);
            $account->credit = $request->credit;
            $account->category_id = $request->category_id;
            $account->description = $request->description;
            $account->save();
            return Redirect('/accounts')->with('updatesuccess', 'Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $id = $account->id;
        $account = Account::find($id);
        $account->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }
}
