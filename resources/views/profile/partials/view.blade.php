@extends('layout2')
@section('title', ' My Profile | User Dashboard')

@section('content')
<!-- Page Heading -->

<div class="container py-5">
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
  <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> My Profile </h1>


  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title">
          <h5>Profile</h5>
        </div>
        <div class="widget-content nopadding">
          <table class='table table-striped table-bordered'>

            <tbody>
              <tr>
                <td>Name </td>
                <td>{{ Auth::user()->name }}</td>
              </tr>
              <tr>
                <td>Address </td>
                <td>{{ Auth::user()->address }}</td>
              </tr>
              <tr>
                <td>Email </td>
                <td>{{ Auth::user()->email }}</td>
              </tr>
              <tr>
                <td>Mobile </td>
                <td>{{ Auth::user()->mobile }}</td>
              </tr>
              <tr>
                <td colspan="2"><a href="{{ route('user.profile.edit') }}"><button>Edit Profile</button></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- End of Profile List Bar -->
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