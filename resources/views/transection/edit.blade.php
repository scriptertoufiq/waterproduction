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
                        Update Bank Transection Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($transection,['method' =>'PATCH', 'route' => ['transections.update', $transection->id]]) !!}
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

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('cheque_no','Cheque No:<sup style="color:red;">If Applicable</sup>')) !!}
                                {{Form::text('cheque_no', null, ['class' => 'form-control','id' => 'cheque_no', 'placeholder' => 'Cheque No','disabled' ]) }}
                            </div>
                        </div>

                        <div class="form-actions form-group col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Update', ['class' => 'btn btn-primary float-right']) }}
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