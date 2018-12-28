
<style type="text/css">
    body.modal-open {
        overflow: hidden;
    }
</style>
<main class="mainlayout" style="margin-top: 6%">
  <div class="container-fluid dark-grey-text">
    <!-- Intro -->  
    <section class="section loanbook-section my-5 wow fadeIn">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower">Dashboard</a></li>
        <li class="breadcrumb-item active">Loanbook <i class="fa fa-leanpub" aria-hidden="true"></i></li>
      </ol>

      <div class="row mt-3" style="min-height: 600px">
        
        <div class="col-md-12">     
          <div class="card">
              <h4 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">List of Loans</h4>
              <div class="card-body">
                  <table id="dtBasicExample" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Seq.
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Reference Code
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Amount
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Interest
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Term
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Interest Repayment
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Monthly Repayment
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Total Repayment
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Date Begin
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Date End
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Status
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($loans->num_rows() > 0) {
                        $seq = 1;
                        foreach ($loans->result() as $row) 
                        {
                          ?>
                          <tr>
                            <th scope="row"><?php echo $seq?></th>
                            <th scope="row">
                              <a target="_blank" class="text-info" title="View status report" href="<?php echo base_url('borrower/loan_status?ref='.$row->reference_code)?>">
                                <?php echo $row->reference_code?>
                              </a>
                            </th>
                            <td class="text-right"><?php echo number_format($row->loan_amount,2)?></td>
                            <td class="text-right"><?php echo $row->interest_rate?>%</td>
                            <td><?php echo $row->loan_term?> <?php echo ($row->loan_term > 1) ? 'Months' : 'Month'?></td>
                            <td class="text-right"><?php echo number_format($row->interest_repayment,2)?></td>
                            <td class="text-right"><?php echo number_format($row->monthly_repayment,2)?></td>
                            <td class="text-right"><?php echo number_format($row->total_repayment,2)?></td>
                            <td><?php echo date('Y-m-d', strtotime($row->date_created))?></td>
                            <td><?php echo date('Y-m-d', strtotime($row->end_term))?></td>
                            <td>
                            <?php
                               if ($row->status == 1) 
                               {
                                 echo 'Ongoing...';
                               }
                               elseif ($row->status == 2) 
                               {
                                 echo 'Complete';
                               }
                               elseif ($row->status == 3) 
                               {
                                  echo 'Incomplete';  
                               }
                            ?>
                              </td>
                          </tr>
                          <?php
                          $seq++;
                        }
                      }
                      else 
                      {
                         ?>
                          <tr>
                              <td colspan="11" class="text-center">
                                  No Data Found
                              </td>
                          </tr>
                         <?php
                       } 
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>Seq.</th>
                          <th>Reference Code</th>
                          <th class="text-right">Amount</th>
                          <th class="text-right">Interest</th>
                          <th>Term</th>
                          <th class="text-right">Interest Repayment</th>
                          <th class="text-right">Monthly Repayment</th>
                          <th class="text-right">Total Repayment</th>
                          <th>Date Begin</th>
                          <th>Date End</th>
                          <th>Status</th>
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
