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
                        Update Raw Materail Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($material,['method' =>'PATCH', 'route' => ['materials.update', $material->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('name','Materail Name:') }}
                                {{Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Materail Name', 'required']) }}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('ammount','Ammount:') }}
                                {{Form::number('ammount', null, ['class' => 'form-control','id' => 'ammount', 'placeholder' => 'Ammount', 'required']) }}
                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('quantity','Material Quantity:') }}
                                {{Form::number('quantity', null, ['class' => 'form-control','id' => 'quantity', 'placeholder' => 'Material Quantity']) }}
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