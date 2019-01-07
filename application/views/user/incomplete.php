<style type="text/css">
    body.modal-open {
        overflow: hidden;
    }
</style>
<main class="mainlayout" style="margin-top: 6%">
  <div class="container">
    <!-- Intro -->  
    <section class="section completeprofile-section my-5">
      <?php
      if (!$for_approval) 
      {
      ?>
        <ol class="breadcrumb ">
          <li class="breadcrumb-item active">Complete your profile for confirmation.</li>
        </ol>
      <?php
      }
      elseif ($for_approval == 1) 
      {
      ?>
        <div class="alert alert-warning" role="alert">
          <?php echo $reason_message?>
        </div>
      <?php
      }
      else
      {//rejected
        ?>
        <div class="alert alert-danger" role="alert">
          Note: <?php echo $reason_message?>
        </div>
      <?php
      }
      ?>
      <div class="rounded p-2 white mt-3 card wow fadeIn" style="min-width: 700px">
        
        <p class="h6 mb-1 dark-grey-text">Personal Information</p>
        <hr>
        <form id="update_user_profile_form" enctype="multipart/form-data" method="post" action="<?php echo base_url('update_main_user/update_profile')?>">
          <div class="row" style="min-width: 700px">

            <div class="col pl-4">
              <!-- Default input email -->
              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">First Name <small class="red-text">*</small></span>
                </div>

                <div class="col">
                    <input type="text" name="first_name" id="first_name" value="<?php echo $first_name?>" placeholder="First Name" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Middle Name </span>
                </div>
                <div class="col">
                    <input type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name?>" placeholder="Middle Name" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Last Name <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="last_name" id="last_name" value="<?php echo $last_name?>" placeholder="Last Name" class="form-control">
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right" style="margin-top: -10%">Gender <small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <?php
                  $male = $female = '';
                  if (strtolower($gender) == 'male') 
                  {
                    $male = 'selected';
                  }
                  if (strtolower($gender) == 'female') 
                  {
                    $female = 'selected';
                  }
                  ?>
                  <select class="mdb-select md-form mt-1 mb-0" id="gender" name="gender">
                    <option value="" selected disabled>Gender</option>
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
                    <input type="date" name="dob" id="dob" value="<?php echo $dob?>" class="form-control">
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right" style="margin-top: -10%">Civil Status <small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <?php
                  $single = $married = $separated = $widowed = '';
                  if (strtolower($civil_status) == 'single') 
                  {
                    $single = 'selected';
                  }
                  elseif (strtolower($civil_status) == 'married') 
                  {
                    $married = 'selected';
                  }
                  elseif (strtolower($civil_status) == 'separated') 
                  {
                    $separated = 'selected';
                  }
                  elseif (strtolower($civil_status) == 'widowed') 
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
                    <input type="text" name="spouse_name" id="spouse_name" value="<?php echo $spouse_name?>" placeholder="Spouse Name" class="form-control">
                </div>
              </div>
              
              <div class="row mb-3" title="Driver's license, Passport, Postal, SSS, GSIS, PRC, UMID, Voter's ID">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Government ID <small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col-4">
                      <?php
                      if ($gov_id) 
                      {
                        $invisible = 'visible';
                      }
                      else
                      {
                        $invisible = 'invisible';
                      }
                      ?>
                      <button type="button" id="buttonGovId" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                      <input type="file" name="gov_id" id="gov_id" accept='image/*' class="form-control d-none">
                      <input type="hidden" name="link_back" id="link_back" value="" class="form-control d-none">
                    </div>
                    <div class="col m-auto">
                      <a class="grey-text <?php echo $invisible?>" id="file2">1 file selected</a>
                    </div>
                    <div class="col-2 m-auto <?php echo $invisible?>" id="reviewPhotogovId">
                      <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalgovId" data-backdrop="static" id="animatedGovId">Preview</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col pr-5">

              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Mobile Number <small class="red-text">*</small></span>
                </div>

                <div class="col">
                    <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $mobile_no?>" placeholder="Mobile Number" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                      <span class="float-right">Barangay <small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <input type="text" name="barangay" id="barangay" value="<?php echo $barangay?>" placeholder="Barangay" value="selected barangay" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Street <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="street" id="street" value="<?php echo $street?>" placeholder="Street" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                 <div class="col-4 m-auto d-none d-md-block">
                    <span class="float-right">City <small class="red-text">*</small></span>
                 </div>
                 <div class="col">
                    <input type="text" name="city" id="city" value="<?php echo $city?>" placeholder="City" class="form-control">
                 </div>
              </div>

              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">State/Province <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="state_prov" id="state_prov" value="<?php echo $state_prov?>" placeholder="State/Province" value="Cebu" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Zip Code <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="zip_code" id="zip_code" value="<?php echo $zip_code?>" placeholder="Zip Code" value="6000" class="form-control">
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
                  if (strtolower($oor) == 'renting') 
                  {
                    $renting = 'selected';
                  }
                  elseif (strtolower($oor) == 'living with relatives') 
                  {
                    $lwr = 'selected';
                  }
                  elseif (strtolower($oor) == 'owned') 
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

              <div class="row mt-1 mb-3 d-none">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Your location <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="url_location" id="url_location" value="<?php echo $url_location?>" placeholder="https://www.google.com/maps" class="form-control">
                    <small>Select your location <a href="https://www.google.com/maps" target="_blank">here</a> and copy the url link.</small>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  
                </div>
                <div class="col">
                    
                </div>
              </div>
            </div>
          </div>

          <center>
            <button class="btn btn-sm btn-primary mt-3 rounded float-right mr-4" type="submit">Save</button>
          </center>

        </form>
        <?php
        $t_p = 1.0;//one percent of 100
        $filled = 0;
        if ($first_name) {
            $filled += $t_p;
        }
        if ($last_name) {
            $filled += $t_p;
        }
        if ($gender) {
            $filled += $t_p;
        }
        if ($dob) {
            $filled += $t_p;
        }
        if ($civil_status) {
            $filled += $t_p;
        }
        if ($gov_id) {
            $filled += $t_p;
        }
        if ($mobile_no) {
            $filled += $t_p;
        }
        if ($barangay) {
            $filled += $t_p;
        }
        if ($street) {
            $filled += $t_p;
        }
        if ($city) {
            $filled += $t_p;
        }
        if ($state_prov) {
            $filled += $t_p;
        }
        if ($zip_code) {
            $filled += $t_p;
        }
        if ($oor) {
            $filled += $t_p;
        }
        if ($url_location) {
            $filled += $t_p;
        }
        $percentage = ($filled / 14) * 100; 
        ?>
        <div class="progress md-progress" style="height: 15px">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg teal" role="progressbar" style="width: <?php echo $percentage?>%; height: 15px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <p class="h6 m-auto"><?php echo floor($percentage)?>%</p>
          </div>
        </div>
      </div>
    </section>
      <!-- end intro -->
  </div>
</main>

 <!--Modal: previewPhotoModalProfilePic-->
 <div class="modal fade" id="previewPhotoModalgovId"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <!--Content-->
    <div class="modal-content">
      <div class="p-2">
      <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
      <span id="filename2"></span>
      <img src="<?php echo base_url($gov_id)?>" alt="Government ID" id="previewPhotoGovId" width="100%" height="100%">
     </div>
    </div>
   <!--/.Content-->
  </div>
 </div>
 <!--Modal: previewPhotoModalProfilePic-->