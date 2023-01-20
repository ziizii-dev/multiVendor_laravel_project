@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <center>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Account Info</h3>
                        </div>
                        <hr>

                        <div class="row col-8">


                                    <div class="col-4">
                                        <div>
                                            <img class="card-img-top img-fluid" src="{{
                                                (!empty(Auth::user()->image))? url('upload/admin_images/'.Auth::user()->image) : url('upload/no_image.jpg')}} " alt="John Doe" />
                                        </div>
                                        <div class="row ">
                                            <div class="row">
                                                <a href="{{route('admin#editProfile')}}">
                                                    <div class="col offset-2 mt-3">
                                                        <button class="btn btn-primary text-white"><i class="fa-solid fa-pen-to-square"></i> Edit Prifile</button>
                                                    </div>
                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-7 offset-1">
                                        <h4 class="my-3" > Name : {{Auth::user()->name}} </h4>
                                        <h4 class="my-3" > Username : {{Auth::user()->name}} </h4>
                                        <h4 class="my-3" >Email:{{Auth::user()->email}} </h4>

                                    </div>

                        </div>

                    </div>
                </div>
            </center>

        </div>

    </div>
</div>


@endsection
