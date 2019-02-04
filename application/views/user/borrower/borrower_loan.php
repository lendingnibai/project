<style type="text/css">
    body.modal-open {
        overflow: hidden;
    }
</style>
<main class="mainlayout" style="margin-top: 6%">
    <div class="container-fluid dark-grey-text">
        <!-- Intro -->
        <section class="section loan-section my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('borrower')?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Apply Loan <i class="fa fa-money" aria-hidden="true"></i></li>
            </ol>
            <div class="rounded p-2 card white mt-3 wow fadeIn" style="min-width: 700px">
                <p class="h6 mb-1">MangJuam Loan Application</p>
                <hr>
                <form id="loan_app_form" method="post" action="<?php echo base_url('borrower/apply_loan')?>" enctype="multipart/form-data">
                    <div class="row" style="min-width: 700px">
                        <div class="col-xl-6 col-md-12 pl-4 ">
                            <!-- Default input email -->
                            <div class="row mb-0 ">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right" style="margin-top: -10%">Terms <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <select class="mdb-select md-form mt-0 loan_term" id="loan_term" name="loan_term">
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                         if ($monthly_term->num_rows() > 0) 
                                         {
                                           foreach ($monthly_term->result() as $row) 
                                           {
                                             if($row->one_mo){ echo'<option value="'.$row->one_mo.'">'.$row->one_mo.' month</option>';}
                                             if($row->two_mo){ echo'<option value="'.$row->two_mo.'">'.$row->two_mo.' months</option>';}
                                             if($row->three_mo){ echo'<option value="'.$row->three_mo.'">'.$row->three_mo.' months</option>';}
                                             if($row->four_mo){ echo'<option value="'.$row->four_mo.'">'.$row->four_mo.' months</option>';}
                                             if($row->five_mo){ echo'<option value="'.$row->five_mo.'">'.$row->five_mo.' months</option>';}
                                             if($row->six_mo){ echo'<option value="'.$row->six_mo.'">'.$row->six_mo.' months</option>';}
                                             if($row->seven_mo){ echo'<option value="'.$row->seven_mo.'">'.$row->seven_mo.' months</option>';}
                                             if($row->eight_mo){ echo'<option value="'.$row->eight_mo.'">'.$row->eight_mo.' months</option>';}
                                             if($row->nine_mo){ echo'<option value="'.$row->nine_mo.'">'.$row->nine_mo.' months</option>';}
                                             if($row->ten_mo){ echo'<option value="'.$row->ten_mo.'">'.$row->ten_mo.' months</option>';}
                                             if($row->eleven_mo){ echo'<option value="'.$row->eleven_mo.'">'.$row->eleven_mo.' months</option>';}
                                             if($row->twelve_mo){ echo'<option value="'.$row->twelve_mo.'">'.$row->twelve_mo.' months</option>';}
                                           }
                                         } 
                                         ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <input type="hidden" name="min_loan" id="min_loan" value="<?php if(isset($min_loan)){echo $min_loan;}?>">
                                <input type="hidden" name="max_loan" id="max_loan" value="<?php if(isset($max_loan)){echo $max_loan;}?>">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">Loan Amount <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <input type="text" min="<?php echo $min_loan?>" max="<?php echo $max_loan?>" name="loan_amount" id="loan_amount" placeholder="Loan Amount <?php echo number_format($min_loan,2)?> - <?php echo number_format($max_loan,2)?>"" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">Full Name <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <input type="text" name="full_name" id="full_name" value="<?php echo $user_details['first_name'].' '.$user_details['middle_name'].' '.$user_details['last_name']?>" placeholder="Full Name" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">Mobile Number <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $user_details['mobile_no']?>" placeholder="Mobile no." value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">Email <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <input type="text" name="email" id="email" value="<?php echo $user_details['email']?>" placeholder="Email" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">Full Address <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <textarea class="form-control rounded-1" rows="4" cols="39" readonly style="resize: none;" name="address">Brgy. <?php echo $user_details['barangay'].' '.$user_details['street'].' '.$user_details['state_prov'].' '.$user_details['city']?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <div class="col-8">
                                    Select at least one co-maker <small class="red-text">*</small>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">1st Co-maker</span>
                                </div>
                                <div class="col">
                                    <select class="mdb-select md-form mt-0" searchable="Search here.." id="co_maker_1" name="co_maker_1">
                                        <option value="" disabled selected>Choose</option>
                                        <?php if ($co_makers->num_rows() > 0) {?>
                                          <?php foreach ($co_makers->result() as $row) {?>
                                            <option value="<?php echo $row->lender_id.md5($row->lender_id)?>" data-icon="<?php echo base_url($row->photo)?>" class="rounded-circle"><?php echo $row->co_maker?></option>
                                          <?php }?>
                                        <?php }else { ?>
                                            <option value="" disabled>No available co-maker</option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">2nd Co-maker <small class="red-text invisible">*</small></span>
                                </div>
                                <div class="col">
                                    <select class="mdb-select md-form mt-0" searchable="Search here.." id="co_maker_2" name="co_maker_2">
                                        <option value="" selected>Choose</option>
                                        <?php if ($co_makers->num_rows() > 0) {?>
                                          <?php foreach ($co_makers->result() as $row) {?>
                                            <option value="<?php echo $row->lender_id.md5($row->lender_id)?>" data-icon="<?php echo base_url($row->photo)?>" class="rounded-circle"><?php echo $row->co_maker?></option>
                                          <?php }?>
                                        <?php }else { ?>
                                            <option value="" disabled>No available co-maker</option>
                                          <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <h6 class="text-right">Requirements</h6>
                            <div class="" id="sourceOfIncomeOption">
                                <div class="row mb-0">
                                    <div class="col-4 m-auto d-none d-md-block">
                                        <span class="float-right" style="margin-top: -10%">Source of Income <small class="red-text">*</small></span>
                                    </div>
                                    <div class="col">
                                        <select class="mdb-select md-form source_of_income" name="source_of_income">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Business">Business</option>
                                            <option value="Self Employed">Self Employed</option>
                                            <option value="Employee">Employee</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 m-auto d-none d-md-block">
                                        <span class="float-right">Monthly Income <small class="red-text">*</small></span>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="monthly_income" id="monthly_income" placeholder="Monthly Income" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3" title="Driver's license, Passport, Postal, SSS, GSIS, PRC, UMID, Voter's ID">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">Government ID <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" id="btn_gov_id" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                                            <span class="float-left d-none d-sm-block d-md-none">Government ID <small class="red-text">*</small></span>
                                            <input type="file" name="photo_file[]" id="gov_id" accept='image/*' class="form-control d-none">
                                        </div>
                                        <div class="col m-auto">
                                            <a class="grey-text invisible" id="file1">1 file selected</a>
                                        </div>
                                        <div class="col-2 m-auto invisible" id="reviewPhotoGovID">
                                            <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalGovId" data-backdrop="static" id="animatedGovId">Preview</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3" title="Water/Electrict Bill 1 month or current">
                                <div class="col-4 m-auto d-none d-md-block">
                                    <span class="float-right">Water/Electrict Bill <small class="red-text">*</small></span>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4">
                                            <button type="button" id="buttonBill" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                                            <span class="float-left d-none d-sm-block d-md-none">Government ID <small class="red-text">*</small></span>
                                            <input type="file" name="photo_file[]" id="bill" accept='image/*' class="form-control d-none">
                                        </div>
                                        <div class="col m-auto">
                                            <a class="grey-text invisible" id="file9">1 file selected</a>
                                        </div>
                                        <div class="col-2 m-auto invisible" id="reviewPhotoBill">
                                            <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalBill" data-backdrop="static" id="animatedBill">Preview</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sourceOfIncomeOptionRequirements d-none" id="selfEmployeeOptions">
                                <div class="row mb-3" title="Payslip Month 1">
                                    <div class="col-4 m-auto d-none d-md-block">
                                        <span class="float-right">Latest Payslip <small class="red-text">*</small></span>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" id="buttonPayslip1" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                                                <input type="file" name="photo_file[]" id="payslip1" accept='image/*' class="form-control d-none">
                                            </div>
                                            <div class="col m-auto">
                                                <a class="grey-text invisible" id="file2">1 file selected</a>
                                            </div>
                                            <div class="col-2 m-auto invisible" id="reviewPhotopayslip1">
                                                <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalpayslip1" data-backdrop="static" id="animatedPayslip1">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of self employee options -->
                            <div class="sourceOfIncomeOptionRequirements d-none" id="microBusinessFile">
                                <div class="row mb-3" title="Barangay permit">
                                    <div class="col-4 m-auto d-none d-md-block">
                                        <span class="float-right">Barangay permit <small class="red-text">*</small></span>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" id="buttonBrgyPermit" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                                                <input type="file" name="photo_file[]" id="brgy_permit" accept='image/*' class="form-control d-none">
                                            </div>
                                            <div class="col m-auto">
                                                <a class="grey-text invisible" id="file5">1 file selected</a>
                                            </div>
                                            <div class="col-2 m-auto invisible" id="reviewPhotoBrgyPermit">
                                                <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalBrgyPermit" data-backdrop="static" id="animatedBrgyPermit">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of micro business file -->
                            <div class="sourceOfIncomeOptionRequirements d-none" id="mediumBusinessFile">
                                <div class="row mb-3" title="Mayor's permit">
                                    <div class="col-4 m-auto d-none d-md-block">
                                        <span class="float-right">Mayor's permit <small class="red-text">*</small></span>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-4">
                                                <button type="button" id="buttonMayorPermit" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                                                <input type="file" name="photo_file[]" id="mayor_permit" accept='image/*' class="form-control d-none">
                                            </div>
                                            <div class="col m-auto">
                                                <a class="grey-text invisible" id="file6">1 file selected</a>
                                            </div>
                                            <div class="col-2 m-auto invisible" id="reviewPhotoMayorPermit">
                                                <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalMayorPermit" data-backdrop="static" id="animatedMayorPermit">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of medium business file -->
                        </div>
                        <div class="col pr-5">
                            <div class="container">
                                <p class=" p-2 text-center default-color mb-0 rounded-top white-text">Recommendation and Review</p>
                                <div class="container-fluid text-center mb-2 p-4 rounded-bottom border border-default">
                                    <!-- Default input email -->
                                    <label class="dark-grey-text m-1 h6">Terms</label>
                                    <input type="text" id="termsResult" value="----------" class="form-control text-center mb-2 disabled">
                                    <label class="dark-grey-text m-1 h6">Loan Amount</label>
                                    <input type="text" id="loan_result" value="----------" class="form-control text-center mb-2 disabled">
                                    <label class="dark-grey-text m-1 h6"><span id="interest_rate">0%</span> Interest Rate</label>
                                    <input type="text" id="interest_result" value="----------" class="form-control text-center mb-2 disabled">
                                    <label class="dark-grey-text m-1 h6">Monthly Repayments</label>
                                    <input type="text" id="monthly_repayment" value="----------" class="form-control text-center mb-2 disabled">
                                    <label class="dark-grey-text m-1 h6">Total Repayments</label>
                                    <input type="text" id="total_repayment" value="----------" class="form-control text-center mb-2 disabled">
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                        <input type="submit" name="btn_submit" value="Apply Loan" class="btn btn-primary btn-sm my-3">
                    </center>
                </form>
            </div>
        </section>
    </div>
    <!-- end intro -->
</main>


<!--Modal: previewPhotoModalGovId-->
<div class="modal fade" id="previewPhotoModalGovId" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="p-2">
                <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
                <span id="filename1"></span>
                <img src="" alt="Government ID" id="previewPhotoGovId" width="100%" height="100%">
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: previewPhotoModalGovId-->
<!--Modal: previewPhotoModalpayslip1-->
<div class="modal fade" id="previewPhotoModalpayslip1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="p-2">
                <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
                <span id="filename2"></span>
                <img src="" alt="Payslip 1" id="previewPhotopayslip1" width="100%" height="100%">
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: previewPhotoModalpayslip1-->
<!--Modal: previewPhotoModalBrgyPermit-->
<div class="modal fade" id="previewPhotoModalBrgyPermit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="p-2">
                <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
                <span id="filename5"></span>
                <img src="" alt="Barangay Permit" id="previewPhotoBrgyPermit" width="100%" height="100%">
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: previewPhotoModalBrgyPermit-->
<!--Modal: previewPhotoModalBrgyPermit-->
<div class="modal fade" id="previewPhotoModalMayorPermit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="p-2">
                <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
                <span id="filename6"></span>
                <img src="" alt="Mayor's Permit" id="previewPhotoMayorPermit" width="100%" height="100%">
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: previewPhotoModalBrgyPermit-->
<!--Modal: previewPhotoModalProfilePic-->
<div class="modal fade" id="previewPhotoModalProfilePic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="p-2">
                <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
                <span id="filename7"></span>
                <img src="" alt="Profile Picture" id="previewPhotoProfilePic" width="100%" height="100%">
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: previewPhotoModalProfilePic-->
<!--Modal: previewPhotoModalGovId-->
<div class="modal fade" id="previewPhotoModalcoMakerGovId" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="p-2">
                <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
                <span id="filename8"></span>
                <img src="" alt="Co Maker's Government ID" id="previewPhotoCoMakerGovId" width="100%" height="100%">
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: previewPhotoModalGovId-->
<!--Modal: previewPhotoModalBill-->
<div class="modal fade" id="previewPhotoModalBill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="p-2">
                <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
                <span id="filename9"></span>
                <img src="" alt="Bill" id="previewPhotoBill" width="100%" height="100%">
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: previewPhotoModalBill-->