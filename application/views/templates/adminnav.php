<!--Main Navigation-->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav teal darken-4 fixed">
        <ul class="custom-scrollbar">
        <!-- Logo -->
        <li class="logo-sn waves-effect">
            <div class="text-center mt-0 mb-5">
                <a href="#" class="pl-0"><img src="<?php echo base_url()?>public/img/logo/logosmw.png" class="w-75"></a>
            </div>
        </li>

        <!--/. Logo -->

        <!--Search Form-->
        <li class="d-none">
            <form class="search-form" role="search">
                <div class="form-group md-form mt-0 pt-1 waves-light">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="<?php echo base_url('admin')?>" class="collapsible-header waves-effect <?php if (isset($active_dashboard)){echo 'active';}?>">
                        <i class="fa fa-tachometer"></i> <strong>Dashboard</strong>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/manage_barangay')?>" class="collapsible-header waves-effect <?php if (isset($active_manage_barangay)){echo 'active';}?>">
                        <i class="fa fa-sliders"></i> <strong>Manage Barangay</strong>
                    </a>
                </li>

                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-comments"></i> <strong>Messages</strong><i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#!" class="waves-effect"> <i class="fa fa-envelope"></i>Compose Message</a>
                            </li>
                            <li><a href="#!" class="waves-effect"> <i class="fa fa-bank"></i>Barangay</a>
                            </li>
                            <li><a href="#!" class="waves-effect"> <i class="fa fa-user-circle"></i>Lender</a>
                            </li>
                            <li><a href="#!" class="waves-effect"> <i class="fa fa-user-circle-o"></i>Borrower</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li><a class="collapsible-header waves-effect arrow-r <?php if (isset($active_settings)){echo 'active';}?>"><i class="fa fa-cogs"></i> <strong>Settings</strong><i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo base_url('admin/set_defaults')?>" class="waves-effect"> <i class="fa fa-wrench"></i>Set Defaults</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/account_settings')?>" class="waves-effect"> <i class="fa fa-cog"></i>Account Settings</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="" class="collapsible-header waves-effect">
                        <i class="fa fa-commenting"></i> <strong>Feedbacks</strong>
                    </a>
                </li>

                <li><a class="collapsible-header waves-effect arrow-r <?php if (isset($active_logs)){echo 'active';}?>"><i class="fa fa-cogs"></i> <strong>Logs</strong><i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo base_url('admin/logs/main_user')?>" class="waves-effect"> <i class="fa fa-users"></i>Main User</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/logs/brgy_admin')?>" class="waves-effect"> <i class="fa fa-users"></i>Brgy. Admin</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/logs/brgy_staff')?>" class="waves-effect"> <i class="fa fa-users"></i>Brgy. Staff</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/logs/super_admin')?>" class="waves-effect"> <i class="fa fa-users"></i>Super Admin</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
            </ul>
        </li>
        <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav teal darken-3">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fa fa-bars white-text"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p><?php echo $details['first_name'].' '.$details['last_name'].' ('.$details['email'].')'?></p>
        </div>

        <!--Navbar links-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">

            <!-- Dropdown -->
            <li class="nav-item dropdown notifications-nav">
                <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="badge red">3</span> <i class="fa fa-bell"></i>
                    <span class="d-none d-md-inline-block"><strong>Notifications</strong></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right float-left dropdown-primary z-depth-1" aria-labelledby="navbarDropdownPhotoNoti">
                  <a class="dropdown-item" href="#">
                      <i class="fa fa-money mr-2" aria-hidden="true"></i>
                      <span class="font-weight-bold">Good day! <small class="dark-grey-text">(Admin) <i class="fa fa-clock-o" aria-hidden="true"></i> 13 min</small>
                      </span>
                  </a>
                  <a class="dropdown-item" href="#">
                      <i class="fa fa-money mr-2" aria-hidden="true"></i>
                      <span class="font-weight-bold">Good day! <small class="dark-grey-text">(Admin) <i class="fa fa-clock-o" aria-hidden="true"></i> 13 min</small>
                      </span>
                  </a>
                  <a class="dropdown-item" href="#">
                      <i class="fa fa-line-chart mr-2" aria-hidden="true"></i>
                      <span class="font-weight-bold">Good day! <small class="dark-grey-text">(Admin) <i class="fa fa-clock-o" aria-hidden="true"></i> 13 min</small>
                      </span>
                  </a>
                  <a class="" href="#" >See all</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect"><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block"><strong>Contact</strong></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block"><strong>Support</strong></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownPhotoLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo base_url($details['profile'])?>" alt="Profile" style="width: 25px" class="rounded-circle">
          </a>

          <div class="dropdown-menu dropdown-menu-right float-left dropdown-primary z-depth-1" aria-labelledby="navbarDropdownPhotoLink">
              <p class="ml-2 h6">Super Admin</p>
              <a href="<?php echo base_url('admin_logout/index/'.md5($this->session->super_admin_id))?>" class="dropdown-item" onclick="return confirm('Do you want to logout?');" href="#">Logout</a>
          </div>
            </li>

        </ul>
        <!--/Navbar links-->
    </nav>
    <!-- /.Navbar -->

    <!-- Fixed button -->
    <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-lg red">
            <i class="fa fa-pencil"></i>
        </a>

        <ul class="list-unstyled">
            <li><a class="btn-floating red"><i class="fa fa-star"></i></a></li>
            <li><a class="btn-floating warning-color"><i class="fa fa-user"></i></a></li>
            <li><a class="btn-floating green"><i class="fa fa-envelope"></i></a></li>
            <li><a class="btn-floating blue"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>
    </div>
    <!-- Fixed button -->

</header>
<!--Main Navigation-->
<!--Main layout-->
<main>
<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item m-auto"><h5><?php echo $title?></h5></li>
    </ol>