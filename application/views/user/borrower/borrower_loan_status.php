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
            <li class="breadcrumb-item"><a href="<?php echo base_url('borrower')?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Loan Status <i class="fa fa-leanpub" aria-hidden="true"></i></li>
         </ol>
         <div class="row mt-3" style="min-height: 600px">
            <div class="col-md-12">
               <div class="card">
                  <h5 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">Loan Status</h5>
                  <div class="card-body table-responsive">
                     <table class="table table-sm table-bordered table-striped border-top">
                        <thead>
                           <tr>
                              <th scope="col">Reference Code</th>
                              <th scope="col" class="text-right">Amount</th>
                              <th scope="col" class="text-right">Interest</th>
                              <th scope="col" class="text-right">Interest Repayment</th>
                              <th scope="col" class="text-right">Monthly Repayment</th>
                              <th scope="col" class="text-right">Total Repayment</th>
                              <th scope="col">Term</th>
                              <th scope="col">Date Begin</th>
                              <th scope="col">Date End</th>
                              <th scope="col">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if($my_loan->num_rows() > 0){?>
                           <?php foreach ($my_loan->result() as $row){?>
                           <?php $rebate_rate = $row->rebate_rate?>
                           <?php $penalty_rate = $row->penalty_rate?>
                           <tr>
                              <th><?php echo $row->reference_code?></th>
                              <td class="text-right"><?php echo number_format($row->loan_amount,2)?></td>
                              <td class="text-right"><?php echo $row->interest_rate?> %</td>
                              <td class="text-right"><?php echo number_format($row->interest_repayment,2)?></td>
                              <td class="text-right"><?php echo number_format($row->monthly_repayment,2)?></td>
                              <td class="text-right"><?php echo number_format($row->total_repayment,2)?></td>
                              <td><?php echo $row->loan_term?> <?php echo ($row->loan_term > 1) ? 'Months' : 'Month';?></td>
                              <td><?php echo date('Y-m-d', strtotime($row->date_created))?></td>
                              <td><?php echo date('Y-m-d', strtotime($row->end_term))?></td>
                              <td>
                                 <?php
                                    if ($row->status == 1){
                                      echo 'Ongoing...';
                                    }
                                    elseif ($row->status == 2) {
                                      echo 'Complete';
                                    }
                                    elseif ($row->status == 3) {
                                      echo 'Incomplete';
                                    }
                                    ?>
                              </td>
                           </tr>
                           <?php }?>
                           <?php }else{ ?>
                           <tr>
                              <td colspan="10" class="text-center">
                                 No Data Found
                              </td>
                           </tr>
                           <?php }?>
                        </tbody>
                     </table>
                     <div class="container">
                        <h6>Monthly Repayments <small class="ml-5">Note: <em>Pay early 1 week before due date to get your rebates</em></small></h6>
                        <table class="table table-sm table-bordered table-striped border-top">
                           <thead>
                              <tr>
                                 <th scope="col">Seq.</th>
                                 <th scope="col"></th>
                                 <th scope="col" class="text-right">Repayment</th>
                                 <th scope="col"></th>
                                 <th scope="col" class="text-right">Amount Paid</th>
                                 <th scope="col"></th>
                                 <th scope="col" class="text-right">Penalty</th>
                                 <th scope="col"></th>
                                 <th scope="col" class="text-right">Penalty Paid</th>
                                 <th scope="col"></th>
                                 <th scope="col" class="text-right">Outstanding</th>
                                 <th scope="col"></th>
                                 <th scope="col" class="text-right">Rebate</th>
                                 <th scope="col"></th>
                                 <th scope="col">Due Date</th>
                                 <th scope="col"></th>
                                 <th scope="col">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if ($monthly_repayments->num_rows() > 0) {?>
                              <?php $seq = 1; ?>
                              <?php $outstanding = 0; ?>
                              <?php foreach ($monthly_repayments->result() as $row){?>
                              <?php $outstanding = ($row->monthly_repayment + $row->penalty) - ($row->amount_paid + $row->penalty_paid)?>
                              <tr>
                                 <td><?php echo $seq ?></td>
                                 <td></td>
                                 <td class="text-right"><?php echo number_format($row->monthly_repayment,2)?></td>
                                 <td></td>
                                 <td class="text-right"><?php echo number_format($row->amount_paid,2)?></td>
                                 <td></td>
                                 <td class="text-right">
                                    <?php echo ($penalty_rate > 0) ? number_format($row->penalty,2) : 'N/A'?>  
                                 </td>
                                 <td></td>
                                 <td class="text-right">
                                    <?php echo ($penalty_rate > 0) ? number_format($row->penalty_paid,2) : 'N/A'?>  
                                 </td>
                                 <td></td>
                                 <td class="text-right"><?php echo number_format($outstanding,2)?></td>
                                 <td></td>
                                 <td class="text-right">
                                    <?php echo ($rebate_rate > 0) ? number_format($row->rebate,2) : 'N/A'?>  
                                 </td>
                                 <td></td>
                                 <td><?php echo date('Y-m-d H:i:s', strtotime($row->due_date))?></td>
                                 <td></td>
                                 <td><?php echo ($row->is_fully_paid == 1 ) ? 'Fully paid' : 'Pending...'; ?></td>
                              </tr>
                              <?php $seq++; } ?>
                              <?php }else{ ?>
                              <tr>
                                 <td colspan="17" class="text-center">
                                    No Data Found
                                 </td>
                              </tr>
                              <?php }?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end intro -->
   </div>
</main>