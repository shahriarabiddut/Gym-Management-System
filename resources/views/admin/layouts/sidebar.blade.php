<div id="sidebar"><a href="{{route('admin.dashboard')}}" class="visible-phone"><i class="fas fa-home"></i> Dashboard</a>
  <ul>
    <li class=""><a href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
    {{-- 1 --}}
    <li class="dropdown "> <a href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i> <span>Manage Members</span> <span class="label label-important"> </span></a>
     <ul class="dropdown-menu">
        <li class=""><a href="{{ route('admin.user.index') }}"><i class="fas fa-arrow-right"></i> List All Members</a></li>
        <li class=""><a href="{{ route('admin.user.create') }}"><i class="fas fa-arrow-right"></i> Add New User</a></li>
      </ul>
    </li>
    {{-- 2 --}}
    <li class="submenu"> <a href="{{ route('admin.equipment.index') }}"><i class="fas fa-dumbbell"></i> <span>Gym Equipment</span> <span class="label label-important"> </span></a>
     <ul class="dropdown-menu">
          <li class=""><a href="{{ route('admin.equipment.index') }}"><i class="fas fa-arrow-right"></i> List Gym Equipment</a></li>
          <li class=""><a href="{{ route('admin.equipment.create') }}"><i class="fas fa-arrow-right"></i> Add Equipment</a></li>
        </ul>
      </li>
      {{-- 3 --}}
    <li class="submenu"> <a href="{{ route('admin.contact.index') }}"><i class="fas fa-message"></i> <span>Manage Contacts</span> <span class="label label-important"> </span></a>
     <ul class="dropdown-menu">
        <li class=""><a href="{{ route('admin.contact.index') }}"><i class="fas fa-arrow-right"></i> Contact Message</a></li>
      </ul>
    </li>
    {{-- 4 --}}
    <li class="dropdown "> <a href="{{ route('admin.plan.index') }}"><i class="fas fa-table"></i> <span>Manage Plans</span> <span class="label label-important"> </span></a>
      <ul class="dropdown-menu">
         <li class=""><a href="{{ route('admin.plan.index') }}"><i class="fas fa-arrow-right"></i> List All Plans</a></li>
         <li class=""><a href="{{ route('admin.plan.create') }}"><i class="fas fa-arrow-right"></i> Add New Plan</a></li>
       </ul>
     </li>
    {{-- 5 --}}
    
    {{-- 
    <li class=""> <a href=""><i class="fas fa-calendar-alt"></i> <span>Attendance</span></a>
      <ul>
        <li class=""><a href="attendance"><i class="fas fa-arrow-right"></i> Check In/Out</a></li>
          <li class=""><a href="view-attendance"><i class="fas fa-arrow-right"></i> View</a></li>
        </ul>
      </li>

    
    <li class=""><a href="customer-progress"><i class="fas fa-tasks"></i> <span>Manage Customer Progress</span></a></li>
    <li class=""><a href="member-status"><i class="fas fa-eye"></i> <span>Member's Status</span></a></li>
    <li class=""><a href="payment"><i class="fas fa-hand-holding-usd"></i> <span>Payments</span></a></li>
    <li class=""><a href="announcement"><i class="fas fa-bullhorn"></i> <span>Announcement</span></a></li>
    <li class=""><a href="staffs"><i class="fas fa-briefcase"></i> <span>Staff Management</span></a></li>
    <li class="submenu"> <a href=""><i class="fas fa-file"></i> <span>Reports</span></a>
    <ul>
        <li class=""><a href="reports"><i class="fas fa-arrow-right"></i> Chart Representation</a></li>
        <li class=" "><a href="members-report"><i class="fas fa-arrow-right"></i> Members Report</a></li>
        <li class=""><a href="progress-report"><i class="fas fa-arrow-right"></i> Customer Progress Report</a></li>
      </ul>
    </li> --}}

  </ul>
</div>