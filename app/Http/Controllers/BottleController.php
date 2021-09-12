<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\BottleSize;
use App\Models\DestroyedBottle;
use App\Models\WaterProduction;
use Illuminate\Http\Request;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bottles = Bottle::all();
        return view('bottle.index',compact('bottles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bottle_size = BottleSize::pluck('name','id');
        return view('bottle.create',compact('bottle_size'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bottle = new Bottle();

        $bottle->size_id = $request->size_id;
        $bottle->pices = $request->pices;
        $bottle->color = $request->color;
        $bottle->description = $request->description;
        $bottle->save();
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
        $bottle = Bottle::find($id);
        $bottle_id = $bottle->size_id;
        $total_bottle = Bottle::where('size_id',$bottle_id)->sum('pices');
        $spend_bottle = WaterProduction::where('bottle_id',$bottle_id)->sum('quantity');
        $des_bottle = DestroyedBottle::where('bottle_id',$bottle_id)->sum('quantity');
        $spend_bottle = $spend_bottle + $des_bottle;
        $availableBottle = $total_bottle-$spend_bottle;
        return view('bottle.show',compact('id','availableBottle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bottle $bottle)
    {
        $bottle_size = BottleSize::pluck('name','id');
        return view('bottle.edit',compact('bottle','bottle_size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Bottle $bottle)
    {
        $id = $bottle->id;
        $bottle = Bottle::find($id);
        $bottle->size_id = $request->size_id;
        $bottle->pices = $request->pices;
        $bottle->color = $request->color;
        $bottle->description = $request->description;
        $bottle->save();
        return redirect('/bottles')->with('updatesuccess','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bottle $bottle)
    {
        $id = $bottle->id;
        $bottle = Bottle::find($id);
        $bottle->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }
}
