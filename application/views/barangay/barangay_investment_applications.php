<style type="text/css">
   body.modal-open {
   overflow: hidden;
   }
</style>
<!--Modal: modalInvestApp-->
<div class="modal fade modalInvestApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg Large modal-notify modal-info" role="document">
      <!--Content-->
      <div class="modal-content ">
         <!--Header-->
         <div class="modal-header d-flex">
            <p class="heading">Investment Application</p>
            <a id="modal_link" href="">
            <button type="button" id="" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
            </button>
            </a>
         </div>
         <!--Body-->
         <div class="modal-body" id="">
            <div class="text-center">
               <img src="<?php echo base_url($brgy_details['photo_brgy'])?>" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
               <p class="text-dark">Brgy. <?php echo $brgy_details['barangay'].' '.$brgy_details['street'].' '.$brgy_details['state_prov'].' '.$brgy_details['city'].'<br> Mobile no. '.$brgy_details['mobile_no'].' | Tel no. '.$brgy_details['tel_no']?></p>
               <b class="text-uppercase font-weight-bold">Barangay <?php echo $brgy_details['barangay']?> Credit Co-operative</b>
               <br>
            </div>
            <br>
            <table class="w-100">
               <tr>
                  <td class="w-50">
                     <p class="font-weight-bold ajax_full_name">Name:</p>
                     <p class="font-weight-bold ajax_mobile_no">Mobile:</p>
                     <p class="font-weight-bold ajax_email">Email:</p>
                     <p class="font-weight-bold ajax_address">Address:</p>
                  </td>
                  <td class="w-50">
                     <p class="font-weight-bold ajax_date_created">Date & Time Submitted: </p>
                     <p class="font-weight-bold ajax_reference_code">Ref. Code: </p>
                     <p class="font-weight-bold ajax_invest_amount">Amount: &#8369;</p>
                     <p class="font-weight-bold"><span class="ajax_invest_term"></span><span class="ajax_payment_options"></span></p>
                  </td>
               </tr>
            </table>
            <hr>
            <p class="h6">Requirements</p>
            <table class="w-100">
               <tr>
                  <td class="w-50">
                     <p class="font-weight-bold">Goverment ID:</p>
                     <a href="" class="ajax_href_gov_id" target="_blank" title="View full">
                        <img class="img-fluid card ajax_gov_id" src="" style="width: 98%; height: 200px">
                     </a>
                  </td>
                  <td class="w-50">
                     <p class="font-weight-bold ajax_source_of_income">Source of Income: </p>
                     <p class="font-weight-bold ajax_monthly_income">Monthly Income: </p>
                     <img class="img-fluid invisible card" src="<?php echo base_url($brgy_details['photo_brgy'])?>" style="width: 98%; height: 150px">
                  </td>
               </tr>
            </table>
         </div>
         <!--Footer-->
         <div class="modal-footer text-center flex-center mt-0">
            <form method="POST" action="<?php echo base_url('barangay/accept_investment_app')?>">
               <br>
               <div class="md-form mb-0">
                  <textarea type="text" id="note" class="md-textarea form-control w-100" name="note" cols="100" rows="2"></textarea>
                  <label for="note">Message: For rejection use only</label>
               </div>
               <input type="hidden" name="id" value="" id="ajax_user_investment_id_hide">
               <input type="hidden" name="mobile_no" value="" id="ajax_mobile_no_hide">
               <input type="hidden" name="reference_code" value="" id="ajax_reference_code_hide">
               <input type="hidden" name="full_name" value="" id="ajax_full_name_hide">
               <input type="hidden" name="amount" value="" id="ajax_amount_hide">
               <br>
               <button type="submit" class="btn btn-default m-0 mr-2 btn-sm py-1 px-3" title="Accept">
               <b>&#x2714;</b>
               </button>
               <button type="submit" formaction="<?php echo base_url('barangay/reject_investment_app')?>" class="btn btn-danger m-0 ml-2 btn-sm py-1 px-3" title="Reject" onclick="return confirm('Are you sure you want to reject this application?')">
               <b>&#10008;</b>
               </button>
            </form>
         </div>
      </div>
      <!--/.Content-->
   </div>
