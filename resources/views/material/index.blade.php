@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Raw Material Information
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
                                        <th>Ammount</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $n = 1;
                                    @endphp
                                    @foreach($material as $material)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$material->name}}</td>
                                        <td>{{$material->ammount}}</td>
                                        <td>{{$material->quantity}}</td>
                                        <td>{{$material->description}}</td>
                                        <td>
                                            <form action="{{ route('materials.destroy',$material->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger">Delete</button>
                                                <a class="btn btn-info" href="{{route('materials.edit', $material->id)}}"> Edit</a>
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