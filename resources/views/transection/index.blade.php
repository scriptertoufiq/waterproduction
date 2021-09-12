@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        All Bank Account Transection Information

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
                                        <th>Action</th>
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
                                        <td>
                                            <form action="{{ route('transections.destroy',$transection->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger">Delete</button>
                                                <a class="btn btn-info" href="{{route('transections.edit', $transection->id)}}"> Edit</a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
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