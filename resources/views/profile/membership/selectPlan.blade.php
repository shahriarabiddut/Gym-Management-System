@extends('layout2')
@section('title', ' Select Plan| User Dashboard')

@section('content')
<!-- Page Heading -->

    <div class="container py-5">
    <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> Select Plan </h1>

    <div class="table-responsive">
        <form method="POST" action="{{ route('user.plan.update',Auth::user()->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Plans <span class="text-danger">*</span></th>
                    <td>
                    <select name="plan" id="">
                    @foreach ($plans as $plan)
                        <option @if (Auth::user()->member->plan == $plan->id) selected @endif value="{{ $plan->id }}">{{ $plan->name }} ( Fees - {{ $plan->validity }} Month {{ $plan->amount }} Taka )</option>
                    @endforeach
                    </select>    
                    </td>
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