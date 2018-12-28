
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
        <li class="breadcrumb-item"><a href="<?php echo base_url('borrower')?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('borrower/transactions/all')?>">All</a></li>
        <li class="breadcrumb-item active">Payments <i class="fa fa-money" aria-hidden="true"></i></li>
      </ol>

      <div class="row mt-3" style="min-height: 600px">
        
        <div class="col-md-12">     
          <div class="card table-responsive">
              <h4 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">Payments History</h4>
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
                        <th class="th-sm text-right">Credit
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Debit
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Balance
                          <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Date & Time
                          <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">8</th>
                        <td>1234</td>
                        <td class="text-right"> 2,200.00</td>
                        <td class="text-right"> 2,000.00</td>
                        <td class="text-right"> 200.00</td>
                        <td class="text-right"> 2,200.00</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>1235</td>
                        <td class="text-right"> 2,200.00</td>
                        <td class="text-right"> 2,000.00</td>
                        <td class="text-right"> 200.00</td>
                        <td class="text-right"> 2,200.00</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>1234</td>
                        <td class="text-right"> 2,200.00</td>
                        <td class="text-right"> 2,000.00</td>
                        <td class="text-right"> 200.00</td>
                        <td class="text-right"> 2,200.00</td>
                      </tr>
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

