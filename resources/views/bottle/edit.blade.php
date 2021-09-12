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
                        Update Bottle Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($bottle,['method' =>'PATCH', 'route' => ['bottles.update', $bottle->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('size_id','Bottle Size:') }}
                                {{Form::select('size_id',$bottle_size,null, ['class' => 'form-control','id' => 'size_id', 'placeholder' => 'Select Bottle Size', 'required']) }}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('pices','Pices Of Bottle:') }}
                                {{Form::number('pices', null, ['class' => 'form-control','id' => 'pices', 'placeholder' => ' Pices Of Bottle', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('color','Bottle Color:') }}
                                {{Form::text('color', null, ['class' => 'form-control','id' => 'color', 'placeholder' => 'Bottle Color','required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('description','Description:') }}
                                {{Form::text('description', null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description']) }}
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