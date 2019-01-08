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
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-money"></i>
                     </div>
                     <p>AMOUNT LOAN</p>
                     <?php $total_loan = $count_loan = 0; ?>
                     <?php if ($my_loan->num_rows() > 0){?>   
                     <?php foreach ($my_loan->result() as $row){?>
                     <?php $total_loan += $row->loan_amount; ?>
                     <?php $count_loan++;?>
                     <?php }?>
                     <?php }?>
                     <h4>₱ <?php echo number_format($total_loan,2) ?></h4>
                     <small>Active (<?php echo $count_loan?>) <a href="<?php echo base_url('borrower/loanbook')?>" class="white-text float-right mt-1">View loans</a></small>
                  </div>
                  <div class="progress md-progress" style="height: 10px">
                     <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 100%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="card-body">
                     
                  </div>
               </div>
               <!--/.Card teal accent-4-->
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-xl-3 col-md-6 mb-4">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card teal accent-4">
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-calendar-check-o"></i>
                     </div>
                     <p>REPAYMENT (<?php echo strtoupper(date('F')) ;?>)</p>
                     <?php $total_monthly_repayment = 0?>
                     <?php $dates_due = ''?>
                     <?php $ctr_monthly_repayments = $monthly_repayments->num_rows()?>
                     <?php if ($ctr_monthly_repayments > 0){?>
                     <?php foreach ($monthly_repayments->result() as $row){?>
                     <?php
                     if ($ctr_monthly_repayments == 1)
                        $dates_due = ', '.date('j', strtotime($row->due_date));
                     else
                        $dates_due .= ', '.date('j', strtotime($row->due_date));
                     ?>
                     <?php $total_monthly_repayment += $row->monthly_repayment;}?>    
                     <?php }?>
                     <h4>₱ <?php echo number_format($total_monthly_repayment,2)?></h4>
                     <small>As of <?php echo ucfirst(date('F')).' '.substr($dates_due, 2). ', '.date('Y')?></small>
                  </div>
                  <div class="progress md-progress" style="height: 10px">
                     <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 50%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="card-body">
                     
                  </div>
               </div>
               <!--/.Card teal accent-4-->
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-xl-3 col-md-6 mb-4">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card teal accent-4">
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-calendar"></i>
                     </div>
                     <p>REMAINING MONTHS</p>
                     <h4>2 Months</h4>
                     <small>August - September</small>
                  </div>
                  <div class="progress md-progress" style="height: 10px">
                     <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 100%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="card-body">
                     
                  </div>
               </div>
               <!--/.Card teal accent-4-->
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-xl-3 col-md-6 mb-4">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card teal accent-4">
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-balance-scale"></i>
                     </div>
                     <p>OUTSTANDING PRINCIPAL</p>
                     <h4>₱ 1,100.00</h4>
                     <small>Good</small>
                  </div>
                  <div class="progress md-progress" style="height: 10px">
                     <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 100%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="card-body">
                     
                  </div>
               </div>
               <!--/.Card teal accent-4-->
            </div>
            <!--Grid column-->
         </div>
         <!--Grid row-->
      </section>
      <!-- end intro -->
      <section class="section transactions-section mt-3 wow fadeIn">
         <div class="row">
            <!--Grid column-->
            <div class="col-12 mb-4">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card ">
                  <table class="table table-sm table-bordered w-100">
                     <thead class="teal accent-4">
                        <tr>
                           <th scope="col">Seq.</th>
                           <th scope="col">Ref. Code</th>
                           <th scope="col" class="text-right">Credit</th>
                           <th scope="col" class="text-right">Debit</th>
                           <th scope="col">Type</th>
                           <th scope="col" class="text-right">Outstanding Balance</th>
                           <th scope="col">Date & Time</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if($transactions_limit->num_rows() > 0){?>
                        <?php $seq = 1;?>
                        <?php foreach ($transactions_limit->result() as $row){?>
                        <tr>
                           <th scope="row"><?php echo $seq?></th>
                           <th scope="row"><?php echo $row->reference_code?></th>
                           <td class="text-right"><?php echo number_format($row->credit,2) ?></td>
                           <td class="text-right"><?php echo number_format($row->debit,2) ?></td>
                           <td><?php echo $row->type?></td>
                           <td class="text-right"><?php echo number_format($row->outstanding_balance,2) ?></td>
                           <td><?php echo date('Y-m-d H:i:s', strtotime($row->date_created))?></td>
                        </tr>
                        <?php $seq++;?>
                        <?php }?>
                        <?php }else{ ?>
                        <tr>
                           <td colspan="7">
                              No Transaction Yet
                           </td>
                        </tr>
                        <?php }?>
                     </tbody>
                  </table>
                  <span class="px-2"><small> 
                  <?php echo ($transactions_limit->num_rows() > 0) ? 'Recent transaction. <a href="'.base_url("borrower/transactions/all").'">View all</a>' : ''; ?></small>
                  </span>
               </div>
               <!--/.Card teal accent-4-->
            </div>
            <!--Grid column-->
         </div>
         <!--Grid row-->
      </section>
      <section class="section investment-section wow fadeIn">
         <div class="row">
            <!--Grid column-->
            <div class="col-12 mb-4">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card ">
                  <table class="table table-sm table-bordered w-100">
                     <thead class="teal accent-4">
                        <tr>
                           <th scope="col">Seq.</th>
                           <th scope="col">Ref. Code</th>
                           <th scope="col" class="text-right">Amount</th>
                           <th scope="col">Interest</th>
                           <th scope="col">Term</th>
                           <th scope="col" class="text-right">Interest return</th>
                           <th scope="col" class="text-right">Monthly return</th>
                           <th scope="col" class="text-right">Total return</th>
                           <th scope="col">Date begin</th>
                           <th scope="col">Date end</th>
                           <th scope="col">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if($loans_limit->num_rows() > 0){?>
                        <?php $seq = 1;?>
                        <?php foreach ($loans_limit->result() as $row){?>
                        <tr>
                           <th scope="row"><?php echo $seq?></th>
                           <th scope="row"><?php echo $row->reference_code?></th>
                           <td class="text-right"><?php echo number_format($row->loan_amount,2)?></td>
                           <td><?php echo $row->interest_rate?> %</td>
                           <td><?php echo $row->loan_term?> year(s)</td>
                           <td class="text-right"><?php echo number_format($row->interest_repayment,2)?></td>
                           <td class="text-right"><?php echo number_format($row->monthly_repayment,2)?></td>
                           <td class="text-right"><?php echo number_format($row->total_repayment,2)?></td>
                           <td><?php echo date('Y-m-d', strtotime($row->date_created))?></td>
                           <td><?php echo date('Y-m-d', strtotime($row->end_term))?></td>
                           <td><?php echo ($row->status == 1) ? 'Ongoing...' : 'Completed'; ?></td>
                        </tr>
                        <?php $seq++;?>
                        <?php }?>
                        <?php }else{ ?>
                        <tr>
                           <td colspan="10">
                              No Transaction Yet
                           </td>
                        </tr>
                        <?php }?>
                     </tbody>
                  </table>
                  <span class="px-2"><small> 
                  <?php echo ($loans_limit->num_rows() > 0) ? 'Investments. <a href="'.base_url("borrower/loanbook").'">View all</a>' : ''; ?></small>
                  </span>
               </div>
               <!--/.Card teal accent-4-->
            </div>
            <!--Grid column-->
         </div>
         <!--Grid row-->
      </section>
   </div>
</main>
