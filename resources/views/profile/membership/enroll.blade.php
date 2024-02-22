@extends('layout2')
@section('title', ' Enroll Membership | User Dashboard')

@section('content')
<!-- Page Heading -->

    <div class="container py-5">
    <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> Enroll </h1>

    <div class="table-responsive">
        <form method="POST" action="{{ route('user.enroll.store') }}" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Department <span class="text-danger">*</span></th>
                    <td><input required name="dept" type="text" class="form-control" ></td>
                </tr>
                @if (Auth::user()->type == 'student')
                <tr>
                    <th>Session <span class="text-danger">*</span></th>
                    <td><input required name="session" type="text" class="form-control"></td>
                </tr>
                @endif
                <tr>
                    <th>Gender</th>
                    <td>
                        <select class="form-control" name="gender" id="">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Services <span class="text-danger">*</span></th>
                    <td><select class="form-control" name="services" id="">
                        <option value="Cardio">Cardio</option>
                        <option value="Cardio2">Cardio2</option>
                    </select></td>
                </tr>
                {{-- <tr>
                    <th>Amount <span class="text-danger">*</span></th>
                    <td><input required name="amount" type="text" class="form-control"></td>
                </tr> --}}
                <tr>
                    <th>Plan</th>
                    <td>
                        <select class="form-control" name="plan" id="">
                        <option value="1">1 Month</option>
                        <option value="3">3 Month</option>
                    </select>
                </td>
                </tr>
                <tr>
                    <th>Plan Starting Year <span class="text-danger">*</span></th>
                    <td><input required name="p_year" type="text" class="form-control" ></td>
                </tr><tr>
                    <th>Current Weight <span class="text-danger">*</span></th>
                    <td><input required name="ini_weight" type="number" class="form-control"></td>
                </tr><tr>
                    <th>Current Body Type</th>
                    <td><input required name="ini_bodytype" type="text" class="form-control" ></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Submit</button>
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