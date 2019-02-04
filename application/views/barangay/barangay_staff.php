
<!--Section: Basic examples-->
<section class="wow fadeIn">
    <button class="btn btn-sm btn-info mt-0 mx-0" id="brgy_staff">Add Barangay Staff Account</button>

    <div class="card rounded mb-2 animated zoomIn d-none " id="addBrgyStaffDiv">
        <!-- Default form login -->
        <form class="container" id="addBrgyStaffForm" method="post" action="<?php echo base_url('barangay/add_brgy_staff_account')?>">
            <p class="h5 mt-3 mb-4">Barangay Staff</p>

            <div class="row">

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

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="position" name="position" class="form-control">
                        <label for="position">Position <small class="red-text">*</small></label>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4 mb-2">
                    <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="mobile_no" name="mobile_no" class="form-control">
                        <label for="mobile_no">Mobile No. <small class="red-text">*</small></label>
                    </div>
                </div>

            </div>

            <div class="float-left mt-2 mb-3">
                <a href="<?php echo base_url('barangay/barangay_staff')?>" class="btn btn-danger btn-sm m-0" onclick="return confirm('Are you sure you want to cancel?')">Cancel</a>
            </div>

            <div class="float-right mt-2 mb-3">
                <button class="btn btn-primary btn-sm m-0" id="btnAdd" type="submit">Add</button>
            </div>
        </form>
    </div>

    <!-- new users registered -->
    <div class="card mb-2" style="min-height: 600px;">
        <div class="card-body">
            <!--Table-->
            <h2 class="p-2 m-0 teal text-center rounded-top text-white">Barangay Staff</h2>
            <table class="table table-responsive-md">

                <!--Table head-->
                <thead class="mdb-color rounded teal">
                    <tr class="text-white">
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Details</th>
                        <th>Disable/Enable</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                    <tr>
                        <td>Elvin Marvey Cabua</td>
                        <td>26</td>
                        <td>M</td>
                        <td>Barangay Captain</td>
                        <td>bsitcabua@gmail.com</td>
                        <td>bsitcabua</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                    </tr>

                    <tr>
                        <td>John Doe Birao</td>
                        <td>26</td>
                        <td>M</td>
                        <td>1st Councilor</td>
                        <td>biraoj@gmail.com</td>
                        <td>johnbirao</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Disable">
                                <label>
                                    <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to disable?')">
                                    <span class="lever "></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Joseph Vincent Alesna</td>
                        <td>26</td>
                        <td>M</td>
                        <td>2nd Councilor</td>
                        <td>alesnaj@gmail.com</td>
                        <td>jalesna</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Disable">
                                <label>
                                    <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to disable?')">
                                    <span class="lever "></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Rodrigo Duterte</td>
                        <td>36</td>
                        <td>M</td>
                        <td>3rd Councilor</td>
                        <td>rduterte@gmail.com</td>
                        <td>rduterte</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Disable">
                                <label>
                                    <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to disable?')">
                                    <span class="lever "></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Sarah Duterte</td>
                        <td>25</td>
                        <td>F</td>
                        <td>4th Councilor</td>
                        <td>sarahduterte@gmail.com</td>
                        <td>sarahduterte</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Disable">
                                <label>
                                    <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to disable?')">
                                    <span class="lever "></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Jonny Gago</td>
                        <td>36</td>
                        <td>M</td>
                        <td>5th Councilor</td>
                        <td>jonnygago@gmail.com</td>
                        <td>jonnygago</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Disable">
                                <label>
                                    <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to disable?')">
                                    <span class="lever "></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Gina Faelnar</td>
                        <td>26</td>
                        <td>F</td>
                        <td>6th Councilor</td>
                        <td>ginagina@gmail.com</td>
                        <td>ginagina</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Disable">
                                <label>
                                    <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to disable?')">
                                    <span class="lever "></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Robin Padaplin</td>
                        <td>28</td>
                        <td>M</td>
                        <td>7th Councilor</td>
                        <td>robinhoody@gmail.com</td>
                        <td>robinhoody</td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Full Details">
                                View
                            </button>
                        </td>
                        <td>
                            <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Disable">
                                <label>
                                    <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to disable?')">
                                    <span class="lever "></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Permanent Delete">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>

                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>

</section>
<!--Section: Basic examples-->
