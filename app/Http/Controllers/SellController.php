<?php

namespace App\Http\Controllers;

use App\Models\BottleSize;
use App\Models\Client;
use App\Models\ClientBottle;
use App\Models\Payment;
use App\Models\Sell;
use App\Models\SellProductList;
use App\Models\SellProducts;
use App\Models\Staff;
use App\Models\WaterProduction;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sell = Sell::all();
        return view('sell.index', compact('sell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        $product = BottleSize::pluck('name', 'id');
        $staff = Staff::where('post', '!=', 'manager')->Where('post', '!=', 'Worker')->Where('post', '!=', 'AreaManager')->get();
        return view('sell.screate', compact('client', 'product', 'staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return  $request->all();
        $staff_id = $request->staff_id;
        $client_id = $request->client_id;
        $sell_ammount = $request->totaltaka;
        // bottle info
        $taken_bottle = $request->taken_bottle;
        $pay_bottle = $request->pay_bottle;
        // payment
        $paid = $request->paid;
        // total product selling
        $product = $request->product;
        // product info
        $product_id = $request->product_id;
        // return $product_id['0'];
        $product_price = $request->product_price;
        $product_quantity = $request->product_quantity;
        $producttotal = $request->producttotal;

        $sell = new Sell();
        $sell->staff_id = $staff_id;
        $sell->client_id = $client_id;
        $sell->sell_ammount = $sell_ammount;
        $done = $sell->save();
        $sell_id = $sell->id;
        if ($done) {
            $bottle = new ClientBottle();
            $bottle->client_id = $client_id;
            $bottle->taken_bottle = $taken_bottle;
            $bottle->pay_bottle = $pay_bottle;
            $done = $bottle->save();
            if ($done) {
                $payment = new Payment();
                $payment->sell_id = $sell_id;
                $payment->client_id = $client_id;
                $payment->staff_id = $staff_id;
                $payment->payment = $paid;
                $done = $payment->save();
                if ($done) {
                    
                    for($i=0;$i<count($product_id);$i++){
                        $sell_product = new SellProductList();
                        $sell_product->sell_id = $sell_id;
                        $sell_product->product_id = $product_id[$i];
                        $sell_product->price = $product_price[$i];
                        $sell_product->quantity = $product_quantity[$i];
                        $sell_product->subtotal = $producttotal[$i];
                        $sell_product->save();
                    }
                    return redirect('/sells')->with('insertsuccess', "Sell Product Done");
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        $id = $sell->id;
        $sell_list = SellProductList::where('sell_id',$id)->get();
        return view('sell.show',compact('sell','sell_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        $id = $sell->id;
        $client = Client::all();
        $staff = Staff::where('post', '!=', 'manager')->Where('post', '!=', 'Worker')->Where('post', '!=', 'AreaManager')->get();
        $sell_list = SellProductList::where('sell_id',$id)->get();
        $pay = Payment::where('sell_id',$id)->first();
        // $pay = $pay['payment'];
        return view('sell.edit',compact('client','sell_list','staff','sell','pay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sell $sell)
    {
        // return $request;
        $sell_id = $sell->id;
        $staff_id = $request->staff_id;
        $client_id = $request->client_id;
        $sell_ammount = $request->totaltaka;
        // product info
        $product_selling_id = $request->product_selling_id;
        $sell_product_price = $request->sell_product_price;
        $sellproducttotal = $request->sellproducttotal;
        $paid = $request->paid;

        $sell = Sell::find($sell_id);
        $sell->staff_id = $staff_id;
        $sell->client_id = $client_id;
        $sell->sell_ammount = $sell_ammount;
        $done = $sell->save();

        if ($done) {
                $payment = Payment::where('sell_id',$sell_id)->first();
                $payment->sell_id = $sell_id;
                $payment->client_id = $client_id;
                $payment->staff_id = $staff_id;
                $payment->payment = $paid;
                $done = $payment->save();
                if ($done) {
                    for($i=0;$i<count($product_selling_id);$i++){
                        $sell_product = SellProductList::find($product_selling_id[$i]);
                        $sell_product->price = $sell_product_price[$i];
                        $sell_product->subtotal = $sellproducttotal[$i];
                        $sell_product->save();
                    }
                    return redirect('/sells')->with('updatesuccess', "Sell Product Update Done");
                }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        // $id = $sell->id;
        // $sell = Sell::find($id);
        // $sell_product = SellProducts::where('sell_id',$id)->first();
        // $sell_product->delete();
        // $sell->delete();
        // return redirect()->back()->with('deletesuccess','Delete Successfully');
    }

    public function SearchProductPrice(Request $request)
    {
        $bottle_id = $request->bottle_id;
        $data = BottleSize::find($bottle_id);
        $price = $data['price'];

        $productQuantity = WaterProduction::where('bottle_id', $bottle_id)->sum('quantity');
        $expenceQuantity = SellProductList::where('product_id', $bottle_id)->sum('quantity');
        $availableQuantity = $productQuantity - $expenceQuantity;
        return $data = $price . '-' . $availableQuantity;
    }
}
