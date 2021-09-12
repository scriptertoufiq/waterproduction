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
                        Add Bottle Size and Pricing Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'bottlesize.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <div class="row">
                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {!! Html::decode(Form::label('name','Name:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Name', 'required']) }}
                            </div>

                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {!! Html::decode(Form::label('size','Size:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('size', null, ['class' => 'form-control','id' => 'size', 'placeholder' => 'Size', 'required']) }}
                            </div>

                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {!! Html::decode(Form::label('price','Price:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('price', null, ['class' => 'form-control','id' => 'price', 'placeholder' => 'Price', 'required']) }}
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
