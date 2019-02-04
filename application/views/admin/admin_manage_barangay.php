<style type="text/css">
    body.modal-open {
        overflow: hidden;
    }
</style>
<!--Section: Basic examples-->
<section class="wow fadeIn">

    <button class="btn btn-sm btn-info mt-0 mx-0" id="manage_brgy">Add Barangay</button>

    <div class="card rounded mb-2 animated zoomIn d-none" id="addBrgyDiv">
        <!-- Default form login -->
        <form class="container" id="add_brgy_account_form" enctype="multipart/form-data" method="post" action="<?php echo base_url('admin/add_brgy_account')?>">
            <p class="h5 mt-3 mb-4">Register Barangay</p>

            <div class="row">
                <div class="col-12 mb-2">
                    <h6>Barangay Captain's Personal Info.</h6>
                </div>
                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="first_name" name="first_name" class="form-control">
                        <label for="first_name">First Name <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="middle_name" name="middle_name" class="form-control">
                        <label for="middle_name">Middle Name</label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="last_name" name="last_name" class="form-control">
                        <label for="last_name">Last Name <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="email" id="email" name="email" class="form-control">
                        <label for="email">Email <small class="red-text">*</small></label>
                    </div>
                </div>

                <!-- <div class="col-md-6 col-xl-4 mb-2"> -->
                    <!-- Material input -->
                    <!-- <div class="md-form">
                        <input type="text" id="username" name="username" class="form-control">
                        <label for="username">Username <small class="red-text">*</small></label>
                    </div>
                </div> -->

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="cap_mobile_no" name="cap_mobile_no" class="form-control">
                        <label for="cap_mobile_no">Mobile No. <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-12 mt-2 mb-2">
                    <h6>Barangay Details.</h6>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="barangay" name="barangay" class="form-control">
                        <label for="barangay">Barangay <small class="red-text">*</small></label>
                    </div>
                </div>
                
                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="street" name="street" class="form-control">
                        <label for="street">Street <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="city" name="city" class="form-control">
                        <label for="city">City <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="state_prov" name="state_prov" class="form-control">
                        <label for="state_prov">State/Province <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="zip_code" name="zip_code" class="form-control">
                        <label for="zip_code">Zip Code <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="mobile_no" name="mobile_no" class="form-control">
                        <label for="mobile_no">Mobile No.</label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="tel_no" name="tel_no" class="form-control">
                        <label for="tel_no">Tel No. </label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Default input Barangay Hall -->
                    <label for="defaultFormTelNo" class="grey-text">Barangay Hall <small class="red-text">*</small> 
                        <small id="photo_brgy_selected" class="invisible animated">1 file selected <a href="#!" class="float-right mt-1 ml-1" data-toggle="modal" data-target="#previewPhotoModalBrgyHallPic" data-backdrop="static"> Preview</a></small>
                    </label>
                    <button type="button" id="buttonPhotoBrgy" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                    <input type="file" name="photo_file[]" id="photo_brgy" accept='image/*' class="form-control d-none">
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Default input Barangay Ordinance -->
                    <label for="defaultFormTelNo" class="grey-text">Barangay Ordinance <small class="red-text">*</small> 
                        <small id="photo_docs_selected" class="invisible animated">1 file selected <a href="#!" class="float-right mt-1 ml-1" data-toggle="modal" data-target="#previewPhotoModalBrgyDocsPic" data-backdrop="static"> Preview</a></small>
                    </label>
                    <button type="button" id="buttonPhotoDocs" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                    <input type="file" name="photo_file[]" id="photo_docs" accept='image/*' class="form-control d-none">
                </div>


            </div>

            <div class="float-left mt-2 mb-3">
                <a href="<?php echo base_url('admin/manage_barangay')?>" onclick="return confirm('Are you sure you want to cancel?');" class="btn btn-danger btn-sm m-0">Cancel</a>
            </div>

            <div class="float-right mt-2 mb-3">
                <button class="btn btn-primary btn-sm m-0" id="btnAdd" type="submit">Add</button>
            </div>
        </form>
    </div>

    <!-- new users registered -->
    <div class="card mb-2" style="min-height: 600px;">
        <div class="card-body table-responsive">
            <!--Table-->
            <h5 class="p-2 m-0 text-center ">Registered Barangay</h5>

            <table id="dtBasicExample" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="mdb-color teal text-white">
                    <tr>
                      <th class="th-sm">Barangay
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Brgy. Captain
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Mobile No.
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Tel No.
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Date Registered
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Details
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Disable/Enable
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Update
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                      <th class="th-sm">Delete
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                      </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registered_brgy->result() as $row) 
                    {

                        if ($row->status == 1)
                        {
                            $status = 'checked';
                            $title = 'Disable';
                        }
                        else
                        {
                            $status = '';
                            $title = 'Enable';
                        }
                    ?>
                    <tr>
                        <td><?php echo $row->barangay?></td>
                        <td><?php echo $row->brgy_captain?></td>
                        <td><?php echo $row->mobile_no?></td>
                        <td><?php echo $row->tel_no?></td>
                        <td><?php echo date('M. d, Y', strtotime($row->date_created))?></td>
                        <td>
                            <a class="py-1 px-3 text-primary" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                Full Details
                            </a>
                        </td>
                        <td>
                            <div class="switch default-switch text-center" title="<?php echo $title ?>">
                                <label>
                                    <a href="<?php echo base_url('admin/disable_brgy/'.md5(md5($row->registered_brgy_id)))?>" onclick="return confirm('Are you sure you want to disable?')">
                                        <input type="checkbox" <?php echo $status ?>>
                                        <span class="lever "></span>
                                    </a>
                                </label>
                            </div>
                        </td>
                        <td>
                             <a href="<?php echo base_url('admin/update_brgy/'.md5(md5($row->registered_brgy_id)))?>" class="btn btn-primary m-0 btn-sm py-1 px-3" title="Update">Update</a>
                        </td>
                        <td>
                            <a href="<?php echo base_url('admin/delete_brgy/'.md5(md5($row->registered_brgy_id)))?>" class="btn btn-danger m-0 btn-sm py-1 px-3" title="Permanent Delete">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
                <tfoot class="mdb-color teal text-white">
                    <tr>
                      <th>Barangay</i>
                      </th>
                      <th>Brgy. Captain</i>
                      </th>
                      <th>Mobile No.</i>
                      </th>
                      <th>Tel No.</i>
                      </th>
                      <th>Date Registered</i>
                      </th>
                      <th>Details</i>
                      </th>
                      <th>Disable/Enable</i>
                      </th>
                      <th>Update</i>
                      </th>
                      <th>Delete</i>
                      </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</section>
<!--Section: Basic examples-->

<!--Modal: brgy hall photo-->
 <div class="modal fade" id="previewPhotoModalBrgyHallPic"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <!--Content-->
    <div class="modal-content">
      <div class="p-2">
      <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
      <span id="filename1"></span>
      <img src="" alt="Profile Picture" id="previewPhotoBrgyHall" width="100%" height="100%">
     </div>
    </div>
   <!--/.Content-->
  </div>
 </div>
 <!--Modal: brgy hall photo-->

 <!--Modal: brgy ordinance photo-->
 <div class="modal fade" id="previewPhotoModalBrgyDocsPic"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <!--Content-->
    <div class="modal-content">
      <div class="p-2">
      <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
      <span id="filename2"></span>
      <img src="" alt="Profile Picture" id="previewPhotoBrgyDocs" width="100%" height="100%">
     </div>
    </div>
   <!--/.Content-->
  </div>
 </div>
 <!--Modal: brgy ordinance photo-->