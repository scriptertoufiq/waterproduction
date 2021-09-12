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
                        Update Payment Salary Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($salary,['method' =>'PATCH', 'route' => ['salary.update', $salary->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                {!! Html::decode(Form::label('salary','Salary:<sup style="color:red;"></sup>')) !!}
                                {{Form::number('salary',null, ['class' => 'form-control','id' => 'salary', 'placeholder' => 'salary']) }}
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