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
                        Add Bottle Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'bottles.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('size_id','Bottle Size: <sup style="color:red;">*</sup>')) !!}
                                {{Form::select('size_id',$bottle_size, null, ['class' => 'form-control','id' => 'size_id', 'placeholder' => 'Select Bottle Size', 'required']) }}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('pices','Pices Of Bottle:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('pices', null, ['class' => 'form-control','id' => 'pices', 'placeholder' => ' Pices Of Bottle', 'required']) }}
                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('color','Bottle Color:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('color', null, ['class' => 'form-control','id' => 'color', 'placeholder' => 'Bottle Color']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('description','Description:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('description', null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description']) }}
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