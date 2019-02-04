<section class="wow fadeIn">
  <div style="min-height: 550px;">
      <div class="card p-3">
      <h6 class="card-title">Amount Set-up Min & Max</h6>
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">Type</th>
            <th scope="col" class="text-right">Minimum</th>
            <th scope="col" class="text-right">Maximun</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Loan Amount</th>
            <td class="text-right"><?php echo number_format($min_loan)?></td>
            <td class="text-right"><?php echo number_format($max_loan)?></td>
            <td class="text-center">
              <a class="text-info" data-toggle="modal" data-target="#setLoanModal">Update</a>
            </td>
          </tr>
          <tr>
            <th scope="row">Investment Amount</th>
            <td class="text-right"><?php echo number_format($min_invest)?></td>
            <td class="text-right"><?php echo number_format($max_invest)?></td>
            <td class="text-center">
              <a class="text-info" data-toggle="modal" data-target="#setInvestModal">Update</a>
          </tr>
        </tbody>
      </table>

      <h6 class="card-title">Loan Interest Rate Set-up</h6>
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">1 Month</th>
            <th scope="col">2 Months</th>
            <th scope="col">3 Months</th>
            <th scope="col">4 Months</th>
            <th scope="col">5 Months</th>
            <th scope="col">6 Months</th>
            <th scope="col">7 Months</th>
            <th scope="col">8 Months</th>
            <th scope="col">9 Months</th>
            <th scope="col">10 Months</th>
            <th scope="col">11 Months</th>
            <th scope="col">12 Months</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-right"><?php echo $one_mo ?>%</td>
            <td class="text-right"><?php echo $two_mo ?>%</td>
            <td class="text-right"><?php echo $three_mo ?>%</td>
            <td class="text-right"><?php echo $four_mo ?>%</td>
            <td class="text-right"><?php echo $five_mo ?>%</td>
            <td class="text-right"><?php echo $six_mo ?>%</td>
            <td class="text-right"><?php echo $seven_mo ?>%</td>
            <td class="text-right"><?php echo $eight_mo ?>%</td>
            <td class="text-right"><?php echo $nine_mo ?>%</td>
            <td class="text-right"><?php echo $ten_mo ?>%</td>
            <td class="text-right"><?php echo $eleven_mo ?>%</td>
            <td class="text-right"><?php echo $twelve_mo ?>%</td>
            <td class="text-center">
              <a class="text-info" data-toggle="modal" data-target="#setLoanRateModal">Update</a>
            </td>
          </tr>
        </tbody>
      </table>

      <h6 class="card-title">Set Monthly Terms</h6>
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">1 Month</th>
            <th scope="col">2 Months</th>
            <th scope="col">3 Months</th>
            <th scope="col">4 Months</th>
            <th scope="col">5 Months</th>
            <th scope="col">6 Months</th>
            <th scope="col">7 Months</th>
            <th scope="col">8 Months</th>
            <th scope="col">9 Months</th>
            <th scope="col">10 Months</th>
            <th scope="col">11 Months</th>
            <th scope="col">12 Months</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-right"><?php echo ($mt_one_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_two_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_three_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_four_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_five_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_six_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_seven_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_eight_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_nine_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_ten_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_eleven_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-right"><?php echo ($mt_twelve_mo != 0) ? 'Active' : 'Inactive'; ?></td>
            <td class="text-center">
              <a class="text-info" data-toggle="modal" data-target="#selectLoanTerm">Update</a>
            </td>
          </tr>
        </tbody>
      </table>

      <h6 class="card-title">Penalty & Rebate Set-up</h6>
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">Type</th>
            <th scope="col" class="text-right">Rate</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Rebate Rate</th>
            <td class="text-right"><?php echo $rebate_rate ?>%</td>
            <td class="text-center">
              <a class="text-info" data-toggle="modal" data-target="#setRebateModal">Update</a>
            </td>
          </tr>

          <tr>
            <th scope="row">Penalty Rate</th>
            <td class="text-right"><?php echo $penalty_rate ?>%</td>
            <td class="text-center">
              <a class="text-info" data-toggle="modal" data-target="#setPenaltyModal">Update</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Modal set loan amount-->
