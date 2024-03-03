<!DOCTYPE html>
<html>
<head>
    <title>{{ Auth::user()->rollno }} - Membership</title>
    <style>
table {
    border-collapse: collapse;
    width: 90%;
    overflow: hidden;
    margin-left: auto;
    margin-right: auto;
}

td, th {
    border: 1px solid #000;
    padding: 8px; 
    text-align: left; 
}

body {
    padding: 20px; 
    text-align: center;
}
.text-center{
    text-align: center;
}
    </style>
</head>
<body>
    <table class="table table-bordered" width="100%">
        <tbody>
        <tr>
            <td width="33%"><h4 class="my-5">শরীরচর্চা দপ্তর</h4></td>
            <td width="34%"><img width="75px" src="{{ asset('storage/img/just.png') }}" alt=""></td>
            <td width="33%"><h3 class="my-5"> PESS </h3></td>
        </tr>
        </tbody>
    </table>
    <table class="table table-bordered" width="100%">
        <tbody>
        <tr>
            <th width="50%">Photo <span class="text-danger">*</span></th>
            <td width="50%"><img width="150px" src="{{ asset('storage/'. Auth::user()->membership->photo) }}" alt=""> </td>
        </tr>
        <tr>
            <th>Name <span class="text-danger">*</span></th>
            <td>{{ Auth::user()->membership->name }}</td>
        </tr>
        <tr>
            <th>Department <span class="text-danger">*</span></th>
            <td>{{  Auth::user()->membership->dept }}</td>
        </tr>
        <tr>
            <th>Father's Name <span class="text-danger">*</span></th>
            <td>{{  Auth::user()->membership->fname }}</td>
        </tr>
        <tr>
            <th>Mother's Name <span class="text-danger">*</span></th>
            <td>{{  Auth::user()->membership->mname }}</td>
        </tr>
        <tr>
            <th>Session <span class="text-danger">*</span></th>
            <td>{{  Auth::user()->membership->session }}</td>
        </tr>
        <tr>
            <th >Roll No <span class="text-danger">*</span></th>
            <td>{{  Auth::user()->membership->rollno }}</td>
        </tr>
        <tr>
            <th >Gender</th>
            <td>{{  Auth::user()->membership->gender}}</td>
        </tr>
        <tr>
            <th>NID no. <span class="text-danger">*</span></th>
            <td>{{  Auth::user()->membership->nidno }} </td>
        </tr>
        {{-- <tr>
            <th>Plan</th>
            <td>
                @if ( Auth::user()->membership->plan==1) রেজিস্ট্রেশন @else রেজিস্ট্রেশন ও আইডি কার্ড @endif
            </td>
        </tr> --}}
        </tbody>
    </table>
</body>
</html>