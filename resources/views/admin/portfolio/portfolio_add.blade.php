@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Portfolio Page</h3>
                    </div>
                    <hr>
                     <form action=" {{route("store#portfolio")}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-4 offset-1">


                                    {{-- <input type="hidden" name="id" value="{{$aboutpage->id}} "> --}}

                                    <div>
                                        <img style="width:200px; height:200px" class="card-img-top img-fluid" id="showImage"
                                        src="{{url('upload/no_image.jpg')}} " />
                                    </div>
                                    <div class="mt-3">
                                        <input type="file" name="portfolio_image" id="image" class="form-control @error('portfolio_image') is-invalid @enderror">
                                        @error('portfolio_image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                      <button class="btn btn-primary form-control text-white" type="submit">Insert Portfolio Page</button>
                                    </div>


                            </div>
                            <div class=" col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Portfolio Name</label>
                                    <input id="cc-pament" name="portfolio_name" type="text" value=" "  class="form-control @error('portfolio_name') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('portfolio_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Portfolio Title</label>
                                    <input id="cc-pament" name="portfolio_title" type="text" value=" "  class="form-control @error('portfolio_title') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Userame...">
                                    @error('portfolio_title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label class="control-label mb-1">Portfolio Descriptin</label>
                                   {{-- <textarea name="long_description" id="" class="form-control">
                                    {{$aboutpage->long_description}}
                                   </textarea> --}}
                                   <form action="">
                                    <textarea name="portfolio_description"  class="form-control">

                                       </textarea>
                                        @error('portfolio_description')
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
