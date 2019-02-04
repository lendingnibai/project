<!--Modal: modalUserDetails-->
<div class="modal fade modalUserDetails" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex">
                <p class="heading">Basic Information</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <p class="text-dark h6"><span id="ajax_full_name"></span> (<span id="ajax_user_type"></span>)</p>
                <p class="text-dark h6"><span id="ajax_address"></span></p>
                <img src="" id="ajax_gov_id" class="img-fluid" alt="Government ID" style="width: 100%; height: 300px">
            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <form method="POST" action="<?php echo base_url('barangay/accept_user_account')?>">
                    <div class="md-form mb-0">
                        <textarea type="text" id="note" class="md-textarea form-control w-100" name="reason_message" cols="100" rows="1"></textarea>
                        <label for="note">Message: For rejection use only</label>
                    </div>
                    <!-- TAKE NOTE GI MD5 -->
                    <input type="hidden" name="user_account_id" id="ajax_user_account_id_hide" value="">
                    <input type="hidden" name="mobile_no" id="ajax_mobile_no_hide" value="">
                    <br>
                    <button type="submit" class="btn btn-default m-0 mr-2 btn-sm py-1 px-3" title="Accept">
                        <b>&#x2714;</b>
                    </button>
                    <button type="submit" formaction="<?php echo base_url('barangay/reject_user_account')?>" class="btn btn-danger m-0 ml-2 btn-sm py-1 px-3" title="Reject" onclick="return confirm('Are you sure you want to reject this user?')">
                        <b>&#10008;</b>
                    </button>
                </form>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalUserDetails-->

<!--Modal: modalUserDetails2-->
<div class="modal fade modalUserDetails_2" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex">
                <p class="heading">Basic Information</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <p class="text-dark h6"><span id="ajax_full_name_2"></span> (<span id="ajax_user_type_2"></span>)</p>
                <p class="text-dark h6"><span id="ajax_address_2"></span></p>
                <img src="" id="ajax_gov_id_2" class="img-fluid" alt="Government ID" style="width: 100%; height: 300px">
            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <form method="POST" action="<?php echo base_url('barangay/accept_member_request')?>">
                    <div class="md-form mb-0">
                        <textarea type="text" id="memo" class="md-textarea form-control w-100" name="memo" cols="100" rows="1"></textarea>
                        <label for="memo">Message: For rejection use only</label>
                    </div>
                    <!-- TAKE NOTE GI MD5 -->
                    <input type="hidden" name="user_account_id" id="ajax_user_account_id_hide_2" value="">
                    <input type="hidden" name="mobile_no" id="ajax_mobile_no_hide_2" value="">
                    <br>
                    <button type="submit" class="btn btn-default m-0 mr-2 btn-sm py-1 px-3" title="Accept">
                        <b>&#x2714;</b>
                    </button>
                    <button type="submit" formaction="<?php echo base_url('barangay/reject_member_request')?>" class="btn btn-danger m-0 ml-2 btn-sm py-1 px-3" title="Reject" onclick="return confirm('Are you sure you want to reject this request?')">
                        <b>&#10008;</b>
                    </button>
                </form>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalUserDetails-->

