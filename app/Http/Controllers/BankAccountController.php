<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ba = BankAccount::all();
        return view('bankaccount.index',compact('ba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank::all()->pluck('name','id');
        return view('bankaccount.create',compact('bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = new BankAccount();

        $bank->account_no = $request->account_no;
        $bank->account_holder_name = $request->account_holder_name;
        $bank->account_type = $request->account_type;
        $bank->bank_id = $request->bank_id;
        $bank->save();
        return redirect()->back()->with('insertsuccess',"Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankaccount)
    {
        $id = $bankaccount->id;
        return view('bankaccount.transection',compact('bankaccount','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankaccount)
    {
        $bank = Bank::all()->pluck('name','id');
        return view('bankaccount.edit',compact('bankaccount','bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankaccount)
    {
        $id = $bankaccount->id;
        $bank = BankAccount::find($id);

        $bank->account_no = $request->account_no;
        $bank->account_holder_name = $request->account_holder_name;
        $bank->account_type = $request->account_type;
        $bank->bank_id = $request->bank_id;
        $bank->save();
        return redirect('/bankaccounts')->with('updatesuccess',"Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankaccount)
    {
        $id = $bankaccount->id;
        $bank = BankAccount::find($id);
        $bank->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }
}
