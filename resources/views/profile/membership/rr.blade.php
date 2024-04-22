<!DOCTYPE html>
<html>
<head>
    <title>{{ Auth::user()->name }} - Membership</title>
    <style>
.table {
    border-collapse: collapse;
    width: 98%;
    overflow: hidden;
    margin-left: auto;
    margin-right: auto;
}

.table td, th {
    border: 1px solid #000;
    padding: 8px; 
    text-align: center; 
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
    @php $membership = json_decode(Auth::user()->member->membership, true);$member = Auth::user()->member; @endphp
    <table class="table" width="100%" style=" border-bottom: 5px solid black; margin-bottom: 1%; ">
        <tbody>
        <tr>
            <td width="40%" style="text-align: left;border: 1px solid #fff;"><p style="font-size:16px;" > <h4 style="margin-bottom:0;">শরীরচর্চা শিক্ষা দপ্তর</h4>যশোর বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়<br>যশোর-৭৪০৮, বাংলাদেশ।<br>ই-মেইল: director ope@yahoo.com<br>ফোন নংঃ +৮৮০২৪২১৪২১৮৩, <br>পিএবিএক্স: ৪৫০,০১৯১৩২৪১৩৪৪</p></td>
            <td width="20%" style="text-align: center;border: 1px solid #fff;"><img width="75px" src="{{ asset('img/just.png') }}" alt=""></td>
            <td width="40%" style="text-align: right;border: 1px solid #fff;"><p  style="font-size:14px;"> <h4 style="margin-bottom:0;">Office of the Physical Education</h4>Jashore University of Science and Technology
<br>Jashore - 7408, Bangladesh.<br>E-mail: director ope@yahoo.com Phone:+880242142183, <br>PABX-450,01913241344 </p></td>
        </tr>
        </tbody>
    </table>
    <table class="table table-bordered" width="100%">
        <tbody>
        <tr>
            <th width="50%">ছবি </th>
            <td width="50%"><img width="150px" src="{{ asset('storage/app/public/'. $membership['profile']) }}" alt=""> </td>
        </tr>
        <tr>
            <th>নাম </th>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        @if (Auth::user()->type == 'student')
        <tr>
            <th>বিভাগ </th>
            <td>{{  $membership['dept'] }}</td>
        </tr>
        <tr>
            <th>পিতার নাম </th>
            <td>{{  $membership['fname'] }}</td>
        </tr>
        <tr>
            <th>মাতার নাম </th>
            <td>{{  $membership['mname'] }}</td>
        </tr>
        <tr>
            <th>সেশন </th>
            <td>{{  $membership['session'] }}</td>
        </tr>
        <tr>
            <th >রোল নং </th>
            <td>{{  $membership['rollno'] }}</td>
        </tr>
        @elseif (Auth::user()->type == 'staff')
        <tr>
            <th>Podobi </th>
            <td>{{  $membership['podobi'] }}</td>
        </tr>
        <tr>
            <th>Dept/Office </th>
            <td>{{  $membership['deptoffice'] }}</td>
        </tr>
        @elseif (Auth::user()->type == 'stafffamily')
        <tr>
            <th>University working person Name </th>
            <td>{{  $membership['staffRelationName'] }}</td>
        </tr>
        <tr>
            <th>University working person Relation </th>
            <td>{{  $membership['staffRelation'] }}</td>
        </tr>
        <tr>
            <th>University working person title </th>
            <td>{{  $membership['staffRelationTitle'] }}</td>
        </tr>
        @elseif (Auth::user()->type == 'outsider')
        <tr>
            <th>Father's Name </th>
            <td>{{  $membership['fname'] }}</td>
        </tr>
        <tr>
            <th>Name of the institution </th>
            <td>{{  $membership['nameofinst'] }}</td>
        </tr>
        <tr>
            <th>Present Address </th>
            <td>{{  $membership['pradd'] }}</td>
        </tr>
        <tr>
            <th>Permanent Address </th>
            <td>{{  $membership['paadd'] }}</td>
        </tr>
        <tr>
            <th>Podobi </th>
            <td>{{  $membership['podobi'] }}</td>
        </tr>

        @endif
        <tr>
            <th >Gender</th>
            <td>{{  $membership['gender']}}</td>
        </tr>
        <tr>
            <th >Mobile </th>
            <td>{{  Auth::user()->mobile }}</td>
        </tr>
        </tbody>
    </table>
</body>
</html>