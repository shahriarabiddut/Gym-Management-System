@extends('admin/layout')
@section('title', 'User Details')
@section('breadcumb', 'Users > User Details')
@section('content')


    <!-- Session Messages Starts -->
    @if(Session::has('success'))
    <div class=" row-fluid p-3 mb-2 bg-success text-white">
        <h3>{{ session('success') }} </h3>
    </div>
    @endif
    @if(Session::has('danger'))
    <div class=" row-fluid p-3 mb-2 bg-danger text-white">
        <h3>{{ session('danger') }} </h3>
    </div>
    @endif
    <!-- Session Messages Ends -->
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> User Data </h1>
    <!-- DataTales Example -->
    @if ($membership !=null)
    <div class="row-fluid">
        <div class="span12">
        <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
              <h5>Membership Details </h5> 
            </div>
            <div class='widget-content nopadding'>
    <table class="table text-center table-bordered table-hover" width="100%" cellspacing="0">
        <tr><td>Department </td><td>{{ $membership->dept }}</td> </tr>
             @if ($data->type == 'student')
             <tr><td>Session </td><td>{{ $membership->session }}</td> </tr>
             @endif
             <tr><td>Registration Date </td><td>{{ $membership->dor }}</td> </tr>
             <tr><td>Gender </td><td>{{ $membership->gender }}</td> </tr>
             <tr><td>Services </td><td>{{ $membership->services }}</td> </tr>
             <tr><td>Plan </td><td>{{ $membership->plan }} Months</td> </tr>
             <tr><td>Plan Year</td><td>{{ $membership->p_year }}</td> </tr>
             <tr><td>Initial Weight </td><td>{{ $membership->ini_weight }} Kg</td> </tr>
             <tr><td>Current Weight </td><td>{{ $membership->curr_weight }} Kg</td> </tr>
             <tr><td>Initial BodyType </td><td>{{ $membership->ini_bodytype }}</td> </tr>
             <tr><td>Current BodyType </td><td>{{ $membership->curr_bodytype }}</td> </tr>
             <tr><td>Membership Status </td><td> 
                @switch($membership->status)
                    @case(0)
                        Under Review
                        @break
                    @case(1)
                        Active
                        @break
                    @default
                        Disabled
                @endswitch
            </td> </tr>               
        <tr>
                            <td colspan="2">
                            @if ($membership->status!=1)
                            <a href="{{ route('admin.member.active',$data->id) }}" class="mx-1 float-right btn btn-success btn-sm"><i class="fa fa-edit"> Activate Membership : {{ $data->name }}  </i></a>
                            @else
                            <a href="{{ route('admin.member.disable',$data->id) }}" class="mx-1 float-right btn btn-danger btn-sm"><i class="fa fa-edit"> Disable Membership : {{ $data->name }}  </i></a>
                            @endif
                            </td>
                            
                        </tr>
                        
                </table>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row-fluid">
    <div class="span12">
    <div class='widget-box'>
        <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
          <h5>Account Details </h5> 
        </div>
        <div class='widget-content nopadding'>
<table class="table text-center table-bordered table-hover" width="100%" cellspacing="0">
                   <th>Full Name </th>
                        <td>{{ $data->name }}</td>
                    </tr><tr>
                        <th>Email</th>
                        <td>{{ $data->email }}</td>
                    </tr><tr>
                        <th>Mobile No </th>
                        <td>{{ $data->mobile }}</td>
                    </tr><tr>
                        <th>Address</th>
                        <td>{{ $data->address }}</td>
                    </tr><tr>
                        <td colspan="2">
                            <a href="{{ route('admin.user.edit',$data->id) }}" class="float-right btn btn-info btn-sm"><i class="fa fa-edit"> Edit User: {{ $data->name }}  </i></a>
                            
                            
                        </td>
                        
                    </tr>
                    
            </table>
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

