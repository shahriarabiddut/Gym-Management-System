@extends('admin/layout')
@section('title', 'Plan Details')
@section('breadcumb', 'Plan > Plan Details')
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
    <h1 class="h3 mb-2 text-gray-800"> Plan Details {{ $data->name }} </h1>
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
                        <th>Validity Duration</th>
                        <td>{{ $data->validity }}</td>
                    </tr><tr>
                        <th>Amount</th>
                        <td>{{ $data->amount }} taka</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>  @if ($data->status == 1) Active @else Disabled @endif     </td>
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
                            <a href="{{ route('admin.plan.edit',$data->id) }}" class="float-right btn btn-info btn-sm"><i class="fa fa-edit"> Edit Plan: {{ $data->name }}  </i></a>
                            
                            
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

