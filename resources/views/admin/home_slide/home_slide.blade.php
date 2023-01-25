@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Home Slide Page</h3>
                    </div>
                    <hr>
                     <form action="{{route('update#slider')}} " method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-4 offset-1">


                                    <input type="hidden" name="id" value="{{$homeslide->id}} ">

                                    <div>
                                        <img class="card-img-top img-fluid" id="showImage" src="{{
                                            (!empty($homeslide->home_slide))? url('upload/home_slide/'.$homeslide->home_slide) : url('upload/no_image.jpg')}} " />
                                    </div>
                                    <div class="mt-3">
                                        <input type="file" name="home_slide" id="image" class="form-control @error('home_slide') is-invalid @enderror">
                                        @error('home_slide')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                      <button class="btn btn-primary form-control text-white" type="submit">Update Slide</button>
                                    </div>


                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Title</label>
                                    <input id="cc-pament" name="title" type="text" value="{{$homeslide->title}} "  class="form-control @error('title') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Short Title</label>
                                    <input id="cc-pament" name="short_title" type="text" value="{{$homeslide->short_title}} "  class="form-control @error('short_title') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Userame...">
                                    @error('short_title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Video URL</label>
                                    <input id="cc-pament" name="video_url" type="text"  value="{{$homeslide->video_url}} " class="form-control @error('video_url') is-invalid

                                    @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin Email ...">
                                    @error('video_url')
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
