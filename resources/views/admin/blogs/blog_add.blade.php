@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Add Blog Page</h3>
                    </div>
                    <hr>
                     <form action=" {{route("store#blog")}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-4 offset-1">


                                    {{-- <input type="hidden" name="id" value="{{$aboutpage->id}} "> --}}

                                    <div>
                                        <img style="width:420px; height:327px" class="card-img-top img-fluid" id="showImage"
                                        src="{{url('upload/no_image.jpg')}} " />
                                    </div>
                                    <div class="mt-3">
                                        <input type="file" name="blog_image" id="image" class="form-control @error('blog_image') is-invalid @enderror">
                                        @error('blog_image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                      <button class="btn btn-primary form-control text-white" type="submit">Insert Blog Page</button>
                                    </div>
                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Blog Category Name</label>
                                <select name="blog_category_id" id="" class="form-select">
                                    <option selected value="1">Open This Select Menu</option>
                                    @foreach ($categories as $cat )
                                <option value=" {{$cat->id}}">{{$cat->blog_category}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Blog Title</label>
                                    <input id="cc-pament" name="blog_title" type="text" value=" "  class="form-control @error('blog_title') is-invalid
                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Userame...">
                                    @error('blog_title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Blog Tags</label>
                                    <input id="cc-pament" name="blog_tags" type="text" value="home,tech"  class="form-control @error('blog_tags') is-invalid
                                    @enderror " aria-required="true" aria-invalid="false"  data-role ="tagsinput">
                                    @error('blog_title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label class="control-label mb-1">Blog Descriptin</label>
                                   {{-- <textarea name="long_description" id="" class="form-control">
                                    {{$aboutpage->long_description}}
                                   </textarea> --}}
                                   <form action="">
                                    <textarea name="blog_description"  class="form-control">

                                       </textarea>
                                        @error('blog_description')
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
                                        {{$aboutpage->portfolio_description}}
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
