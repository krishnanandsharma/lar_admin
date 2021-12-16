@include('includes.header')

@include('includes.side-bar')
   

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>

            
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic Table in Laravel</h4>
                    
                    
                    <table class="table table-striped table-bordered" id="example">
                      <thead>
                        <tr>
                          <th>SNo</th>
                          <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date of Birth</th>
                            <th>Pin Code</th>
                            <th>Gender</th>
                            <th>Profile Picture</th>
                            <th>Gallery</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <?php $x = 1; ?>
                        @if(!(empty($emps)))
                        
                        <tbody>
                          @foreach ($emps as $emp)
                          
                              <!-- {{-- {{dd($emp);}} --}} -->
                          <tr>
                            <td><?php echo $x; ?></td>
                            <td>{{$emp->ename;}}</td>
                            <td>{{$emp->email;}}</td>
                            <td>{{$emp->contact;}}</td>
                            <td>{{$emp->dob;}}</td>
                            <td>{{$emp->zipcode;}}</td>
                            @if($emp->gender=='1')
                            <td> Male</td>
                            @else
                            <td> Female</td>
                            @endif
                            <td>@if($emp->empimg !=null)
                              <img src="{{ URL::asset('public/employee/profile_image'); }}/{{$emp->empimg;}}" alt="image" height='500px' width = '750px'>
                            @else
                              <img src="{{ URL::asset('public/default_dp/def_dp.jpg'); }}" alt="image">
                            @endif
                          </td>
                            <td>
                              @if($emp->images !=null)
                            
                              @foreach(explode("|",$emp->images) as $key=> $sngl_img)
                              @if($key<=1)
                              <img src="{{ URL::asset('public/employee/gallery'); }}/{{$sngl_img;}}" alt="image" height='50px' width = '50px'>
                              @endif
                              @endforeach
                          
                              @else
                             No Image to Display
                            @endif
                          </td>
                            <td><a href="{{url('form')}}/{{$emp->id}}" type="button" class=" btn-primary"> Edit</a>
                              <button type="button" class="btn-danger" data-toggle="modal" data-target="#exampleModal">
                                Delete
                              </button>
                            </td>
                          </tr>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                </div>
                                <div class="modal-body">
                                  Are you Sure?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href = "{{url('delete')}}/{{$emp->id}}" class="btn btn-danger">Delete</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php $x++; ?>
                         
                          @endforeach
                          @endif
                      </tbody>
                    </table>
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
   

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
  </script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
