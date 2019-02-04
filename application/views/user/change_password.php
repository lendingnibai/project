
<style type="text/css">
    body.modal-open {
        overflow: hidden;
    }
</style>
<main class="mainlayout" style="margin-top: 6%">
  <div class="container dark-grey-text">
    <!-- Intro -->  
    <section class="section completeprofile-section my-5">

      <?php

      if ($user_settings == 'b_settings') 
      {
        ?>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower/profile">Profile</a></li>
            <li class="breadcrumb-item active">Settings <i class="fa fa-wrench" aria-hidden="true"></i></li>
          </ol>
        <?php
      }
      else
      {
        ?>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender/profile">Profile</a></li>
            <li class="breadcrumb-item active">Settings <i class="fa fa-wrench" aria-hidden="true"></i></li>
          </ol>
        <?php
      }
      ?>

      <div class="rounded p-2 white mt-3 card" style="min-width: 700px">
        
        <p class="h6 mb-1">
          Account Settings 
        </p>
        <hr>

        <?php

        if ($user_settings == 'b_settings') 
        {
          ?>
            <div class="container mt-0">
              <a href="<?php echo base_url();?>borrower/settings/change-email" title="Change Email">Email</a> /
              <a href="<?php echo base_url();?>borrower/settings/change-username" title="Change Username">Username</a> /
              <span class="active">Password <i class="fa fa-key" aria-hidden="true"></i></span>
            </div>
          <?php
        }
        else
        {
          ?>
            <div class="container mt-0">
              <a href="<?php echo base_url();?>lender/settings/change-email" title="Change Email">Email</a> /
              <a href="<?php echo base_url();?>lender/settings/change-username" title="Change Username">Username</a> /
              <span class="active">Password <i class="fa fa-key" aria-hidden="true"></i></span>
            </div>
          <?php
        }
        ?>

        <div class="row animated container-fluid" id="profileSection" style="min-width: 700px">
        <div class="container">
          <p>Change your password.</p>
        </div>
        <!--Mask with wave-->
        <div class="view overlay m-auto">

            <img src="<?php echo base_url($user_details['photo'])?>" class="img-fluid border border-default m-auto rounded rounded-circle" alt="Sample image with waves effect." style="width: 150px; height: 150px">
            <a>
                <div class="mask waves-effect waves-light rgba-white-slight"></div>
            </a>
            <p class="text-center">**********</p>
        </div>

        <div class="container-fluid animated zoomIn">
          <div class="border border-default rounded mb-4 mx-auto p-4 w-50">
            <input type="password" value="" placeholder="Current password" class="my-2 mx-auto form-control">
            <input type="password" value="" placeholder="New password" class=" my-2 mx-auto form-control">
            <input type="password" value="" placeholder="Confirm password" class=" my-2 mx-auto form-control">
            <div class="text-center">
              <button type="submit" class="btn btn-md btn-primary mx-auto my-2 w-100">Change password</button>
            </div>
          </div>
        </div>


        </div>

      </div>
    </section>
      <!-- end intro -->
  </div>
</main>

