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
         <div class="rounded p-2 white mt-3 card wow fadeIn" style="min-width: 700px">
            <p class="h6 mb-1">
               Personal Information
               <span class="float-right">
                <?php $user_main_type = ($this->session->lender_id == 1) ? 'lender' : 'borrower'; ?>
               <a href="<?php echo base_url($user_main_type.'/update_profile')?>" title="Update Profile" id="updateButton">
               <small>Edit</small> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
               </a>
               <a href="#!" title="Cancel" class="red-text d-none" id="cancelButton">
               <small>Cancel</small> <i class="fa fa-ban" aria-hidden="true"></i>
               </a>
               </span>
            </p>
            <hr>
            <div class="row animated container-fluid" id="profileSection" style="min-width: 700px">
               <div class="col">
                  <!--Mask with wave-->
                  <div class="view overlay">
                     <img src="<?php echo base_url($user_details['photo'])?>" class="img-fluid border border-default m-auto" alt="Sample image with waves effect." style="width: 150px; height: 150px">
                     <a>
                        <div class="mask waves-effect waves-light rgba-white-slight"></div>
                     </a>
                     <p class="text-center">Profile Picture</p>
                  </div>
               </div>
               <!-- personla info -->
               <div class="col-xl-10 col-md-12">
                  <!-- Default input email -->
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">First Name:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['first_name']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Middle Name:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['middle_name']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Last Name:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['last_name']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Gender:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['gender']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Date of Birth:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo date('M. d, Y', strtotime($user_details['dob']))?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Civil Status:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['civil_status']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Spouse Name:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['spouse_name']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Mobile No.:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['mobile_no']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Barangay:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['barangay']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Street Address:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['street']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">City:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['city']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">State/Province:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['state_prov']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">Zip Code:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['zip_code']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-4 m-auto d-none d-md-block">
                        <span class="float-right">OOR:</span>
                     </div>
                     <div class="col">
                        <input type="text" value="<?php echo $user_details['oor']?>" class="disabled w-100 form-control">
                     </div>
                  </div>
               </div>
            </div>
            <!-- form section -->
            <form enctype="multipart/form-data" id="formSection" class="d-none animated pulse">
               <div class="row" style="min-width: 700px">
                  <div class="col pl-4">
                     <!-- Default input email -->
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">First Name <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="first_name" id="first_name" value="<?php echo $user_details['last_name']?>" placeholder="First Name" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-4 m-auto d-none d-md-block">
                           <span class="float-right">Middle Name <small class="red-text">*</small></span>
                        </div>
                        <div class="col">
                           <input type="text" name="middle_name" id="middle_name" <?php echo $user_details['middle_name']?> placeholder="Middle Name" class="form-control">
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
                           <select class="form-control" id="gender" name="gender">
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
                        <div class="col form-group">
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
                           <select class="form-control" id="civil_status" name="civil_status">
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
                        <div class="col form-group">
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
                           <select class="form-control" id="oor" name="oor">
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
                           <button class="btn btn-sm btn-primary rounded float-right" type="button">Save</button>
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