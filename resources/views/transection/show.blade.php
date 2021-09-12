@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        All Transection Information of <span style="color: red;">{{$account_no}}</span>

                        @if(Session::has('insertsuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('insertsuccess')}}
                        </div>
                        @endif

                        @if(Session::has('deletesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('deletesuccess')}}
                        </div>
                        @endif

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Debit Ammount</th>
                                        <th>Credit Ammount</th>
                                        <th>Type</th>
                                        <th>Checque No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $n = 1;
                                    @endphp
                                    @foreach($transection as $transection)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$transection->accountname->name }}</td>
                                        <td>{{$transection->bankaccountname->account_no }}</td>
                                        <td>{{$transection->debit?? 'Not Applicable'}}</td>
                                        <td>{{$transection->credit?? 'Not Applicable'}}</td>
                                        <td>{{$transection->type}}</td>
                                        <td>{{$transection->cheque_no?? 'Not Applicable'}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td class="bg-dark text-white" colspan="3">Total</td>
                                    <td class="bg-dark text-white">{{$debitammount}}</td>
                                    <td class="bg-dark text-white" colspan="3">{{$creditammount}}</td>
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