<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-fluid modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Form</h5>
                <a href="<?php echo base_url('barangay/payments')?>" onclick="return confirm('Are you sure you want to close?')" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form id="payment_search_form" method="post" action="<?php echo  base_url('barangay/get_monthly_repayment')?>">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <!-- Material input -->
                            <div class="md-form mt-0">
                                <input type="text" id="reference_code" name="reference_code" class="form-control" required>
                                <label for="reference_code" >Reference Code</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <button type="submit" id="btn_search" class="btn mt-2 m-0 btn-sm btn-info">Search</button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="row d-none" id="no_data_found">
                                <div class="col text-center">
                                    <p class="mt-2"><strong class="text-danger">No transaction found!</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive d-none" id="loan_repayment_details" style="max-height: 500px">
                    <strong>Loan Details</strong>
                    <table class="table table-sm table-striped table-bordered border-top">
                        <thead class="teal text-white">
                          <tr>
                            <th scope="col">Borrower</th>
                            <th scope="col" class="text-right">Loan Amount</th>
                            <th scope="col" class="text-right">Interest</th>
                            <th scope="col" class="text-right">Total Repayment</th>
                            <th scope="col">Term</th>
                            <th scope="col">Date Begin</th>
                            <th scope="col">Date End</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody id="loan_details_table">

                        </tbody>
                    </table>

                  <strong>Monthly Repayments</strong> 
                  <span class="" style="margin-left: 38%"><em>Total outstanding: <span class="ajax_total_outstanding"></span></em></span>
                  <table class="table table-sm table-striped table-bordered border-top">
                    <thead>
                      <tr>
                        <th scope="col">Seq.</th>
                        <th scope="col" class="text-right">Repayment</th>
                        <th scope="col" class="text-right">Amount Paid</th>
                        <th scope="col" class="text-right">Penalty</th>
                        <th scope="col" class="text-right">Penalty Paid</th>
                        <th scope="col" class="text-right">Outstanding</th>
                        <th scope="col" class="text-right">Rebate</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody id="monthly_repayment_table">
                      
                    </tbody>
                  </table>
                </div>

                <form id="monthly_payment_form" class="d-none is_fully_paid" method="post" action="<?php echo  base_url('barangay/accept_monthly_repayment')?>">
                    <input type="hidden" id="ref_code" name="ref_code" class="form-control" required>
                    <div class="row float-right">
                        <div class="col-md-6 col-lg-6">
                            <!-- Material input -->
                            <div class="md-form mt-0">
                                <input type="text" id="payment_amount" name="payment_amount" class="form-control" required>
                                <label for="payment_amount" >Payment Amount</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <!-- Material input -->
                            <div class="md-form mt-0">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <label for="password" >Password</label>
                            </div>
                        </div>
                    </div>
                    <button class="d-none" type="submit" id="btn_submit_pay">Pay</button>
                </form>

            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('barangay/payments') ?>" type="button" class="btn btn-sm m-0 mr-1 btn-danger" onclick="return confirm('Are you sure you want to close?')">Close</a>
                <button type="button" class="is_fully_paid btn btn-sm m-0 ml-1 btn-primary disabled" id="btn_pay">Pay</button>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-sm btn-info m-0 mb-2" data-toggle="modal" data-target="#exampleModal">
Payment
</button>

<section class="wow fadeIn transaction_tabale">
    <!-- Button trigger modal -->
    <div class="row" style="min-height: 550px;">
        <div class="col-12">
            <div class="card table-responsive">
              <h5 class="p-2 m-0 teal text-center rounded-top text-white">Payments History</h5>
              <div class="card-body">
                  <table id="dtBasicExample" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm" width="10%">Seq.
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Reference Code
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Credit
                          <i class="ml-2 fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Debit
                          <i class="ml-2 fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Type
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Balance
                          <i class="ml-2 fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Date & Time
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $seq = $transaction_payments->num_rows()?>
                      <?php if ($transaction_payments->num_rows() > 0){?>
                        <?php foreach ($transaction_payments->result() as $row){?>
                        <tr>
                          <th scope="row"><?php echo $seq?></th>
                          <th><?php echo $row->reference_code?></th>
                          <td class="text-right"><?php echo number_format($row->credit,2) ?></td>
                          <td class="text-right"><?php echo number_format($row->debit,2) ?></td>
                          <td><?php echo $row->type ?></td>
                          <td class="text-right">₱ <?php echo number_format($row->balance,2) ?></td>
                          <td><?php echo date('Y-m-d H:i:s', strtotime($row->date_created)) ?></td>
                        </tr>
                        <?php $seq--;}?>
                      <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>Seq.</th>
                          <th>Reference Code</th>
                          <th class="text-right">Credit</th>
                          <th class="text-right">Debit</th>
                          <th>Type</th>
                          <th class="text-right">Balance</th>
                          <th>Date & Time</th>
                      </tr>
                    </tfoot>
                  </table>

                </div>

            </div>
        </div>
    </div>
</section>