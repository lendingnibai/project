<style type="text/css">
   body.modal-open {
   overflow: hidden;
   }
</style>
<!--Modal: modalDetails-->
<div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg Large modal-notify modal-info" role="document">
      <!--Content-->
      <div class="modal-content ">
         <!--Header-->
         <div class="modal-header d-flex">
            <p class="heading">Loan Application Form</p>
            <a id="modal_link" href="">
            <button type="button" id="btn_modal_close" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
            </button>
            </a>
         </div>
         <!--Body-->
         <div class="modal-body" id="">
            <div class="text-center">
               <img src="" class="ajax_photo_bgry" class="img-fluid rounded-circle" style="width: 150px; height: 150px; border-radius: 50%;">
               <p class="text-dark">Brgy. <span class="ajax_b_barangay"></span> <span class="ajax_b_street"></span> <span class="ajax_b_city"></span> <span class="ajax_b_state_prov"></span> <span class="ajax_b_zip_code"></span> <br> Mobile No. <span class="ajax_b_mobile_no"></span> | Tel No.<span class="ajax_b_tel_no"></span></p>
               <b class="text-uppercase font-weight-bold">Barangay <span class="ajax_b_barangay"></span> Credit Co-operative</b>
               <br>
            </div>
            <br>
            <table class="w-100">
               <tr>
                  <td class="w-50">
                     <p class="font-weight-bold ajax_full_name">Name: </p>
                     <p class="font-weight-bold ajax_mobile_no">Mobile: </p>
                     <p class="font-weight-bold ajax_email">Email: </p>
                     <p class="font-weight-bold ajax_address">Address: </p>
                     <hr>
                     <p class="font-weight-bold"><span class="co_maker_1"></span></p>
                  </td>
                  <td class="w-50">
                     <p class="font-weight-bold ajax_date_created">Date & Time Submitted: </p>
                     <p class="font-weight-bold ajax_reference_code">Ref. Code: </p>
                     <p class="font-weight-bold ajax_loan_amount">Amount: </p>
                     <p class="font-weight-bold"><span class="ajax_loan_term"></span></span></p>
                     <hr>
                     <p class="font-weight-bold"><span class="co_maker_2"></span></p>
                  </td>
               </tr>
            </table>
            <div class="declaration border border-dark mt-5" id="declaration">
               <p class="h6 text-center info-color text-white">DECLARATION</p>
               <div class="px-2">
                  <em class="text-dark ">
                  I hereby declare that all information disclosed is correct, complete and truly stated. I hereby declare that I am authorized to make this loan and that the amount loaned in the Fund/s is through legitimate sources only.
                  <br>
                  I am fully aware that only upon submission of complete information and documentary requirements will the transaction be processed.
                  <br>
                  I have understood and have relied solely upon the General Terms and Conditions and the Fund's Prospectus.
                  </em>
               </div>
            </div>
         </div>
         <!--Footer-->
         <div class="modal-footer flex-center">
            <button type="button" title="print" id="printLoanApp" class="btn btn-sm btn-info rounded d-none"><i class="fa fa-print" aria-hidden="true"></i></button>
         </div>
      </div>
      <!--/.Content-->
   </div>
