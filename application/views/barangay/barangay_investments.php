
<!--Section: Basic examples-->
<section class="">
    
    <!-- Investment fund -->
    <div class="card mb-2">

        <div class="card-body table-responsive">
            <!--Table-->
            <small class="float-right dark-grey-text">Receiving investment</small>
            <br>
            <form method="GET" action="<?php echo  base_url('barangay/investments')?>">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <!-- Material input -->
                        <div class="md-form mt-0">
                            <input type="text" value="<?php if(isset($_GET['reference_code'])){ echo $_GET['reference_code'];} ?>" id="" name="reference_code" class="form-control" required>
                            <label for="reference_code" >Reference Code</label>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn mt-1 m-0 btn-sm btn-info">Search</button>
                    </div>
                    <div class="col text-gray pt-1">
                        <?php if ($get_invest_app_by_ref != null) {?>
                           <?php echo ($get_invest_app_by_ref->num_rows() > 0 ) ? 'Results Found' : 'No Results Found';}?>
                    </div>
                </div>
            </form>
            <?php if ($get_invest_app_by_ref != null){?>
            <?php if ($get_invest_app_by_ref->num_rows() > 0 ){?>

            <form id="investment_received_form" method="post" action="<?php echo base_url('barangay/investment_received')?>">
                <table class="table table-bordered border rounded table-sm">
                  <thead class="teal text-white">
                    <tr>
                        <th scope="col" class="w-25">Ref. Code</th>
                        <th scope="col" class="w-25">Name</th>
                        <th scope="col" class="w-25">Mobile No.</th>
                        <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($get_invest_app_by_ref->result() as $row){?>
                        <?php $invest_amount = $row->invest_amount ?>
                        <tr>
                          <th><?php echo $row->reference_code?></th>
                          <td><?php echo $row->full_name?></td>
                          <td><?php echo $row->mobile_no?></td>
                          <td><?php echo $row->email?></td>
                            <input type="hidden" name="reference_code" id="reference_code" value="<?php echo $row->reference_code?>">
                            <input type="hidden" name="invest_term" id="invest_term" value="<?php echo $row->invest_term?>">
                            <input type="hidden" name="investment_application_id" id="investment_application_id" value="<?php echo $row->investment_application_id.md5('scrt')?>">
                            <input type="hidden" name="lender_id" id="lender_id" value="<?php echo $row->lender_id.md5('scrt2')?>">
                            <input type="hidden" name="email" id="email" value="<?php echo $row->email?>">
                            <input type="hidden" name="mobile_no" id="mobile_no" value="<?php echo $row->mobile_no?>">
                        </tr>
                    <?php }?>
                    <tr>
                      <th scope="row" class="text-right">
                      <p class="mt-2 mb-0">Investment Amount:</p>
                      
                      </th>
                      <td><!-- Material input -->
                        <!-- Small input -->
                        <input class="form-control disabled" type="text" id="invest_amount" name="invest_amount" value="<?php echo $invest_amount?>" placeholder="Amount">
                      </td>
                      <td>
                          <!-- Small input -->
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                      </td>
                      <td>
                          <button type="submit" class="btn mt-1 m-0 btn-sm btn-info w-100">Save</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </form>

            <?php }?>
            <?php }?>
        </div>
        
    </div>

    <!--Grid row-->
    <div class="row mt-3">

        <!--Grid column-->
        <div class="col-xl-4 col-md-12 mb-4">

            <!--Card-->
            <div class="card card-cascade cascading-admin-card">

                <!--Card Data-->
                <div class="admin-up">
                    <i class="fa fa-money teal"></i>
                    <div class="data">
                        <p>TOTAL INVESTMENT</p>
                        <h4 class="font-weight-bold dark-grey-text">₱ 2,000.00</h4>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated teal rounded" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--Text-->
                    <p class="card-text">Better than last week (25%)</p>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-xl-4 col-md-12 mb-4">

            <!--Card-->
            <div class="card card-cascade cascading-admin-card">

                <!--Card Data-->
                <div class="admin-up">
                    <i class="fa fa-money teal"></i>
                    <div class="data">
                        <p>ACTIVE INVESTMENT</p>
                        <h4 class="font-weight-bold dark-grey-text">₱ 2,000.00</h4>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated teal rounded" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--Text-->
                    <p class="card-text">Worse than last week (25%)</p>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-xl-4 col-md-12 mb-4">

            <!--Card-->
            <div class="card card-cascade cascading-admin-card">

                <!--Card Data-->
                <div class="admin-up">
                    <i class="fa fa-money teal"></i>
                    <div class="data">
                        <p>INTEREST RETURN</p>
                        <h4 class="font-weight-bold dark-grey-text">₱ 20,000</h4>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated teal rounded" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--Text-->
                    <p class="card-text">Worse than last week (75%)</p>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

    <!-- reserved -->

    <div class="w-100 m-auto">
    <!--Card image-->
        <div class="view gradient-card-header teal rounded mb-2">
            <!-- Chart -->
            <canvas id="monthly_investment" height="100px"></canvas>
            
        </div>
    </div>
</section>
<!--Section: Intro-->

<!-- Investment applications -->
<section class="wow fadeIn">

    <div class="row" style="min-height: 700px">
        
        <div class="col-md-12">     
            <div class="card">
                <h4 class="p-2 m-0 teal text-center rounded-top text-white">List of Investments</h4>
                <div class="card-body">
                    <table id="dtBasicExample" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm">Laon ID
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Name
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Amount
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Term
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Interest
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Begin
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">End
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Status
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Investment App
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>01</td>
                            <td>EM Cabua</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>06</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>07</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>08</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>09</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>John Doe</td>
                            <td>₱ 2,000.00</td>
                            <td>6</td>
                            <td>18%</td>
                            <td>08/26/18</td>
                            <td>02/26/19</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-info btn-sm m-0 py-1 px-3" title="View Investment Appliation">View</button>
                            </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>Loan ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Term</th>
                            <th>Interest</th>
                            <th>Begin</th>
                            <th>End</th>
                            <th>Status</th>
                            <th>Investment App</th>
                        </tr>
                      </tfoot>
                    </table>

                </div>

            </div>

        </div>

    </div>
    <!-- end of card table -->

</section>
<!--Section: end laon table's information-->