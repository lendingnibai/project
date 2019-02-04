
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg teal navbar-dark dark-color scrolling-navbar" id="navbarTop">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand" href="<?php echo base_url();?>">
        <img src="<?php echo base_url()?>public/img/logo/logosmw.png" style="width: 70px">
      </a>
      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left -->
        <ul class="navbar-nav mr-auto smooth-scroll">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>homepage"><strong>Home</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>borrow" ><strong>Borrow</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>invest" ><strong>Invest</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>loans"><strong>Loans</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>help"><strong>Help</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>about"><strong>About us</strong></a>
          </li>
        </ul>

        <?php
        if (isset($_SESSION['user_type'])) 
        {
          if ($_SESSION['user_type'] == 'super_admin') 
          {
              $dashboard_link = 'admin';
          }
          elseif ($_SESSION['user_type'] == 'brgy_admin' || $_SESSION['user_type'] == 'brgy_staff') 
          {
              $dashboard_link = 'barangay';
          }
          elseif ($_SESSION['user_type'] == 'main_user') 
          {
              if ($_SESSION['is_borrower'] == 1) 
                $dashboard_link = 'borrower';
              else
                $dashboard_link = 'lender';
          }
          ?>
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item active teal">
              <a class="nav-link" href="<?php echo base_url($dashboard_link)?>" id="go_to_dashboard"><strong>My Dashboard</strong></a>
            </li>
          </ul>
          <?php
        }
        else
        {
          ?>
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="modal" id="register" data-target="#modalRegForm" data-backdrop="static"><strong>Register</strong> </a>
            </li>
            <span class="border-left m-auto " style="height: 20px"></span>
            <li class="nav-item">
              <a class="nav-link" href="" id="login" data-toggle="modal" data-target="#modalLoginForm" data-backdrop="static"><strong>Login</strong></a>
            </li>
          </ul>
          <?php
        }
        ?>
        
      </div>
    </div>
  </nav>
  <!-- Navbar -->


  <section class="link map">

    <div class="container card" style="min-height: 700px">
      
        <div class="row" style="margin-top: 10%">
            
            <div class="col">
              <h5>Landing Page</h5>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>homepage" target="_blank">Homepage</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrow" target="_blank">Borrow</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>invest" target="_blank">Invest</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>loans" target="_blank">Loans</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>help" target="_blank">Help</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>about" target="_blank">About Us</a>
                </li>
              </ul>
            </div>

            <div class="col">
              <h5>Super Admin</h5>
            </div>

            <div class="col">
              <h5>Barangay Amdin</h5>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay" target="_blank">Dashboard</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay/barangay_staff" target="_blank">Brgy. Staff</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay/manage_users" target="_blank">Manage Users</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay/manage_funds" target="_blank">Manage Funds</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay/loans" target="_blank">Loans</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay/investments" target="_blank">Investments</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay/messages" target="_blank">Messages</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>barangay/feedbacks" target="_blank">Feedbacks</a>
                </li>
              </ul>

            </div>

            <div class="col">
              <h5>Borrower</h5>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/incomplete" target="_blank">Incomplete</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower" target="_blank">Dashboard</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/loanbook" target="_blank">Loanbook</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/payments" target="_blank">Payments</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/loan" target="_blank">Apply Loan</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/profile" target="_blank">Profile</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/inbox" target="_blank">Messages</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/settings" target="_blank">Settings</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/settings/change-email" target="_blank">Change Email</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/settings/change-username" target="_blank">Change Username</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>borrower/settings/change-password" target="_blank">Change Password</a>
                </li>
              </ul>

            </div>

            <div class="col">
              <h5>Lender</h5>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/incomplete" target="_blank">Incomplete</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender" target="_blank">Dashboard</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/investments" target="_blank">Investments</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/withdrawals" target="_blank">Withdrawals</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/invest" target="_blank">Apply Invest</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/profile" target="_blank">Profile</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/inbox" target="_blank">Messages</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/settings" target="_blank">Settings</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/settings/change-email" target="_blank">Change Email</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/settings/change-username" target="_blank">Change Username</a>
                </li>
              </ul>

              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>lender/settings/change-password" target="_blank">Change Password</a>
                </li>
              </ul>

            </div>

        </div>

    </div>

  </section>



