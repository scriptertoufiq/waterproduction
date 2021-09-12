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
                        Add Debit(Cost)  Information <span style="color: red;">Your Cash In Hand Is= {{$hand_cash}}</span>

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'accounts.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <div class="row">

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('category_id',' Transection Type :') }}
                                {{Form::select('category_id',$accounttypedebit,null, ['class' => 'form-control','id' => 'category_id', 'placeholder' => 'Select Transection Type ', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('debit',' Ammount:') }}
                                {{Form::number('debit',null, ['class' => 'form-control','id' => 'debit', 'placeholder' => ' Ammount', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 ">
                                {{Form::label('description',' Description :') }}
                                {{Form::text('description',null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description ', 'required']) }}
                            </div>
                        </div>

                        <div class="form-group-actions col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Add Debit', ['class' => 'btn btn-primary float-right']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </section>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Add Credit (Income) Information

                        @if(Session::has('addcreditsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('addcreditsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'accounts.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <div class="row">

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('category_id',' Student Type :') }}
                                {{Form::select('category_id',$accounttypecredit,null, ['class' => 'form-control','id' => 'category_id', 'placeholder' => 'Select Transection Type ', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('credit',' Ammount:') }}
                                {{Form::number('credit',null, ['class' => 'form-control','id' => 'debit', 'placeholder' => ' Ammount', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 ">
                                {{Form::label('description',' Description :') }}
                                {{Form::text('description',null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description ', 'required']) }}
                            </div>
                        </div>

                        <div class="form-group-actions col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Add Credit', ['class' => 'btn btn-primary float-right']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

@endsection