</div>
<!--Modal: modalDetails-->
<main class="mainlayout" style="margin-top: 6%">
   <div class="container-fluid dark-grey-text">
      <!-- Intro -->  
      <section class="section loanbook-section my-5 wow fadeIn">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('borrower');?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Review Loan Applications <i class="fa fa-leanpub" aria-hidden="true"></i></li>
         </ol>
         <!-- remove d-none if you want to use the milestone -->
         <div class="milestone wow fadeIn d-none">
            <div class="progress" style="height: 10px">
               <div class="progress-bar progress-bar-striped progress-bar-animated bg teal rounded-right" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="row text-center mb-3">
               <div class="col">
                  <span class="h5">1</span>
                  <br>
                  <i class="fa fa-2x fa-check-circle teal-text" aria-hidden="true"></i>
                  <br>
                  Loan App. Submitted
               </div>
               <div class="col">
                  <span class="h5">2</span>
                  <br>
                  <i class="fa fa-2x fa-circle-o teal-text" aria-hidden="true"></i>
                  <br>
                  Loan App. Approval
               </div>
               <div class="col">
                  <span class="h5">3</span>
                  <br>
                  <i class="fa fa-2x fa-circle-o teal-text" aria-hidden="true"></i>
                  <br>
                  Loan Released
               </div>
               <div class="col">
                  <span class="h5">4</span>
                  <br>
                  <i class="fa fa-2x fa-circle-o teal-text" aria-hidden="true"></i>
                  <br>
                  Loan Approved
               </div>
            </div>
         </div>
         <!-- end milestone -->
         <div class="row mt-3" style="min-height: 600px">
            <div class="col-md-12">
               <div class="card">
                  <h4 class="p-2 m-0 teal accent-4 text-center rounded-top text-white">List of Loan Applications</h4>
                  <div class="card-body table-responsive">
                     <table id="dtBasicExample" class="table table-sm table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th class="th-sm">Seq.
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm">Reference Code
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm">Date & Time
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm text-right">Amount
                                 <i class="fa fa-sort ml-1 float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm">Term
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm">Status
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm">Full Details
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm">Re-apply
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                              <th class="th-sm">Memo
                                 <i class="fa fa-sort float-right" aria-hidden="true"></i>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $count_approval = 0;//count kung naa na bay for approval para i hide ang gi reject
                              foreach ($loan_app->result() as $row) 
                              {
                                if ($row->is_accepted == 0) 
                                {
                                  $count_approval++;
                                }
                                elseif ($row->is_accepted == 1) 
                                {
                                  $count_approval++;
                                }
                              }
                              $seq = 1;
                              $table_seq = $loan_app->num_rows();
                              foreach ($loan_app->result() as $row) 
                              {
                                $status_in_word_color = '';
                                $re_apply_visibility = 'd-none';
                                
                                $terms_in_word = ($row->loan_term > 1) ? 'Months' : 'Month' ;
                              
                                $is_accepted_in_word = '';
                                if ($row->is_accepted == 0) 
                                {
                                  $is_accepted_in_word = 'For approval';
                                }
                                elseif ($row->is_accepted == 1) 
                                {
                                    $is_accepted_in_word = 'Accepted &#x2714;';
                                    $status_in_word_color = 'text-primary';
                                }
                                elseif ($row->is_accepted == 2) 
                                {
                                    $is_accepted_in_word = 'Rejected &#10008;';
                                    $status_in_word_color = 'text-danger';
                                    $re_apply_visibility = '';
                              
                                    if ($count_approval > 0) 
                                    {
                                        $re_apply_visibility = 'd-none';//naa ni sa taas
                                    }
                                }
                                elseif ($row->is_accepted == 3) 
                                {
                                    $is_accepted_in_word = 'Completed';
                                    $status_in_word_color = 'text-primary';
                                }
                              ?>
                           <tr>
                              <th class="text-dark"><?php echo $table_seq?></th>
                              <th title="Reference code" class="text-dark"><?php echo $row->reference_code?></th>
                              <td title="mm/dd/yy"><?php echo date('Y-m-d H:i:s', strtotime($row->date_created))?></td>
                              <td class="text-right pr-2"><?php echo number_format($row->loan_amount,2) ?></td>
                              <td><?php echo $row->loan_term.' '.$terms_in_word?></td>
                              <td title="<?php echo $is_accepted_in_word?>" class="<?php echo $status_in_word_color?>">
                                 <?php echo $is_accepted_in_word?>
                              </td>
                              <td class="text-center">
                                 <span class="btn btn-sm m-0 p-1 btn-info text-primary btn_get_id_for_app" id="<?php echo $row->loan_application_id.md5($seq)?>" title="View full details"style="cursor: pointer;">
                                 View
                                 </span>
                              </td>
                              <td class="text-center">
                                 <a href="<?php echo base_url('borrower/re_apply?loan_app='.$row->loan_application_id.md5($seq))?>">
                                 <span class="btn btn-sm m-0 p-1 btn-teal text-primary <?php echo $re_apply_visibility?>" title="Re-apply"style="cursor: pointer;">
                                 Re-apply
                                 </span>
                                 </a>
                              </td>
                              <td><?php echo $row->note?></td>
                           </tr>
                           <?php $seq++;?>
                           <?php $table_seq--;}?>
                           <button class="d-none" id="btn_modal_view_details" type="button" data-toggle="modal" data-target="#modalDetails"></button>
                           <button class="d-none" id="btn_modal_view_re_apply" type="button" data-toggle="modal" data-target="#modalReApply"></button>
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Seq.</th>
                              <th>Reference Code</th>
                              <th>Date & Time</th>
                              <th class="text-right">Amount</th>
                              <th>Term</th>
                              <th>Status</th>
                              <th>Full Details</th>
                              <th>Re-apply</th>
                              <th>Note</th>
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