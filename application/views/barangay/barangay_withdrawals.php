<!--Section: messages examples-->
<section class="">
    <!-- Investment fund -->
    <div class="card mb-2">

        <div class="card-body table-responsive">
            <!--Table-->
            <small class="float-right dark-grey-text">Withdrawal request received</small>
            <br>
            <form method="GET" action="<?php echo  base_url('barangay/withdrawals')?>">
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
                        <?php if ($request_withdrawal != null) {
                            echo ($request_withdrawal->num_rows() > 0 ) ? 'Results Found' : 'No Results Found';
                        } ?>
                    </div>
                </div>
            </form>
            <?php if ($request_withdrawal != null) {?>

            <?php if ($request_withdrawal->num_rows() > 0 ) {?>

            <form id="withdraw_cash_form" method="post" action="<?php echo base_url('barangay/withdraw_cash')?>">
                <table class="table table-bordered border rounded table-sm">
                  <thead class="teal text-white">
                    <tr>
                        <th scope="col" class="w-25">Ref. Code</th>
                        <th scope="col" class="w-25">Name</th>
                        <th scope="col" class="w-25">Mobile No.</th>
                        <th scope="col" class="w-25">Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($user_details->result() as $row) {?>
                        <tr>
                            <th width="25%"><?php if(isset($_GET['reference_code'])){ echo $_GET['reference_code'];}?></th>
                            <td width="25%"><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name?></td>
                            <td width="25%"><?php echo $row->mobile_no?></td>
                            <td width="25%"><?php echo $row->email?></td>
                            
                            <input type="hidden" name="lender_id" id="lender_id" value="<?php echo $row->lender_id.md5('scrt2')?>">
                            <input type="hidden" name="email" id="email" value="<?php echo $row->email?>">
                            <input type="hidden" name="mobile_no" id="mobile_no" value="<?php echo $row->mobile_no?>">

                        </tr>
                    <?php }?>
                    <tr>
                      <th scope="row">
                        <?php $amount = 0.00?>
                        <?php foreach ($request_withdrawal->result() as $row){?>
                          <p class="mt-2 mb-0">Date: <?php echo $row->date_created?></p>
                        <?php $amount = $row->amount;}?>
                        <input type="hidden" name="withdrawal_id" id="withdrawal_id" value="<?php echo $row->withdrawal_id.md5('scrt3')?>">
                        <input type="hidden" name="reference_code" id="reference_code" value="<?php if(isset($_GET['reference_code'])){ echo $_GET['reference_code'];} ?>">
                      </th>
                      <td><!-- Material input -->
                        <!-- Small input -->
                        <input class="form-control disabled" type="number" id="withdraw_amount" value="<?php echo $amount?>" name="withdraw_amount" placeholder="Amount">
                      </td>
                      <td>
                          <!-- Small input -->
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                      </td>
                      <td>
                          <button type="submit" class="btn mt-1 m-0 btn-sm btn-info w-100">Withdraw</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </form>

            <?php } ?>
        <?php } ?>
        </div>
    </div>
</section>

<section class="wow fadeIn transaction_tabale">

    <div class="row" style="min-height: 500px;">
        <div class="col-12">
            <div class="card table-responsive">
              <h5 class="p-2 m-0 teal text-center rounded-top text-white">Withdrawals History</h5>
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
                      <?php $seq = $transaction_withdrawals->num_rows()?>
                      <?php if ($transaction_withdrawals->num_rows() > 0){?>
                        <?php foreach ($transaction_withdrawals->result() as $row){?>
                        <tr>
                          <th scope="row"><?php echo $seq?></th>
                          <th><?php echo $row->reference_code?></th>
                          <td class="text-right"><?php echo number_format($row->credit,2) ?></td>
                          <td class="text-right"><?php echo number_format($row->debit,2) ?></td>
                          <td><?php echo $row->type ?></td>
                          <td class="text-right"> <?php echo number_format($row->balance,2) ?></td>
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
<!--Section: end messages-->
