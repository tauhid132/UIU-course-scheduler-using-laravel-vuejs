<div class="sidebar"> 
    <!-- Sidebar user panel -->
  
  
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Course Scheduling System</li>
      <li > <a href="{{ url('dashboard') }}"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container">  </span> </a>
  
      </li>
      <li class="treeview"> <a href="#"> <i class="fa  fa-users"></i> <span>Faculties</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/faculties') }}">All Faculties</a></li>
          <li><a href="/mod/users/add-user.php">Add New Faculty</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-tasks "></i> <span>Course Management</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="/mod/tickets/alltickets.php">Departments</a></li>
          <li><a href="/mod/hrm/tasks.php">Courses</a></li>
          <li><a href="/mod/hrm/tasks.php">Trimesters</a></li>
        </ul>
      </li>
     
      <li class="treeview"> <a href="#"> <i class="fa  fa-cogs"></i> <span>Settings</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
  
          <li><a href="{{ url('users') }}">Admin</a></li>
          
         
  
        </ul>
      </li>
         
        </ul>
      </div>