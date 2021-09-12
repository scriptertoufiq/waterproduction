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
                        Update Staff Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($staff,['method' =>'PATCH', 'route' => ['staffs.update', $staff->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('name','Staff Name:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Staff Name', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('mobile','Mobile Number:<sup style="color:red;">*</sup>')) !!}
                                {{Form::number('mobile', null, ['class' => 'form-control','id' => 'mobile', 'placeholder' => 'Mobile Number(01*********)', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-lg-12 col-sm-12">
                                {!! Html::decode(Form::label('address','Address:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('address', null, ['class' => 'form-control','id' => 'address', 'placeholder' => 'Address', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-lg-4 col-sm-4">
                                {{Form::label('nid','NID:') }}
                                {{Form::text('nid', null, ['class' => 'form-control','id' => 'nid', 'placeholder' => 'NID']) }}
                            </div>

                            <div class="form-group col-md-4 col-lg-4 col-sm-4 ">
                                {{Form::label('salary','Salary:') }}
                                {{Form::number('salary', null, ['class' => 'form-control','id' => 'salary', 'placeholder' => 'Salary']) }}
                            </div>

                            <div class="form-group col-md-4 col-lg-4 col-sm-4 ">
                                {{Form::label('post','Designation:') }}
                                {{Form::select('post',['manager'=>'Manager','areamanager'=>'AreaManager','dsr'=>'DSR','worker'=>'Worker','sr'=>'SR'], null, ['class' => 'form-control','id' => 'post', 'placeholder' => 'Designation']) }}
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