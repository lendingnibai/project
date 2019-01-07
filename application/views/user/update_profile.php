<style type="text/css">
   body.modal-open {
   overflow: hidden;
   }
</style>
<main class="mainlayout" style="margin-top: 6%">
   <div class="container dark-grey-text">
      <!-- Intro -->  
      <section class="section completeprofile-section my-5">
         <?php if ($user_profile == 'b_profile') {?>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile <i class="fa fa-file-text-o" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower/settings">Settings</a></li>
         </ol>
         <?php } else { ?>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile <i class="fa fa-file-text-o" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender/settings">Settings</a></li>
         </ol>
         <?php }?>
         <div class="rounded p-2 white mt-3 card wow fadeIn" style="min-width: 700px; min-height: 510px">
            <p class="h6 mb-1">
               Personal Information
               <span class="float-right">
                  <?php $user_main_type = ($this->session->lender_id == 1) ? 'lender' : 'borrower'; ?>
               <a href="<?php echo base_url($user_main_type.'/profile')?>" onclick="return confirm('Cancel update?')" title="Cancel" class="red-text" id="cancelButton">
               <small>Cancel</small> <i class="fa fa-ban" aria-hidden="true"></i>
               </a>
               </span>
            </p>
            <hr>
            <!-- form section -->
            <form id="update_user_profile_form" enctype="multipart/form-data" class="animated fadeIn" method="post" action="<?php echo base_url('update_main_user/update_profile')?>"> 
               <div class="row" style="min-width: 700px">
                  <div class="col pl-4">
                     <!-- Default input email -->
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">First Name <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="first_name" id="first_name" value="<?php echo $user_details['first_name']?>" placeholder="First Name" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Middle Name <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="middle_name" id="middle_name" value="<?php echo $user_details['middle_name']?>" placeholder="Middle Name" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Last Name <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="last_name" id="last_name" value="<?php echo $user_details['last_name']?>" placeholder="Last Name" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-0">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right" style="margin-top: -10%">Gender <small class="red-text">*</small></span>
                        </div>
                        <div class="col form-group">
                           <?php $male = $female = '';?>
                           <?php  if (strtolower($user_details['gender']) == 'male') { $male = 'selected'; }?>
                           <?php if (strtolower($user_details['gender']) == 'female') {$female = 'selected';}?>
                           <select class="mdb-select md-form mt-1 mb-0" id="gender" name="gender">
                              <option selected disabled>Gender</option>
                              <option value="Male" <?php echo $male?>>Male</option>
                              <option value="Female" <?php echo $female?>>Female</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Date of Birth <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="date" name="dob" id="dob" value="<?php echo date('Y-m-d', strtotime($user_details['oor']))?>" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-0">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right" style="margin-top: -10%">Civil Status <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <?php $single = $married = $separated = $widowed = '';
                              if (strtolower($user_details['civil_status']) == 'single') 
                              {
                                $single = 'selected';
                              }
                              elseif (strtolower($user_details['civil_status']) == 'married') 
                              {
                                $married = 'selected';
                              }
                              elseif (strtolower($user_details['civil_status']) == 'separated') 
                              {
                                $separated = 'selected';
                              }
                              elseif (strtolower($user_details['civil_status']) == 'widowed') 
                              {
                                $widowed = 'selected';
                              }
                              ?>
                           <select class="mdb-select md-form mt-1 mb-0" id="civil_status" name="civil_status">
                              <option value="" selected disabled>Civil Status</option>
                              <option value="Single" <?php echo $single?>>Single</option>
                              <option value="Married" <?php echo $married?>>Married</option>
                              <option value="Separated" <?php echo $separated?>>Separated</option>
                              <option value="Widowed" <?php echo $widowed?>>Widowed</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Spouse Name</span>
                        </div>
                        <div class="col">
                           <input type="text" name="spouse_name" id="spouse_name" value="<?php echo $user_details['spouse_name']?>" placeholder="Spouse Name" class="form-control">
                        </div>
                     </div>
                     <input type="file" name="gov_id" id="gov_id" accept='image/*' class="form-control d-none">
                     <input type="hidden" name="for_approval_indicator" id="for_approval_indicator" value="1" class="form-control d-none">
                     <input type="hidden" name="link_back" id="link_back" value="<?php echo $user_main_type.'/profile'?>" class="form-control d-none">
                  </div>
                  <div class="col pr-5">
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Mobile Number <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $user_details['mobile_no']?>" placeholder="Mobile Number" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Barangay <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="barangay" id="barangay" placeholder="Barangay" value="<?php echo $user_details['barangay']?>" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Street <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="street" id="street" value="<?php echo $user_details['street']?>" placeholder="Street" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">City <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="city" id="city" placeholder="City" value="<?php echo $user_details['city']?>" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">State/Province <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="state_prov" id="state_prov" placeholder="State/Province" value="<?php echo $user_details['state_prov']?>" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Zip Code <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="zip_code" id="zip_code" placeholder="Zip Code" value="<?php echo $user_details['zip_code']?>" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-0">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right" style="margin-top: -10%">OOR <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <?php
                              $renting = $lwr = $owned = '';
                              if (strtolower($user_details['oor']) == 'renting') 
                              {
                                $renting = 'selected';
                              }
                              elseif (strtolower($user_details['oor']) == 'living with relatives') 
                              {
                                $lwr = 'selected';
                              }
                              elseif (strtolower($user_details['oor']) == 'owned') 
                              {
                                $owned = 'selected';
                              }
                            ?>
                           <select class="mdb-select md-form mt-1 mb-0" id="oor" name="oor">
                              <option value="" selected disabled>Ownership of Residence</option>
                              <option value="Renting" <?php echo $renting?>>Renting</option>
                              <option value="Living with Relatives" <?php echo $lwr?>>Living with Relatives</option>
                              <option value="Owned" <?php echo $owned?>>Owned</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                        </div>
                        <div class="col">
                           <button class="btn btn-sm btn-primary rounded float-right" type="submit">Save</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>
      <!-- end intro -->
   </div>
</main>