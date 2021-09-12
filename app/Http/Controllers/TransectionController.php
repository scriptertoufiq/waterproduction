<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Transection;
use Illuminate\Http\Request;

class TransectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transection = Transection::all();
        return view('transection.index', compact('transection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transection = new Transection();
        $transection->bankaccount_id = $request->bankaccount_id;
        $transection->debit = $request->debit;
        $transection->credit = $request->credit;
        $transection->type = $request->type;
        $transection->cheque_no = $request->cheque_no;
        $transection->save();
        return redirect('/transections')->with('insertsuccess', 'Transection Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ba = BankAccount::find($id);
        $account_no = $ba->account_no;
        $transection = Transection::where('bankaccount_id',$id)->get();
        $debitammount = Transection::where('bankaccount_id',$id)->sum('debit');
        $creditammount = Transection::where('bankaccount_id',$id)->sum('credit');
        return view('transection.show',compact('account_no','transection','debitammount','creditammount'));
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transection $transection)
    {
       return view('transection.edit',compact('transection')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transection $transection)
    {
        $id = $transection->id;
        $transection = Transection::find($id);
        $transection->debit = $request->debit;
        $transection->credit = $request->credit;
        $transection->type = $request->type;
        $transection->cheque_no = $request->cheque_no;
        $transection->save();
        return redirect('/transections')->with('updatesuccess', 'Transection Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transection $transection)
    {
        $id = $transection->id;
        $transection = Transection::find($id);
        $transection->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }
}