<div class="modal fade" id="setLoanModal" tabindex="-1" role="dialog" aria-labelledby="setLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="loan_amount_form" method="post" action="<?php echo base_url('barangay/set_loan_amount')?>">
              <div class="modal-header">
                  <h5 class="modal-title h6" id="setLoanModalLabel">Set Min & Max Loan Amount</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="min_loan_amount" name="min_loan_amount" value="<?php echo $min_loan?>" class="form-control">
                    <label for="min_loan_amount" >Minimum amount</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="max_loan_amount" name="max_loan_amount" value="<?php echo $max_loan?>" class="form-control">
                    <label for="max_loan_amount" >Maximun amount</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="password" id="loan_amount_password" name="loan_amount_password" class="form-control">
                    <label for="loan_amount_password">Password</label>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal laon rate-->
<div class="modal fade" id="setLoanRateModal" tabindex="-1" role="dialog" aria-labelledby="setLoanRateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="loan_rate_form" method="post" action="<?php echo base_url('barangay/set_loan_rate')?>">
            <div class="modal-header">
                <h5 class="modal-title h6" id="setLoanRateLabel">Set Loan Interest Rates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <!-- Material form row -->

              <!-- Grid row -->
              <div class="form-row">
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="one_mo" name="one_mo" value="<?php echo $one_mo ?>" class="form-control">
                          <label for="one_mo">1 Month (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="two_mo" name="two_mo" value="<?php echo $two_mo ?>" class="form-control">
                          <label for="two_mo">2 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="three_mo" name="three_mo" value="<?php echo $three_mo ?>" class="form-control">
                          <label for="three_mo">3 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="four_mo" name="four_mo" value="<?php echo $four_mo ?>" class="form-control">
                          <label for="four_mo">4 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
              </div>
              <!-- Grid row -->
              <!-- Grid row -->
              <div class="form-row">
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="five_mo" name="five_mo" value="<?php echo $five_mo ?>" class="form-control">
                          <label for="five_mo">5 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="six_mo" name="six_mo" value="<?php echo $six_mo ?>" class="form-control">
                          <label for="six_mo">6 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="seven_mo" name="seven_mo" value="<?php echo $seven_mo ?>" class="form-control">
                          <label for="seven_mo">7 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="eight_mo" name="eight_mo" value="<?php echo $eight_mo ?>"  class="form-control">
                          <label for="eight_mo">8 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
              </div>
              <!-- Grid row -->
              <!-- Grid row -->
              <div class="form-row">
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="nine_mo" name="nine_mo" value="<?php echo $nine_mo ?>" class="form-control">
                          <label for="nine_mo">9 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="ten_mo" name="ten_mo" value="<?php echo $ten_mo ?>" class="form-control">
                          <label for="ten_mo">10 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="eleven_mo" name="eleven_mo" value="<?php echo $eleven_mo ?>" class="form-control">
                          <label for="eleven_mo">11 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <!-- Material input -->
                      <div class="md-form">
                          <input type="text" id="twelve_mo" name="twelve_mo" value="<?php echo $twelve_mo ?>" class="form-control">
                          <label for="twelve_mo">12 Months (%)</label>
                      </div>
                  </div>
                  <!-- Grid column -->
              </div>
              <!-- Grid row -->
                
                <!-- Material input -->
                <div class="md-form">
                    <input type="password" id="loan_rate_password" name="loan_rate_password" class="form-control">
                    <label for="loan_rate_password">Password</label>
                </div>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Modal laon term-->
<div class="modal fade" id="selectLoanTerm" tabindex="-1" role="dialog" aria-labelledby="selectLoanTermLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="loan_term_form" method="post" action="<?php echo base_url('barangay/set_loan_term')?>">
            <div class="modal-header">
                <h5 class="modal-title h6" id="selectLoanTermLabel">Activate Loan Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <!-- Material form row -->

              <!-- Grid row -->
              <div class="form-row">
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_one_mo" id="mt_one_mo">
                          <option value="0">Inactivate</option>
                          <option value="1" <?php echo ($mt_one_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>1 Month</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_two_mo" id="mt_two_mo">
                          <option value="0">Inactivate</option>
                          <option value="2" <?php echo ($mt_two_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>2 Months</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_three_mo" id="mt_three_mo">
                          <option value="0">Inactivate</option>
                          <option value="3" <?php echo ($mt_three_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>3 Months</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_four_mo" id="mt_four_mo">
                          <option value="0">Inactivate</option>
                          <option value="4" <?php echo ($mt_four_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>4 Months</label>
                  </div>
                  <!-- Grid column -->
              </div>
              <!-- Grid row -->
              <!-- Grid row -->
              <div class="form-row">
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_five_mo" id="mt_five_mo">
                          <option value="0">Inactivate</option>
                          <option value="5" <?php echo ($mt_five_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>5 Months</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_six_mo" id="mt_six_mo">
                          <option value="0">Inactivate</option>
                          <option value="6" <?php echo ($mt_six_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>6 Months</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_seven_mo" id="mt_seven_mo">
                          <option value="0">Inactivate</option>
                          <option value="7" <?php echo ($mt_seven_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>7 Months</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_eight_mo" id="mt_eight_mo">
                          <option value="0">Inactivate</option>
                          <option value="8" <?php echo ($mt_eight_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>8 Months</label>
                  </div>
                  <!-- Grid column -->
              </div>
              <!-- Grid row -->
              <!-- Grid row -->
              <div class="form-row">
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_nine_mo" id="mt_nine_mo">
                          <option value="0">Inactivate</option>
                          <option value="9" <?php echo ($mt_nine_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>9 Months</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_ten_mo" id="mt_ten_mo">
                          <option value="0">Inactivate</option>
                          <option value="10" <?php echo ($mt_ten_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>10 Months</label>
                  </div>
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_eleven_mo" id="mt_eleven_mo">
                          <option value="0">Inactivate</option>
                          <option value="11" <?php echo ($mt_eleven_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>11 Months</label>
                  </div>
                  <!-- Grid column -->
                  <!-- Grid column -->
                  <div class="col">
                      <select class="mdb-select" name="mt_twelve_mo" id="mt_twelve_mo">
                          <option value="0">Inactivate</option>
                          <option value="12" <?php echo ($mt_twelve_mo != 0) ? 'selected' : ''; ?>>Activate</option>
                      </select>
                      <label>12 Months</label>
                  </div>
              </div>
              <!-- Grid row -->
                
                <!-- Material input -->
                <div class="md-form">
                    <input type="password" id="loan_term_password" name="loan_term_password" class="form-control">
                    <label for="loan_term_password">Password</label>
                </div>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>

<!-- Modal set rebate percent-->
<div class="modal fade" id="setRebateModal" tabindex="-1" role="dialog" aria-labelledby="setRebateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="rebate_rate_form" method="post" action="<?php echo base_url('barangay/set_rebate_rate')?>">
              <div class="modal-header">
                  <h5 class="modal-title h6" id="setRebateModalLabel">Set Rebate Percent</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="rebate_rate" name="rebate_rate" value="<?php echo $rebate_rate?>" class="form-control">
                    <label for="rebate_rate" >Rebate rate (%)</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="password" id="rebate_rate_password" name="rebate_rate_password" class="form-control">
                    <label for="rebate_rate_password">Password</label>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
              </div>
          </form>
        </div>
    </div>
</div>

<!-- Modal set penalty percent-->
<div class="modal fade" id="setPenaltyModal" tabindex="-1" role="dialog" aria-labelledby="setPenaltyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="penalty_rate_form" method="post" action="<?php echo base_url('barangay/set_penalty_rate')?>">
              <div class="modal-header">
                  <h5 class="modal-title h6" id="setPenaltyModalLabel">Set Penalty Percent</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="penalty_rate" name="penalty_rate" value="<?php echo $penalty_rate?>" class="form-control">
                    <label for="penalty_rate" >Penalty rate (%)</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="password" id="penalty_rate_password" name="penalty_rate_password" class="form-control">
                    <label for="penalty_password">Password</label>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal set invest amount-->
<div class="modal fade" id="setInvestModal" tabindex="-1" role="dialog" aria-labelledby="setInvestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="invest_amount_form" method="post" action="<?php echo base_url('barangay/set_invest_amount')?>">
              <div class="modal-header">
                  <h5 class="modal-title h6" id="setInvestLabel">Set Min & Max Investment Amount</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="min_invest_amount" name="min_invest_amount" value="<?php echo $min_invest?>" class="form-control">
                    <label for="min_invest_amount" >Minimum amount</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="max_invest_amount" name="max_invest_amount" value="<?php echo $max_invest?>" class="form-control">
                    <label for="max_invest_amount" >Maximun amount</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="password" id="invest_amount_password" name="invest_amount_password" class="form-control">
                    <label for="invest_amount_password">Password</label>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>
