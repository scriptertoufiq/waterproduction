<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $material = RawMaterial::all();
        return view('material.index',compact('material'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new RawMaterial();

        $material->name = $request->name;
        $material->ammount = $request->ammount;
        $material->quantity = $request->quantity;
        $material->description = $request->description;
        $done = $material->save();
        return redirect()->back()->with('insertsuccess','Added Successfully');
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
    public function edit(RawMaterial $material)
    {
        return view('material.edit',compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawMaterial $material)
    {
        $id = $material->id;

        $material = RawMaterial::find($id);
        $material->name = $request->name;
        $material->ammount = $request->ammount;
        $material->quantity = $request->quantity;
        $material->description = $request->description;
        $done = $material->save(); //next send data to account
        return redirect('/materials')->with('updatesuccess','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawMaterial $material)
    {
        $id = $material->id;
        $material = RawMaterial::find($id);
        $material->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }
}
