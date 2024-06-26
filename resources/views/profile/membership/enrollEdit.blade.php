@extends('layout2')
@section('title', ' Record Data | User Dashboard')

@section('content')
<!-- Page Heading -->

    <div class="container py-5">
    <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> Record Update </h1>

    <div class="table-responsive">
        <form method="POST" action="{{ route('user.enroll.update',Auth::user()->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Current Weight <span class="text-danger">*</span></th>
                    <td><input required name="curr_weight" type="number" class="form-control" value="{{ $data->curr_weight }}"></td>
                </tr><tr>
                    <th>Current Body Type</th>
                    <td><input required name="curr_bodytype" type="text" class="form-control" value="{{ $data->curr_bodytype }}"></td>
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