<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Staff;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = Salary::all();
        return view('salary.index',compact('salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salary = new Salary();
        $salary->staff_id = $request->staff_id;
        $salary->salary = $request->salary;
        $salary->save();
        return redirect('/salary')->with('insertsuccess','Salary Payment Complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        return view('salary.edit',compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        $id = $salary->id;
        $salary = Salary::find($id);
        $salary->salary = $request->salary;
        $salary->save();
        return redirect('/salary')->with('updatesuccess','Salary Updated Complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        $id = $salary->id;
        $salary = Salary::find($id);
        $salary->delete();
        return redirect()->back()->with('deletesuccess',"Deleted Successfully");
    }
}
