<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset($SiteOption[1]->value) }}" />
    <meta name="author" content="">

    <title> Register | @isset($SiteOption) {{ $SiteOption[0]->value }} @endisset </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body{
        margin: 0 auto;
      }
      .gradient-custom-3 {
    /* fallback for old browsers */
    background: #84fab0;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}

.gradient-custom-4 {
    /* fallback for old browsers */
    background: #84fab0;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}
.hidden {
        display: none;
    }
    </style>
</head>

<body>
    <section class=" bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3" style="
        padding: 5%;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                          @if ($errors->any())
                          @foreach ($errors->all() as $error)
                              <div class="bg-danger text-white">{{$error}}</div>
                          @endforeach
                          @endif
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

  <form id="registrationForm" enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
    @csrf
      <div class="form-group" placeholder="name">
          <label for="name">Select Your Category:</label>
          <select class="form-control" id="optionSelect" name="category" required onchange="toggleFields()">
              <option selected value="0"> -- Select -- </option>
              <option value="1">Student</option>
              <option value="2">Teacher/Officer/Staff</option>
              <option value="3">Teacher/Officer/Staff(family)</option>
              <option value="4">Outside/Other</option>
          </select>
          <div class="form-group" id="name">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
          </div>
          <div class="form-group hidden" id="fname">
            <label for="father-name">Father's Name</label>
            <input type="text" class="form-control"  name="fname" value="{{ old('fname') }}">
        </div>
        <div class="form-group hidden" id="mname" >
            <label for="mother-name">Mother's Name</label>
            <input type="text" class="form-control" name="mname" value="{{ old('mname') }}">
        </div>
          <div class="form-group hidden" id="podobi">
              <label for="name">Title</label>
              <input type="text" class="form-control" name="podobi" value="{{ old('podobi') }}">
          </div>

          <div class="form-group hidden" id="deptoffice">
              <label for="name">Dept/Office</label>
              <input type="text" class="form-control" name="deptoffice" value="{{ old('deptoffice') }}">
          </div>
          <div class="form-group hidden" id="staffRelationName" >
            <label for="name"> University working person Name</label>
            <input type="text" class="form-control" name="staffRelationName" value="{{ old('staffRelationName') }}">
        </div>
          <div class="form-group hidden" id="staffRelation">
              <label for="name">University working person Relation</label>
            <select class="form-control"  name="staffRelation" >
                <option value="1">Husband</option>
                <option value="2">Wife</option>
                <option value="3">Father</option>
                <option value="4">Mother</option>
                <option value="5">Other</option>
            </select>
          </div>
          <div class="form-group hidden" id="staffRelationTitle">
              <label for="name">University working person title</label>
              <input type="text" class="form-control"  name="staffRelationTitle" value="{{ old('staffRelationTitle') }}">
          </div>
          <div class="form-group hidden"  id="nameofinst" >
              <label for="name">Name of the institution</label>
              <input type="text" class="form-control" name="nameofinst" value="{{ old('nameofinst') }}">
          </div>
 
          <div class="form-group hidden"  id="pradd">
              <label for="name">Present Address</label>
              <input type="text" class="form-control" name="pradd" value="{{ old('pradd') }}">
          </div>

          <div class="form-group hidden" id="paadd">
              <label for="name">Permanent Address</label>
              <input type="text" class="form-control" name="paadd" value="{{ old('paadd') }}">
          </div>
          <div class="form-group hidden" id="rollno">
            <label for="roll-number">Roll Number</label>
            <input type="text" class="form-control"  name="rollno" value="{{ old('rollno') }}">
        </div>
          <div class="form-group" >
              <label for="mobile-number">Mobile Number</label>
              <input type="tel" class="form-control" name="mobile" pattern="[0-9]{11}" value="{{ old('mobile') }}">
          </div>
          
          <div class="form-group hidden" id="dept">
              <label for="department">Department</label>
              <select class="form-control" name="dept">
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
              </select>
          </div>
          <div class="form-group hidden"  id="session" >
              <label for="year">Session</label>
              <input type="text" class="form-control" name="session" value="{{ old('session') }}">
          </div>
          <div class="form-group ">
              <label for="gender">Gender:</label><br>
              <select required class="form-control" id="gender" name="gender">
                  <option selected value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
              </select><br><br>
          </div>
          <div class="form-group">
              <label for="profile-image">Profile Image</label>
              <input required type="file" class="form-control" id="profile" name="profile">
          </div><br>
          <div class="form-group">
              <label for="profile-image">NID Image copy</label>
              <input required type="file" class="form-control" id="nid" name="nid">
          </div><br>
          <div class="form-group">
              <label for="profile-image">Signature</label>
              <input required type="file" class="form-control" id="siganture" name="siganture">
          </div><br>

          <div class="form-group">
              <label for="password">Email</label>
              <input required class="form-control" type="email" id="email" name="email"
                  placeholder="Enter your password" value="{{ old('email') }}">
          </div><br>
        <div class="form-group">
            <label for="password">Password</label>
            <input required class="form-control" type="password" id="password" name="password"
                placeholder="Enter your password">


        </div><br>
          <div class="form-group">
              <label for="password">Confirm-Password</label>
              <input required class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat your password again" >

          </div><br>

          <div class="d-flex justify-content-center">
              <button type="submit"  class="btn btn-success btn-block btn-lg gradient-custom-4 text-body w-100">Register</button>
          </div>
          <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                  href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a></p>

  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        <script>
          function toggleFields() {
              let optionSelect = document.getElementById("optionSelect").value;
              let name = document.getElementById("name");
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
                 // fname.classList.remove("hidden");
                 // mname.classList.remove("hidden");
                  rollno.classList.remove("hidden");
                  // dept.classList.remove("hidden");
                  // session.classList.remove("hidden");
                  //hide
                  podobi.classList.add("hidden");
                  name.classList.add("hidden");
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
                }else if (optionSelect === "3") {
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
              }else if (optionSelect === "4") {
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

</body>

</html>