<!--Section: Basic examples-->
<section class="wow fadeIn">
<!-- new registered and for old registered pero wala pay brgy sauna -->
<?php if ($for_approval->num_rows() > 0 || $for_verification->num_rows() > 0) {?>
    <div class="">
        <strong>Registered user.</strong>
        <div class="switch default-switch">
            <label>
                hide
                <input type="checkbox" checked="checked" id="toggle_switch">
                <span class="lever "></span>
                show
            </label>
        </div>
    </div>

    <!-- new users registered -->
    <div class="card mb-2" id="user_registered">

        <div class="card-body" style="max-height: 500px;">

        <?php if($for_approval->num_rows() > 0){?>
            <!--Table-->
            <p class="dark-grey-text">Registered user for confirmation</p>
            <table class="table table-sm table-bordered table-responsive-md">
                <!--Table head-->
                <thead class="mdb-color rounded teal">
                    <tr class="text-white">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Contact No.</th>
                        <th width="10%">Check Profile</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                    <?php $seq = 1?>
                    <?php foreach ($for_approval->result() as $row){?>
                        <tr>
                            <th scope="row"><?php echo $seq;?></th>
                            <td><?php echo $row->first_name?></td>
                            <td><?php echo $row->middle_name?></td>
                            <td><?php echo $row->last_name?></td>
                            <td><?php echo $row->email?></td>
                            <td><?php echo $row->username?></td>
                            <td><?php echo $row->mobile_no?></td>
                            <td>
                                <button class="btn_get_id btn btn-info m-0 btn-sm py-1 px-3" id="<?php echo $row->user_account_id.md5($seq)?>" title="View more details">
                                    View
                                </button>
                            </td>
                            
                        </tr>
                    <?php $seq++;}?>
                    <button class="d-none" id="btn_modal_view_user_details" type="button" data-toggle="modal" data-target=".modalUserDetails"></button>
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
            <a href="<?php echo base_url('barangay/member/approval_requests')?>"><small>See all</small></a>
        <?php }?>
        <!-- endif new registered -->

        <?php if($for_verification->num_rows() > 0){?>
            <!--Table-->
            <p class="dark-grey-text mt-2">Registered user for verification</p>
            <table class="table table-sm table-bordered table-responsive-md">
                <!--Table head-->
                <thead class="mdb-color rounded teal">
                    <tr class="text-white">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Contact No.</th>
                        <th width="10%">Check Profile</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                    <?php $seq = 1?>
                    <?php foreach ($for_verification->result() as $row){?>
                        <tr>
                            <th scope="row"><?php echo $seq;?></th>
                            <td><?php echo $row->first_name?></td>
                            <td><?php echo $row->middle_name?></td>
                            <td><?php echo $row->last_name?></td>
                            <td><?php echo $row->email?></td>
                            <td><?php echo $row->username?></td>
                            <td><?php echo $row->mobile_no?></td>
                            <td>
                                <button class="btn_get_id_2 btn btn-info m-0 btn-sm py-1 px-3" id="<?php echo $row->user_account_id.md5($seq)?>" title="View more details">
                                    View
                                </button>
                            </td>
                            
                        </tr>
                    <?php $seq++;}?>
                    <button class="d-none" id="btn_modal_view_user_details_2" type="button" data-toggle="modal" data-target=".modalUserDetails_2"></button>
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
            <a href="<?php echo base_url('barangay/member/verification_requests')?>"><small>See all</small></a>
        <?php }?>

        </div>
    </div>

<?php }?>


    <!--Grid for ueser row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-xl-4 col-md-4 mb-2">

            <!--Card-->
            <div class="card">

                <!--Card Data-->
                <div class="row mt-3">
                    <div class="col-md-5 col-5 text-left pl-4">
                        <a type="button" class="btn-floating btn-lg teal ml-4" data-toggle="tooltip" data-placement="top" title="View Details">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="col-md-7 col-7 text-right pr-5">
                        <h5 class="ml-4 mt-4 mb-2 font-weight-bold">4,567 </h5>
                        <p class="font-small grey-text">Lenders</p>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="row my-3">
                    <div class="col-md-7 col-7 text-left pl-4">
                        <p class="font-small dark-grey-text font-up ml-4 font-weight-bold">Last month</p>
                    </div>

                    <div class="col-md-5 col-5 text-right pr-5">
                        <p class="font-small grey-text">145,567</p>
                    </div>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-xl-4 col-md-4 mb-2">

            <!--Card-->
            <div class="card">

                <!--Card Data-->
                <div class="row mt-3">
                    <div class="col-md-5 col-5 text-left pl-4">
                        <a type="button" class="btn-floating btn-lg teal ml-4" data-toggle="tooltip" data-placement="top" title="View Details">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="col-md-7 col-7 text-right pr-5">
                        <h5 class="ml-4 mt-4 mb-2 font-weight-bold">4,567 </h5>
                        <p class="font-small grey-text">Borrowers</p>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="row my-3">
                    <div class="col-md-7 col-7 text-left pl-4">
                        <p class="font-small dark-grey-text font-up ml-4 font-weight-bold">Last month</p>
                    </div>

                    <div class="col-md-5 col-5 text-right pr-5">
                        <p class="font-small grey-text">145,567</p>
                    </div>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->


        <!--Grid column-->
        <div class="col-xl-4 col-md-4 mb-2">

            <!--Card-->
            <div class="card">

                <!--Card Data-->
                <div class="row mt-3">
                    <div class="col-md-5 col-5 text-left pl-4">
                        <a type="button" class="btn-floating btn-lg teal ml-4" data-toggle="tooltip" data-placement="top" title="View Details">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="col-md-7 col-7 text-right pr-5">
                        <h5 class="ml-4 mt-4 mb-2 font-weight-bold">10,000</h5>
                        <p class="font-small grey-text">Total Users.</p>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="row my-3">
                    <div class="col-md-7 col-7 text-left pl-4">
                        <p class="font-small dark-grey-text font-up ml-4 font-weight-bold">Last week</p>
                    </div>

                    <div class="col-md-5 col-5 text-right pr-5">
                        <p class="font-small grey-text">145,567</p>
                    </div>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid for users row-->

    <div class="row" style="min-height: 700px">
        
        <div class="col-md-12">     
            <div class="card">
                <h4 class="p-2 m-0 teal text-center rounded-top text-white">User's Information</h4>
                <div class="card-body">
                    <table id="dtBasicExample" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm">Name
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Age
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Gender
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Email
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Username
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Type
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Status
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Details
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Lender</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Lender</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Borrower</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Borrower</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Borrower</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Borrower</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Lender</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Borrower</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Borrower</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Lender</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>25</td>
                            <td>M</td>
                            <td>sukibyks@gmail.com</td>
                            <td>sukibyks</td>
                            <td>Borrower</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Full Details">View</button>
                            </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>Details</th>
                        </tr>
                      </tfoot>
                    </table>

                </div>

            </div>

        </div>

    </div>
    <!-- end of card table -->

</section>
<!--Section: Basic examples-->
