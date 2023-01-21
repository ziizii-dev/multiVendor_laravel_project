@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2" >Change Password Page </h3>
                    </div>
                    <hr>
                     <form action="{{route('admin#updatePassword')}} " method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">

                            <div class=" col-6 offset-3">
                                <div class="form-group">
                                    <label class="control-label mb-1">Password</label>
                                    <input id="cc-pament" name="password" type="text"  "  class="form-control @error('password') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Password...">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">New Password</label>

                                    <input id="cc-pament" name="newPassword" type="text"   class="form-control @error('newPassword') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter New Password...">
                                    @error('newPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="form-group">

                                    <label class="control-label mb-1">Confirm Password</label>

                                    <input id="cc-pament" name="confirmPassword" type="text"   class="form-control @error('confirmPassword') is-invalid

                                    @enderror" aria-required="true" aria-invalid="false" placeholder="Confirm Password ...">
                                    @error('confirmPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror

                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary form-control text-white" type="submit">Change Password</button>
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
