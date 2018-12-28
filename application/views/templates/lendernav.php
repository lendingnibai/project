<!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark default-color scrolling-navbar" id="navbarTop">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="<?php echo base_url();?>lender">
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
            <a class="nav-link" href="<?php echo base_url();?>lender"><strong>Dashboard</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item <?php if(isset($investments)){echo $investments;}?>">
            <a class="nav-link" href="<?php echo base_url()?>lender/investments"><strong>Investments</strong></a>
          </li>
          <li class="nav-item dropdown <?php if(isset($transactions)){echo $transactions;}?>">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Transactions</strong>
              </a>
              <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-3">
                  <a class="dropdown-item <?php if(isset($all)){echo 'teal accent-4';}?>" href="<?php echo base_url('lender/transactions/all')?>"><strong>All</strong></a>
                  <a class="dropdown-item <?php if(isset($withdrawals)){echo 'teal accent-4';}?>" href="<?php echo base_url('lender/transactions/withdrawals')?>"><strong>Withdrawals</strong></a>
                  <a class="dropdown-item <?php if(isset($monthly_returned)){echo 'teal accent-4';}?>" href="<?php echo base_url('lender/transactions/monthly_returned')?>"><strong>Monthly returned</strong></a>
                  <a class="dropdown-item <?php if(isset($investment_returned)){echo 'teal accent-4';}?>" href="<?php echo base_url('lender/transactions/investment_returned')?>"><strong>Investment returned</strong></a>
              </div>
          </li>

          <li class="nav-item <?php if(isset($invest)){echo $invest;}?>">
            <a class="nav-link" href="<?php echo base_url()?>lender/invest"><strong>Apply Invest</strong></a>
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
                  
                  <a class="" href="<?php echo base_url()?>lender/inbox" >Sell all message</a>
              </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>lender/profile" ><strong><?php echo $user_details['first_name'].' '.$user_details['last_name']?> (Lender)</strong></a>
          </li>
        <!-- Dropdown -->
          <li class="nav-item dropdown">
              
              <a class="nav-link dropdown-toggle" id="navbarDropdownPhotoLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?php echo base_url($user_details['photo'])?>" alt="Profile" style="width: 25px" class="rounded-circle">
              </a>

              <div class="dropdown-menu dropdown-menu-right float-left dropdown-primary z-depth-1" aria-labelledby="navbarDropdownPhotoLink">
                  <p class="ml-2 h6">Brgy. <?php echo $user_details['barangay']?></p>
                  <a class="dropdown-item" href="<?php echo base_url('lender/profile')?>">Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url('lender/settings')?>">Settings</a>
                  <a class="dropdown-item" href="<?php echo base_url('lender/review_invest_app')?>">Review Applications</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSwitchUserType" data-backdrop="static">Switch to Borrower</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Switch to Borrower?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

              <!--check first if the user is rigestered to his/her brgy  -->
            <?php if (!$_SESSION['registered_brgy_id']){?>
            <?php $requested_brgy = ''?>
              <form id="register_to_verify_form" method="post" action="<?php echo base_url('lender/register_to_brgy')?>">
                  <div class="modal-body">
                  <?php $login_status = ''?>
                    <?php if ($member_request->num_rows() > 0){?>
                        <?php foreach ($member_request->result() as $row){?>
                          
                          <?php if($row->status == 0) {?>
                          <div class="alert alert-warning p-1 m-0 mx-3 mb-2 memo_div1" role="alert">
                          <?php }elseif($row->status == 2) {?>
                          <div class="alert alert-danger p-1 m-0 mx-3 mb-2 memo_div1" role="alert">
                          <?php }else {?>
                          <?php $login_status = 'd-none'?>
                          <div class="alert alert-success p-1 m-0 mx-3 mb-2 memo_div1" role="alert">
                            <a class="float-right" href="<?php echo base_url('main_user_logout/index/'.md5($this->session->user_account_id))?>">Logout</a>
                          <?php }?>
                            Note: <?php echo $row->memo?>
                          </div>
                          <!-- to check asa siya ni registered then mao sad ang i select -->
                          <?php $requested_brgy = $row->registered_brgy_id ?>
                        <?php }?>
                    <?php }?>
                      <div class="alert alert-warning p-1 m-0 mx-3 mb-2 d-none" id="memo_div2" role="alert">

                      </div>

                      <p class="container-fluid <?php echo $login_status?>">
                        Register to your barangay first.
                      </p> 
                      <div class="col form-group mb-1 <?php echo $login_status?>">
                        <select class="form-control" id="register_to_brgy" name="register_to_brgy">
                          <option value="" selected disabled>Select your barangay</option>
                          <?php foreach ($all_brgy->result() as $row){?>
                            <?php if (md5($row->registered_brgy_id) == md5($requested_brgy)){?>
                              <!-- selected -->
                              <option value="<?php echo $row->registered_brgy_id.md5($row->registered_brgy_id) ?>" selected><?php echo $row->barangay ?></option>
                              <?php } else { ?>
                              <option value="<?php echo $row->registered_brgy_id.md5($row->registered_brgy_id) ?>"><?php echo $row->barangay ?></option>
                            <?php } ?>
                          <?php }?>
                        </select>
                      </div>

                      <div class="form-group container-fluid mt-3 mb-1 <?php echo $login_status?>">
                        <label for="defaultFormGovID" class="dark-grey-text">Government ID</label>
                        <input class="ml-3" type="file" name="request_gov_id" id="request_gov_id" accept="image/*">
                      </div>
                      <div class="form-group container-fluid <?php echo $login_status?>">
                        <!-- Default input email -->
                        <label for="defaultFormLoginPasswordEx" class="dark-grey-text">Enter your password</label>
                        <input type="password" name="password" id="password" placeholder="**********" class="form-control pressEnter">
                      </div>
                  </div>
                  <div class="modal-footer <?php echo $login_status?>">
                      <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-sm btn-primary">Register</button>
                  </div>
                </form>

              <?php } else {?>
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
              <?php } ?>
        </div>
    </div>
</div>