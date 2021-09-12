<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\BottleSize;
use App\Models\ClientBottle;
use App\Models\DestroyedBottle;
use App\Models\WaterProduction;
use Illuminate\Http\Request;

class WaterProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $production = WaterProduction::all();
        $date = date('Y-m-d');
        $todayproduction = WaterProduction::whereDate('created_at',$date)->sum('quantity');
        return view('production.index',compact('production','todayproduction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bottle = BottleSize::pluck('name','id');
        return view('production.create',compact('bottle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $production = new WaterProduction();
        $production->bottle_id = $request->bottle_id;
        $production->quantity = $request->quantity;
        $production->description = $request->description;
        $done = $production->save();
        return redirect()->back()->with('insertsuccess','Water Production Added Successfully');

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
    public function edit(WaterProduction $production)
    {
        // $bottle = BottleSize::pluck('name','id');
        // $bottle_id = $production->bottle_id;

        // $bottle1 = Bottle::find($bottle_id);
        // $available_bottle = $bottle1['pices'];
        // return view('production.edit',compact('production','bottle','available_bottle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,WaterProduction $production)
    {
        // $id = $production->id;
        // $waterProduction = WaterProduction::find($id);
        // $bottle_id = $request->bottle_id;
        // $waterProduction->quantity = $request->quantity;
        // $waterProduction->description = $request->description;
        // $done = $waterProduction->save();
        // return redirect('/productions')->with('updatesuccess','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaterProduction $production)
    {
        $id = $production->id;
        $waterProduction = WaterProduction::find($id);
        $waterProduction->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }


    public function searchBottle(Request $request)
    {
            $bottle_id = $request->bottle_id;
            $total_bottle = Bottle::where('size_id',$bottle_id)->sum('pices');
            $spend_bottle = WaterProduction::where('bottle_id',$bottle_id)->sum('quantity');
            $des_bottle = DestroyedBottle::where('bottle_id',$bottle_id)->sum('quantity');
            $spend_bottle = $spend_bottle + $des_bottle;
            return $data = $total_bottle.'-'.$spend_bottle;
        

    }






}
