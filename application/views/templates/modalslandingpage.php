<section class="modalSection">
  <!--Modal: Login Form-->
  <div class="modal fade" id="modalLoginForm"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog cascading-modal" role="document">
          <!--Content-->
          <div class="modal-content">

            <!-- Default form login -->
            <form class="container z-depth-4" id="loginFormData" method="post" action="<?php echo base_url('main_user_login/login')?>">
              <button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="dark-grey-text">&times;</span>
              </button>
                <p class=" mt-3 h4 mb-3">Welcome to MangJuam</p>
                <p class="mb-2">Sign in your account.</p>

                <!-- Default input email -->
                <label for="defaultFormLoginEmailUsernameEx" class="dark-grey-text">Email or Username</label>
                <input type="text" name="email_username" id="email_username" placeholder="Email or Username" class="form-control">

                <!-- Default input password -->
                <label for="defaultFormLoginPasswordEx" class="dark-grey-text mt-1">Your password</label>
                <input type="password" name="password" id="login_password" placeholder="**********" class="form-control">

                <div class="float-left mt-4">
                  <span class="dark-grey-text">Don't have an account? <a href="#" id="notmember" data-dismiss="modal">Register</a></span>
                </div>
                <div class="text-right mt-4 mb-4">
                    <button class="btn btn-primary btn-sm mr-0" id="btnLogin" type="submit">Login</button>
                </div>
            </form>

          </div>
          <!--/.Content-->
      </div>
  </div>
  <!--Modal: LoginForm-->

  <!--Modal: register borrower/lender Form-->
  <div class="modal fade" id="modalRegForm"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: -7%">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">
        <!-- Default form login -->
        <form class="container z-depth-4" id="regFormData" method="post" action="<?php echo base_url('register/register_account')?>">
          <button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="dark-grey-text">&times;</span>
          </button>
          <p class=" mt-3 h4 mb-3">Register to MangJuam</p>
          <p class="mb-2">Enter your details to create an account.</p>
          <!-- Default inline 1-->
          <div class="custom-control custom-radio rounded custom-control-inline">
            <input type="radio" class="custom-control-input" id="radio_borrower" name="radio" value="1">
            <label class="custom-control-label" for="radio_borrower">Borrower</label>
          </div>
          <!-- Default inline 2-->
          <div class="custom-control custom-radio rounded custom-control-inline">
            <input type="radio" class="custom-control-input " id="radio_lender" name="radio" value="2">
            <label class="custom-control-label" for="radio_lender">Lender</label>
          </div>
          <div class="form-group" id="registeredBaranagay">
            <label for="sel1">Select barangay</label>
            <select class="form-control" id="borrower_selected_brgy" name="borrower_selected_brgy">
              <option value="" selected disabled>Select barangay</option>
              <?php
              $seq = 1;
              foreach ($registered_brgy->result() as $row)
              {
                ?>
                <option value="<?php echo $row->registered_brgy_id.md5($seq)?>"><?php echo $row->barangay?></option>
                <?php
                $seq++;
              }
              ?>
              <option value="" disabled></option>
            </select>
          </div>
          <div class="form-group d-none" id="otherBarangayId">
            <label for="sel1">Select barangay</label>
            <select class="form-control selectLenderBarangayClass" name="lender_selected_brgy" id="lender_selected_brgy">
              <option value="" selected disabled>Select barangay</option>
              <?php
              $seq = 1;
              foreach ($registered_brgy->result() as $row)
              {
                ?>
                <option value="<?php echo $row->registered_brgy_id.md5($seq)?>"><?php echo $row->barangay?></option>
                <?php
                $seq++;
              }
              ?>
              <option value="Other">Other</option>
              <option value="" disabled></option>
            </select>
          </div>

          <div class="lenderOtherBarangayClass animated zoomIn d-none">
            <label for="defaultFormLoginUsernameEx" class="dark-grey-text">Your Barangay</label>
            <input type="text" name="other_brgy" id="other_brgy" placeholder="Barangay" class="form-control">
          </div>
          
          <!-- Default input email -->
          <label for="defaultFormLoginUsernameEx" class="dark-grey-text">Your username</label>
          <input type="text" name="username" id="username" placeholder="Username" class="form-control">

          <label for="defaultFormLoginEmailEx" class="dark-grey-text mt-1">Your email</label>
          <input type="email" name="email" id="email" placeholder="Email" class="form-control">

          <!-- Default input password -->
          <label for="defaultFormLoginPasswordEx" class="dark-grey-text mt-1">Your password</label>
          <input type="password" name="password" id="password" placeholder="**********" class="form-control">

          <label for="defaultFormLoginCPasswordEx" class="dark-grey-text mt-1">Your confirm password</label>
          <input type="password" name="cpassword" id="cpassword" placeholder="**********" class="form-control">

          <div class="form-check mt-3 checkbox">
            <input class="form-check-input" type="checkbox" value="1" id="defaultCheckbox1">
            <label class="form-check-label" for="defaultCheckbox1">
                Agree to the <a href="#" id="termsandconditions" data-dismiss="modal">terms and conditions</a>.
            </label>
            <button class="d-none" id="viewTermsConidition" data-toggle="modal" data-target="#modalTermsAndConditions" data-backdrop="static" type="button"></button>
          </div>

          <div class="float-left mt-4">
            <span class="dark-grey-text">Already have an account? <a href="#" id="alreadymember" data-dismiss="modal">Login</a></span>
          </div>
          <div class="text-right mt-4 mb-4">
              <button class="btn btn-primary btn-sm mr-0" id="btnRegister" type="submit">Register</button>
          </div>
        </form>
      </div>
        <!--/.Content-->
    </div>
  </div>
  <!--Modal: register borrower/lender -->

  <!-- Modal Terms and conditions -->
  <div class="modal fade" id="modalTermsAndConditions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="container z-depth-4">
                <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalLabel">Terms And Conditions</h6>
                </div>
                <div class="modal-body">
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" id="agree">AGREE</button>
                </div>
              </div>
          </div>
      </div>
  </div>

  <!--Modal: google map-->
  <div class="modal fade" id="googleMap"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top: -7%">
      <div class="modal-dialog modal-lg cascading-modal" role="document">
          <!--Content-->
          <a href="#" class="white-text h6 mt-2 float-right" data-dismiss="modal"><button type="submit">X</button></a>
          <div class="modal-content default-color">
           <div class="container p-1">
              
              <!--Google map-->
              <div id="map-container" class="z-depth-1" style="height: 500px"></div>
           </div>

          </div>
          <!--/.Content-->
      </div>
  </div>
  <!--Modal: google map -->
</section>