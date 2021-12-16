@include('includes.header')

@include('includes.side-bar')

<body>
    <div class="card" >
        @if($users[0]->image !=null)
        <img src="{{ URL::asset('public/uploads/profile_image'); }}/{{$users[0]->image;}}" alt="image" height='250px' width = '300px'>
        @else
        <img src="{{ URL::asset('public/default_dp/def_dp.jpg'); }}" alt="image">
        @endif
      <br>
      <h3><b>{{$users[0]->username;}}</b></h3>
      <a href="{{url('edit-profile')}}/{{base64_encode(auth()->user()->id)}}" type="button" class= "btn btn-primary"> Edit Profile</a>
      <p class="title">Full Stack Web Developer</p>
      <p>InfancyIT</p>
      <div style="margin: 24px 0;">
        <a href="https://www.linkedin.com/in/md-abu-talha/" target="_blank"><i class="fa fa-linkedin">Linkedin</i></a>
        <a href="https://www.facebook.com/talha.sust.cse" target="_blank"><i class="fa fa-facebook">Facebook</i></a>
        <a href="https://github.com/talha08" target="_blank"><i class="fa fa-github"></i>Github</a>
        <a href="https://medium.com/@talhaqc" target="_blank"><i class="fa fa-medium">Medium</i></a>
      </div>
      
    </div>
    </div>
    <script src="{{ URL::asset('js/file-upload.js'); }}"></script>
    </body>
</html>
{{-- @include('includes.footer') --}}
