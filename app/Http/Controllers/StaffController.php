<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Salary;
use App\Models\Sell;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $staff = new Staff();

        $staff->name = $request->name;
        $staff->mobile = $request->mobile;
        $staff->address = $request->address;
        $staff->nid = $request->nid;
        $staff->salary = $request->salary;
        $staff->post = $request->post;
        $done = $staff->save();
        if ($done) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $email;
            $user->post = $request->post;
            $password = Hash::make($password);
            $user->password = $password;
            $user->save();
        }

        return redirect()->back()->with('insertsuccess',"Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        $id= $staff->id;
        $totalearn = Commission::where('staff_id',$id)->sum('total');
        $totalpay = Salary::where('staff_id',$id)->sum('salary');
        $payable =$totalearn - $totalpay;
        return view('staff.salary',compact('staff','payable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Staff $staff)
    {
        $id = $staff->id;
        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->mobile = $request->mobile;
        $staff->address = $request->address;
        $staff->nid = $request->nid;
        $staff->salary = $request->salary;
        $staff->post = $request->post;
        $staff->save();

        return redirect('/staffs')->with('updatesuccess',"Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $id = $staff->id;
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->back()->with('deletesuccess','Delete Successfully');
    }
}
