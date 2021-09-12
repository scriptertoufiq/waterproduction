@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Water Production Information <span style="color: red; margin-left: 25px;">Todays Total Production is {{$todayproduction}}</span>   
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

                        @if(Session::has('destroysuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('destroysuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Bottle</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $n = 1;
                                    @endphp
                                    @foreach($production as $production)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$production->bottle->name}} </td>
                                        <td>{{$production->quantity}}</td>
                                        <td>{{$production->description}}</td>
                                        <!--<td>-->
                                        <!--    <form action="{{ route('productions.destroy',$production->id) }}" method="POST">-->
                                        <!--        @csrf-->
                                        <!--        @method('DELETE')-->
                                        <!--        <button type="submit" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger">Delete</button>-->
                                        <!--        {{-- <a class="btn btn-info" href="{{route('productions.edit', $production->id)}}"> Edit</a> --}}-->
                                        <!--    </form>-->
                                        <!--</td>-->
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