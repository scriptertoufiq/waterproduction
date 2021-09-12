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
                        Update Transection Category Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($category,['method' =>'PATCH', 'route' => ['category.update', $category->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('name','Transection Name:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Transection Name', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('type','Transection Type:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('type',['debit'=>'Debit','credit'=>'Credit','both'=>'Both'],null, ['class' => 'form-control','id' => 'type', 'placeholder' => 'Transection Type', 'required']) }}
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