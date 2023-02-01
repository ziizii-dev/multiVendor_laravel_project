@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Footer Setup Page</h3>
                    </div>
                    <hr>
                     <form action="{{route('update#footer')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$allfooter->id}} " >
                        <div class="row">

                            <div class=" col-6 offset-3">
                                <div class="form-group">
                                    <label class="control-label mb-1">Number</label>
                                    <input id="cc-pament" name="number" type="text" value="{{$allfooter->number}} "  class="form-control @error('number') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('number')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Short Description</label>
                                    <input id="cc-pament" name="short_description" type="text" value="{{$allfooter->short_description}} "  class="form-control @error('short_description') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('short_description')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Address</label>
                                    <input id="cc-pament" name="address" type="text" value="{{$allfooter->address}} "  class="form-control @error('address') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Email</label>
                                    <input id="cc-pament" name="email" type="text" value="{{$allfooter->email}} "  class="form-control @error('email') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Facebook</label>
                                    <input id="cc-pament" name="facebook" type="text" value="{{$allfooter->facebook}} "  class="form-control @error('facebook') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('facebook')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Twitter</label>
                                    <input id="cc-pament" name="twitter" type="text" value="{{$allfooter->twitter}} "  class="form-control @error('twitter') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('twitter')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Copyright</label>
                                    <input id="cc-pament" name="copyright" type="text" value="{{$allfooter->copyright}} "  class="form-control @error('copyright') is-invalid

                                    @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                    @error('copyright')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="mt-3">
                                      <button class="btn btn-primary form-control text-white" type="submit">Insert Footer</button>
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

@endsection

