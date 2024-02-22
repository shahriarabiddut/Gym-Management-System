@extends('admin/layout')
@section('title', 'Users')
@section('breadcumb', 'Users > All Users')
@section('content')


    <!-- Page Heading -->
    <h1 class="text-center">Gym's User List <i class="fas fa-users"></i></h1>

            <!-- Session Messages Starts -->
            @if(Session::has('success'))
            <div class=" row-fluid p-3 mb-2 bg-success text-white">
                <p>{{ session('success') }} </p>
            </div>
            @endif
            @if(Session::has('danger'))
            <div class=" row-fluid p-3 mb-2 bg-danger text-white">
                <p>{{ session('danger') }} </p>
            </div>
            @endif
            <!-- Session Messages Ends -->
    <!-- DataTales Example -->
    <div class="row-fluid">
        <div class="span12">
            <a href="{{ route('admin.user.create') }}" class="float-right btn btn-success btn-sm" target="_self">Add New </a>
        <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
              <h5>Member table </h5> 
            </div>
            <div class='widget-content nopadding'>
    <table class="table text-center table-bordered table-hover" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
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
                <td>{{ $d->email }}</td>
                <td>{{ $d->mobile }}</td>
                <td>
                    @if ($d->membership !=null)
                    @php
                        $date = Carbon\Carbon::createFromFormat('Y-m-d', $d->membership->dor);$currentDate = Carbon\Carbon::now();$diffInDays = $currentDate->diffInDays($date);$plan = $d->membership->plan * 30 ;
                    @endphp 
                    @if ($diffInDays < $plan)
                    <span class="bg-success">  {{ $diffInDays }} days Active </span> 
                    @elseif ($diffInDays <=0)
                    <span class="bg-danger"> Expired </span> 
                    @else
                    <span class="bg-warning"> N/A </span>      
                    @endif
                        @else
                        N/A
                    @endif
                    
                </td>
                
                
                <td class="text-center">
                    <a href="{{ route('admin.user.show',$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"> View</i></a>
                    <a href="{{ route('admin.user.edit',$d->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit">Edit</i></a>
                    <a onclick="return confirm('Are You Sure?')" href="{{ url('admin/user/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash">Delete</i></a>
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

