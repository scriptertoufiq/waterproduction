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
                        Update Water Production Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($production,['method' =>'PATCH', 'route' => ['productions.update', $production->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-5 col-lg-5 col-sm-5">
                                {!! Html::decode(Form::label('bottle_id','Bottle: <sup style="color:red;">*</sup>')) !!}
                                {{Form::select('bottle_id',$bottle, null, ['class' => 'form-control','id' => 'bottle_id', 'placeholder' => 'Select Bottle ', 'required','disabled']) }}
                            </div>
                            <div class="form-group col-md-2 col-lg-2 col-sm-2">
                                {!! Html::decode(Form::label('available_bottle',' <sup style="color:red;">Your Available Bottles:</sup>')) !!}
                                {{Form::text('available_bottle',$available_bottle, ['class' => 'form-control','id' => 'available_bottle', 'placeholder' => 'Your Available Bottles','disabled']) }}
                            </div>
                            <div class="form-group col-md-5 col-lg-5 col-sm-5">
                                {!! Html::decode(Form::label('quantity','Quantity Of Production:<sup style="color:red;">*</sup> <sup id="overAlert" style="color:red;"></sup>')) !!}
                                {{Form::number('quantity', null, ['class' => 'form-control','id' => 'quantity', 'placeholder' => 'Quantity Of Production', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 ">
                                {{Form::label('description','Description:') }}
                                {{Form::text('description', null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description','required']) }}
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