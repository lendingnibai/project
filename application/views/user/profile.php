
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

      if ($user_profile == 'b_profile') 
      {
        ?>

          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile <i class="fa fa-file-text-o" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower/settings">Settings</a></li>
          </ol>

        <?php
      }
      else
      {
        ?>

          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile <i class="fa fa-file-text-o" aria-hidden="true"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender/settings">Settings</a></li>
          </ol>

        <?php
      }
      ?>

      <div class="rounded p-2 white mt-3 card wow fadeIn" style="min-width: 700px">
        
        <p class="h6 mb-1">
          Personal Information
          <span class="float-right">
            <a href="#!" title="Update Profile" id="updateButton">
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

                  <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" class="img-fluid border border-default m-auto rounded rounded-circle" alt="Sample image with waves effect." style="width: 150px; height: 150px">
                  <a>
                      <div class="mask waves-effect waves-light rgba-white-slight"></div>
                  </a>
                  <p class="text-center">Profile Picture</p>

                  <img src="<?php echo base_url()?>public/img/anonymous/id.jpg" class="img-fluid border border-default m-auto" alt="Sample image with waves effect." style="width: 150px; height: 100px">
                  <a>
                      <div class="mask waves-effect waves-light rgba-white-slight"></div>
                  </a>
                  <p class="text-center">Government ID</p>
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
                  <?php
                  $male = '';
                  $female = '';
                  if (strtolower($user_details['gender']) == 'male') 
                  {
                    $male = 'selected';
                  }
                  if (strtolower($user_details['gender']) == 'female') 
                  {
                    $female = 'selected';
                  }
                  ?>
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
                  <?php
                  $single = '';
                  $married = '';
                  $separated = '';
                  $widowed = '';
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

              <!-- <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Profile Picture <small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col-4">
                      <button type="button" id="buttonProfilePic" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                      <input type="file" name="profilepicture" id="profilepicture" accept='image/*' class="form-control d-none">
                    </div>
                    <div class="col m-auto">
                      <a class="grey-text invisible" id="file1">1 file selected</a>
                    </div>
                    <div class="col-2 m-auto invisible" id="reviewPhotoProfilePic">
                      <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalProfilePic" data-backdrop="static" id="animatedProfilePic">Preview</a>
                    </div>
                  </div>
                </div>
              </div> -->

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
                  $renting = '';
                  $lwr = '';
                  $owned = '';
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

<!--               <div class="row mb-3" title="Driver's license, Passport, Postal, SSS, GSIS, PRC, UMID, Voter's ID">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Government ID <small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col-4">
                      <button type="button" id="buttonGovId" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                      <input type="file" name="govId" id="govId" accept='image/*' class="form-control d-none">
                    </div>
                    <div class="col m-auto">
                      <a class="grey-text invisible" id="file2">1 file selected</a>
                    </div>
                    <div class="col-2 m-auto invisible" id="reviewPhotogovId">
                      <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalgovId" data-backdrop="static" id="animatedGovId">Preview</a>
                    </div>
                  </div>
                </div>
              </div> -->

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

        <!-- <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg teal" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <p class="h6 m-auto">90%</p>
          </div>
        </div> -->
      </div>
    </section>
      <!-- end intro -->
  </div>
</main>

<!--Modal: previewPhotoModalProfilePic-->
 <div class="modal fade" id="previewPhotoModalProfilePic"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <!--Content-->
    <div class="modal-content">
      <div class="p-2">
      <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
      <span id="filename1"></span>
      <img src="" alt="Profile Picture" id="previewPhotoProfilePic" width="100%" height="100%">
     </div>
    </div>
   <!--/.Content-->
  </div>
 </div>
 <!--Modal: previewPhotoModalProfilePic-->

 <!--Modal: previewPhotoModalProfilePic-->
 <div class="modal fade" id="previewPhotoModalgovId"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <!--Content-->
    <div class="modal-content">
      <div class="p-2">
      <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
      <span id="filename2"></span>
      <img src="" alt="Government ID" id="previewPhotoGovId" width="100%" height="100%">
     </div>
    </div>
   <!--/.Content-->
  </div>
 </div>
 <!--Modal: previewPhotoModalProfilePic-->