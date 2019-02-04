<!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark default-color scrolling-navbar" id="navbarTop">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="<?php echo base_url();?>borrower">
        <img src="<?php echo base_url()?>public/img/logo/logosmw.png" style="width: 60px">
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
          <li class="nav-item <?php if(isset($dashboard)){echo $dashboard;}?>">
            <a class="nav-link" href="<?php echo base_url();?>borrower"><strong>Dashboard</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item <?php if(isset($loanbook)){echo $loanbook;}?>">
            <a class="nav-link" href="<?php echo base_url()?>borrower/loanbook"><strong>Loanbook</strong></a>
          </li>
          <li class="nav-item dropdown <?php if(isset($transactions)){echo $transactions;}?>">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Transactions</strong>
              </a>
              <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-3">
                  <a class="dropdown-item <?php if(isset($all)){echo 'teal accent-4';}?>" href="<?php echo base_url('borrower/transactions/all')?>"><strong>All</strong></a>
                  <a class="dropdown-item <?php if(isset($payments)){echo 'teal accent-4';}?>" href="<?php echo base_url('borrower/transactions/payments')?>"><strong>Repayments</strong></a>
                  <a class="dropdown-item <?php if(isset($loan_received)){echo 'teal accent-4';}?>" href="<?php echo base_url('borrower/transactions/loan_received')?>"><strong>Loan received</strong></a>
              </div>
          </li>

          <li class="nav-item <?php if(isset($loan)){echo $loan;}?>">
            <a class="nav-link" href="<?php echo base_url()?>borrower/loan"><strong>Apply Loan</strong></a>
          </li>

        </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownPhotoNoti" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>
                  <span class="badge badge-danger rounded-circle position-fixed animated zoomIn" style="margin-left: 13px; margin-top: -3px">2</span>
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

          <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownPhotoInbox" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>
                  <span class="badge badge-danger rounded-circle position-fixed animated zoomIn" style="margin-left: 13px; margin-top: -3px">2</span>
                  <i class="fa fa-commenting white-text" aria-hidden="true"></i>
                </strong>
              </a>

              <div class="dropdown-menu dropdown-menu-right float-left dropdown-primary z-depth-1" aria-labelledby="navbarDropdownPhotoInbox">
                  <a class="dropdown-item" href="#">
                      <i class="fa fa-envelope teal-text mr-2" aria-hidden="true"></i>
                      <span class="font-weight-bold">Good day! <small class="dark-grey-text">(Admin) <i class="fa fa-clock-o" aria-hidden="true"></i> 13 min</small>
                      </span>
                  </a>
                  <a class="dropdown-item" href="#">
                      <i class="fa fa-envelope teal-text mr-2" aria-hidden="true"></i>
                      <span class="font-weight-bold">Announce... <small class="dark-grey-text">(Brgy.) <i class="fa fa-clock-o" aria-hidden="true"></i> 33 min</small></span>
                  </a>
                  
                  <a class="" href="<?php echo base_url()?>borrower/inbox" >Sell all message</a>
              </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>borrower/profile" ><strong><?php echo $user_details['first_name'].' '.$user_details['last_name']?> (Borrower)</strong></a>
          </li>
        <!-- Dropdown -->
          <li class="nav-item dropdown">
              
              <a class="nav-link dropdown-toggle" id="navbarDropdownPhotoLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo base_url($user_details['photo'])?>" alt="Profile" style="width: 25px" class="rounded-circle">
              </a>

              <div class="dropdown-menu dropdown-menu-right float-left dropdown-primary z-depth-1" aria-labelledby="navbarDropdownPhotoLink">
                  <p class="ml-2 h6">Brgy. <?php echo $user_details['barangay']?></p>
                  <a class="dropdown-item" href="<?php echo base_url('borrower/profile')?>">Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url('borrower/settings')?>">Settings</a>
                  <a class="dropdown-item" href="<?php echo base_url('borrower/review_loan_app')?>">Review Applications</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSwitchUserType" data-backdrop="static">Switch to Lender</a>
                  <a href="<?php echo base_url('main_user_logout/index/'.md5($this->session->user_account_id))?>" class="dropdown-item" onclick="return confirm('Do you want to logout?');">Logout</a>
              </div>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Modal -->
<div class="modal fade" id="modalSwitchUserType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Switch to Lender?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="switch_form" method="post" action="<?php echo base_url('switch_main_user/switch_user')?>">
              <div class="modal-body">
                  <p class="container-fluid">
                    You can switch to borrower if you don't have ongoing transactions.
                  </p>

                  <div class="form-group container-fluid">
                    <!-- Default input email -->
                    <label for="defaultFormLoginPasswordEx" class="dark-grey-text">Enter your password</label>
                    <input type="password" name="password" id="password" placeholder="**********" class="form-control pressEnter">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-primary">Switch</button>
              </div>
            </form>
        </div>
    </div>
</div>