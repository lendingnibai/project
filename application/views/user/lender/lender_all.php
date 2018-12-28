
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
        <li class="breadcrumb-item active">All <i class="fa fa-leanpub" aria-hidden="true"></i></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender/transactions/withdrawals');?>">Withdrawals</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender/transactions/monthly_returned');?>">Monthly returned</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender/transactions/investment_returned');?>">Investment returned</a></li>
      </ol>

      <div class="row mt-3" style="min-height: 600px">
        
        <div class="col-md-12"> 

          <div class="card table-responsive">
              <h4 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">Transactions History</h4>
              <div class="card-body">
                  <table id="dtBasicExample" class="table table-sm table-bordered" cellspacing="0" width="100%">
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
                      <?php $seq = $lender_transactions->num_rows()?>
                      <?php if ($lender_transactions->num_rows() > 0){?>
                          <?php foreach ($lender_transactions->result() as $row) {?>
                            <tr>
                              <th scope="row"><?php echo $seq?></th>
                              <th><?php echo $row->reference_code?></th>
                              <td class="text-right"><?php echo $row->credit?></td>
                              <td class="text-right"><?php echo $row->debit?></td>
                              <td><?php echo $row->type?></td>
                              <td class="text-right"><?php echo $row->balance?></td>
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
                          <th class="text-right">Dedit</th>
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
      <!-- end intro -->
  </div>
</main>
