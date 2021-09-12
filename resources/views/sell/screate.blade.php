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
                        Add Seling Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'sells.store','files'=>'true','enctype'=>'multipart/form-data']) !!}
                        <div class="row">
                            
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{-- {!! Html::decode(Form::label('staff_id','Staff/Seller:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('staff_id',$staff, null, ['class' => 'form-control select2box','id' => 'staff_id', 'placeholder' => 'Select Staff/Seller','required']) }} --}}
                                <label for="staff_id">Staff/Seller</label>
                                <select name="staff_id" id="staff_id" class="form-control select2box ">
                                    <option value="" disabled selected>Select Staff/Seller<sup style="color:red;">*</sup></option>
                                    @php
                                        $staff_id = Auth::user()->id;
                                        $staff_post = Auth::user()->post;
                                    @endphp
                                    @foreach ($staff as $staff)
                                        <option value="{{$staff->id}}" >{{$staff->name}} ({{$staff->mobile}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{-- {!! Html::decode(Form::label('client_id','Client/Customer:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('client_id',$client, null, ['class' => 'form-control select2box','id' => 'client_id', 'placeholder' => 'Select Cient','required']) }} --}}
                                <label for="client_id">Client/Customer<sup style="color:red;">*</sup></label>
                                <select name="client_id" id="client_id" class="form-control select2box ">
                                    <option value="" disabled selected>Select Staff/Seller</option>
                                    @foreach ($client as $client)
                                        <option value="{{$client->id}}">{{$client->name}} ({{$client->mobile}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 ">
                                {!! Html::decode(Form::label('due_bottle','Due Bottle:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('due_bottle', null, ['class' => 'form-control','id' => 'due_bottle', 'placeholder' => 'Due Bottle','readonly']) }}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 ">
                                {!! Html::decode(Form::label('taken_bottle','Taken Bottle:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('taken_bottle', null, ['class' => 'form-control','id' => 'taken_bottle', 'placeholder' => 'Taken Bottle']) }}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 ">
                                {!! Html::decode(Form::label('pay_bottle','Pay Bottle:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('pay_bottle', null, ['class' => 'form-control','id' => 'pay_bottle', 'placeholder' => 'Pay Bottle']) }}
                            </div>
                        </div>
                        <span style="display: inline-block;color: black;font-weight: bold;font-size: 16px;">Product Info</span>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                {!! Html::decode(Form::label('product',':<sup style="color:red;font-size: 16px;">All Product Select Product*</sup>')) !!}
                                {{Form::select('product',$product, null, ['class' => 'form-control select2box','id' => 'product', 'placeholder' => 'Select Product', 'required']) }}
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <span style="display: inline-block;color: black;font-weight: bold;font-size: 16px;">Added Product Info</span>
                               
                                <div class="table-responsive mt-3">
                                    <table id="myTable" class="table table-hover order-list">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Unit Price</th>
                                                <th>Quatity</th>
                                                <th>Sub Total</th>
                                                <th><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTableBody">

                                        </tbody>
                                        <tfoot class="tfoot active">
                                            <th colspan="2">Total</th>
                                            <th></th>
                                            <th id="total">0.00</th>
                                            <th><i class="fa fa-trash-o"></i></th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('totaltaka','Total:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('totaltaka', null, ['class' => 'form-control','id' => 'totaltaka',  'required',  'readonly']) }}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('paid','Paid:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('paid', null, ['class' => 'form-control','id' => 'paid', 'placeholder' => 'Paid Ammount']) }}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                        </div>

                        
                        <div class="row">
                            <div class="form-group col-md-3 col-lg-3 col-sm-3"></div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::submit('Make A Sell', ['class' => 'btn btn-primary ']) }}
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

