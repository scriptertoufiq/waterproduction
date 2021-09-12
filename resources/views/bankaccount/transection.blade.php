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
                         <span style="color: blue;">Account No {{$bankaccount->account_no}}</span>. Add Account Transection Information of <span style="color: blue;">{{$bankaccount->account_holder_name}}</span> 

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif
                    </header>
                    <div class="card-body">

                        {!! Form::open(['route' => 'transections.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('debit','Debit/Bank withdrawal:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('debit', null, ['class' => 'form-control','id' => 'debit', 'placeholder' => 'Debit/Widthdraw', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('credit','Credit/Bank deposit:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('credit', null, ['class' => 'form-control','id' => 'credit', 'placeholder' => 'Credit/Bank deposit', 'required']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('type','Transection Type:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('type',['cash'=>'Cash','cheque'=>'Cheque'], null, ['class' => 'form-control','id' => 'type', 'placeholder' => 'Transection Type', 'required']) }}
                            </div>

                            <div class="form-group col-md-5 col-lg-5 col-sm-5 ">
                                {!! Html::decode(Form::label('cheque_no','Cheque No:<sup style="color:red;">If Applicable</sup>')) !!}
                                {{Form::text('cheque_no', null, ['class' => 'form-control','id' => 'cheque_no', 'placeholder' => 'Cheque No','disabled' ]) }}
                            </div>
                            <div class="form-group col-md-1 col-lg-1 col-sm-1">
                                <!-- {!! Html::decode(Form::label('bankaccount_id','Bottle Quantity:<sup style="color:red;">*</sup>')) !!} -->
                                {{Form::hidden('bankaccount_id', $id, ['class' => 'form-control','id' => 'bankaccount_id', 'placeholder' => 'Bottle Quantity']) }}
                            </div>
                        </div>


                        <div class="form-actions form-group col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Add', ['class' => 'btn btn-primary float-right']) }}
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