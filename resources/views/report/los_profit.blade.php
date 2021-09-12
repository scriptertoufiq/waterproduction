@extends('layouts.app')

@section('content')



    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                            LOSS/Profit Report

                            @if (Session::has('deletesuccess'))
                                <div class="alert alert-success mt-2">
                                    {{ session('deletesuccess') }}
                                </div>
                            @endif

                            @if (Session::has('updatesuccess'))
                                <div class="alert alert-success mt-2">
                                    {{ session('updatesuccess') }}
                                </div>
                            @endif

                        </header>
                        <div class="card-body">

                            {!! Form::open(['route' => 'profitLossSearch', 'method' => 'GET', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}

                            <div class="row">
                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">

                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                                    {{ Form::label('reportrange', 'Search ') }}
                                    {{ Form::text('reportrange', null, ['class' => 'form-control', 'id' => 'reportrange', 'placeholder' => 'Date Picker ']) }}
                                </div>

                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">
                                    {{ Form::submit('Search', ['class' => 'btn btn-primary mt-4']) }}
                                </div>
                            </div>

                            <div class="form-group-actions col-lg-12 col-md-12 col-sm-12">
                                <!-- Submit Button Form -->

                            </div>
                            {!! Form::close() !!}

                            <div class="row mt-5">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="table-responsive1">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" style="text-align: center;" >Income</th>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Ammount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Selling Water</td>
                                                    <td>{{$earnfromwater}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Earn From Other</td>
                                                    <td>{{$earnfromother}}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <td style="background: black;color: white">Total Income</td>
                                                <td style="background: black;color: white">
                                                    @if($totalincome)
                                                        {{$totalincome}}
                                                    @endif
                                                </td>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="table-responsive1">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" style="text-align: center;" >Cost</th>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Ammount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Cost Of Salary</td>
                                                    <td>{{$costofsalary}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Cost Of Other</td>
                                                    <td>{{$costofother}}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <td style="background: black;color: white">Total Cost</td>
                                                <td style="background: black;color: white">
                                                    @if($totalcost)
                                                        {{$totalcost}}
                                                    @endif
                                                </td>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <span style="color: green;font-size: 20px;">Profit={{$totalincome-$totalcost}}</span>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->

@endsection
