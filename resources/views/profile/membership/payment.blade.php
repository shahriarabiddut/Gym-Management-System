@extends('layout2')
@section('title', ' Payment | User Dashboard')

@section('content')
<!-- Page Heading -->
<!-- Page Heading -->
<h1 class="text-center">Pay to Activate <i class="fas fa-money"></i></h1>
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
    <div class="container py-5">

    <div class="table-responsive">
        <form method="POST" action="{{ route('user.plan.paymentUpdate', $payment->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Method <span class="text-danger">*</span></th>
                    <td>
                    <select name="method" id="">
                        <option value="Bkash">Bkash</option>
                        <option value="Nagad">Nagad</option>
                    </select>    
                    </td>
                </tr>
                <tr class="form-group" id="rollno">
                    <th for="roll-number">Mobile</th>
                    <td><input type="tel" class="form-control" name="mobile" maxlength="11"></td>
                </tr>
                <tr class="form-group" id="rollno">
                    <th for="roll-number">Amount</th>
                    <td><input readonly class="form-control" name="amount" value="{{ $payment->amount }}"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="id" value="{{ $payment->id }}">
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