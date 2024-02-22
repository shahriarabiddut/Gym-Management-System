@extends('admin/layout')
@section('title', 'Contact')

@section('content')


<!-- Page Heading -->
<!-- Session Messages Starts -->
@if(Session::has('success'))
<div class="p-3 mb-2 bg-success text-white">
    <p>{{ session('success') }} </p>
</div>
@endif
@if(Session::has('danger'))
<div class="p-3 mb-2 bg-danger text-white">
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
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $key => $d)
                        <tr>
                            <td style="text-align: center;">{{ ++$key }}</td>
                            <td style="text-align: center;">{{ $d->name }}</td>
                            <td style="text-align: center;">{{ $d->email }}</td>
                            <td style="text-align: center;">{{ $d->message }}</td>

                            <td style="text-align: center;">
                                <a onclick="return confirm('Are You Sure?')" href="{{ url('admin/contact/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
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