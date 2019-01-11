
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
        <li class="breadcrumb-item active">Savings <i class="fa fa-leanpub" aria-hidden="true"></i></li>
      </ol>

      <div class="row mt-3" style="min-height: 600px">
        
        <div class="col-md-12">     
          <div class="card">
              <h4 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">List of Savings</h4>
              <div class="card-body">
                  <table id="dtBasicExample" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Seq.
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Loan Ref. Code
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Savings Amount
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Date
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Action
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Status
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($savings->num_rows() > 0) {
                        $seq = 1;
                        foreach ($savings->result() as $row) 
                        {
                          ?>
                          <tr>
                            <th scope="row"><?php echo $seq?></th>
                            <th scope="row">
                              <a target="_blank" class="text-info" title="View status report" href="<?php echo base_url('borrower/loan_status?ref='.$row->reference_code)?>">
                                <?php echo $row->reference_code?>
                              </a>
                            </th>
                            <td class="text-right"><?php echo number_format($row->savings,2)?></td>
                            <td><?php echo date('Y-m-d', strtotime($row->date_updated))?></td>
                            <td>
                            <?php
                            if ($row->status == 2 && $row->rebate_to_withdrawn == 1) 
                            {
                              ?>
                                <button class="btn btn-danger m-0 btn-sm py-1 px-3" id="<?php echo md5($row->reference_code)?>" title="">
                                    Cancel
                                </button>
                              <?php
                            }
                            elseif ($row->status == 2 && $row->is_rebate_withdrawn == 0) 
                            {
                              ?>
                                <button class="btn btn-info m-0 btn-sm py-1 px-3" id="<?php echo md5($row->reference_code)?>" title="">
                                    Withdraw
                                </button>
                              <?php
                            }
                            elseif ($row->status == 2 && $row->is_rebate_withdrawn == 1) 
                            {
                              ?>
                                <button class="btn btn-info m-0 btn-sm py-1 px-3 disabled" title="">
                                    Withdrawn
                                </button>
                              <?php
                            }
                            elseif ($row->status == 1) 
                            {
                              ?>
                                <button class="btn btn-info m-0 btn-sm py-1 px-3 disabled" title="">
                                    Withdraw
                                </button>
                              <?php
                            }
                            ?>
                              
                            </td>
                            <td>
                              <?php  
                              if ($row->status == 2) {
                                echo 'Ready to claim';
                              }
                              else {
                                echo 'Ongoing...';
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
                              <td colspan="4" class="text-center">
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
                          <th>Loan Ref. Code</th>
                          <th class="text-right">Savings Amount</th>
                          <th>Date</th>
                          <th>Action</th>
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
