@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Eidt Profile Page</h3>
                    </div>
                    <hr>
                     <form action="{{route('admin#updateProfile')}} " method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-4 offset-1">


                                        {{-- @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'male')
                                        <img src="{{asset('image/default_user.png')}} " class="img-thumbnail shadow-sm" >

                                        @else
                                        <img src="{{asset('image/female_default.jpg')}} " class="img-thumbnail shadow-sm" >

                                        @endif


                                    @else
                                        <img src="{{ asset('storage/'.Auth::user()->image) }} " class="img-thumbnail shadow-sm" />
                                    @endif --}}
                                    {{-- <img src="{{ asset('storage/'.Auth::user()->image) }} " class="img-thumbnail shadow-sm" /> --}}

                                    <div>
                                        <img class="card-img-top img-fluid" id="showImage" src="{{
                                            (!empty(Auth::user()->image))? url('upload/admin_images/'.Auth::user()->image) : url('upload/no_image.jpg')}} " />
                                    </div>
                                    <div class="mt-3">
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                      <button class="btn btn-primary form-control text-white" type="submit">Update</button>
                                    </div>


                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Name</label>
                                    <input id="cc-pament" name="name" type="text" value="{{old('name', Auth::user()->name)}} "  class="form-control @error('name') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Username</label>
                                    <input id="cc-pament" name="username" type="text" value="{{old('username', Auth::user()->username)}} "  class="form-control @error('username') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Userame...">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Email</label>
                                    <input id="cc-pament" name="email" type="text"  value="{{old('email', Auth::user()->email)}} " class="form-control @error('email') is-invalid

                                    @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin Email ...">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>


                            </div>
                        </div>
                     </form>

                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
    $('#image').change(function(run){
          var reader = new FileReader();
          reader.onload = function(run){
            $('#showImage').attr('src', run.target.result);

          }
          reader.readAsDataURL (run.target.files['0'])
    });
});

</script>

@endsection
