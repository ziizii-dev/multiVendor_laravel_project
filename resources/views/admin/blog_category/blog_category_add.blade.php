@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Add Blog Category Page</h3>
                        </div>
                        <hr>
                        <form action="{{ route('store#blogCategory') }}" id="myForm" method="POST">
                            @csrf
                            <div class="row">

                                <div class=" col-6 offset-3">
                                    <div class="form-group">
                                    <label class="control-label mb-1">Blog Category Name</label>
                                    <input id="cc-pament" name="blog_category" type="text" value=" "  class="form-control @error('blog_category') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('blog_category')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                    {{-- <div class="form-group">
                                        <label class="control-label mb-1">Blog Category Name</label>
                                        <input id="cc-pament" name="blog_category" type="text" value=" "
                                            class="form-control" aria-required="true" aria-invalid="false"
                                            placeholder="Enter Category Name...">
                                    </div> --}}
                                    <div class="form-group">
                                        <div class="mt-3">
                                            <button class="btn btn-primary form-control text-white" type="submit">Insert
                                                Blog Category</button>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- <script type="text/javascript">

$(document).ready(function(){
    $('#image').change(function(run){
          var reader = new FileReader();
          reader.onload = function(run){
            $('#showImage').attr('src', run.target.result);

          }
          reader.readAsDataURL (run.target.files['0'])
    });
});

</script> --}}
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    blog_category: {
                        rerquired: true,
                    }
                }
                message: {
                    blog_category: {
                        'required': 'Please Enter Category Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid')
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid')
                },

            })
        });
    </script> --}}
@endsection
