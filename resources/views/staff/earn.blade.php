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
                        Salary Adding Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'commissions.store','files'=>'true','enctype'=>'multipart/form-data']) !!}
                        <h3 style="text-align: center;color: black;font-size: 18px;">Add Salary and Other's of {{$staff->name}}</h3>
                        <div class="row">
                            <div class="form-group col-md-1 col-lg-1 col-sm-1">
                                {{-- {!! Html::decode(Form::label('salary','Salary:<sup style="color:red;"></sup>')) !!} --}}
                                {{Form::hidden('staff_id',$staff->id, ['class' => 'form-control','id' => 'staff_id', 'placeholder' => 'salary']) }}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {!! Html::decode(Form::label('salary','Salary:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('salary',$staff->salary, ['class' => 'form-control','id' => 'salary', 'placeholder' => 'salary','readonly']) }}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {!! Html::decode(Form::label('commission','Commission:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('commission',null, ['class' => 'form-control','id' => 'commission', 'placeholder' => 'Commission']) }}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-3">
                                {!! Html::decode(Form::label('cutting','Cutting:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('cutting',null, ['class' => 'form-control','id' => 'cutting', 'placeholder' => 'Cutting']) }}
                            </div>
                            {{-- <div class="form-group col-md-2 col-lg-2 col-sm-2">
                                {!! Html::decode(Form::label('totalsalary','Cutting:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('totalsalary',null, ['class' => 'form-control','id' => 'totalsalary', 'placeholder' => 'Total Earn','readonly']) }}
                            </div> --}}
                        </div>
                        <div class="form-actions form-group col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Add Salary', ['class' => 'btn btn-primary float-right']) }}
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
