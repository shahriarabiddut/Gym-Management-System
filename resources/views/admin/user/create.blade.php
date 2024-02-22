@extends('admin/layout')
@section('title', 'Add New User')
@section('breadcumb', 'Users > Add New User')
@section('content')
<div class="container-fluid">
  <h1>Add new User</h1>
  @if ($errors->any())
          @foreach ($errors->all() as $error)
             <p class="bg-danger text-danger"> {{ $error }} </p>
  @endforeach
  @endif
  <hr>
<div class="row-fluid">
  <div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
        <h5> Add New User</h5>
      </div>
      <div class="widget-content nopadding">
        <form action="{{ route('admin.user.store') }}" enctype="multipart/form-data" method="POST" class="form-horizontal">
          @csrf
          <div class="control-group">
            <label class="control-label">Full Name :</label>
            <div class="controls">
              <input type="text" class="span11" name="name" placeholder="Fullname" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Email :</label>
            <div class="controls">
              <input type="text" class="span11" name="email" placeholder="Username" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Password :</label>
            <div class="controls">
              <input type="password"  class="span11" name="password" placeholder="**********"  />
              <span class="help-block">Note: The given information will create an account for this particular member</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Mobile :</label>
            <div class="controls">
              <input type="text" maxlength="11" class="span11" name="mobile" placeholder="01945000000"  />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Address :</label>
            <div class="controls">
              <textarea name="address" class="form-control"></textarea> </div>
          </div>
          <div class="control-group">
            <label class="control-label">Type :</label>
            <div class="controls">
            <select name="type" required="required" id="select">
                <option value="student" selected="selected">Student</option>
                <option value="teacher">Teacher</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Submit Member Details</button>
            </div>
        
      </div>
   
    </div>
    
  
  </div>

  
  
  <div class="span-6"></div>
</div>
</div>


    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
@endsection

