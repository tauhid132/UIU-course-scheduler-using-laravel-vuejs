<header class="main-header"> 
    
    <a href="/mydashboard/" class="logo blue-bg"> 
    
      <span class="logo-mini">UIU CMS</span> 
 
      <span class="logo-lg"><H1 class="mt-2" style="color: #fff">UIU CSS</H1></a> 
     
      <nav class="navbar blue-bg navbar-static-top"> 
        <!-- Sidebar toggle button-->
        <ul class="nav navbar-nav pull-left">
          <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
        </ul>
        <div class="pull-left search-box">
         
            
            <!-- search form --> </div>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">

            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="" class="user-image" alt="User Image"> <span class="hidden-xs">{{ Auth::user()->first_name }}</span> </a>
              <ul class="dropdown-menu">
              
                <li><a href=""><i class="icon-profile-male"></i> My Profile</a></li>
                
               
               
                <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>