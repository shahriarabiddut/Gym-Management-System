@extends('admin/layout')
@section('title', 'Equipment Details')
@section('breadcumb', 'Equipment > Equipment Details')
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
    <h1 class="h3 mb-2 text-gray-800"> Equipment Details {{ $data->name }} </h1>
    <!-- DataTales Example -->
<div class="row-fluid">
    <div class="span12">
    <div class='widget-box'>
        <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
          <h5>Account Details </h5> 
        </div>
        <div class='widget-content nopadding'>
<table class="table text-center table-bordered table-hover" width="100%" cellspacing="0">
                   <th>Name </th>
                        <td>{{ $data->name }}</td>
                    </tr><tr>
                        <th>Description</th>
                        <td>{{ $data->description }}</td>
                    </tr><tr>
                        <th>Date of Purchase </th>
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->format('F j , Y')  }}</td>
                    </tr><tr>
                        <th>Quantity</th>
                        <td>{{ $data->quantity }}</td>
                    </tr>
                    <tr>
                        <th>Vendor</th>
                        <td>{{ $data->vendor }}</td>
                    </tr>
                    <tr>
                        <th>Vendor Contact</th>
                        <td>{{ $data->contact }}</td>
                    </tr>
                    <tr>
                        <th>Vendor Address</th>
                        <td>{{ $data->address }}</td>
                    </tr>
                    <tr>
                        <th>Added By</th>
                        <td>
                            @if ($data->addedby == 0)
                                Admin
                                @else
                                {{ $data->staff->name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Data Added on </th>
                        <td>{{ $data->created_at->format('F j , Y') }}</td>
                    </tr>
                    <tr>
                        <th>Data Updated on </th>
                        <td>
                            @if ($data->created_at==$data->updated_at)
                                No Update History
                                @else
                                {{ $data->updated_at->format('F j , Y') }}</td>
                            @endif
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{ route('admin.equipment.edit',$data->id) }}" class="float-right btn btn-info btn-sm"><i class="fa fa-edit"> Edit Equipment: {{ $data->name }}  </i></a>
                            
                            
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

