@extends('layouts.app')

@section('content')



    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                            Sell Report

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

                            {!! Form::open(['route' => 'sellReportSearch', 'method' => 'GET', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}

                            <div class="row">
                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">

                                </div>
                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">
                                    {{ Form::label('reportrange', 'Search ') }}
                                    {{ Form::text('reportrange', null, ['class' => 'form-control', 'id' => 'reportrange', 'placeholder' => 'Date Picker ']) }}
                                </div>
                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">
                                    @php
                                        $staff = App\Models\Staff::where('post', '!=', 'manager')->Where('post', '!=', 'Worker')->Where('post', '!=', 'AreaManager')->pluck('name', 'id')
                                    @endphp
                                    {{ Form::label('sr', ' SR/Seller :') }}
                                    {{ Form::select('sr', $staff, null, ['class' => 'form-control', 'id' => 'sr', 'placeholder' => 'Select Sr ']) }}
                                </div>

                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">
                                    {{ Form::submit('Search', ['class' => 'btn btn-primary mt-4']) }}
                                </div>
                            </div>

                            <div class="form-group-actions col-lg-12 col-md-12 col-sm-12">
                                <!-- Submit Button Form -->

                            </div>
                            {!! Form::close() !!}

                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>SR Name</th>
                                            <th>Client Name</th>
                                            <th>Total Sell</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                       
                                        @if ($searchresult)
                                            @foreach ($searchresult as $sell)
                                                @php
                                                    $n = 1;
                                                @endphp
                                                <tr>
                                                    <td>{{ $n++ }}</td>
                                                    <td>{{$sell->staffName->name}}</td>
                                                    <td>{{$sell->clientName->name}}</td>
                                                    <td>{{$sell->sell_ammount}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <td colspan="2" style="background: black;color: white">Total Sell</td>
                                        <td colspan="2" style="background: black;color: white">
                                            @if($totalsellammount)
                                                {{$totalsellammount}}
                                            @endif
                                        </td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->

@endsection
