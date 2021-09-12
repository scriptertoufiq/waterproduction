@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Edit Seling Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($sell,['method' =>'PATCH', 'route' => ['sells.update', $sell->id]]) !!}
                        <div class="row">
                            
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                <label for="staff_id">Staff/Seller</label>
                                <select name="staff_id" id="staff_id" class="form-control select2box ">
                                    <option value="" disabled selected>Select Staff/Seller<sup style="color:red;">*</sup></option>
                                    @foreach ($staff as $staff)
                                        <option value="{{$staff->id}}" {{ $sell->staff_id == $staff->id ? "selected":"" }} >{{$staff->name}} ({{$staff->mobile}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                <label for="client_id">Client/Customer<sup style="color:red;">*</sup></label>
                                <select name="client_id" id="client_id" class="form-control select2box ">
                                    <option value="" disabled selected>Select Staff/Seller</option>
                                    @foreach ($client as $client)
                                        <option value="{{$client->id}}" {{ $sell->client_id == $client->id ? "selected":"" }} >{{$client->name}} ({{$client->mobile}})</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group col-md-1 col-lg-1 col-sm-1 ">
                                <input type="hidden" name="sell_id" id="sell_id" value="{{$sell->id}}" >
                            </div> --}}
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <span style="display: inline-block;color: black;font-weight: bold;font-size: 16px;">Added Product Info</span>
                               
                                <div class="table-responsive mt-3">
                                    <table id="myTable" class="table table-hover order-list">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Unit Price</th>
                                                <th>Quatity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTableBody">
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach ($sell_list as $sell_list)
                                            
                                                <tr>
                                                    <td> {{$i++}} <input type="hidden" class="product_selling_id" name="product_selling_id[]" id="product_selling_id" value="{{$sell_list->id}}" /> </td>
                                                    <td> {{$sell_list->productName->name}} <input type="hidden" class="sell_product_id" name="sell_product_id[]" id="sell_product_id" value="{{$sell_list->product_id}}" /> </td>    
                                                    <td> <input id="sell_product_price" class="sell_product_price" name="sell_product_price[]" type="number" value="{{$sell_list->price}}" > </td>
                                                    <td><input id="sell_product_quantity" class="sell_product_quantity" disabled name="sell_product_quantity[]" type="number" value="{{$sell_list->quantity}}"/> </td>
                                                    <td><input type="hidden" id="sellproducttotal"  name="sellproducttotal[]" class="sellproducttotal"  value="{{$sell_list->subtotal}}"/><span class="sell_producttotal">{{$sell_list->subtotal}}</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="tfoot active">
                                            <th colspan="4">Total</th>
                                            <th id="total">{{$sell->sell_ammount}}</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('totaltaka','Total:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('totaltaka',$sell->sell_ammount, ['class' => 'form-control','id' => 'totaltaka',  'required',  'readonly']) }}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('paid','Paid:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('paid', $pay['payment'], ['class' => 'form-control','id' => 'paid', 'placeholder' => 'Paid Ammount']) }}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                        </div>

                        
                        <div class="row">
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::submit('Update A Sell', ['class' => 'btn btn-primary ']) }}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                        </div>
                        
                        {!! Form::close() !!}
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

@endsection

