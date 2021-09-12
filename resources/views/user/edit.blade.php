@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                        Update User Information

                        @if(Session::has('updatesuccess'))
                        <div class="alert alert-success mt-2">
                            {{session('updatesuccess')}}
                        </div>
                        @endif

                    </header>
                    <div class="card-body">
                        <form method="POST" action="{{ URL::to('/updateuser/'.$user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="batch_id">Name </label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email<span class="required_field_sign">*</span> </label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled placeholder="Email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password">Password <span class="required_field_sign">*</span> </label>
                                    <input type="password" class="form-control" id="password" name="password" value=""  placeholder="Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">
                                {{ __('Update User') }}
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

@endsection