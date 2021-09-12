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
                        Destroyed Bottle Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        <h4>Your Available Bottle Of This Category is <span style="color:blue">{{$availableBottle}}</span> </h4> 
                        {!! Form::open(['route' => 'destroyedbottles.store','files'=>'true','enctype'=>'multipart/form-data']) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('quantity','Destroyed Bottle Quantity:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('quantity', null, ['class' => 'form-control','id' => 'quantity', 'placeholder' => 'Destroyed Bottle Quantity','required']) }}
                            </div>

                            <div class="form-group col-md-5 col-lg-5 col-sm-5 ">
                                {{Form::label('description','Description Of Destroying Bottle:') }}
                                {{Form::text('description', null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description Of Destroying Bottle']) }}
                            </div>
                            <div class="form-group col-md-1 col-lg-1 col-sm-1">
                                <!-- {!! Html::decode(Form::label('quantity','Bottle Quantity:<sup style="color:red;">*</sup>')) !!} -->
                                {{Form::hidden('bottle_id', $id, ['class' => 'form-control','id' => 'quantity', 'placeholder' => 'Bottle Quantity','required']) }}
                            </div>
                        </div>

                        <div class="form-actions form-group col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Destroy', ['class' => 'btn btn-primary float-right']) }}
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