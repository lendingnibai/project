<!--Modal: modalInvestApp-->
<div class="modal fade modalInvestApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg Large modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content ">
            <!--Header-->
            <div class="modal-header d-flex">
                <p class="heading">Investment Application</p>
                <a id="modal_link" href="">
                  <button type="button" id="btn_modal_close" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="white-text">&times;</span>
                  </button>
                </a>
            </div>

            <!--Body-->
            <div class="modal-body" id="printMe">
                <div class="text-center">
                  <br>
                  <br>
                  <img src="" class="img-fluid" style="width: 150px" id="ajax_b_photo_brgy">
                  <p class="text-dark">Brgy. Gudalupe Cebu City <br>Mobile no. 09322996632 | Tel No. 1234567</p>
  
                  <b class="text-uppercase font-weight-bold">Barangay <?php echo $brgy_details['barangay']?> Credit Co-operative</b>
                  <br>
                </div>
                <br>
                <table class="w-100">
                <tr>
                  <td class="w-50">
                    <p class="font-weight-bold" id="ajax_full_name">Name:</p>
                    <p class="font-weight-bold" id="ajax_mobile_no">Mobile:</p>
                    <p class="font-weight-bold" id="$ajax_email">Email:</p>
                    <p class="font-weight-bold" id="ajax_address">Address:</p>
                  </td>
                  <td class="w-50">
                    <p class="font-weight-bold" id="ajax_date_created">Date & Time Submitted: </p>
                    <p class="font-weight-bold" id="ajax_reference_code">Ref. Code: </p>
                    <p class="font-weight-bold" id="ajax_invest_amount">Amount: &#8369;</p>
                    <p class="font-weight-bold" id="ajax_invest_term_payment_opt">Term(s): </p>
                  </td>
                </tr>
                </table>
                
                
                <div class="declaration border border-dark mt-5" id="declaration">
                  <p class="h6 text-center info-color text-white">DECLARATION</p>
                  <span class="text-dark">
                    I hereby declare that all information disclosed is correct, complete and truly stated. I hereby declare that I am authorized to make this investment and that the amount invested in the Fund/s is through legitimate sources only.
                    <br>
                    I am fully aware that only upon submission of complete information and documentary requirements will the transaction be processed.
                  <br>
                  I have understood and have relied solely upon the General Terms and Conditions and the Fund's Prospectus.
                  </span>
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
                    <th colspan="4" class="text-center"><p class="h6 m-auto">COLLECTOR/AGENT</p></th>
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
                    <th colspan="4" class="text-center"><p class="h6 m-auto">BARANGAY USE ONLY</p></th>
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
<!--Modal: modalInvestApp-->