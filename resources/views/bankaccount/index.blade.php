@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Bank Account Information
                        <a href="/transections" class="btn btn-info float-right">All Transection</a>
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
                                        <th>Account No</th>
                                        <th>Account Holder Name</th>
                                        <th>Account Type</th>
                                        <th>Bank Name</th>
                                        <th>Bank Branch </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $n = 1;
                                    @endphp
                                    @foreach($ba as $ba)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$ba->account_no}}</td>
                                        <td>{{$ba->account_holder_name}}</td>
                                        <td>{{$ba->account_type}}</td>
                                        <td>{{$ba->bankinfo->name}}</td>
                                        <td>{{$ba->bankinfo->branch}}</td>
                                        <td>
                                            <form action="{{ route('bankaccounts.destroy',$ba->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger">Delete</button>
                                                <a class="btn btn-info" href="{{route('bankaccounts.edit', $ba->id)}}"> Edit</a>
                                                <a class="btn btn-success" href="{{route('bankaccounts.show', $ba->id)}}">Make Transection</a>
                                                <a class="btn btn-secondary" href="{{route('transections.show', $ba->id)}}">View Transection</a>
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