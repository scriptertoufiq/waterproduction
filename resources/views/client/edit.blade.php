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
                        Update Client Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        {!! Form::model($client,['method' =>'PATCH', 'route' => ['clients.update', $client->id]]) !!}
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('name','Client Name:') }}
                                {{Form::text('name', null, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Client Name', 'required']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('mobile','Mobile Number:') }}
                                {{Form::number('mobile', null, ['class' => 'form-control','id' => 'mobile', 'placeholder' => 'Mobile Number(01*********)', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('address','Address:<sup style="color:red;">*</sup>')) !!}
                                {{Form::text('address', null, ['class' => 'form-control','id' => 'address', 'placeholder' => 'Address', 'required']) }}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {!! Html::decode(Form::label('category','Client Category:<sup style="color:red;">*</sup>')) !!}
                                {{Form::select('category',['dealer'=>'Dealer','retailer'=>'Retailer','corporate'=>'Corporate','genarel'=>'Genarel'], null, ['class' => 'form-control','id' => 'category', 'placeholder' => 'Client Category', 'required']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                {{Form::label('contact_person','Contact Person:') }}
                                {{Form::text('contact_person', null, ['class' => 'form-control','id' => 'contact_person', 'placeholder' => 'Contact Person']) }}
                            </div>

                            <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                {{Form::label('contact_person_post','Contact Person Information/Post:') }}
                                {{Form::text('contact_person_post', null, ['class' => 'form-control','id' => 'contact_person_post', 'placeholder' => 'Contact Person Information/Post']) }}
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