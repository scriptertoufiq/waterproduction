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
                        Update Bank Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($bank,['method' =>'PATCH', 'route' => ['banks.update', $bank->id]]) !!}
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