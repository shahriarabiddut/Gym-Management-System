@extends('admin/layout')
@section('title', 'Edit User')
@section('breadcumb', 'Users > Edit User')
@section('content')
<div class="container-fluid">
  <h1>Edit User</h1>
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
        <h5> Edit User Data</h5>
      </div>
      <div class="widget-content nopadding">
        <form method="POST" action="{{ route('admin.user.update',$data->id) }}" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
          <div class="control-group">
            <label class="control-label">Full Name :</label>
            <div class="controls">
              <input type="text" class="span11" name="name" placeholder="Fullname" value="{{ $data->name }}" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Email :</label>
            <div class="controls">
              <input type="text" class="span11" name="email" value="{{ $data->email }}" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Mobile :</label>
            <div class="controls">
              <input type="text"  maxlength="11" class="span11" name="mobile" value="{{ $data->mobile }}"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Address :</label>
            <div class="controls">
              <textarea name="address" class="form-control">{{ $data->address }}</textarea> </div>
          </div>
          <div class="control-group">
            <label class="control-label">Type :</label>
            <div class="controls">
            <select name="type" required="required" id="select">
                <option value="student" @if ($data->type=='student') selected @endif >Student</option>
                <option value="teacher" @if ($data->type=='teacher') selected @endif>Teacher</option>
                <option value="other" @if ($data->type=='other') selected @endif>Other</option>
              </select>
            </div>
          </div>
          <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Update Member Details</button>
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

