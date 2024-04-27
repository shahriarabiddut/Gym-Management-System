@extends('admin/layout')
@section('title', 'Edit Plan')
@section('breadcumb', 'Plans > Edit Plan')
@section('content')

<div class="container-fluid">
  <h1>Edit Plan Data</h1>
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
          <h5>Plan Data</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="{{ route('admin.plan.update',$data->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="control-group">
              <label class="control-label">Plan :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" value="{{ $data->name }}" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Validity :</label>
              <div class="controls">
                <input type="number" min="1" class="span11" name="validity" value="{{ $data->validity }}" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <select name="status" class="span11">
                  <option @if ($data->status==1) selected @endif value="1" >Active</option>
                  <option @if ($data->status==0) selected @endif value="0">Disable</option>
                </select>
              </div>
            </div>
        </div>
     
        <div class="widget-content nopadding">
          <div class="form-horizontal">
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Pricing</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Amount Per Validity: </label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">৳</span> 
                  <input type="number" min="1" placeholder="100" value="{{ $data->amount }}" name="amount" class="span11" required>
                  </div>
              </div>
            </div>
            
          
            
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Update Plan</button>
            </div>
            </form>

          </div>



        </div>

        </div>
      </div>

	</div>

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

