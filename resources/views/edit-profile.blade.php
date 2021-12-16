@include('includes.header')

@include('includes.side-bar')

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User Profile</h4>
        <form class="forms-sample" method="POST" action="{{url('edit-profile-form')}}/{{$users[0]->id}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Profile Image Upload</label>
            <input type="file" name="image" class="file-upload-default" id="profile_image" onchange="loadPreview(this);">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
            <span class="text-danger">{{ $errors->first('image') }}</span>
          </div>
          <div class="col-md-12 mb-2">
            @if(isset($users[0]->image))
            <img id="preview_img" src="{{ URL::asset('public/uploads/profile_image'); }}/{{$users[0]->image}}" class="" width="200" height="150" />
            @else
            <img id="preview_img" src="http://w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150" />
            @endif
          </div>
          <span class="text-danger">{{ $errors->first('empimg') }}</span>
      </div>
      <div class="form-group">
        <label for="exampleInputUsername1">Employee Name</label>

        <input type="text" class="form-control" name='username' value="{{$users[0]->username;}}" id="exampleInputUsername1" placeholder="Username">

        <span class="text-danger">{{ $errors->first('username') }}</span>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>

        <input type="email" class="form-control" name='email' value="{{$users[0]->email;}}" id="exampleInputEmail1" placeholder="Email">

        <span class="text-danger">{{ $errors->first('email') }}</span>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>

        <input type="password" class="form-control" name='password' id="exampleInputPassword1" placeholder="Password">

        <span class="text-danger">{{ $errors->first('password') }}</span>
      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">Confirm Password</label>

        <input type="password" class="form-control" name='cnf_password' id="exampleInputConfirmPassword1" placeholder="Confirm Password">

        <span class="text-danger">{{ $errors->first('cnf_password') }}</span>
      </div>
      <div class="form-group">
      <label for="exampleInputCountry1">Country</label>
        <select class="form-control form-control-lg" name='country' id="exampleFormControlSelect2" value="{{$users[0]->country;}}>
          <option value="United States of America" {{ old('country') == 'United States of America' ? "selected" : "" }}>United States of America</option>
          <option value="United Kingdom" {{ (old("country") == "United Kingdom" ? "selected":"") }}>United Kingdom</option>
          <option value="India" {{ (old("country") == "India" ? "selected":"") }}>India</option>
          <option value="Germany" {{ (old("country") == "Germany" ? "selected":"") }}>Germany</option>
          <option value="Argentina" {{ (old("country") == "Argentina" ? "selected":"") }}>Argentina</option>
        </select>
        <span class="text-danger">{{ $errors->first('country') }}</span>
      </div>
      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
      <a href="{{url('my-profile')}}/{{ auth()->user()->id }}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
<script>
  function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
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
{{-- @include('includes.footer') --}}