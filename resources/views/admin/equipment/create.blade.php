@extends('admin/layout')
@section('title', 'Add New Equipment')
@section('breadcumb', 'Equipments > Add New Equipment')
@section('content')

<div class="container-fluid">
  <h1>Add new Equipment</h1>
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
          <h5>Eqipment-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="{{ route('admin.equipment.store') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Equipment :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Equipment Name" required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Description :</label>
              <div class="controls">
                <input type="text" class="span11" name="description" placeholder="Short Description" required />
              </div>
            </div>
           
            
            <div class="control-group">
              <label class="control-label">Date of Purchase :</label>
              <div class="controls">
                <input type="date" name="date" class="span11" />
                <span class="help-block">Please mention the date of purchase</span> </div>
            </div>

            <div class="control-group">
              <label class="control-label">Quantity :</label>
              <div class="controls">
                <input type="number" class="span5" name="quantity" placeholder="Equipment Qty" required />
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
          <h5>Other Details</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            
            <div class="control-group">
              <label class="control-label">Vendor :</label>
              <div class="controls">
                <input type="text" class="span11" name="vendor" placeholder="Vendor"required />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text" class="span11" name="address" placeholder="Vendor Address" required />
              </div>
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Contact Number</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="contact" minlength="10" maxlength="11" class="span8 mask text" required>
                <span class="help-block blue span8">(+88) 01999-999999</span> 
                </div>
            </div>

          </div>

              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Pricing</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            
            
    

            <div class="control-group">
              <label class="control-label">Cost Per Item: </label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">৳</span> 
                  <input type="number" placeholder="269" name="amount" class="span11" required>
                  </div>
              </div>
            </div>
            
          
            
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Submit Equipment</button>
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

