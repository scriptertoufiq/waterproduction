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
                        Update Earned Salary Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($commission,['method' =>'PATCH', 'route' => ['commissions.update', $commission->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {!! Html::decode(Form::label('salary','Salary:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('salary',null, ['class' => 'form-control','id' => 'salary', 'placeholder' => 'salary','readonly']) }}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {!! Html::decode(Form::label('commission','Commission:<sup style="color:red;"></sup>')) !!}
                                {{Form::text('commission',null, ['class' => 'form-control','id' => 'commission', 'placeholder' => 'Commission']) }}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
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