</div>
<!--Modal: modalInvestApp-->
<!--Modal: modalRequirements-->
<div class="modal fade modalRequirements" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-info" role="document">
      <!--Content-->
      <div class="modal-content ">
         <!--Header-->
         <div class="modal-header d-flex">
            <p class="heading">Requirements<span class="ajax_reference_code"></span></p>
            <a id="modal_link" href="">
            <button type="button" id="" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
            </button>
            </a>
         </div>
         <!--Body-->
         <div class="modal-body" id="">
            <table class="w-100">
               <tr>
                  <td class="w-100">
                     <p class="font-weight-bold float-left ajax_source_of_income">Source of Income: </p>
                     <p class="font-weight-bold float-right ajax_monthly_income">Monthly Income: </p>
                     <br>
                     <p class="font-weight-bold float-left">Goverment ID:</p>
                     <a href="" class="ajax_href_gov_id" target="_blank" title="View full">
                        <img class="img-fluid card ajax_gov_id" src="" style="width: 100%; height: 230px">
                     </a>
                  </td>
               </tr>
            </table>
         </div>
         <!--Footer-->
         <div class="modal-footer info-color text-center flex-center mt-0">
         </div>
      </div>
      <!--/.Content-->
   </div>
</div>
<!--Modal: mpdalRequirements-->
<!--Modal: modalDetails-->
<div class="modal fade modalDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg Large modal-notify modal-info" role="document">
      <!--Content-->
      <div class="modal-content ">
         <!--Header-->
         <div class="modal-header d-flex">
            <p class="heading">Investment Application Form</p>
            <a id="modal_link" href="">
            <button type="button" id="btn_modal_close" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
            </button>
            </a>
         </div>
         <!--Body-->
         <div class="modal-body" id="printMe">
            <div class="text-center">
               <img src="<?php echo base_url($brgy_details['photo_brgy'])?>" class="img-fluid rounded-circle" style="width: 150px; height: 150px">
               <p class="text-dark">Brgy. <?php echo $brgy_details['barangay'].' '.$brgy_details['street'].' '.$brgy_details['state_prov'].' '.$brgy_details['city'].'<br> Mobile no. '.$brgy_details['mobile_no'].' | Tel no. '.$brgy_details['tel_no']?></p>
               <b class="text-uppercase font-weight-bold">Barangay <?php echo $brgy_details['barangay']?> Credit Co-operative</b>
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
                  </td>
                  <td class="w-50">
                     <p class="font-weight-bold ajax_date_created">Date & Time Submitted: </p>
                     <p class="font-weight-bold ajax_reference_code">Ref. Code: </p>
                     <p class="font-weight-bold ajax_invest_amount">Amount: </p>
                     <p class="font-weight-bold"><span class="ajax_invest_term"></span><span class="ajax_payment_options"></span></p>
                  </td>
               </tr>
            </table>
            <div class="declaration border border-dark mt-5" id="declaration">
               <p class="h6 text-center info-color text-white">DECLARATION</p>
               <div class="px-2">
                  <em class="text-dark ">
                  I hereby declare that all information disclosed is correct, complete and truly stated. I hereby declare that I am authorized to make this investment and that the amount invested in the Fund/s is through legitimate sources only.
                  <br>
                  I am fully aware that only upon submission of complete information and documentary requirements will the transaction be processed.
                  <br>
                  I have understood and have relied solely upon the General Terms and Conditions and the Fund's Prospectus.
                  </em>
               </div>
            </div>
            <div class="row text-center mb-5" id="signature">
               <div class="col pt-5">
                  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                  <br>
                  Signature over printed name
               </div>
               <div class="col pt-5">
                  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                  <br>
                  Signature over printed name
               </div>
               <div class="col pt-5">
                  <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                  <br>
                  Signature over printed name
               </div>
            </div>
            <table class="border-dark border-top border-left border-right w-100">
               <tr class="info-color text-center text-white">
                  <th colspan="4" class="text-center">
                     <p class="h6 m-auto">COLLECTOR/AGENT</p>
                  </th>
               </tr>
               <tr>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Date & Time Received</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Signature</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
               </tr>
               <tr>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Received By</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Signature</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
               </tr>
               <tr class="info-color text-center text-white">
                  <th colspan="4" class="text-center">
                     <p class="h6 m-auto">BARANGAY USE ONLY</p>
                  </th>
               </tr>
               <tr>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Date & Time Received</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Signature</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
               </tr>
               <tr>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Received By</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
                  <td class="border border-dark w-25 p-1 font-weight-bold">Signature</td>
                  <td class="border border-dark w-25 p-1 font-weight-bold"></td>
               </tr>
            </table>
         </div>
         <!--Footer-->
         <div class="modal-footer flex-center">
            <button type="button" title="print" id="printInvestApp" class="btn btn-sm btn-info rounded"><i class="fa fa-print" aria-hidden="true"></i></button>
         </div>
      </div>
      <!--/.Content-->
   </div>
</div>
<!--Modal: modalDetails-->
<?php if ($new_investment_app->num_rows() > 0) 
       $visibility_for_approval = '';
   else
       $visibility_for_approval = 'd-none';
   ?>
