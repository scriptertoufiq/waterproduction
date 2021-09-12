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
                        Client Payment and Bottle Information

                        

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'payments.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <h3 style="text-align: center;color: black;font-size: 18px;"> Payment Option of {{$client->name}} </h3>
                        <div class="row">
                            <div class="form-group col-md-2 col-lg-2 col-sm-2">
                                {!! Html::decode(Form::label('payable','<sup style="color:red;">Total Payable Money</sup>')) !!}
                                @php
                                    $payable = $total_sell - $total_pay;
                                @endphp
                                {{Form::text('payable', $payable, ['class' => 'form-control','id' => 'payable', 'placeholder' => 'Payable Ammount','readonly']) }}
                            </div>
                            <div class="form-group col-md-2 col-lg-2 col-sm-2">
                                {!! Html::decode(Form::label('payable','<sup style="color:red;">Total Return Able Bottle</sup>')) !!}
                                {{Form::text('payable', $duebottle, ['class' => 'form-control','id' => 'payable', 'placeholder' => 'Payable Ammount','readonly']) }}
                            </div>

                            <div class="form-group col-md-4 col-lg-4 col-sm-4 ">
                                {!! Html::decode(Form::label('pay_ammount','Pay Ammount:<sup style="color:red;"></sup>')) !!}
                                {{Form::number('pay_ammount', null, ['class' => 'form-control','id' => 'pay_ammount', 'placeholder' => 'Pay Ammount']) }}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-3 ">
                                {!! Html::decode(Form::label('pay_bottle','Pay Bottle:<sup style="color:red;"></sup>')) !!}
                                {{Form::number('pay_bottle', null, ['class' => 'form-control','id' => 'pay_bottle', 'placeholder' => 'Pay Bottle']) }}
                            </div>

                            <div class="form-group col-md-1 col-lg-1 col-sm-1">
                                {{-- {!! Html::decode(Form::label('payable','Total Payable:<sup style="color:red;"></sup>')) !!} --}}
                                {{Form::hidden('client_id', $client->id, ['class' => 'form-control','id' => 'payable', 'placeholder' => 'Payable Ammount','readonly']) }}
                            </div>
                        </div>
                        
                        <div class="form-actions form-group col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Pay', ['class' => 'btn btn-primary float-right']) }}
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
