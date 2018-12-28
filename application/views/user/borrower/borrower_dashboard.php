<main class="mainlayout" style="margin-top: 6%">

    <div class="container-fluid">

    		<!-- Intro -->  
        <section class="section completeprofile-section my-5">
        	<ol class="breadcrumb">
    		    <li class="breadcrumb-item active">Dashboard <i class="fa fa-tachometer" aria-hidden="true"></i></li>
    		</ol>

          	<!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-xl-3 col-md-6 mb-4">

                    <!--Card teal accent-4-->
                    <div class="card classic-admin-card teal accent-4">
                        <div class="card-body">
                            <div class="pull-right">
                                <i class="fa fa-2x fa-money"></i>
                            </div>
                            <p class="white-text">AMOUNT LOAN</p>
                            <h4 >₱ 2,000.00</h4>
                            <small>August 1, 2018. <a href="#" class="white-text float-right mt-1">View transactions</a></small>
                        </div>
                        <div class="progress md-progress" style="height: 10px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 100%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-body">
                            <p>Interest rate 10%</p>
                        </div>
                    </div>
                    <!--/.Card teal accent-4-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-md-6 mb-4">

                    <!--Card teal accent-4-->
                    <div class="card classic-admin-card teal accent-4">
                        <div class="card-body">
                            <div class="pull-right">
                                <i class="fa fa-2x fa-calendar-check-o"></i>
                            </div>
                            <p class="white-text">REPAYMENT (<?php echo strtoupper(date('F')) ;?>)</p>
                            <h4 >₱ 1,100.00</h4>
                            <small>Due date <?php echo date('F');?> 31, 2018.</small>
                            <small>
                                <a href="#" class="white-text float-right mt-1 animated bounce">Pay early</a>
                            </small>
                        </div>
                        <div class="progress md-progress" style="height: 10px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 50%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-body">
                            <p>Monthly amortization ₱ 1,100</p>
                        </div>
                    </div>
                    <!--/.Card teal accent-4-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-md-6 mb-4">

                    <!--Card teal accent-4-->
                    <div class="card classic-admin-card teal accent-4">
                        <div class="card-body">
                            <div class="pull-right">
                                <i class="fa fa-2x fa-calendar"></i>
                            </div>
                            <p class="white-text">REMAINING MONTHS</p>
                            <h4 >2 Months</h4>
                            <small>August - September</small>
                        </div>
                        <div class="progress md-progress" style="height: 10px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 100%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-body">
                            <p>2 months term</p>
                        </div>
                    </div>
                    <!--/.Card teal accent-4-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-md-6 mb-4">

                    <!--Card teal accent-4-->
                    <div class="card classic-admin-card teal accent-4">
                        <div class="card-body">
                            <div class="pull-right">
                                <i class="fa fa-2x fa-balance-scale"></i>
                            </div>
                            <p class="white-text">OUTSTANDING BALANCE</p>
                            <h4 >₱ 1,100.00</h4>
                            <small>Good</small>
                        </div>
                        <div class="progress md-progress" style="height: 10px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 100%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-body">
                            <p>Accrued interest 7%</p>
                        </div>
                    </div>
                    <!--/.Card teal accent-4-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </section>
        <!-- end intro -->

        <section class="section table-section my-5 wow fadeIn">
        	<div class="row">
                <!--Grid column-->
                <div class="col-xl-6 col-md-6 mb-4">
                    <!--Card teal accent-4-->
                    <div class="card classic-admin-card">
                        <div class="table-responsive" style="max-height: 500px">
                        	<div class="teal accent-4 sticky-top z-depth-1 rounded-top">
                        		<h5 class="h6 p-2">Payments Sort by:
                                    <select class="rounded">
                                        <option>ID</option>
                                        <option>Date</option>
                                      </select>
                                </h5>
                        	</div>
    					  <table class="table">
    					    <thead>
    					      <tr>
    					        <th scope="col">Loan ID</th>
    					        <th scope="col">Term</th>
    					        <th scope="col">Amount Paid</th>
    					        <th scope="col">Payment Date</th>
    					      </tr>
    					    </thead>
    					    <tbody>
    					      <tr>
    					        <td>1234</td>
    					        <td>2</td>
    					        <td>₱ 1,100.00</td>
    					        <td>08/26/2018</td>
    					      </tr>
    					      <tr>
    					        <td>1235</td>
    					        <td>6</td>
    					        <td>₱ 1,500.00</td>
    					        <td>07/26/2018</td>
    					      </tr>
    					      <tr>
    					        <td>1234</td>
    					        <td>2</td>
    					        <td>₱ 1,100.00</td>
    					        <td>08/26/2018</td>
    					      </tr>
    					      <tr>
    					        <td>1235</td>
    					        <td>6</td>
    					        <td>₱ 1,500.00</td>
    					        <td>07/26/2018</td>
    					      </tr>
    					      <tr>
    					        <td>1234</td>
    					        <td>2</td>
    					        <td>₱ 1,100.00</td>
    					        <td>08/26/2018</td>
    					      </tr>
    					    </tbody>
    					  </table>
    					  <hr>
    					</div>
    					<a href="<?php echo base_url('borrower/payments');?>" class="m-auto pb-3">View all</a>
                    </div>
                    <!--/.Card teal accent-4-->
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card teal accent-4-->
                    <div class="card classic-admin-card teal accent-4">
                    	<div class="teal accent-4 sticky-top z-depth-1 rounded-top">
                        	<h5 class="h6 m-2">Loan Status</h5>
                        </div>
                        <div class="white" style="min-height: 400px">
                        	<div class="container-fluid m-2">
                        		<i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                        		<span class="dark-grey-text">12346 - ₱ 5,500</span>
                        		<span class="dark-grey-text ml-2">Pending...</span>
                        		<small>
                        			<a href="#!" data-toggle="tooltip" data-placement="top" title="View checklist" class="float-right mr-5">View</a>
                        			<hr>
                        		</small>
                        	</div>

                        	<div class="container-fluid m-2">
                        		<i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                        		<span class="dark-grey-text">12346 - ₱ 5,500</span>
                        		<span class="red-text ml-2">Rejected</span>
                        		<small>
                        			<a href="#!" data-toggle="tooltip" data-placement="top" title="View checklist" class="float-right mr-5">View</a>
                        			<hr>
                        		</small>
                        	</div>

                        	<div class="container-fluid m-2">
                        		<i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                        		<span class="dark-grey-text">12346 - ₱ 5,500</span>
                        		<span class="blue-text ml-2">Approved</span>
                        		<small>
                        			<a href="#!" data-toggle="tooltip" data-placement="top" title="View checklist" class="float-right mr-5">View</a>
                        			<hr>
                        		</small>
                        	</div>
                        </div>
                    </div>
                    <!--/.Card teal accent-4-->
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card teal accent-4-->
                    <div class="card classic-admin-card teal accent-4">
                    	<div class="teal accent-4 sticky-top z-depth-1 rounded-top">
                        	<h5 class="h6 m-2">Reserved</h5>
                        </div>
                        <div class="white" style="min-height: 400px">
                        	<div class="container-fluid m-2">
                        		<i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                        		<span class="dark-grey-text">12346 - ₱ 5,500</span>
                        		<span class="dark-grey-text ml-2">Pending...</span>
                        		<small>
                        			<a href="#!" data-toggle="tooltip" data-placement="top" title="View checklist" class="ml-3">View</a>
                        			<hr>
                        		</small>
                        	</div>

                        	<div class="container-fluid m-2">
                        		<i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                        		<span class="dark-grey-text">12346 - ₱ 5,500</span>
                        		<span class="dark-grey-text ml-2">Pending...</span>
                        		<small>
                        			<a href="#!" data-toggle="tooltip" data-placement="top" title="View checklist" class="ml-3">View</a>
                        			<hr>
                        		</small>
                        	</div>

                        	<div class="container-fluid m-2">
                        		<i class="fa fa-file-text-o grey-text" aria-hidden="true"></i>
                        		<span class="dark-grey-text">12346 - ₱ 5,500</span>
                        		<span class="dark-grey-text ml-2">Pending...</span>
                        		<small>
                        			<a href="#!" data-toggle="tooltip" data-placement="top" title="View checklist" class="ml-3">View</a>
                        			<hr>
                        		</small>
                        	</div>
                        </div>
                    </div>
                    <!--/.Card teal accent-4-->
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </section>
    		
    </div>

</main>

