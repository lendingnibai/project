
<!--Section: Basic examples-->
<section class="wow fadeIn">
    New feedback.
    <div class="switch default-switch">
        <label>
            hide
            <input type="checkbox" checked="checked">
            <span class="lever "></span>
            show
        </label>
    </div>
    <!-- new feedbacks -->
    <div class="card mb-2">
        <div class="card-body">
            <!--Table-->
            <p class="dark-grey-text">Feedback submited <a href="#!" class="float-right red-text"><i class="fa fa-times" aria-hidden="true"></i></a></p>
            <table class="table table-responsive-md">

                <!--Table head-->
                <thead class="mdb-color rounded teal">
                    <tr class="text-white">
                        <th>#</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Rating</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Negative</th>
                        <th>Positive</th>
                        <th>Feedback</th>
                        <th>Accept</th>
                        <th>Reject</th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Elvin Marvey Cabua</td>
                        <td>25</td>
                        <td>5</td>
                        <td>bsitcabua@gmail.com</td>
                        <td>bsitcabua</td>
                        <td>
                            <!-- Material inline 1  ang id ug ang for gamiton ana ang id sa user--> 
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="1" name="inlineMaterialRadiosExample">
                              <label class="form-check-label" for="1"></label>
                            </div>
                        </td>
                        <td>
                            <!-- Material inline 2 -->
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="2" name="inlineMaterialRadiosExample">
                              <label class="form-check-label" for="2"></label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">
                                View
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-default m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Accept">
                                <b>&#x2714;</b>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Reject">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Joseph Vincent Alesna</td>
                        <td>21</td>
                        <td>4</td>
                        <td>alesnaj@gmail.com</td>
                        <td>jalesna</td>
                        <td>
                            <!-- Material inline 1 -->
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="3" name="inlineMaterialRadiosExample">
                              <label class="form-check-label" for="3"></label>
                            </div>
                        </td>
                        <td>
                            <!-- Material inline 2 -->
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="4" name="inlineMaterialRadiosExample">
                              <label class="form-check-label" for="4"></label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">
                                View
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-default m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Accept">
                                <b>&#x2714;</b>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Reject">
                                <b>&#10008;</b>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>John Doe Birao</td>
                        <td>23</td>
                        <td>5</td>
                        <td>biraoj@gmail.com</td>
                        <td>johnbirao</td>
                        <td>
                            <!-- Material inline 1 -->
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="5" name="inlineMaterialRadiosExample">
                              <label class="form-check-label" for="5"></label>
                            </div>
                        </td>
                        <td>
                            <!-- Material inline 2 -->
                            <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input" id="6" name="inlineMaterialRadiosExample">
                              <label class="form-check-label" for="6"></label>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-info m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">
                                View
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-default m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Accept">
                                <b>&#x2714;</b>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger m-0 btn-sm py-1 px-3" data-toggle="tooltip" data-placement="top" title="Reject">
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
<!-- list of feedback -->
<section class="wow fadeIn">
    <div class="row" style="min-height: 700px">
        
        <div class="col-md-12">     
            <div class="card">
                <h2 class="p-2 m-0 teal text-center rounded-top text-white">List of Feedback</h2>
                <div class="card-body">
                    <table id="datatables" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Rating</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Feedback</th>
                                <th>Hide/Show</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Rating</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Feedback</th>
                                <th>Hide/Show</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Lender</td>
                                <td>Hidden</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Lender</td>
                                <td>Hidden</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Borrower</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Borrower</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Borrower</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Borrower</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Lender</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Borrower</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Borrower</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Lender</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>25</td>
                                <td>5</td>
                                <td>sukibyks@gmail.com</td>
                                <td>sukibyks</td>
                                <td>Borrower</td>
                                <td>Shown</td>
                                <td>
                                    <button class="btn btn-info btn-sm m-0 py-1 px-3" data-toggle="tooltip" data-placement="top" title="View Feedback">View</button>
                                </td>
                                <td>
                                    <div class="switch default-switch" data-toggle="tooltip" data-placement="top" title="Hide">
                                        <label>
                                            <input type="checkbox" checked="checked" onclick="return confirm('Are you sure you want to hide?')">
                                            <span class="lever "></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</section>
<!--Section: Basic examples-->
