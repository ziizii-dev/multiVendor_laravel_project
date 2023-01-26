@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Add Multi Image Page</h3>
                    </div>
                    <hr>
                     <form action="{{route('store#multiImage')}} " method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-3 offset-3">


                                    {{-- <input type="hidden" name="id" value="{{$aboutpage->id}} "> --}}

                                    <div class=" col-sm-10">
                                        <img style="width:220px; height:220px" class="card-img-top img-fluid" id="showImage"
                                         src="{{url('upload/no_image.jpg')}} " />
                                    </div>
                                    <div class="mt-3">
                                        <input type="file" name="multi_image[]" id="image" class="form-control @error('about_image') is-invalid @enderror" multiple>
                                        @error('multi_image')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                      <button class="btn btn-primary form-control text-white" type="submit">Add Multi Image</button>
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
{{-- nullable တွေပဲဖြစ်လို့ input တွေကို Validate မစစ်ထားပါ --}}
