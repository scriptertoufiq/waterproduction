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
                        Add Transaction Type

                        @if(Session::has('addsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('addsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'accounttypes.store','files'=>'true','enctype'=>'multipart/form-data']) !!}


                        <div class="row">

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('transaction_type',' Transaction Type :') }}
                                {{Form::text('transaction_type',null, ['class' => 'form-control','id' => 'transaction_type', 'placeholder' => 'Transaction Type ', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('for',' For :') }}
                                {{Form::select('for',["debit"=>"Debit","credit"=> "Credit","both"=>"Both"],null, ['class' => 'form-control','id' => 'for', 'placeholder' => 'Select For ', 'required']) }}
                            </div>
                        </div>

                        <div class="form-group-actions col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Add', ['class' => 'btn btn-primary float-right']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
            </div>
    </section>
    </div>
    </div>
    <!-- page end-->
</section>
</section>
<!--main content end-->

@endsection
