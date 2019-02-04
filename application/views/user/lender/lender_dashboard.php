<main class="mainlayout" style="margin-top: 6%">
   <div class="container-fluid" style="min-height: 650px;">
      <!-- Intro -->  
      <ol class="breadcrumb">
         <li class="breadcrumb-item active">Dashboard <i class="fa fa-tachometer" aria-hidden="true"></i></li>
      </ol>
      <section class="panel-section wow fadeIn">
         <!--Grid row-->
         <div class="row">
            <!--Grid column-->
            <div class="col-xl-3 col-md-6 mb-sm-2">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card teal accent-4">
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-money"></i>
                     </div>
                     <p>TOTAL INVEST</p>
                     <?php $total_invest = $count_invest = 0; ?>
                     <?php if ($my_investment->num_rows() > 0){?>   
                     <?php foreach ($my_investment->result() as $row){?>
                     <?php $total_invest += $row->invest_amount; ?>
                     <?php $count_invest++;?>
                     <?php }?>
                     <?php }?>
                     <h4>₱ <?php echo number_format($total_invest,2) ?></h4>
                     <small>Active (<?php echo $count_invest?>) <a href="<?php echo base_url('lender/investments')?>" class="white-text float-right mt-1">View investments</a></small>
                  </div>
                  <div class="progress md-progress" style="height: 10px">
                     <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 100%; height: 10px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="card-body">
                     <!-- <?php $interest_rate = '';?>
                     <?php if ($my_investment->num_rows() > 0){?>   
                     <?php foreach ($my_investment->result() as $row){?>
                     <?php $interest_rate .= "$row->interest_rate,";?>
                     <?php }?>
                     <?php }?>
                     <p>Interest rate <?php echo substr($interest_rate, 0, strlen($interest_rate)-1) ?> %</p> -->

                  </div>
               </div>
               <!--/.Card teal accent-4-->
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-xl-3 col-md-6 mb-sm-2">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card teal accent-4">
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-money"></i>
                     </div>
                     <p>INTEREST EARNED</p>
                     <?php if ($interest_earned->num_rows() > 0) {
                        foreach ($interest_earned->result() as $row) {
                           $total_interest_earned = $row->interest_earned;
                        }
                     } ?>
                     <h4>₱ <?php echo number_format($total_interest_earned,2) ?></h4>
                     <small>Total earned</small>
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
            <div class="col-xl-3 col-md-6 mb-sm-2">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card teal accent-4">
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-money"></i>
                     </div>
                     <p>MONTHLY RETURN</p>
                     <?php $total_monthly_return = 0?>
                     <?php $dates_return = $date_return = ''?>
                     <?php $visiblilty = 'invisible'; ?>
                     <?php $ctr_monthly_returns = $monthly_returns->num_rows()?>
                     <?php if ($ctr_monthly_returns > 0){?>
                     <?php $visiblilty = ''; ?>
                     <?php foreach ($monthly_returns->result() as $row){?>
                     <?php
                     $date_return = $row->date_return;
                     if ($ctr_monthly_returns == 1){
                        $dates_return = ', '.date('j', strtotime($row->date_return));
                        
                     }
                     else{
                        $dates_return .= ', '.date('j', strtotime($row->date_return));
                     }
                     ?>
                     <?php $total_monthly_return += $row->monthly_return;}?>    
                     <?php }?>
                     <h4>₱ <?php echo number_format($total_monthly_return,2)?></h4>
                     <?php if ($visiblilty == '') {?>
                        <small>Date return <?php echo ucfirst(date('F', strtotime($date_return))).' '.substr($dates_return, 2). ', '.date('Y')?></small>
                     <?php } else { ?>
                     <small>Not yet avaiblable</small>
                     <?php } ?>
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
            <div class="col-xl-3 col-md-6 mb-sm-2">
               <!--Card teal accent-4-->
               <div class="card classic-admin-card teal accent-4">
                  <div class="card-body text-dark">
                     <div class="pull-right">
                        <i class="fa fa-2x fa-money"></i>
                     </div>
                     <p>WALLET BALANCE</p>
                     <?php foreach ($current_balance->result() as $row){?>
                     <h4>₱ <?php echo (!$row->current_balance) ? '0.00' : number_format($row->current_balance,2); ?></h4>
                     <?php }?>
                     <small>Amount to be claimed <a href="<?php echo base_url('lender/transactions/withdrawals')?>" class="white-text float-right mt-1">Withdraw</a></small>
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
                           <th scope="col" class="text-right">Balance</th>
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
                           <td class="text-right"><?php echo number_format($row->balance,2) ?></td>
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
                  <?php echo ($transactions_limit->num_rows() > 0) ? 'Recent transaction. <a href="'.base_url("lender/transactions/all").'">View all</a>' : ''; ?></small>
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
                        <?php if($investments_limit->num_rows() > 0){?>
                        <?php $seq = 1;?>
                        <?php foreach ($investments_limit->result() as $row){?>
                        <tr>
                           <th scope="row"><?php echo $seq?></th>
                           <th scope="row"><?php echo $row->reference_code?></th>
                           <td class="text-right"><?php echo number_format($row->invest_amount,2)?></td>
                           <td><?php echo $row->interest_rate?> %</td>
                           <td><?php echo $row->invest_term?> year(s)</td>
                           <td class="text-right"><?php echo number_format($row->interest_return,2)?></td>
                           <td class="text-right"><?php echo number_format($row->monthly_return,2)?></td>
                           <td class="text-right"><?php echo number_format($row->total_return,2)?></td>
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
                  <?php echo ($investments_limit->num_rows() > 0) ? 'Investments. <a href="'.base_url("lender/investments").'">View all</a>' : ''; ?></small>
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
