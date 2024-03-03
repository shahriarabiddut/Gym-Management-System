@extends('layout2')
@section('title', ' Enroll Membership | User Dashboard')
<script>
    function toggleFields() {
        let optionSelect = document.getElementById("optionSelect").value;
        let fname = document.getElementById("fname");
        let mname = document.getElementById("mname");
        let rollno = document.getElementById("rollno");
        let dept = document.getElementById("dept");
        let session = document.getElementById("session");
        let podobi = document.getElementById("podobi");
        let deptoffice = document.getElementById("deptoffice");
        let staffRelationName = document.getElementById("staffRelationName");
        let staffRelation = document.getElementById("staffRelation");
        let staffRelationTitle = document.getElementById("staffRelationTitle");
        let pradd = document.getElementById("pradd");
        let paadd = document.getElementById("paadd");
        let nameofinst = document.getElementById("nameofinst");
        if (optionSelect === "1") {
            fname.classList.remove("hidden");
            mname.classList.remove("hidden");
            rollno.classList.remove("hidden");
            dept.classList.remove("hidden");
            session.classList.remove("hidden");
            //hide
            podobi.classList.add("hidden");
            deptoffice.classList.add("hidden");
            staffRelationName.classList.add("hidden");
            staffRelation.classList.add("hidden");
            staffRelationTitle.classList.add("hidden");
            pradd.classList.add("hidden");
            paadd.classList.add("hidden");
            nameofinst.classList.add("hidden");
        } else if (optionSelect === "2") {
            podobi.classList.remove("hidden");
            deptoffice.classList.remove("hidden");
            //hide
            fname.classList.add("hidden");
            mname.classList.add("hidden");
            rollno.classList.add("hidden");
            dept.classList.add("hidden");
            session.classList.add("hidden");
            staffRelationName.classList.add("hidden");
            staffRelation.classList.add("hidden");
            staffRelationTitle.classList.add("hidden");
            pradd.classList.add("hidden");
            paadd.classList.add("hidden");
            nameofinst.classList.add("hidden");
        } else if (optionSelect === "3") {
            staffRelationName.classList.remove("hidden");
            staffRelation.classList.remove("hidden");
            staffRelationTitle.classList.remove("hidden");
            //hide
            podobi.classList.add("hidden");
            deptoffice.classList.add("hidden");
            fname.classList.add("hidden");
            mname.classList.add("hidden");
            rollno.classList.add("hidden");
            dept.classList.add("hidden");
            session.classList.add("hidden");
            pradd.classList.add("hidden");
            paadd.classList.add("hidden");
            nameofinst.classList.add("hidden");
        } else if (optionSelect === "4") {
            fname.classList.remove("hidden");
            pradd.classList.remove("hidden");
            paadd.classList.remove("hidden");
            nameofinst.classList.remove("hidden");
            podobi.classList.remove("hidden");
            //hide
            deptoffice.classList.add("hidden");
            mname.classList.add("hidden");
            rollno.classList.add("hidden");
            dept.classList.add("hidden");
            session.classList.add("hidden");
            staffRelationName.classList.add("hidden");
            staffRelation.classList.add("hidden");
            staffRelationTitle.classList.add("hidden");
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
        <form id="registrationForm" enctype="multipart/form-data" method="POST" action="{{ route('user.enroll.store') }}">
            @csrf
            <table class="table table-bordered" id="dataTable" width="95%" cellspacing="0">
                <tbody>
            <tr class="form-group">
                <th>Select Your Category:</th>
                <td><select class="form-control" id="optionSelect" name="category" required onchange="toggleFields()">
                    <option selected value="0"> -- Select -- </option>
                    <option value="1">Student</option>
                    <option value="2">Teacher/Officer/Staff</option>
                    <option value="3">Teacher/Officer/Staff(family)</option>
                    <option value="4">Outside/Other</option>
                </select></td>
            </tr>
                <tr class="form-group">
                    <th>Name</th>
                    <td><input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}"></td>
                </tr>
                <tr class="form-group hidden" id="fname">
                    <th for="father-name">Father's Name</th>
                    <td><input type="text" class="form-control" name="fname" value="{{ old('fname') }}"></td>
                </tr>
                <tr class="form-group hidden" id="mname">
                    <th for="mother-name">Mother's Name</th>
                    <td><input type="text" class="form-control" name="mname" value="{{ old('mname') }}"></td>
                </tr>
                <tr class="form-group hidden" id="podobi">
                    <th>Title</th>
                    <td><input type="text" class="form-control" name="podobi" value="{{ old('podobi') }}"></td>
                </tr>

                <tr class="form-group hidden" id="deptoffice">
                    <th>Dept/Office</th>
                    <td><input type="text" class="form-control" name="deptoffice" value="{{ old('deptoffice') }}"></td>
                </tr>
                <tr class="form-group hidden" id="staffRelationName">
                    <th> University working person Name</th>
                    <td><input type="text" class="form-control" name="staffRelationName" value="{{ old('staffRelationName') }}"></td>
                </tr>
                <tr class="form-group hidden" id="staffRelation">
                    <th>University working person Relation</th>
                   <td> <select class="form-control" name="staffRelation">
                        <option value="1">Husband</option>
                        <option value="2">Wife</option>
                        <option value="3">Father</option>
                        <option value="4">Mother</option>
                        <option value="5">Other</option>
                    </select></td>
                </tr>
                <tr class="form-group hidden" id="staffRelationTitle">
                    <th>University working person title</th>
                    <td><input type="text" class="form-control" name="staffRelationTitle" value="{{ old('staffRelationTitle') }}"></td>
                </tr>
                <tr class="form-group hidden" id="nameofinst">
                    <th>Name of the institution</th>
                    <td><input type="text" class="form-control" name="nameofinst" value="{{ old('nameofinst') }}"></td>
                </tr>

                <tr class="form-group hidden" id="pradd">
                    <th>Present Address</th>
                    <td><input type="text" class="form-control" name="pradd" value="{{ old('pradd') }}"></td>
                </tr>

                <tr class="form-group hidden" id="paadd">
                    <th>Permanent Address</th>
                    <td><input type="text" class="form-control" name="paadd" value="{{ old('paadd') }}"></td>
                </tr>
                <tr class="form-group hidden" id="rollno">
                    <th for="roll-number">Roll Number</th>
                    <td><input type="text" class="form-control" name="rollno" value="{{ old('rollno') }}"></td>
                </tr>
                <tr class="form-group">
                    <th for="mobile-number">Mobile Number</th>
                    <td><input type="tel" class="form-control" name="mobile" pattern="[0-9]{11}" value="{{ old('mobile') }}"></td>
                </tr>

                <tr class="form-group hidden" id="dept">
                    <th for="department">Department</th>
                   <td> <select class="form-control" name="dept">
                        <option value="">Select Department</option>
                        <option value="Computer Science and Engineering(CSE)">Computer Science and Engineering(CSE)</option>
                        <option value="Electrical and Electronic Engineering(EEE)">Electrical and Electronic Engineering(EEE)
                        </option>
                        <option value="Industrial and Production Engineering(IPE)">Industrial and Production Engineering(IPE)
                        </option>
                        <option value="Petroleum and Mining Engineering(PME)">Petroleum and Mining Engineering(PME)</option>
                        <option value="Chemical Engineering(ChE)">Chemical Engineering(ChE)</option>
                        <option value="Biomedical Engineering(BE)">Biomedical Engineering(BE)</option>
                        <option value="Textile Engineering(TE)">Textile Engineering(TE)</option>
                        <option value="Agro Product Processing Technology">Agro Product Processing Technology</option>
                        <option value="Climate and Disaster Management">Climate and Disaster Management</option>
                        <option value="Environmental Science and Technology">Environmental Science and Technology</option>
                        <option value="Nutrition and Food Technology">Nutrition and Food Technology</option>
                        <option value="Fisheries and Marine Bioscience">Fisheries and Marine Bioscience</option>
                        <option value="Genetic Engineering and Biotechnology">Genetic Engineering and Biotechnology</option>
                        <option value="Microbiology">Microbiology</option>
                        <option value="Pharmacy">Pharmacy</option>
                        <option value="Nursing and Health Science">Nursing and Health Science</option>
                        <option value="Physical Education and Sports Science">Physical Education and Sports Science</option>
                        <option value="Physiotherapy and Rehabilitation">Physiotherapy and Rehabilitation</option>
                        <option value="English">English</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Physics">Physics</option>
                        <option value="Accounting and Information Systems">Accounting and Information Systems</option>
                        <option value="Finance and Banking">Finance and Banking</option>
                        <option value="Management">Management</option>
                        <option value="Marketing">Marketing</option>
                        <!-- Add more departments here -->
                    </select></td>
                </tr>
                <tr class="form-group hidden" id="session">
                    <th for="year">Session</th>
                    <td><input type="text" class="form-control" name="session" value="{{ old('session') }}"></td>
                </tr>
                <tr class="form-group ">
                    <th for="gender">Gender:</th>
                   <td> <select required class="form-control" id="gender" name="gender">
                        <option selected value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select></td>
                </tr>
                <tr class="form-group">
                    <th for="profile-image">Profile Image</th>
                    <td><input required type="file" class="form-control" id="profile" name="profile">
                </tr>
                <tr class="form-group">
                    <th for="profile-image">NID Image copy</th>
                    <td><input required type="file" class="form-control" id="nid" name="nid">
                </tr>
                <tr class="form-group">
                    <th for="profile-image">Signature</th>
                    <td><input required type="file" class="form-control" id="siganture" name="siganture">
                </tr>


                <tr class="d-flex justify-content-center">
                    <td colspan="2">
                    <button type="submit" class="btn btn-success btn-lg gradient-custom-4 text-body w-100">Submit</button></td>
                </tr>
            </tbody>
        </table>
        </form>
    </div>
</div>



@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></td></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></td></script>



<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></td></script>
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@endsection