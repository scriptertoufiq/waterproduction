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
                        Add Bank Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif
                        <a href="/banks" class="btn btn-success float-right">View Bank</a>
                    </header>
                    <div class="card-body">

                        {!! Form::open(['route' => 'bankaccounts.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <div class="row">
                            <div class="form-group col-md-5 col-lg-5 col-sm-5">
                                {{Form::label('bank_id','Bank Name:') }}
                                {{Form::select('bank_id',$bank, null, ['class' => 'form-control','id' => 'bank_id', 'placeholder' => 'Select Bank']) }}
                            </div>
                            <div class="form-group col-md-1 col-lg-1 col-sm-1">
                                <button class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModal">+</button>
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('account_type','Bank Account Type:') }}
                                {{Form::select('account_type',["current"=>"Current","savings"=> "Savings"], null, ['class' => 'form-control','id' => 'account_type', 'placeholder' => 'Select Account Type']) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('account_no','Bank Account No:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('account_no', null, ['class' => 'form-control','id' => 'account_no', 'placeholder' => 'Bank Account No', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('account_holder_name','Bank Account Holder Name:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('account_holder_name', null, ['class' => 'form-control','id' => 'account_holder_name', 'placeholder' => 'Bank Account Holder Name', 'required']) }}
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Bank Information </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'banks.store','files'=>'true','enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-sm-12">
                        {{Form::label('name','Bank Name:') }}
                        {{Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Bank Name']) }}
                    </div>

                    <div class="form-group col-md-6 col-lg-6 col-sm-12 ">
                        {{Form::label('branch','Bank Account Type:') }}
                        {{Form::text('branch', null, ['class' => 'form-control','id' => 'branch', 'placeholder' => 'Bank Branch']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{Form::submit('Save changes', ['class' => 'btn btn-primary float-right']) }}
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>

@endsection