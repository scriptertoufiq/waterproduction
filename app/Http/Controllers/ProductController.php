<?php

namespace App\Http\Controllers;

use App\Models\BottleSize;
use App\Models\Client;
use App\Models\Product;
use App\Models\Staff;
use App\Models\WaterProduction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bottle = BottleSize::pluck('name','id');
        $staff = Staff::where('post','sr')->pluck('name','id');
        return view('product.create',compact('bottle','staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->staff_id = $request->staff_id;
        $product->production_id = $request->production_id;
        $product->distribute_quantity = $request->distribute_quantity;
        $product->status = $request->status;
        $product->save();
        return redirect()->back()->with('insertsuccess','Inserted Successfully');
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
    public function edit(Product $product)
    {
        $bottle = BottleSize::pluck('name','id');
        $staff = Staff::where('post','sr')->pluck('name','id');
        return view('product.edit',compact('product','bottle','staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $id = $product->id;
        $product = Product::find($id);
        $product->staff_id = $request->staff_id;
        $product->production_id = $request->production_id;
        $product->distribute_quantity = $request->distribute_quantity;
        $product->status = $request->status;
        $product->save();
        return redirect('/products')->with('updatesuccess','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $id = $product->id;
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }

    public function searchproduct(Request $request){
         $bottle_id = $request->production_id;
         $allproduct = WaterProduction::where('bottle_id',$bottle_id)->sum('quantity');
        $distproduct = Product::where('production_id',$bottle_id)->sum('distribute_quantity');
        return $available = $allproduct - $distproduct;
    }




}