<!--Section: Basic examples-->
<section class="wow fadeIn">
   <div class="<?php echo $visibility_for_approval?>">
      New Investment application.
      <div class="switch default-switch">
         <label>
         hide
         <input type="checkbox" checked="checked" id="toggle_switch">
         <span class="lever "></span>
         show
         </label>
      </div>
   </div>
   <!-- investment fund -->
   <div class="card mb-2 <?php echo $visibility_for_approval?>" id="new_investment">
      <div class="card-body table-responsive">
         <!--Table-->
         <p class="dark-grey-text">Investment application received</p>
         <table class="table table-sm table-bordered">
            <!--Table head-->
            <thead class="mdb-color rounded teal">
               <tr class="text-white">
                  <th>Reference Code</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Date Received</th>
                  <th>More Details</th>
               </tr>
            </thead>
            <!--Table head-->
            <!--Table body-->
            <tbody>
               <?php $seq = 1; ?>
               <?php foreach ($new_investment_app->result() as $row) {?>
               <tr>
                  <th scope="row"><?php echo $row->reference_code?></th>
                  <td><?php echo $row->full_name?></td>
                  <td><?php echo $row->email?></td>
                  <td><?php echo $row->mobile_no?></td>
                  <td><?php echo date('Y-m-d', strtotime($row->date_created))?></td>
                  <td>
                     <button class="btn_get_id_for_invest_app btn btn-info m-0 btn-sm py-1 px-3" title="View More Details" id="<?php echo $row->investment_application_id.md5($seq)?>">
                     View
                     </button>
                  </td>
               </tr>
               <?php $seq++; }?>
               <button class="d-none" id="btn_modal_view_invest_app" type="button" data-toggle="modal" data-target=".modalInvestApp"></button>
            </tbody>
            <!--Table body-->
         </table>
         <!--Table-->
      </div>
   </div>
   <!-- reserved -->
</section>
<!--  -->
<!-- invest applications -->
<section class="wow fadeIn">
   <div class="row" style="min-height: 550px">
      <div class="col-md-12">
         <div class="card">
            <h5 class="p-2 m-0 teal text-center rounded-top text-white">List of Investment Applications</h5>
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
                        <th class="th-sm">Date Entry
                           <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Term(s)
                           <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Payment Opt.
                           <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm text-right">Funded
                           <i class="ml-1 fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Investment App.
                           <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                        <th class="th-sm">Requirements
                           <i class="fa fa-sort float-right" aria-hidden="true"></i>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $seq = 1; ?>
                     <?php $table_seq = $investment_app_accepted->num_rows();?>
                     <?php foreach ($investment_app_accepted->result() as $row){?>
                     <?php $terms_in_word = ($row->invest_term > 1) ? 'Years' : 'Year' ;?>
                     <?php $funded_status = ($row->is_funded) ? number_format($row->invest_amount,2) : 'Not yet';?>
                     <tr>
                        <th class="text-dark"><?php echo $table_seq?></th>
                        <th title="Reference code" class="text-dark"><?php echo $row->reference_code?></th>
                        <td title="mm/dd/yy"><?php echo date('m/d/y', strtotime($row->date_created))?></td>
                        <td><?php echo $row->invest_term.' '.$terms_in_word?></td>
                        <td><?php echo $row->payment_options?></td>
                        <td class="text-right"><?php echo $funded_status ?></td>
                        <td class="text-center">
                           <button id="<?php echo $row->investment_application_id.md5($seq)?>" class="btn_get_id_for_invest_app_details btn btn-info btn-sm py-1 m-0 px-3" title="View Investment App.">View</button>
                        </td>
                        <td class="text-center">
                           <button id="<?php echo $row->investment_application_id.md5($seq.'req');?>" class="btn_get_id_for_req btn btn-info btn-sm m-0 py-1 px-3" title="View Requirements">View</button>
                        </td>
                     </tr>
                     <?php $seq++; ?>
                     <?php $table_seq--; }?>
                     <button class="d-none" id="btn_modal_view_invest_app_printable" type="button" data-toggle="modal" data-target=".modalDetails"></button>
                     <button class="d-none" id="btn_modal_view_requirements" type="button" data-toggle="modal" data-target=".modalRequirements"></button>
                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Seq.</th>
                        <th>Reference Code</th>
                        <th>Date Entry</th>
                        <th>Term(s)</th>
                        <th>Payment Opt.</th>
                        <th>Funded</th>
                        <th>Investment App.</th>
                        <th>Requirements</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- end of card table -->
</section>
<!--Section: end laon table's information-->