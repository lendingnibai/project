<style type="text/css">
    body.modal-open {
        overflow: hidden;
    }
</style>
<main class="mainlayout" style="margin-top: 6%">
  <div class="container-fluid dark-grey-text">
    <!-- Intro -->  
    <section class="section investbook-section my-5 wow fadeIn">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender');?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender/transactions');?>">All</a></li>
        <li class="breadcrumb-item active">Withdrawals <i class="fa fa-leanpub" aria-hidden="true"></i></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender/transactions/monthly_returned');?>">Monthly returned</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender/transactions/investment_returned');?>">Investment returned</a></li>
      </ol>

      <div class="row mt-3" style="min-height: 600px">
        
        <div class="col-md-12"> 

        <button class="btn btn-sm btn-primary mb-2 m-0" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modal_withdraw">Withdraw</button>
          
          <?php $seq = $request_withdrawals->num_rows()?>
            <?php if ($request_withdrawals->num_rows() > 0){?>
              <table class="table-sm table table-bordered text-black alert-info">
                <tr>
                  <th>Status</th>
                  <th>Reference Code</th>
                  <th class="text-right">Amount</th>
                  <th>Date & Time</th>
                  <th>Actions</th>
                </tr>
                <?php $seq = $request_withdrawals->num_rows()?>
                <?php foreach ($request_withdrawals->result() as $row){?>
                  <tr>
                    <td>Reserved</td>
                    <td><strong><?php echo $row->reference_code?></strong></td>
                    <td class="text-right">₱ <?php echo number_format($row->amount,2) ?></td>
                    <td><?php echo date('Y-m-d H:i:s', strtotime($row->date_created)) ?></td>
                    <td>
                      <a onclick="return confirm('Are you sure you want to cancel?')" href="<?php echo base_url('lender/cancel_request/'.$row->withdrawal_id.md5($seq))?>" class="btn btn-sm m-0 btn-danger p-1">Cancel</a>
                    </td>
                  </tr>
                <?php $seq--; }?>
              </table>
            <?php }?>

          <div class="card table-responsive">
              <h4 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">Withdrawals History</h4>
              <div class="card-body">
                  <table id="dtBasicExample" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
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
                        <th class="th-sm text-right">Balance
                          <i class="ml-2 fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Date & Time
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $seq = $my_withdrawals->num_rows()?>
                      <?php if ($my_withdrawals->num_rows() > 0){?>
                        <?php foreach ($my_withdrawals->result() as $row){?>
                        <tr>
                          <th scope="row"><?php echo $seq?></th>
                          <th><?php echo $row->reference_code?></th>
                          <td class="text-right"><?php echo number_format($row->credit,2) ?></td>
                          <td class="text-right"><?php echo number_format($row->debit,2) ?></td>
                          <td class="text-right"><?php echo number_format($row->balance,2) ?></td>
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
      <!-- end intro -->
  </div>
</main>

<!-- modal withdraw -->
<!-- Modal -->
<div class="modal fade" id="modal_withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog modal-lg" role="document">

    <form id="withdraw_data_form" action="<?php echo base_url('lender/withdraw_cash')?>" method="post">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Withdraw Money </h5>
          <?php
          if (!$_SESSION['registered_brgy_id']) 
          {
            ?>
            <input type="hidden" id="other_brgy_indicator_w" name="other_brgy_indicator_w" value="ACTIVE" class="mb-3 form-control">
            <div class="form-group ml-2">
              <select class="form-control" id="barangay_for_other_w" name="barangay_for_other_w">
                  <option value="" selected disabled>Select barangay you have available balance</option>
                  <?php foreach ($my_available_balance_from_any_brgy->result() as $row) 
                  {
                    ?>
                      <option value="<?php echo $row->registered_brgy_id.md5($row->registered_brgy_id)?>">Balance (₱ <?php echo number_format($row->current_balance,2) ?>) in <?php echo $row->barangay?></option>
                    <?php
                  }
                  ?>
              </select>
            </div>
            <?php
          }
          ?>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close_modal_1">
            <span aria-hidden="true">&times;</span>
          </button>
          <a href="<?php echo base_url('lender/transactions/withdrawals')?>">
            <button type="button" class="close d-none" id="btn_close_modal_2">
              <span aria-hidden="true" id="btn_close_modal_2">&times;</span>
            </button>
          </a>

        </div>
        <div class="modal-body">

          <div class="row" id="withdraw_data">
              <div class="col-lg-6 col-md-6 col-sm-12">
              <!--Panel-->
                <div class="card mt-1 mb-sm-3">
                    <div class="card-header white-text teal">
                        <span class="h6">Current Balance </span><i class="fa fa-2x fa-money float-right" aria-hidden="true" style="margin-top: -6px"></i>
                    </div>
                    <?php
                      if ($lender_current_balance->num_rows() > 0) 
                      {
                          foreach ($lender_current_balance->result() as $row) 
                          {
                          ?>
                              <h4 class="ml-4 mt-4 mb-5 dark-grey-text font-weight-bold"><i class="fa fa-long-arrow-up blue-text mr-3" aria-hidden="true"></i>₱ <?php echo (!$row->current_balance) ? '0.00' : number_format($row->current_balance,2); ?></h4>
                          <?php
                          }
                      }
                      else
                      {
                      ?>
                          <h4 class="ml-4 mt-4 mb-5 dark-grey-text font-weight-bold"><i class="fa fa-long-arrow-up blue-text mr-3" aria-hidden="true"></i>₱ 0.00</h4>
                      <?php
                      }
                      ?>
                    <!--/.Card Data-->
                </div>
                <!--/.Panel-->
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Default input -->
                <label for="amount">Enter Amount</label>
                <input type="text" id="amount" name="amount_w" class="mb-3 form-control">

                <!-- Default input -->
                <label for="password">Password</label>
                <input type="password" id="password_w" name="password_w" class="form-control">
              </div>
          </div>
          <!-- end row -->
          <div class="d-none" id="withdraw_submited">
            <div class="alert alert-info mt-3" role="alert">
            You may withdraw your cash balance at your Brgy. Just present the reference code & 1 valid ID.
            </div>

            <table class="table table-sm table-bordered mb-1">
              <thead>
                <tr>
                  <th width="33.3%">Amount to be withdrawn</th>
                  <th width="33.3%">Reference Code</th>
                  <th width="33.3%">Date & Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" id="withdraw_amount"></th>
                  <td id="reference_code"></td>
                  <td id="date_time"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" id="btn_cancel" class="btn btn-sm btn-danger mr-1 m-0">Cancel</button>
          <button type="submit" id="btn_withdraw" class="btn btn-sm btn-primary ml-1 m-0">Withdraw</button>
          <button type="button" data-dismiss="modal" id="btn_close" class="d-none btn btn-sm btn-primary ml-1 m-0">Close</button>
          <a href="<?php echo base_url('lender/transactions/withdrawals')?>">
            <button type="button" id="btn_close_href" class="d-none btn btn-sm btn-primary ml-1 m-0">Close</button>
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- end modal withdraw -->
