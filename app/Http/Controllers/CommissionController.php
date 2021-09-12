<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission = Commission::all();
        return view('commission.index', compact('commission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::pluck('name', 'id');

        $dt = Carbon::now();
        $date = $dt->toDateString();
        return view('commission.create',compact('staff','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commission = new Commission();
        $commission->staff_id = $request->staff_id;
        $commission->salary = $salary = $request->salary;
        $commission->commission = $getcommission =$request->commission;
        $commission->cutting = $cutting = $request->cutting;
        $commission->total = ($salary+$getcommission)-$cutting;
        $commission->save();
        return redirect()->back()->with('insertsuccess', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return view('staff.earn',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        // $staff = Staff::pluck('name', 'id');
        // $dt = Carbon::now();
        // $date = $dt->toDateString();
        return view('commission.edit', compact('commission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commission $commission)
    {
        $id = $commission->id;
        $commission = Commission::find($id);

        $commission->salary = $salary = $request->salary;
        $commission->commission = $getcommission =$request->commission;
        $commission->cutting = $cutting = $request->cutting;
        $commission->total = ($salary+$getcommission)-$cutting;
        $commission->save();
        return redirect('/commissions')->with('updatesuccess', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        $id = $commission->id;
        $commission = Commission::find($id);
        $commission->delete();
        return redirect()->back()->with('deletesuccess', 'Deleted Successfully');
    }
}
