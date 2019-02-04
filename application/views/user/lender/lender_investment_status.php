
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
        <li class="breadcrumb-item"><a href="<?php echo base_url('lender')?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Investment Status <i class="fa fa-leanpub" aria-hidden="true"></i></li>
      </ol>

      <div class="row mt-3" style="min-height: 600px">
        
        <div class="col-md-12">     
          <div class="card">
              <h4 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">Investment Status</h4>
              <div class="card-body table-responsive">
                  <table class="table table-sm table-bordered table-striped border-top">
                    <thead>
                      <tr>
                        <th scope="col">Reference Code</th>
                        <th scope="col" class="text-right">Amount</th>
                        <th scope="col" class="text-right">Interest</th>
                        <th scope="col" class="text-right">Interest Return</th>
                        <th scope="col" class="text-right">Monthly Return</th>
                        <th scope="col" class="text-right">Total Return</th>
                        <th scope="col">Term</th>
                        <th scope="col">Date Begin</th>
                        <th scope="col">Date End</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($investment->num_rows() > 0){?>
                        <?php foreach ($investment->result() as $row){?>
                            <tr>
                              <th><?php echo $row->reference_code?></th>
                              <td class="text-right"><?php echo number_format($row->invest_amount,2)?></td>
                              <td class="text-right"><?php echo $row->interest_rate?> %</td>
                              <td class="text-right"><?php echo number_format($row->interest_return,2)?></td>
                              <td class="text-right"><?php echo number_format($row->monthly_return,2)?></td>
                              <td class="text-right"><?php echo number_format($row->total_return,2)?></td>
                              <td><?php echo $row->invest_term?> <?php echo ($row->invest_term > 1) ? 'Years' : 'Year';?></td>
                              <td><?php echo date('Y-m-d', strtotime($row->date_created))?></td>
                              <td><?php echo date('Y-m-d', strtotime($row->end_term))?></td>
                              <td><?php echo ($row->status == 1) ? 'Ongoing...' : 'Completed'; ?></td>
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
                      <h6>Monthly Returns</h6>
                  <table class="table table-sm table-bordered table-striped border-top">
                    <thead>
                      <tr>
                        <th scope="col">Seq.</th>
                        <th scope="col"></th>
                        <th scope="col" class="text-right">Amount Return</th>
                        <th scope="col"></th>
                        <th scope="col">Date Return</th>
                        <th scope="col"></th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($monthly_returns->num_rows() > 0) {?>
                        <?php $seq = 1; ?>
                        <?php foreach ($monthly_returns->result() as $row){?>
                            <tr>
                              <td><?php echo $seq ?></td>
                              <td></td>
                              <td class="text-right"><?php echo number_format($row->monthly_return,2)?></td>
                              <td></td>
                              <td><?php echo date('Y-m-d H:i:s', strtotime($row->date_return))?></td>
                              <td></td>
                              <td><?php echo ($row->is_returned == 1 ) ? 'Returned' : 'Pending...'; ?></td>
                            </tr>
                          <?php $seq++; } ?>
                      <?php }else{ ?>
                          <tr>
                              <td colspan="7" class="text-center">
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

