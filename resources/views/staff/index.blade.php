@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Staff Information
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
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                        <th>Nid</th>
                                        <th>Salary</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $n = 1;
                                    @endphp
                                    @foreach($staff as $staff)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$staff->name}}</td>
                                        <td>{{$staff->mobile}}</td>
                                        <td>{{$staff->address}}</td>
                                        <td>{{$staff->nid}}</td>
                                        <td>{{$staff->salary}}</td>
                                        <td>{{$staff->post}}</td>
                                        <td>
                                            <form action="{{ route('staffs.destroy',$staff->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger">Delete</button>
                                                <a class="btn btn-dark" href="{{route('commissions.show', $staff->id)}}"> Add Salary</a>
                                                <a class="btn btn-info" href="{{route('staffs.edit', $staff->id)}}"> Edit</a>
                                                <a class="btn btn-success" href="{{route('staffs.show', $staff->id)}}"> Pay Bill</a>
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