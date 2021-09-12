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
                        Update Bank Account Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($bankaccount,['method' =>'PATCH', 'route' => ['bankaccounts.update', $bankaccount->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('bank_id','Bank Name:') }}
                                {{Form::select('bank_id',$bank, null, ['class' => 'form-control','id' => 'bank_id', 'placeholder' => 'Select Bank']) }}
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