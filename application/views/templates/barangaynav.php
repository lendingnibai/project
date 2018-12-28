<!--Main Navigation-->
<header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav teal darken-4 fixed">
        <ul class="custom-scrollbar">
        <!-- Logo -->
        <li class="logo-sn waves-effect">
            <div class="text-center mt-0 mb-5">
                <a href="#" class="pl-0"><img src="<?php echo base_url($brgy_details['photo_brgy'])?>" class="w-100"></a>
            </div>
        </li>
        <!--/. Logo -->
        <li>
            <div class="barangay">
                <p class="h5 mt-2 pl-2 ">Barangay <?php echo $brgy_details['barangay']?></p>
            </div>
        </li>
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
                    <a href="<?php echo base_url();?>barangay" class="collapsible-header waves-effect <?php if (isset($active_dashboard)){echo 'active';}?>">
                        <i class="fa fa-tachometer"></i> <strong>Dashboard</strong>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>barangay/barangay_staff" class="collapsible-header waves-effect <?php if (isset($active_barangay_staff)){echo 'active';}?>">
                        <i class="fa fa-users"></i> <strong>Barangay Staff</strong>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>barangay/manage_users" class="collapsible-header waves-effect <?php if (isset($active_manage_users)){echo 'active';}?>">
                        <i class="fa fa-users"></i> <strong>Users</strong>
                    </a>
                </li>

                <li><a class="collapsible-header waves-effect arrow-r <?php if (isset($active_transactions)){echo 'active';}?>"><i class="fa fa-money"></i> <strong>Transactions</strong>
                    <i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo base_url('barangay/manage_funds');?>" class="waves-effect"> <i class="fa fa-money"></i>Fundings</a>
                            </li>
                            <li><a href="<?php echo base_url('barangay/loans');?>" class="waves-effect"> <i class="fa fa-money"></i>Loans</a>
                            </li>
                            <li><a href="<?php echo base_url('barangay/loan_applications');?>" class="waves-effect"> <i class="fa fa-money"></i>Loan App. <span class="badge badge-danger rounded-circle">19</span></a>
                            </li>
                            <li><a href="<?php echo base_url('barangay/investments');?>" class="waves-effect"> <i class="fa fa-money"></i>Invetsments</a>
                            </li>
                            <li><a href="<?php echo base_url('barangay/investment_applications');?>" class="waves-effect"> <i class="fa fa-money"></i>Invetsment App. <span class="badge badge-danger rounded-circle">15</span></a>
                            </li>
                            <li><a href="<?php echo base_url('barangay/withdrawals');?>" class="waves-effect"> <i class="fa fa-money"></i>Withdrawals</a>
                            </li>
                            <li><a href="<?php echo base_url('barangay/payments');?>" class="waves-effect"> <i class="fa fa-money"></i>Payments</a>
                            </li>
                            <li><a href="<?php echo base_url('barangay/earnings');?>" class="waves-effect"> <i class="fa fa-money"></i>Earnings</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li><a class="collapsible-header waves-effect arrow-r <?php if (isset($active_messages)){echo 'active';}?>"><i class="fa fa-comments"></i> <strong>Messages</strong>
                    <span class="badge badge-danger rounded-circle">2</span>
                    <i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo base_url();?>barangay/messages/compose" class="waves-effect"> <i class="fa fa-envelope"></i>Compose Message</a>
                            </li>
                            <li><a href="<?php echo base_url();?>barangay/messages/admin" class="waves-effect"> <i class="fa fa-user-secret"></i>Admin</a>
                            </li>
                            <li><a href="<?php echo base_url();?>barangay/messages/lender" class="waves-effect"> <i class="fa fa-user-circle"></i>Lender <span class="badge badge-danger rounded-circle">1</span></a>
                            </li>
                            <li><a href="<?php echo base_url();?>barangay/messages/borrower" class="waves-effect"> <i class="fa fa-user-circle-o"></i>Borrower <span class="badge badge-danger rounded-circle">1</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url();?>barangay/feedbacks" class="collapsible-header waves-effect <?php if (isset($active_feedbacks)){echo 'active';}?>">
                        <i class="fa fa-commenting"></i> <strong>Feedbacks</strong>
                        <span class="badge badge-danger rounded-circle">2</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="<?php echo base_url();?>barangay/user_logs" class="collapsible-header waves-effect <?php if (isset($active_logs)){echo 'active';}?>">
                        <i class="fa fa-users"></i> <strong>User Logs</strong>
                        <span class="badge badge-danger rounded-circle">2</span>
                    </a>
                </li> -->

                <li>
                    <a href="<?php echo base_url();?>barangay/settings" class="collapsible-header waves-effect <?php if (isset($active_settings)){echo 'active';}?>">
                        <i class="fa fa-cog"></i> <strong>Settings</strong>
                    </a>
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
            <p> <strong><?php echo $brgy_user_details['position']?></strong> <?php echo $brgy_user_details['first_name'].' '.$brgy_user_details['last_name'] ?> (<?php echo $brgy_user_details['email']?>)</p>
        </div>

        <!--Navbar links-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">

            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownPhotoNoti" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>
                  <span class="badge badge-danger rounded-circle position-fixed" style="margin-left: 13px; margin-top: -3px">2</span>
                  <i class="fa fa-bell white-text" aria-hidden="true"></i>
                </strong>
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
                <a class="nav-link waves-effect"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block"><strong>Support</strong></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownPhotoLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?php echo base_url($brgy_user_details['profile'])?>" alt="Profile" style="width: 25px; height: 25px" class="rounded-circle card-img">
          </a>

          <div class="dropdown-menu dropdown-menu-right float-left dropdown-primary z-depth-1" aria-labelledby="navbarDropdownPhotoLink">
              <p class="ml-2 h6"><?php echo $brgy_user_details['position']?></p>
              <a class="dropdown-item" href="<?php echo base_url()?>barangay">My Account</a>
              <a href="<?php echo base_url('barangay_logout/index/'.md5($this->session->brgy_account_id))?>" class="dropdown-item" onclick="return confirm('Do you want to logout?');">Logout</a>
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
        <li class="breadcrumb-item m-auto"><strong><?php echo $title?></strong></li>
    </ol>
