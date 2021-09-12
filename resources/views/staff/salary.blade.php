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
                        Salary Payment Information

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif
                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::open(['route' => 'salary.store','files'=>'true','enctype'=>'multipart/form-data']) !!}
                        <h3 style="text-align: center;color: black;font-size: 18px;">Salary Payment of {{$staff->name}}</h3>
                        <h3 style="text-align: center;color: rgb(19, 99, 204);font-size: 18px;">Payable ammount is =   
                             @if($payable<0)
                                 <span style="color: red;">This Person Already Takes More = {{$payable}} Than his earned Salary</span>   
                             @else
                             {{$payable}}
                             @endif
                            
                        </h3>
                        <div class="row">
                            <div class="form-group col-md-2 col-lg-2 col-sm-2">
                                {{-- {!! Html::decode(Form::label('salary','Salary:<sup style="color:red;"></sup>')) !!} --}}
                                {{Form::hidden('staff_id',$staff->id, ['class' => 'form-control','id' => 'staff_id', 'placeholder' => 'salary']) }}
                            </div>
                            <div class="form-group col-md-10 col-lg-10 col-sm-10">
                                {!! Html::decode(Form::label('salary','Salary:<sup style="color:red;"></sup>')) !!}
                                {{Form::number('salary',null, ['class' => 'form-control','id' => 'salary', 'placeholder' => 'salary']) }}
                            </div>
                        </div>
                        <div class="form-actions form-group col-lg-12 col-md-12 col-sm-12">
                            <!-- Submit Button Form -->
                            {{Form::submit('Pay Bill', ['class' => 'btn btn-primary float-right']) }}
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
