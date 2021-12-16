<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('public/vendors/mdi/css/materialdesignicons.min.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/vendors/css/vendor.bundle.base.css'); }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href= "{{ URL::asset('css/style.css'); }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico'); }}"/>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{ URL::asset('images/logo.svg'); }}">
                </div>
                {{-- {{value}} = session()->get('success'); --}}
                @if(session()->get('login_error')!= '')
                  <div class='alert alert-danger'>{{session()->get('login_error')}}</div>
                @endif
                
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method = 'POST' action='{{url('post-login')}}'>
                  @csrf
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name='email' id="exampleInputEmail1" placeholder="Email">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name='password' id="exampleInputPassword1" placeholder="Password">
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook mr-2"></i>Connect using facebook </button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{url('register') }}" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ URL::asset('vendors/js/vendor.bundle.base.js'); }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::asset('js/off-canvas.js'); }}"></script>
    <script src="{{ URL::asset('js/hoverable-collapse.js'); }}"></script>
    <script src="{{ URL::asset('js/misc.js'); }}"></script>
    <!-- endinject -->
  </body>
</html>