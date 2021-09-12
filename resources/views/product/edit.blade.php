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
                        Update Sr Product Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($product,['method' =>'PATCH', 'route' => ['products.update', $product->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('production_id','Product:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('production_id',$bottle, null, ['class' => 'form-control','id' => 'production_id', 'placeholder' => 'Product', 'required']) }}
                            </div>

                            

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {!! Html::decode(Form::label('staff_id','SR:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('staff_id',$staff, null, ['class' => 'form-control','id' => 'staff_id', 'placeholder' => 'SR', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('distribute_quantity','Quantity:<sup id="overAlert1" style="color:red;"></sup>')) !!}
                                {{Form::number('distribute_quantity', null, ['class' => 'form-control','id' => 'distribute_quantity', 'placeholder' => 'Quantity']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('status','Description:') }}
                                {{Form::text('status', null, ['class' => 'form-control','id' => 'status', 'placeholder' => 'Description']) }}
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