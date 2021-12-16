@include('includes.header')

@include('includes.side-bar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Employee Details </h3>
              @if(session()->get('emp_error')!= '')
                  <div class='alert alert-danger'>{{session()->get('emp_error')}}</div>
                @endif
                @if(session()->get('emp_success')!= '')
              
                <div class='alert alert-success'>{{session()->get('emp_success')}}</div>
              @endif
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Employee Form</h4>
                    {{-- <p class="card-description"> Basic form layout </p> --}}
                    @if(isset($up_emps))
                    {{-- {{dd($up_emps[0]->ename);}} --}}
                    <form class="forms-sample" method="POST" action="{{url('edit-form')}}/{{$up_emps[0]->id}}" enctype="multipart/form-data">
                      @else
                      <form class="forms-sample" method="POST" action="{{url('post-form')}}" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">Employee Name</label>
                          @if(isset($up_emps[0]->ename))
                          <input type="text" class="form-control" name='ename' value = "{{$up_emps[0]->ename;}}" id="exampleInputUsername1" placeholder="Username">
                          @else
                          <input type="text" class="form-control" name='ename' value = "{{old('ename')}}" id="exampleInputUsername1" placeholder="Username">
                          @endif
                        <span class="text-danger">{{ $errors->first('ename') }}</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        @if(isset($up_emps[0]->email))
                        <input type="email" class="form-control" name='email' value = "{{$up_emps[0]->email;}}" id="exampleInputEmail1" placeholder="Email">
                        @else
                        <input type="email" class="form-control" name='email' value = "{{old('email')}}" id="exampleInputEmail1" placeholder="Email">
                        @endif
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        @if(isset($up_emps[0]->password))
                        <input type="password" class="form-control" name='password' disabled id="exampleInputPassword1" placeholder="Password">
                        @else
                        <input type="password" class="form-control" name='password' value = "{{old('password')}}" id="exampleInputPassword1" placeholder="Password">
                        @endif
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm Password</label>
                        @if(isset($up_emps[0]->password))
                        <input type="password" class="form-control" name='cnf_password' disabled id="exampleInputConfirmPassword1" placeholder="Confirm Password">
                        @else
                        <input type="password" class="form-control" name='cnf_password' value = "{{old('password')}}" id="exampleInputConfirmPassword1" placeholder="Confirm Password">
                        @endif
                        <span class="text-danger">{{ $errors->first('cnf_password') }}</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Contact No</label>
                        @if(isset($up_emps[0]->contact))
                        <input type="tel" class="form-control" name='contact' value = "{{$up_emps[0]->contact;}}" id="exampleInputContact1" placeholder="Contact No">
                        @else
                        <input type="tel" class="form-control" name='contact' value = "{{old('contact')}}" id="exampleInputContact1" placeholder="Contact No">
                        @endif
                        <span class="text-danger">{{ $errors->first('contact') }}</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Date of Birth</label>
                        @if(isset($up_emps[0]->dob))
                        <input type="date" class="form-control" name='dob' value = "{{$up_emps[0]->dob;}}" id="exampleInputDoB1" placeholder="DD/MM/YYYY">
                        @else
                        <input type="date" class="form-control" name='dob' value = "{{old('dob')}}" id="exampleInputDoB1" placeholder="DD/MM/YYYY">
                        @endif
                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Zip Code</label>
                        @if(isset($up_emps[0]->zipcode))
                        <input type="number" class="form-control" name='zipcode' value = "{{$up_emps[0]->zipcode;}}" id="exampleInputZipCode1" placeholder="Zip Code">
                        @else
                        <input type="number" class="form-control" name='zipcode' value = "{{old('zipcode')}}" id="exampleInputZipCode1" placeholder="Zip Code">
                        @endif
                        <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                      </div>
                      <div class="form-check col-12" >
                        {{-- <label for="exampleInputConfirmPassword1">Gender</label> --}}
                        <div class='d-inline-block col-3'>
                          Gender
                        </div>
                        <div class='d-inline-block col-3'>
                          @if(isset($up_emps[0]->gender))
                          <input type="radio" class="form-check-input" value="1" @if($up_emps[0]->gender == '1') checked @endif name='gender' id="exampleInputgender1" >Male
                          @else
                          <input type="radio" class="form-check-input" value="1" @if(old('gender')) checked @endif name='gender' id="exampleInputgender1" >Male
                          @endif
                        </div>
                        <div class='d-inline-block col-3'>
                          @if(isset($up_emps[0]->gender))
                          <input type="radio" class="form-check-input" value="0" @if($up_emps[0]->gender == '0') checked @endif name='gender' id="exampleInputgender1" >Female 
                          @else
                          <input type="radio" class="form-check-input" value="0" @if(!old('gender'))  @endif name='gender' id="exampleInputgender1" >Female 
                          @endif
                        </div>
                      </div>
                      <span class="text-danger">{{ $errors->first('gender') }}</span>
                      <div class="form-group">
                        <label>Profile Image Upload</label>
                        <input type="file" name="empimg" class="file-upload-default" id="profile_image" onchange="loadPreview(this);">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary"  type="button">Upload</button>
                          </span>
                        </div>
                        <span class="text-danger">{{ $errors->first('empimg') }}</span>
                      </div>
                      
                      <div class="col-md-12 mb-2">
                        @if(isset($up_emps[0]->empimg))
                        <img id="preview_img" src="{{ URL::asset('public/employee/profile_image'); }}/{{$up_emps[0]->empimg}}" class="" width="200" height="150"/>
                        {{-- {{dd(URL::asset('public/uploads/profile_image')."/".$up_emps[0]->empimg);}} --}}
                        @else
                        <img id="preview_img" src="http://w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150"/>
                        @endif
                      </div>
                      
                      <div class="form-group">
                        <label>Upload Images</label>
                        <input type="file" name="images[]" class="file-upload-default" id="images" multiple>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary"  type="button">Upload</button>
                          </span>
                        </div>
                        <span class="text-danger">{{ $errors->first('empimg') }}</span>
                      </div>
                      {{-- <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input"> Remember me </label>
                        </div> --}}
                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>
                
                
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          @include('includes.footer')

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
 
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script>
      function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
     
            reader.onload = function (e) {
                $(id)
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
     }
    </script>
    <script src="{{ URL::asset('js/file-upload.js'); }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>