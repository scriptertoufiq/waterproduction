@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Sell Information
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
                                        <th>SR Name</th>
                                        <th>Client Name</th>
                                        <th>Sell Ammount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $n = 1;
                                    @endphp
                                    @foreach($sell as $sell)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$sell->staffName->name}}</td>
                                        <td>{{$sell->clientName->name}}</td>
                                        <td>{{$sell->sell_ammount}}</td>
                                        <td>
                                            <form action="{{ route('sells.destroy',$sell->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger">Delete</button>  --}}
                                                <a class="btn btn-info" href="{{route('sells.edit', $sell->id)}}"> Edit</a>
                                                <a class="btn btn-success" href="{{route('sells.show', $sell->id)}}"> View Sell</a>
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