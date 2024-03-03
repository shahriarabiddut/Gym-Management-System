@extends('layout2')
@section('title', 'User Dashboard')
@section('breadcumb', 'Home')

@section('content')
<div class="row-fluid">
    <div class="span6">  
        <div class="widget-box">
           <div class="widget-title">
             <h5>Profile</h5>
           </div>
           <div class="widget-content nopadding">
             <table class='table table-striped table-bordered'>
                
         <tbody>
             <tr><td>Name </td><td>{{ Auth::user()->name }}</td> </tr>
             <tr><td>Address </td><td>{{ Auth::user()->address }}</td> </tr>
             <tr><td>Email </td><td>{{ Auth::user()->email }}</td> </tr>
             <tr><td>Mobile </td><td>{{ Auth::user()->mobile }}</td> </tr>
            <tr><td colspan="2"><a href="{{ route('user.profile.edit') }}"><button>Edit Profile</button></a></td></tr>
           </tbody>
             </table>
           </div>
         </div>
       </div> <!-- End of Profile List Bar -->
       <div class="span6">  
        <div class="widget-box">
           <div class="widget-title">
             <h5>Membership</h5>
           </div>
           <div class="widget-content p-2">
             @if ($membership==null)
             <a href="{{ route('user.enroll.create') }}"><button>Enroll For Membership</button></a>
             @else
             @php $membership = json_decode(Auth::user()->member->membership, true);$member = Auth::user()->member; @endphp
             <table class='table table-striped table-bordered'>
             <tbody>
             <tr><td>Department </td><td>{{ $membership['dept'] }}</td> </tr>
             @if (Auth::user()->type == 'student')
             <tr><td>Session </td><td>{{ $membership['session'] }}</td> </tr>
             @endif
             <tr><td>Registration Date </td><td>{{ $member->created_at->format('j F,Y') }}</td> </tr>
             <tr><td>Gender </td><td style="text-transform: capitalize; ">{{ $membership['gender'] }}</td> </tr>
             <tr><td>Membership Status </td><td> 
                @switch($member->status)
                    @case(0)
                        Under Review
                        @break
                    @case(1)
                        Active
                        @break
                    @default
                        Disabled
                @endswitch
            </td> </tr>
             <tr>
              <td><a href="{{ route('user.enroll.edit',Auth::user()->id) }}"><button>Update Current Data</button></a></td>
              <td><a href="{{ route('user.enroll.print') }}"><button>Download Form</button></a></td>
            </tr>
           </tbody>
             </table>
             @endif
           </div>
         </div>
       </div> <!-- End of Membership List Bar -->
</div>
{{-- <div class="row-fluid">
	  
    <div class="span6">
     
     <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
          <h5>My To-Do List</h5>
        </div>
        <div class="widget-content nopadding">
          <table class='table table-striped table-bordered'>
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Opts</th>
                </tr>
              </thead>
      <tbody>
          <tr>
          <td class='taskDesc'><a href='to-do'><i class='icon-plus-sign'></i></a>
          <td class='taskStatus'><span class='in-progress'></span></td>
          <td class='taskOptions'><a href='' class='tip-top' data-original-title='Update'><i class='icon-edit'></i></a>  <a href='' class='tip-top' data-original-title='Done'><i class='icon-ok'></i></a></td>
          </tr>
          
         
        </tbody>
          </table>
        </div>
      </div>
     
    
     
    </div> <!-- End of ToDo List Bar -->
    
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
          <h5>Gym Announcement</h5>
        </div>
        <div class="widget-content nopadding collapse in" id="collapseG2">
          <ul class="recent-posts">
            <li>

            <div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>
             <div class='article-post'> 
                <span class='user-info'> By: System Administrator / Date: </span><p><a href='#'></a> </p></div></li>
              <a href="announcement"><button class="btn btn-warning btn-mini">View All</button></a>
            </li>
          </ul>
        </div>
      </div>
    </div> <!-- end of announcement -->
    
</div><!-- End of row-fluid --> --}}

@section('scripts')


@endsection
@endsection