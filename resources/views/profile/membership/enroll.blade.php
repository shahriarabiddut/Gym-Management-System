@extends('layout2')
@section('title', ' Enroll Membership | User Dashboard')
<style>
    #imagePreview {
      max-width: 300px;
      max-height: 300px;
    }
  </style>
  <script>
    window.onload = function() {
      document.getElementById('imagePreview').style.display = 'none';
    };

    function previewImage(event) {
      const input = event.target;
      const file = input.files[0];
      const imageType = /image.*/;
      
      if (file && file.size <= 2 * 1024 * 1024 && file.type.match(imageType)) {
        const reader = new FileReader();
        
        reader.onload = function() {
          const image = new Image();
          image.src = reader.result;
          
          image.onload = function() {
            if (image.width <= 300 && image.height <= 300) {
              document.getElementById('imagePreview').style.display = 'block'; // Show the preview
              document.getElementById('imagePreview').src = reader.result;
            } else {
              alert("Image dimensions should be 300x300 or less.");
              input.value = '';
            }
          };
        };
        
        reader.readAsDataURL(file);
      } else {
        if (file) {
          alert("File is not an image, exceeds size limit (2MB), or does not meet the requirements.");
        }
        input.value = '';
      }
    }
  </script>
@section('content')
<!-- Page Heading -->

    <div class="container py-5">
    <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> Enroll </h1>

    <div class="table-responsive">
        @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="bg-danger">{{$error}}</div>
     @endforeach
    @endif
        <form method="POST" action="{{ route('user.enroll.store') }}" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Photo <span class="text-danger">*</span></th>
                    <td><input required type="file" id="imageInput" name="photo" accept="image/*" class="form-control"  onchange="previewImage(event)" />
                        <br />
                        <img id="imagePreview" src="#" alt="Preview" style="display: none;" />
                        </td>
                </tr>
                <tr>
                    <th>Name <span class="text-danger">*</span></th>
                    <td><input readonly required name="name" type="text" class="form-control" value="{{ Auth::user()->name }}"></td>
                </tr>
                <tr>
                    <th>Department <span class="text-danger">*</span></th>
                    <td><input required name="dept" type="text" class="form-control" value="{{ old('dept') }}" ></td>
                </tr>
                @if (Auth::user()->type == 'student')
                <tr>
                    <th>Father's Name <span class="text-danger">*</span></th>
                    <td><input name="fname" type="text" class="form-control" value="{{ old('fname') }}" > </td>
                </tr>
                <tr>
                    <th>Mother's Name <span class="text-danger">*</span></th>
                    <td><input name="mname" type="text" value="{{ old('mname') }}"  class="form-control"></td>
                </tr>
                <tr>
                    <th>Session <span class="text-danger">*</span></th>
                    <td><input name="session" type="text" value="{{ old('session') }}"  class="form-control"></td>
                </tr>
                <tr>
                    <th>Roll No <span class="text-danger">*</span></th>
                    <td><input name="rollno" type="text" value="{{ old('rollno') }}"  class="form-control"></td>
                </tr>
                @endif
                <tr>
                    <th>Gender</th>
                    <td>
                        <select class="form-control" name="gender" id="">
                            <option selected value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>NID no. <span class="text-danger">*</span></th>
                    <td><input name="nidno" type="text" value="{{ old('nidno') }}"  class="form-control"></td>
                </tr>
                <tr>
                    <th>Current Weight <span class="text-danger">*</span></th>
                    <td><input required name="ini_weight" type="number" value="{{ old('ini_weight') }}"  class="form-control"></td>
                </tr><tr>
                    <th>Current Body Type</th>
                    <td><input required name="ini_bodytype" type="text" value="{{ old('ini_bodytype') }}" class="form-control" placeholder="Slim,Medium,Fit,Fat"></td>
                </tr>
                <tr>
                    <th>Registration Plans</th>
                    <td>
                        @if (Auth::user()->type == 'student')
                        <table class="table-bordered" width="50%">
                            <tr><th>বিবরণ</th> <td>টাকার পরিমাণ (মাসিক/ঘন্টা প্রতি)</td> </tr>
                            <tr><th>1.রেজিস্ট্রেশন ফি (বাৎসরিক)</th><td>১০০/-</td></tr>
                            <tr><th>2.মাসিক ফি</th><td>১০০/-</td></tr>
                            <tr><th>3.আইডি কার্ড</th><td>১০০/-</td></tr>
                        </table>
                        @elseif (Auth::user()->type == 'teacher')
                        <table class="table-bordered" width="50%">
                            <tr> <th>বিবরণ</th> <td>টাকার পরিমাণ (মাসিক/ঘন্টা প্রতি)</td> </tr>
                            <tr><th>1.রেজিস্ট্রেশন ফি (বাৎসরিক)</th><td>৪০০/-</td></tr>
                            <tr><th>2.মাসিক ফি</th><td>২০০/-</td></tr>
                            <tr><th>3.আইডি কার্ড</th><td>১০০/-</td></tr>
                        </table>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Plan</th>
                    <td>
                        <select class="form-control" name="plan" id="">
                            <option selected value="1">রেজিস্ট্রেশন</option>
                            <option value="2">রেজিস্ট্রেশন ও আইডি কার্ড</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="type" value="{{ Auth::user()->type }}">
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