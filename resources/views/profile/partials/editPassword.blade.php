@extends('layout2')
@section('title', ' Edit Profile | User Dashboard')

@section('content')
<!-- Page Heading -->
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="row-fluid p-1 m-1 mb-2 bg-danger text-white">{{$error}}</div>
@endforeach
@endif
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
    <div class="container py-5">
    <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> Editing Profile </h1>

    <div class="table-responsive">
        <form method="POST" action="{{ route('user.profile.passwordupdate') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Old Password <span class="text-danger">*</span></th>
                    <td><input required name="opassword" type="password" class="form-control"></td>
                </tr><tr>
                    <th>New Password <span class="text-danger">*</span></th>
                    <td><input required name="password" type="password" class="form-control"></td>
                </tr><tr>
                    <th>Confirm Password</th>
                    <td><input required name="password_confirmation" type="password" class="form-control"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
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