@extends('admin/layout')
@section('title', 'Plans')
@section('breadcumb', 'Plans > All Plans')
@section('content')


    <!-- Page Heading -->
    <h1 class="text-center">Gym's Plan List <i class="fas fa-table"></i></h1>
            <!-- Session Messages Starts -->
            @if(Session::has('success'))
            <div class=" row-fluid p-1 m-1 mb-2 bg-success text-white">
                <p>{{ session('success') }} </p>
            </div>
            @endif
            @if(Session::has('danger'))
            <div class=" row-fluid p-1 m-1 mb-2 bg-danger text-white">
                <p>{{ session('danger') }} </p>
            </div>
            @endif
            <!-- Session Messages Ends -->
    <!-- DataTales Example -->
    <div class="row-fluid">
        <div class="span12">
            <a href="{{ route('admin.plan.create') }}" class="float-right btn btn-success btn-sm" target="_self">Add New </a>
        <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
              <h5>Plan List table </h5> 
            </div>
            <div class='widget-content nopadding'>
    <table class="table text-center table-bordered table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Validity</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Validity</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @if($data)
            @foreach ($data as $key=> $d)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->amount }}</td>
                <td>{{ $d->validity }}</td>
                <td>@if ($d->status == 1) Active @else Disabled @endif </td>
                <td   >
                    <a href="{{ route('admin.plan.show',$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"> View</i></a>
                    <a href="{{ route('admin.plan.edit',$d->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit">Edit</i></a>
                    <a onclick="return confirm('Are You Sure?')" href="{{ url('admin/plan/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash">Delete</i></a>
                </td>

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div></div></div></div>


    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
@endsection

