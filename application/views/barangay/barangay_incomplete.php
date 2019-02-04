<section class="incomplete container">
	
	<div class="card rounded mb-2" id="incompleteProfile" style="min-height: 550px">
        <!-- Default form login -->
        <form class="container" id="update_profile_form" enctype="multipart/form-data" method="post" action="<?php echo base_url('barangay/update_profile')?>">

            <div class="row">
             
                <div class="col-12 mb-3">
                	<h6 class="py-2 h6">Personal Information</h6>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name?>" class="form-control">
                        <label for="first_name">First Name <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="middle_name" name="middle_name" value="<?php echo $middle_name?>" class="form-control">
                        <label for="middle_name">Middle Name</label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name?>" class="form-control">
                        <label for="last_name">Last Name <small class="red-text">*</small></label>
                    </div>
                </div>

				<div class="col-md-6 col-xl-4 mb-2">
	                <select class="mdb-select mt-0" name="gender" id="gender">
					    <option value="" disabled selected>Select gender</option>
					    <option value="Male">Male</option>
					    <option value="Female">Female</option>
					</select>
				</div>

				<div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <div class="row">
                        	<div class="col-4">
                        		<label for="dob" class="ml-3">Date of Birth <small class="red-text">*</small></label>
                        	</div>
                        	<div class="col">
                        		<input type="date" id="dob" name="dob" class="form-control">
                        	</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
	                <select class="mdb-select mt-0" name="civil_status" id="civil_status">
					    <option value="" disabled selected>Civil status</option>
					    <option value="Single">Single</option>
	                    <option value="Maried">Maried</option>
	                    <option value="Separated">Separated</option>
	                    <option value="Widowed">Widowed</option>
					</select>
				</div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="position" name="position" value="<?php echo $position?>" class="form-control" readonly>
                        <label for="position">Position <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="spouse_name" name="spouse_name" class="form-control">
                        <label for="spouse_name">Spouse Name </label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="mobile_no" name="mobile_no" value="<?php echo $mobile_no?>" class="form-control">
                        <label for="mobile_no">Mobile No. <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="tel_no" name="tel_no" class="form-control">
                        <label for="tel_no">Tel No. </label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="barangay" name="barangay" value="<?php echo $barangay?>" class="form-control" readonly>
                        <label for="barangay">Barangay <small class="red-text">*</small></label>
                    </div>
                </div>
                
                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="street" name="street" class="form-control">
                        <label for="street">Street <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="city" name="city" value="<?php echo $city?>" class="form-control" readonly>
                        <label for="city">City <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="state_prov" name="state_prov" value="<?php echo $state_prov?>" class="form-control" readonly>
                        <label for="state_prov">State/Province <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form mt-2">
                        <input type="text" id="zip_code" name="zip_code" value="<?php echo $zip_code?>" class="form-control" readonly>
                        <label for="zip_code">Zip Code <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mt-3 mb-2">
	                <select class="mdb-select mt-0" name="oor" id="oor">
					    <option value="" disabled selected>Ownership of Recidence</option>
					    <option value="Renting">Renting</option>
	                    <option value="Living with Relatives">Living with Relatives</option>
	                    <option value="Owned">Owned</option>
					</select>
				</div>

                <div class="col-md-6 col-xl-4 mt-0 mb-2">
                    <!-- Default input Barangay Hall -->
                    <label for="GovID" class="grey-text">Any Valid Government ID <small class="red-text">*</small> 
                        <small id="gov_id_selected" class="invisible animated">1 file selected <a href="#!" class="float-right mt-1 ml-1" data-toggle="modal" data-target="#previewPhotoModalGovId" data-backdrop="static"> Preview</a></small>
                    </label>
                    <button type="button" id="buttonPhotoGovId" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                    <input type="file" name="gov_id" id="gov_id" accept='image/*' class="form-control d-none">
                </div>

            </div>

            <div class="float-right mt-2 mb-3">
                <button class="btn btn-primary btn-sm m-0" id="btnSave" type="submit">Save</button>
            </div>

        </form>
    </div>

</section>


<!--Modal: gov id photo-->
 <div class="modal fade" id="previewPhotoModalGovId"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <!--Content-->
    <div class="modal-content">
      <div class="p-2">
      <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
      <span id="filename1"></span>
      <img src="" alt="Profile Picture" id="previewPhotoGovId" width="100%" height="100%">
     </div>
    </div>
   <!--/.Content-->
  </div>
 </div>
 <!--Modal: gov id photo-->