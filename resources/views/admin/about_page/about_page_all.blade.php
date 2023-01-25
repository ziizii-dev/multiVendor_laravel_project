@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">About Page</h3>
                    </div>
                    <hr>
                     <form action="{{route('update#about')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-4 offset-1">


                                    <input type="hidden" name="id" value="{{$aboutpage->id}} ">

                                    <div>
                                        <img class="card-img-top img-fluid" id="showImage" src="{{
                                            (!empty($aboutpage->about_image))? url('upload/home_about/'.$aboutpage->about_image) : url('upload/no_image.jpg')}} " />
                                    </div>
                                    <div class="mt-3">
                                        <input type="file" name="about_image" id="image" class="form-control @error('about_image') is-invalid @enderror">
                                        @error('about_image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                      <button class="btn btn-primary form-control text-white" type="submit">Update About Page</button>
                                    </div>


                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Title</label>
                                    <input id="cc-pament" name="title" type="text" value="{{$aboutpage->title}} "  class="form-control @error('title') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Short Title</label>
                                    <input id="cc-pament" name="short_title" type="text" value="{{$aboutpage->short_title}} "  class="form-control @error('short_title') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Userame...">
                                    @error('short_title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Short Descriptin</label>
                                   <textarea name="short_description" id="" class="form-control" >
                                    {{$aboutpage->short_description}}
                                   </textarea>
                                    @error('short_description')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Long Descriptin</label>
                                   {{-- <textarea name="long_description" id="" class="form-control">
                                    {{$aboutpage->long_description}}
                                   </textarea> --}}
                                   <form action="">
                                    <textarea name="long_description"  class="form-control">
                                        {{$aboutpage->long_description}}
                                       </textarea>
                                        @error('long_description')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                   </form>


                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label mb-1">Long Description</label>
                                   <form method="post">

                                    <textarea name="short_description" id="elm1" class="form-control">
                                        {{$aboutpage->long_description}}
                                       </textarea>
                                   </form>
                                    @error('long_description')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div> --}}



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
{{-- nullable တွေပဲဖြစ်လို့ input တွေကို Validate မစစ်ထားပါ --}}
