<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\BottleSize;
use App\Models\DestroyedBottle;
use App\Models\WaterProduction;
use Illuminate\Http\Request;

class BottleSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bottlesize = BottleSize::all();
        return view('Bottlesize.index',compact('bottlesize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bottlesize.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bottlesize = new BottleSize();
        $bottlesize->name = $request->name;
        $bottlesize->size = $request->size;
        $bottlesize->price = $request->price;
        $bottlesize->save();
        return redirect()->back()->with('insertsucess','Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BottleSize $bottlesize)
    {
        $id = $bottlesize->id;
        $total_bottle = Bottle::where('size_id',$id)->sum('pices');
        $spend_bottle = WaterProduction::where('bottle_id',$id)->sum('quantity');
        $des_bottle = DestroyedBottle::where('bottle_id',$id)->sum('quantity');
        $spend_bottle = $spend_bottle + $des_bottle;
        $availableBottle = $total_bottle-$spend_bottle;
        return view('Bottlesize.available',compact('availableBottle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BottleSize $bottlesize)
    {
        return view('Bottlesize.edit',compact('bottlesize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BottleSize $bottlesize)
    {
        $id = $bottlesize->id;
        $bottlesize = BottleSize::find($id);
        $bottlesize->name = $request->name;
        $bottlesize->size = $request->size;
        $bottlesize->price = $request->price;
        $bottlesize->save();
        return redirect('/bottlesize')->with('updatesuccess','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BottleSize $bottlesize)
    {
        $id = $bottlesize->id;
        $bottlesize = BottleSize::find($id);
        $bottlesize->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }



    public function productPrice(Request $request)
    {
        $id = $request->product;
        $bottle = Bottlesize::find($id);
        return $bottle;
    }






}
