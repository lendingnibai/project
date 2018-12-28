<style type="text/css">
body.modal-open {
    overflow: hidden;
}
</style>

<main class="mainlayout" style="margin-top: 6%">

  <div class="container-fluid dark-grey-text">
    <!-- Intro -->  
    <section class="section invest-section my-5">

      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender">Dashboard</a></li>
          <li class="breadcrumb-item active">Apply Invest <i class="fa fa-money" aria-hidden="true"></i></li>
      </ol>

      <div class="rounded p-2 card white mt-3 <?php if($this->session->registered_brgy_id){echo 'wow fadeIn';}?>" style="min-width: 700px">
        <p class="h6 mb-1">MangJuam Invest Application</p>
        <hr>
        <form id="investment_app_form" enctype="multipart/form-data" method="post" action="<?php echo base_url('lender/apply_invest')?>">
          <div class="row" style="min-width: 700px">
            <div class="col-xl-6 col-md-12 pl-4 ">
              <!-- Default input -->
              <!-- para ra ni sa investor nga wala pa na rehistro ilang barangay sa system -->
              <?php
              if (!$this->session->registered_brgy_id)//kung wala naka set ang bry regstered dili verified citizen siya
              {
              ?>
                <div class="row mb-0">
                  <div class="col-4 m-auto d-none d-md-block">
                    <span class="float-right" style="margin-top: -10%">Select Barangay <small class="red-text">*</small></span>
                  </div>
                  <div class="col form-group">
                    <select class="form-control barangaySelect" id="barangay_for_other" name="barangay_for_other">
                      <option value="" selected disabled>Where do you wan to invest</option>
                      <?php
                      $seq = 1;
                      foreach ($registered_brgy->result() as $row) 
                      {
                        $selected = '';
                        if (isset($_GET['brgy']) && $_GET['brgy'] == $row->registered_brgy_id.md5($seq)) 
                        {
                            $selected = 'selected';
                        }
                      ?>
                        <option <?php echo $selected;?> value="<?php echo $row->registered_brgy_id.md5($seq)?>"><?php echo $row->barangay?></option>
                      <?php
                      $seq++;
                      }
                      ?>
                    </select>
                  </div>
                </div>
              <?php
              }
              ?>
              <div class="row mb-0 ">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right" style="margin-top: -10%">Terms <small class="red-text">*</small></span>
                </div>
                <div class="col form-group">
                  <!-- yearTermsId -->
                  <select class="form-control year_terms" id="invest_term" name="invest_term">
                    <option value="" selected disabled>Select</option>
                    <?php
                      foreach ($get_this_yearly_terms->result() as $row ) 
                      {
                        if($row->one_year){ echo'<option value="'.$row->one_year.'">'.$row->one_year.' year</option>';}
                        if($row->two_year){ echo'<option value="'.$row->two_year.'">'.$row->two_year.' years</option>';}
                        if($row->three_year){ echo'<option value="'.$row->three_year.'">'.$row->three_year.' years</option>';}
                        if($row->four_year){ echo'<option value="'.$row->four_year.'">'.$row->four_year.' years</option>';}
                        if($row->five_year){ echo'<option value="'.$row->five_year.'">'.$row->five_year.' years</option>';}
                      } 
                    ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Invest Amount <small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <input type="hidden" name="min_invest" id="min_invest" value="<?php if(isset($min_invest)){echo $min_invest;}else{echo '5000';}?>">
                  <input type="hidden" name="max_invest" id="max_invest" value="<?php if(isset($max_invest)){echo $max_invest;}else{echo '50000';}?>">
                  <?php
                  if (isset($_GET['brgy']) && isset($max_invest) && isset($min_invest)) 
                  {
                    ?>
                      <input type="number" min="<?php echo $min_invest?>" max="<?php echo $max_invest?>" name="invest_amount" id="invest_amount" placeholder="Invest Amount <?php echo number_format($min_invest, 2).' - '.number_format($max_invest, 2)?>" class="form-control">
                    <?php
                  }
                  else
                  {
                      ?>
                      <input type="number" min="<?php echo $min_invest?>" max="<?php echo $max_invest?>" name="invest_amount" id="invest_amount" placeholder="Invest Amount 5,000 - 50,000" class="form-control">
                    <?php
                  }
                  ?>
                  
                </div>
              </div>
              <div class="row mb-0 ">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right" style="margin-top: -10%">Payment Options <small class="red-text">*</small></span>
                </div>
                <div class="col form-group">
                  <select class="form-control payment_options" id="payment_options" name="payment_options">
                    <option value="" selected disabled>Select</option>
                    <option value="Pickup (House)">Pickup (Home)</option>
                    <option value="Barangay">Barangay</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Full Name <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="full_name" id="full_name" value="<?php echo $user_details['first_name'].' '.$user_details['middle_name'].' '.$user_details['last_name']?>" placeholder="First Name" class="form-control pressEnter" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Mobile Number <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $user_details['mobile_no']?>" placeholder="Mobile number" class="form-control pressEnter" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Email <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <input type="text" name="email" id="email" value="<?php echo $user_details['email']?>" placeholder="Email" class="form-control pressEnter" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Full Address <small class="red-text">*</small></span>
                </div>
                <div class="col">
                    <textarea class="form-control rounded-1" rows="4" cols="39" readonly style="resize: none;" name="address">Brgy. <?php echo $user_details['barangay'].' '.$user_details['street'].' '.$user_details['state_prov'].' '.$user_details['city']?></textarea>
                </div>
              </div>

              <hr>
              <h6 class="text-right">Requirements</h6>
              <div class="sourceOfIncomeDiv " id="sourceOfIncomeOption(remove lang ni if gamiton)">
                <div class="row mb-0">
                  <div class="col-4 m-auto d-none d-md-block">
                    <span class="float-right" style="margin-top: -10%">Source of Income <small class="red-text">*</small></span>
                  </div>
                  <div class="col form-group">
                    <select class="form-control sourceOfIncome" name="source_of_income">
                      <option selected disabled>Select</option>
                      <option value="Business">Business</option>
                      <option value="Self Employed">Self Employed</option>
                      <option value="Employee">Employee</option>
                      <!-- <option value="Other">Other</option> -->
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-4 m-auto d-none d-md-block">
                    <span class="float-right">Monthly Income <small class="red-text">*</small></span>
                  </div>

                  <div class="col">
                      <input type="number" name="monthly_income" id="monthly_income" placeholder="Monthly Income" class="form-control pressEnter">
                  </div>
                </div>
              </div> 

              <div class="row mb-3" title="Driver's license, Passport, Postal, SSS, GSIS, PRC, UMID, Voter's ID">
                <div class="col-4 m-auto d-none d-md-block">
                  <span class="float-right">Government ID<small class="red-text">*</small></span>
                </div>
                <div class="col">
                  <div class="row">
                    <div class="col-4">
                      <button type="button" id="buttonGovId" class="btn default-color btn-sm m-0 w-100 float-left">Upload</button>
                      <span class="float-left d-none d-sm-block d-md-none">Government ID<small class="red-text">*</small></span>
                      <input type="file" name="gov_id" id="gov_id" accept='image/*' class="form-control d-none">
                    </div>
                    <div class="col m-auto">
                      <a class="grey-text invisible" id="file1">1 file selected</a>
                    </div>
                    <div class="col-2 m-auto invisible" id="reviewPhotoGovID">
                      <a href="#!" class="animated float-right" data-toggle="modal" data-target="#previewPhotoModalGovId" data-backdrop="static" id="animatedGovId">Preview</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- end section -->

            <div class="col pr-5">
              <div class="container">
                <p class=" p-2 text-center default-color mb-0 rounded-top white-text">Recommendation and Review</p>
                <div class="container-fluid text-center mb-2 p-4 rounded-bottom border border-default">
                  <!-- Default input email -->
                  <label class="dark-grey-text m-1 h6">Terms</label>
                  <input type="text" id="terms_result" name="terms_result" value="----------" class="form-control text-center mb-2 disabled">

                  <label class="dark-grey-text m-1 h6">Invest Amount</label>
                  <input type="text" id="invest_result" value="----------" class="form-control text-center mb-2 disabled">

                  <label class="dark-grey-text m-1 h6"><span id="interest_rate">0%</span> Interest Return</label>
                  <input type="text" id="interest_return" name="interest_return" value="----------" class="form-control text-center mb-2 disabled">

                  <label class="dark-grey-text m-1 h6">Monthly Return</label>
                  <input type="text" id="monthly_return" name="monthly_return" value="----------" class="form-control text-center mb-2 disabled">

                  <label class="dark-grey-text m-1 h6">Total Return</label>
                  <input type="text" id="total_return" name="total_return" value="----------" class="form-control text-center mb-2 disabled">

                </div>
              </div>
            </div>
          </div>
        <center>
          <input type="submit" class="btn btn-primary btn-sm my-3 w-100" name="btn_apply" value="APPLY INVEST">
        </center>
      </form>
    </div>
  </div>
</section>
  <!-- end intro -->
  </div>
</main>

 <!--Modal: previewPhotoModalGovId-->
 <div class="modal fade" id="previewPhotoModalGovId"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
   <!--Content-->
    <div class="modal-content">
      <div class="p-2">
      <a href="" class="float-right h6 red-text" data-dismiss="modal"><small>Close</small></a>
      <span id="filename1"></span>
      <img src="" alt="Government ID" id="previewPhotoGovId" width="100%" height="100%">
     </div>
    </div>
   <!--/.Content-->
  </div>
 </div>
 <!--Modal: previewPhotoModalGovId-->
