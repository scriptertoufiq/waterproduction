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
                        Add Commission Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'commissions.store','files'=>'true','enctype'=>'multipart/form-data']) !!}

                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('staff_id','Staff Name:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('staff_id',$staff, null, ['class' => 'form-control','id' => 'staff_id', 'placeholder' => 'Select Staff Name', 'required']) }}
                            </div>
                            

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('date','Date:<sup style="color:red;">*</sup>')) !!}
                                {{Form::date('date',$date, ['class' => 'form-control','id' => 'mobile', 'placeholder' => 'Date', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('target','Target:') }}
                                {{Form::text('target', null, ['class' => 'form-control','id' => 'target', 'placeholder' => 'Target']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('commission','Commission:(In Percent)') }}
                                {{Form::number('commission', null, ['class' => 'form-control','id' => 'commission', 'placeholder' => 'Commission']) }}
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
