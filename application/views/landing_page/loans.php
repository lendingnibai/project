<style type="text/css">

  html,
  body,
  header,
  .carousel {
    height: 70vh;
  }

  @media (max-width: 740px) {
    html,
    body,
    header,
    .carousel {
      height: 100vh;
    }
  }

  @media (min-width: 800px) and (max-width: 850px) {
    html,
    body,
    header,
    .carousel {
      height: 100vh;
    }
  }
</style>

  <header>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark dark-color scrolling-navbar" id="navbarTop">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="<?php echo base_url();?>">
        <img src="<?php echo base_url()?>public/img/logo/logosmw.png" style="width: 70px">
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto smooth-scroll">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>"><strong>Home</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>borrow" ><strong>Borrow</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>invest" ><strong>Invest</strong></a>
          </li>

          <li class="nav-item active animated bounce" id="loansMenu">
            <a class="nav-link" href="<?php echo base_url()?>loans"><strong>Loans</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>help"><strong>Help</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>about"><strong>About us</strong></a>
          </li>
        </ul>

        <?php
        if (isset($_SESSION['user_type'])) 
        {
          if ($_SESSION['user_type'] == 'super_admin') 
          {
              $dashboard_link = 'admin';
          }
          elseif ($_SESSION['user_type'] == 'brgy_admin' || $_SESSION['user_type'] == 'brgy_staff') 
          {
              $dashboard_link = 'barangay';
          }
          elseif ($_SESSION['user_type'] == 'main_user') 
          {
              if ($_SESSION['is_borrower'] == 1) 
                $dashboard_link = 'borrower';
              else
                $dashboard_link = 'lender';
          }
          ?>
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item active teal">
              <a class="nav-link" href="<?php echo base_url($dashboard_link)?>" id="go_to_dashboard"><strong>My Dashboard</strong></a>
            </li>
          </ul>
          <?php
        }
        else
        {
          ?>
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="modal" id="register" data-target="#modalRegForm" data-backdrop="static"><strong>Register</strong> </a>
            </li>
            <span class="border-left m-auto " style="height: 20px"></span>
            <li class="nav-item">
              <a class="nav-link" href="" id="login" data-toggle="modal" data-target="#modalLoginForm" data-backdrop="static"><strong>Login</strong></a>
            </li>
          </ul>
          <?php
        }
        ?>

      </div>
    </div>
  </nav>
  <!-- Navbar -->

    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">
          <div class="view" style="background-image: url('<?php echo base_url()?>public/img/carousel/10.jpg');background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-left align-items-center">

              <!-- Content -->
            <div class="container wow fadeIn" style="width: 450px; margin-left: 12%">
              <img src="<?php echo base_url()?>public/img/carousel/loans.png" class="animated bounce rounded img-responsive w-100">
            </div>
            <!-- Content -->

            </div>
            <!-- Mask & flexbox options-->

          </div>
        </div>
        <!--/First slide-->

      </div>
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->

</header>

  <section class="barangaykeypartner wow fadeIn">
    <div class="row container m-auto text-center" style="opacity: .5">
      <div class="col-xl-3 col-sm-6">
        <p class="h3 mt-3">Guadalupe</p>
      </div>
      <div class="col-xl-3 col-sm-6">
        <p class="h3 mt-3">Ermita</p>
      </div>
      <div class="col-xl-3 col-sm-6">
        <p class="h3 mt-3">Tisa</p>
      </div>
      <div class="col-xl-3 col-sm-6">
        <p class="h3 mt-3">Labangon</p>
      </div>
    </div>
    <hr>
  </section>

  <!--Main layout-->
  <main class="mainlayout">

    <div class="container">

            <!-- demo -->  
        <section class="section team-section my-2 wow fadeIn">

          <h2 class="my-5 dark-grey-text h4 text-center" data-wow-delay="0.2s">
                JOIN THE HUNDREDS AND GROWING UP OF CUSTOMERS WE’VE HELPED SINCE 2018
          </h2>

          <div class="row">
            
            <div class="col-lg-6">
              <div class="row">
                <div class="col-4">
                  <img src="<?php echo base_url()?>public/img/others/pl.png" class="rounded img-responsive" width="170px">
                </div>

                <div class="col">
                  <p class="">
                <strong class="h6">Personal Loans</strong>
                </p>
                <p class="dark-grey-text">
                  Do you need cash for home improvement, pay off credit cards, consolidate your debt, cover major expense, and other personal expenses? No collateral needed, Apply Online today! 
                </p>
                  </div>
                </div>
              
            </div>

             <div class="col-lg-6">
              <div class="row">
                <div class="col-4">
                  <img src="<?php echo base_url()?>public/img/others/sbl.png" class="rounded img-responsive" width="170px">
                </div>

                <div class="col">
                  <p class="">
                <strong class="h6">Small Business Loans</strong>
                </p>
                <p class="dark-grey-text">
                  MangJuam Lending can help you manage cash flow, pay sudden expenses, and funds for daily business operations.
