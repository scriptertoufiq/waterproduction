@extends('layouts.app')

@section('content')



    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                            Debit/Credit(Cost/Income) Report

                        </header>
                        <div class="card-body">

                            {!! Form::open(['route' => 'dcSearch', 'method' => 'GET', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}

                            <div class="row">
                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">

                                </div>
                                <div class="form-group col-md-3 col-lg-3 col-sm-3 ">
                                     {{ Form::label('reportrange', 'Search Datewise ') }}
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

                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>TR Category</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($searchresult)
                                            @foreach ($searchresult as $tr)
                                                @php
                                                    $n = 1;
                                                @endphp
                                                <tr>
                                                    <td>{{ $n++ }}</td>
                                                    <td>{{ $tr->transectionCategory->name }}</td>
                                                    <td>{{ $tr->debit }}</td>
                                                    <td>{{ $tr->credit }}</td>
                                                    <td>{{ $tr->description }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <td colspan="2" style="background: black;color: white">Total Debit/(Cost)</td>
                                        <td style="background: black;color: white">
                                            @if($debitammount)
                                                {{$debitammount}}
                                            @endif
                                        </td>
                                        <td style="background: black;color: white">Total Credit/(Income)</td>
                                        <td style="background: black;color: white">
                                            @if($creditammount)
                                                {{$creditammount}}
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
