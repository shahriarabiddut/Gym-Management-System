@extends('admin/layout')
@section('title', 'Add New Plan')
@section('breadcumb', 'Plans > Add New Plan')
@section('content')

<div class="container-fluid">
  <h1>Add new Plan</h1>
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
          <form action="{{ route('admin.plan.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Plan :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Plan Name" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Validity :</label>
              <div class="controls">
                <input type="number" min="1" class="span11" name="validity" placeholder="Plan Validity in Months" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <select name="status" class="span11">
                  <option value="1" selected>Active</option>
                  <option value="0">Disable</option>
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
                  <input type="number" min="1" placeholder="100" name="amount" class="span11" required>
                  </div>
              </div>
            </div>
            
          
            
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Submit Plan</button>
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