Apply today for a non-collateral small business loans.
                </p>
                  </div>
                </div>
              
            </div>

          </div>

        </section>
      <!-- end demo -->

    <hr class="my-5">

            <!-- demo -->  
        <section class="section team-section text-center my-2 wow fadeIn">

          <h2 class="my-5 dark-grey-text h4 text-center" data-wow-delay="0.2s">
                FAST PERSONAL LOANS AND SMALL BUSINESS LOANS
          </h2>

          <div class="row">
            
            <div class="col-lg-3">
              <img src="<?php echo base_url()?>public/img/others/lr.png" class="rounded img-responsive" width="200px" height="150">
              <p class="text-center ">
                <strong class="h6">Lower rates</strong>
              </p>
              <p class="dark-grey-text text-center">
                Our borrowers save an estimated 24% compared to other cash loan providers. 
              </p>
            </div>

            <div class="col-lg-3 ">
              <img src="<?php echo base_url()?>public/img/others/qe.png" class="rounded img-responsive" width="200px" height="150">
              <p class="text-center ">
                <strong class="h6">Quick and easy</strong>
              </p>
              <p class="dark-grey-text text-center">
                Refreshingly fast process.
              </p>
            </div>

            <div class="col-lg-3">
              <img src="<?php echo base_url()?>public/img/others/np.png" class="rounded img-responsive" width="200px" height="150">
              <p class="text-center ">
                <strong class="h6">No prepayment penalty</strong>
              </p>
              <p class="dark-grey-text text-center">
                Pay your loan off at any time.
              </p>
            </div>

            <div class="col-lg-3">
              <img src="<?php echo base_url()?>public/img/others/sp.png" class="rounded img-responsive" width="200px" height="150">
              <p class="text-center">
                <strong class="h6">Secure process</strong>
              </p>
              <p class="dark-grey-text text-center">
                We take the safety of your information seriously.
              </p>
            </div>

          </div>

        </section>
      <!-- end demo -->

      <hr class="my-5">

            <!-- demo -->  
        <section class="section team-section text-center my-2 wow fadeIn">

          <h2 class="my-1 dark-grey-text h4 text-center" data-wow-delay="0.2s">
                HOW DOES IT WORK?
          </h2>
          <p class="my-4">We have a fast and easy application process.</p>

           <div class="row pt-5">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-5">

                    <!--Card-->
                    <div class="card testimonial-card m-auto w-100">

                        <img src="<?php echo base_url()?>public/img/howdoesitwork/2.png" class="m-auto" style="width: 70%">

                        <!--Avatar-->
                        <div class="avatar mx-auto white rounded-circle w-25">
                            <h1 class="h1">1</h1>
                        </div>

                        <div class="card-body">
                         
                          <h5 class="dark-text">Choose Loan Ammount</h5>
                          <!--Quotation-->
                          <p class="dark-grey-text">Tell us about yourself and how much you want to borrow.</p>

                    </div>
                    <!--Card-->
                </div>
              </div>

              <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-5">

                    <!--Card-->
                    <div class="card testimonial-card m-auto w-100">

                        <img src="<?php echo base_url()?>public/img/howdoesitwork/3.png" class="m-auto" style="width: 70%">

                        <!--Avatar-->
                        <div class="avatar mx-auto white rounded-circle w-25">
                            <h2 class="h1">2</h1>
                        </div>

                        <div class="card-body">
                         
                          <h5 class="dark-text">Approve Your Loan</h5>
                          <!--Quotation-->
                          <p class="dark-grey-text">Confirmation of your infos, and submission of requirements online.</p>

                    </div>
                    <!--Card-->
                </div>
              </div>

              <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-5">

                    <!--Card-->
                    <div class="card testimonial-card m-auto w-100">
                      <img src="<?php echo base_url()?>public/img/howdoesitwork/1.png" class="m-auto" style="width: 70%">
                        <!--Background color-->
                        <!--Avatar-->
                        <div class="avatar mx-auto white rounded-circle w-25">
                            <h1 class="h1">3</h1>
                        </div>

                        <div class="card-body">
                         
                          <h5 class="dark-text">Get Your Cash</h5>
                          <!--Quotation-->
                          <p class="dark-grey-text">Pick up your loan cash at our barangay offices Monday-Friday.</p>

                    </div>
                    <!--Card-->
                </div>
              </div>

          </div>

          <div class="text-center">
            <a href="" id="applyforloanbutton" data-toggle="modal" data-target="#modalRegForm" data-backdrop="static">
              <button class="btn btn-primary btn-md animated bounce wow fadeIn">APPLY NOW</button>
            </a>
          </div>

        </section>
      <!-- end demo -->

</div>

    <div class="default-color wow fadeIn">
      <div class="container">
        <div class="row p-2" >
        <div class="col white-text m-2 text-center">
          <p class="h4">₱500,000 +</p>
          <p class="h5">Borrowed</p>
        </div>

        <div class="col white-text m-2 text-center">
          <p class="h4">10,000 +</p>
          <p class="h5">Customer Served</p>
        </div>

        <div class="col white-text m-2 text-center">
          <p class="h4">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-half-o" aria-hidden="true"></i>
          </p>
          <p class="h5">Average Customer Rating</p>
        </div>
      </div>
      </div>
    </div>


