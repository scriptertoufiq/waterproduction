<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientBottle;
use App\Models\Payment;
use App\Models\Sell;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return view('client.index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required|min:11|max:11',
        ]);

        $clients = new Client();

        $clients->name = $request->name;
        $clients->address = $request->address;
        $clients->mobile = $request->mobile;
        $clients->category = $request->category;
        $clients->contact_person = $request->contact_person;
        $clients->contact_person_post = $request->contact_person_post;
        $clients->save();
        return redirect()->back()->with('insertsuccess','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $id = $client->id;
        $taken_bottle = ClientBottle::where('client_id',$id)->sum('taken_bottle');
        $pay_bottle = ClientBottle::where('client_id',$id)->sum('pay_bottle');
        $duebottle = $taken_bottle - $pay_bottle;
        $total_sell = Sell::where('client_id',$id)->sum('sell_ammount');
        $total_pay = Payment::where('client_id',$id)->sum('payment');
        return view('client.status',compact('client','total_sell','total_pay','duebottle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $id = $client->id;
        $clients = Client::find($id);

        $clients->name = $request->name;
        $clients->address = $request->address;
        $clients->mobile = $request->mobile;
        $clients->category = $request->category;
        $clients->contact_person = $request->contact_person;
        $clients->contact_person_post = $request->contact_person_post;
        $clients->save();
        return redirect('/clients')->with('updatesuccess','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $id = $client->id;
        $client = Client::find($id);
        $client->delete();
        return redirect()->back()->with('deletesuccess','Deleted Successfully');
    }

    
}