<div class="container">

<hr class="my-5">
        <!--Section: More-->
      <section class="wow fadeIn">

        <h2 class="my-2 dark-grey-text mb-4 h4 text-center">FEEDBACK FROM OUR CLIENTS</h2>

        <!-- Grid row -->
                <div class="row text-center">

                    <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">

                        <div class="testimonial card">
                            <!-- Content -->
                            <h5 class="dark-grey-text mt-2 h5">
                                Subject
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                                quae quaerat ad velit.</p>
                                <small class="dark-grey-text">-Liza from brgy. Guadalupe</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star-half-full"> </i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                   <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">

                        <div class="testimonial card">
                            <!-- Content -->
                            <h5 class="dark-grey-text mt-2 h5">
                                Subject
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                                quae quaerat ad velit.</p>
                                <small class="dark-grey-text">-Liza from brgy. Guadalupe</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star-half-full"> </i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">

                        <div class="testimonial card">
                            <!-- Content -->
                            <h5 class="dark-grey-text mt-2 h5">
                                Subject
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                                quae quaerat ad velit.</p>
                                <small class="dark-grey-text">-Liza from brgy. Guadalupe</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star-half-full"> </i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->
                
                <br>
                <!-- Grid row -->
                <div class="row text-center">

                    <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">

                        <div class="testimonial card">
                            <!-- Content -->
                            <h5 class="dark-grey-text mt-2 h5">
                                Subject
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                                quae quaerat ad velit.</p>
                                <small class="dark-grey-text">-Liza from brgy. Guadalupe</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star-half-full"> </i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                   <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">

                        <div class="testimonial card">
                            <!-- Content -->
                            <h5 class="dark-grey-text mt-2 h5">
                                Subject
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                                quae quaerat ad velit.</p>
                                <small class="dark-grey-text">-Liza from brgy. Guadalupe</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star-half-full"> </i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                   <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">

                        <div class="testimonial card">
                            <!-- Content -->
                            <h5 class="dark-grey-text mt-2 h5">
                                Subject
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                                quae quaerat ad velit.</p>
                                <small class="dark-grey-text">-Liza from brgy. Guadalupe</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star-half-full"> </i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->
          </section>
      <!--Section: More-->
  </div>

  <div class="default-color wow fadeIn">
    <div class="container">
      <div class="row p-4" >
      <div class="col white-text m-auto text-center">
        <p class="h4">Credit decision within 1-2 days</p>
      </div>

      <div class="col white-text m-auto text-center">
        <p class="h4">Credit without Collateral</p>
        
      </div>

      <div class="col white-text m-auto text-center">
        <p class="h4">
          No need for Co-borrower
        </p>
        
      </div>
    </div>
    </div>
  </div>


<div class="container">

  <hr class="my-5">
        <!--Section: More-->
      <section class="wow fadeIn">

        <h2 class="my-2 dark-grey-text mb-2 h4 text-center">FAQ</h2>
    <!-- Grid row -->
        <h5 class="feature-title text-center mb-2 font-bold">The answer to your questions</h5>
            <div class="row">

              <div class="col-lg">
                <div class="w-50 m-auto">

                  <div class="default-color white-text text-center">
                    <h5 class="h5 p-2">How will the money be given to me?</h5>                 
                  </div>
                  <div class="dark-grey-text text-center mb-2 px-4">
                      The money will be on a bank check, you can encash or deposit it to your bank account. Bank transfer to your bank account is available upon request. This will give you the freedom to choose where you will spend the loan. It may take a while for the loan to appear in you account depending on your bank.
                  </div>

                  <div class="default-color white-text text-center ">
                    <h5 class="h5 p-2">How fast can I get a loan?</h5>                 
                  </div>
                  <div class="dark-grey-text text-center mb-2 px-4">
                      It depends on what we need from you, it usually takes 2-5 days but it may be longer if you dont submit your docs on time. But you can complete the process from your home and phone.
                  </div>

                  <div class="default-color white-text text-center ">
                    <h5 class="h5 p-2">How do I pay?</h5>                 
                  </div>
                  <div class="dark-grey-text text-center mb-5 px-4">
                      When you get a loan at MagJuam Lending, repayment is through post dated check (PDC). Small business owners without PDC can choose to have their payment picked up by our field collectors on a daily or weekly basis.
                  </div>
                  
                  <div class="text-center">
                    <a href="<?php echo base_url();?>help">
                      <button class="btn btn-primary btn-md animated bounce wow fadeIn">HELP CENTER</button>
                    </a>
                  </div>

                </div>
              </div>

            </div>
            <!-- Grid row -->
      </section>
  <!--Section: More-->
  <hr class="my-5">
  </div>
</main>
<!--Main layout-->

