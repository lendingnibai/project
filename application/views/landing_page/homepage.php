
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
          <li class="nav-item active animated bounce" id="homeMenu">
            <a class="nav-link" href="<?php echo base_url();?>"><strong>Home</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>borrow"><strong>Borrow</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>invest"><strong>Invest</strong></a>
          </li>

          <li class="nav-item">
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
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
      <li data-target="#carousel-example-1z" data-slide-to="3"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('<?php echo base_url()?>public/img/carousel/11.jpg'); opacity: .9; background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>MangJuam Is Your Partner</strong>
              </h1>
              <p>
                <strong class="h4">Personal expenses, small business and home improvement?</strong>
              </p>
              <a href="<?php echo base_url();?>loans" class="white-text">
                <button type="button" class="btn btn-primary btn-rounded">
                  Start Learning
                </button>
              </a>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/First slide-->

      <!--First2 slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('<?php echo base_url()?>public/img/carousel/13.png'); opacity: 1; background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>MangJuam Is Your Partner</strong>
              </h1>
              <p>
                <strong class="h4">Personal expenses, small business and home improvement?</strong>
              </p>
              <a href="<?php echo base_url();?>loans" class="white-text">
                <button type="button" class="btn btn-primary btn-rounded">
                  Start Learning
                </button>
              </a>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/First2 slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('<?php echo base_url()?>public/img/carousel/8.jpg'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Getting a Loan Made Simple, Need Money?</strong>
              </h1>
              <p>
                <strong class="h4">It beggins here.</strong>
              </p>
              <a href="<?php echo base_url();?>loans" class="white-text">
                <button type="button" class="btn btn-primary btn-rounded">
                  Start Learning
                </button>
              </a>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('<?php echo base_url()?>public/img/carousel/9.jpg'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>You Have Nothing to Do With Money?</strong>
              </h1>

              <p>
                <strong class="h4">Your money is in safe hands.</strong>
              </p>
              <a href="<?php echo base_url('invest');?>" class="white-text">
                <button type="button" class="btn btn-primary btn-rounded">Invest Now</button>
              </a>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/Third slide-->
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--/.Carousel Wrapper-->

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
      <!-- Intro -->  
        <section class="section team-section text-center my-5 wow fadeIn">
          <h2 class="text-center title my-3 dark-grey-text font-weight-bold" data-wow-delay="0.2s">
                <img src="<?php echo base_url()?>public/img/logo/logo.png" class="img-responsive" width="30%">
          </h2>
          <h4 class="text-center title dark-grey-text">
            AN ONLINE PLATFORM FOR BARANGAY LED COOPERATIVE AND LENDING SYSTEM
          </h4>
          <p class=" w-responsive mx-auto mb-5">Lending money to those who need it can be a profitable business. With the proper management of the funds and control of risks involved in extending credit to borrowers, running such venture can give you favorable return of capital or investment. You can expect more people wanting to borrow money, amidst the economic crisis our nation is now facing. The credit industry has many players,such as banks, financing companies and other financial institutions. However,there are still specific markets which can successfully target to extend the fund for lending.
          </p>
          <div class="row">
            <div class="col">
              
            </div>
          </div>
        </section>
      <!-- end intro -->

    <hr class="my-5">

       <!--Section: Main features & Quick Start-->
      <section class="smooth-scroll guide wow fadeIn">
        <h3 class="h4 dark-grey-text text-center my-5">A SMARTER LOAN IN JUST 3 STEPS</h3>
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-6 col-md-12 px-4">
            <!--First row-->
            <div class="row mt-5">
              <div class="col-1 mr-3">
                <span class="h4 border container-fluid rounded-circle py-1 default-color" id="1" style="cursor:pointer">1</span>
              </div>
              <div class="col-10">
                <h6 class="feature-title h6 teal-text" id="11">Apply online in just 3 minutes</h6>
                <p class="">Just create an account, answer a few quick questions about your education and employment.</p>
              </div>
            </div>
            <!--/First row-->
            <div style="height:30px"></div>
            <!--Second row-->
            <div class="row" id="aboutUs">
              <div class="col-1 mr-3">
                <span class="h4 border container-fluid rounded-circle py-1" id="2" style="cursor:pointer">2</span>
              </div>
              <div class="col-10">
                <h6 class="feature-title h6" id="22">Accept your terms and get your money the next day</h6>
                <p class="">After your application is approved, you'll have a chance to review and accept your loan.</p>
              </div>
            </div>
            <!--/Second row-->

            <div style="height:30px"></div>

            <!--Third row-->
            <div class="row">
              <div class="col-1 mr-3">
                <span class="h4 border container-fluid rounded-circle py-1" id="3" style="cursor:pointer">3</span>
              </div>
              <div class="col-10">
                <h6 class="feature-title h6" id="33">Get your cash at your barangay hall</h6>
                <p class="">Sign loan docs and discuss the terms and how to repay.</p>
              </div>
            </div>
            <!--/Third row-->
          </div>
          <!--/Grid column-->
          <!--Grid column-->
          <div class="col-lg-6 col-md-12">
            <div class="w-100 text-center">
              <img src="<?php echo base_url()?>public/img/3steps/1.1.png" width="85%" class="animated rollIn" id="step1">
              <img src="<?php echo base_url()?>public/img/3steps/2.png" width="85%" class="animated rollIn d-none" id="step2">
              <img src="<?php echo base_url()?>public/img/3steps/3.png" width="85%" class="animated rollIn d-none" id="step3">
            </div>
          </div>
          <!--/Grid column-->
        </div>
        <!--/Grid row-->
          <div class="text-center mt-3">
            <a href="<?php echo base_url();?>loans">
              <button class="btn btn-primary btn-md animated bounce">GET STARTED</button>
            </a>
          </div>
      </section>
      <!--Section: Main features & Quick Start-->
    <hr class="my-5"> 
    </div>

    <div class="default-color wow fadeIn" style="margin-top: -2%">
      <div class="container">
        <div class="row p-2" >
          <div class="col white-text m-3 text-center">
            <p class="h4">5,000 +</p>
            <p class="h5">Investors</p>
          </div>

          <div class="col white-text m-3 text-center">
            <p class="h4">8,000 +</p>
            <p class="h5">Borrowers</p>
          </div>

          <div class="col white-text m-3 text-center">
            <p class="h4">₱1 Million +</p>
            <p class="h5">Invested</p>
          </div>
        </div>
      </div>        
    </div>

    <div class="container">
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
                We charge 2-4% monthly compare to other cash loan providers of up to 30% per month.
              </p>
            </div>
            <div class="col-lg-3 ">
              <img src="<?php echo base_url()?>public/img/others/qe.png" class="rounded img-responsive" width="200px" height="150">
              <p class="text-center ">
                <strong class="h6">Quick and easy</strong>
              </p>
              <p class="dark-grey-text text-center">
                Apply online and get credit decision in 24 hours.
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
                We protect your online process and never sell your data.
              </p>
            </div>
          </div>
        </section>
      <!-- end demo -->

      <hr class="mb-5">

      <!--Section: More-->
      <section class="wow fadeIn">
        <h2 class="my-2 dark-grey-text h4 text-center">TRUE WORDS FROM OUR CLIENTS</h2>
        <!-- Section description -->
          <p class="text-center text-uppercase font-weight-bold dark-grey-text mb-1 pb-4 wow fadeIn" data-wow-delay="0.2s">What happy people say</p>

          <p class="text-center dark-grey-text h6">Investors</p>
          <br>
        <!-- Grid row -->
          <div class="row text-center">
            <!-- Grid column -->
            <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
              <div class="testimonial">
                   <!-- Avatar -->
                  <div class="avatar mx-auto mb-4 w-25">
                      <img src="<?php echo base_url()?>public/img/avatars/img%20(27).jpg" class="rounded-circle img-fluid z-depth-1-half">
                  </div>
                  <h5 class="dark-grey-text font-weight-bold">
                    <strong>Joe Val</strong>
                    <hr class="w-75">
                  </h5>
                  <p class="dark-grey-text">
                    <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                          quae quaerat ad velit.</p>
                    <small class="dark-grey-text">From Brgy. Guadalupe</small>
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
<!-- diri na -->
              <!-- Grid column -->
              <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
                  <div class="testimonial">
                      <!-- Avatar -->
                      <div class="avatar mx-auto mb-4 w-25">
                          <img src="<?php echo base_url()?>public/img/avatars/img%20(9).jpg" class="rounded-circle img-fluid z-depth-1-half">
                      </div>

                      <!-- Content -->
                      <h5 class="dark-grey-text font-weight-bold">
                          <strong>John D.</strong>
                          <hr class="w-75">
                      </h5>
                      <p class="dark-grey-text">
                          <i class="fa fa-quote-left dark-grey-text"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                          nisi ut aliquid ex.</p>
                        <small class="dark-grey-text">From Brgy. Talamban</small>
                      <!-- Review -->
                      <div class="teal-text">
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star"> </i>
                      </div>
                  </div>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
                  <div class="testimonial">
                      <!-- Avatar -->
                      <div class="avatar mx-auto mb-4 w-25">
                          <img src="<?php echo base_url()?>public/img/avatars/img%20(4).jpg" class="rounded-circle img-fluid z-depth-1-half">
                      </div>
                      <!-- Content -->
                      <h5 class="dark-grey-text font-weight-bold">
                          <strong>Maria K.</strong>
                          <hr class="w-75">
                      </h5>
                      <p class="dark-grey-text">
                          <i class="fa fa-quote-left dark-grey-text"></i> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                          voluptatum deleniti atque.</p>
                          <small class="dark-grey-text">From Brgy. Kasambagan</small>
                      <!-- Review -->
                      <div class="teal-text">
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star"> </i>
                          <i class="fa fa-star-o"> </i>
                      </div>

                  </div>
              </div>
              <!-- Grid column -->

          </div>
                <!-- Grid row -->
                <hr class="mx-5">
                <p class="text-center dark-grey-text h6">Borrowers</p>
                <br>
                <!-- Grid row -->
                <div class="row text-center">

                    <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">

                        <div class="testimonial">
                            <!-- Avatar -->
                            <div class="avatar mx-auto mb-4 w-25">
                                <img src="<?php echo base_url()?>public/img/avatars/img%20(4).jpg" class="rounded-circle img-fluid z-depth-1-half">
                            </div>

                            <!-- Content -->
                            <h5 class="dark-grey-text font-weight-bold">
                                <strong>Anna D.</strong>
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur
                                quae quaerat ad velit.</p>
                                <small class="dark-grey-text">From Brgy. Kalunasan</small>
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
                        <div class="testimonial">
                            <!-- Avatar -->
                            <div class="avatar mx-auto mb-4 w-25">
                                <img src="<?php echo base_url()?>public/img/avatars/img(8).jpg" class="rounded-circle img-fluid z-depth-1-half">
                            </div>

                            <!-- Content -->
                            <h5 class="dark-grey-text font-weight-bold">
                                <strong>John D.</strong>
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                                nisi ut aliquid ex.</p>
                                <small class="dark-grey-text">From Brgy. Guadalupe</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                            </div>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
                        <div class="testimonial">
                            <!-- Avatar -->
                            <div class="avatar mx-auto mb-4 w-25">
                                <img src="<?php echo base_url()?>public/img/avatars/img%20(4).jpg" class="rounded-circle img-fluid z-depth-1-half">
                            </div>
                            <!-- Content -->
                            <h5 class="dark-grey-text font-weight-bold">
                                <strong>Maria K.</strong>
                                <hr class="w-75">
                            </h5>
                            <p class="dark-grey-text">
                                <i class="fa fa-quote-left dark-grey-text"></i> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque.</p>
                                <small class="dark-grey-text">From Brgy. Ermita</small>
                            <!-- Review -->
                            <div class="teal-text">
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star"> </i>
                                <i class="fa fa-star-o"> </i>
                            </div>

                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->
          </section>
      <!--Section: More-->

    <hr class="my-5">


  </div>
  <!-- end of container -->

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
  <p class="h4 dark-text text-center mt-3 mb-4">OUR CALCULATOR</p>
  <form class="">
    <div class="form-group" id="selectBarangay">
      <select class="form-control">
        <option selected disabled>Select Barangay First</option>
        <option vale="Guadalupe">Guadalupe</option>
        <option value="Ermita">Ermita</option>
        <option value="Tisa">Tisa</option>
        <option value="Labangon">Labangon</option>
      </select>
    </div>
  </form>
    <h5 class="dark-text text-center m-2">IMPORTANT NOTICE:</h5>

  <div class="row my-4">

    <div class="col-lg-5 ">
      
      <span class="dark-grey-text">
        • Desired Amount - Loan amount of ₱2,000.00 up to ₱100,000.00 <br>
        • Interest Rate - 4-6% per month <br>
        • Months to Pay - 2, 3, 6, 9, 12 months terms <br>
        • Monthly Amortization - Your monthly payment to MangJuam <br>
        *computation results are for estimation purposes only. These do not constitute an approval nor offer by MangJuam<br>
        Actual computations will be provided by your Account Officer upon loan application.<br><br>
      </span>
      
        
      <p class="h5 p-2 text-center default-color mb-0 rounded-top white-text">Loan Calculator</p>
      
      <form class="container-fluid mb-2 p-4 rounded-bottom border border-default">
        <!-- Default input email -->
        <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6">Desire amount ₱2,000 - ₱10,000</label>
        <input type="number" name="desireamountloan" id="desireamountloan" class="form-control mb-2 pressEnter">

        <div class="form-group" id="">
          <label for="sel1" class="dark-grey-text text-left m-1 h6">Months to pay</label>
          <select class="form-control" >
            <option selected disabled>Select</option>
            <option vale="12">12 Months</option>
            <option vale="9">9 Months</option>
            <option vale="6">6 Months</option>
            <option vale="3">3 Months</option>
            <option vale="2">2 Months</option>
          </select>
        </div>

        <!-- Default input email -->
        <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6">Monthly amortization</label>
        <input type="number" name="monthlyAmortization" id="monthlyAmortization" class="form-control mb-2" readonly>

        <div class="row mt-3">
          <div class="col-6">
            <button type="reset" class="btn btn-primary btn-md m-0 w-100">Reset</button>
          </div>

          <div class="col-6">
            <button type="button" class="btn btn-primary btn-md m-0 w-100">Calculate</button>
          </div>
        </div>
      </form>
  
  </div>
  <!-- end of col -->

    <div class="col">
      
    </div>

      <div class="col-lg-5 ">
      <h5 class="dark-text text-center m-2 mb-2 d-none d-sm-block d-lg-none">IMPORTANT NOTICE:</h5>

      <span class="dark-grey-text">
        • Desired Amount - Minimum amount of ₱5,000.00<br>
        • Terms - Placement period of 2, 3, 6, 9, 12 months<br>
        • TOTAL INTEREST EARNINGS* - The income or profit of your investment<br>
        • TOTAL EARNINGS - Total investment capital + income<br>
        *computation results are for estimation purposes only. These do not constitute an approval nor offer by MangJuam<br>
        Actual computations will be provided by your Account Officer upon investment application.<br><br>
      </span>
        
      <p class="h5 p-2 text-center default-color mb-0 rounded-top white-text">Invest Calculator</p>
      
      <form class="container-fluid mb-2 p-4 border rounded-bottom border-default">
        <!-- Default input email -->
        <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6">Desire amount min. ₱5,000</label>
        <input type="number" name="desireamountInvest" id="desireamountInvest" class="form-control mb-2 pressEnter">

        <div class="form-group" id="">
          <label for="sel1" class="dark-grey-text text-left m-1 h6">Terms</label>
          <select class="form-control" >
            <option selected disabled>Select</option>
            <option vale="12">12 Months</option>
            <option vale="9">9 Months</option>
            <option vale="6">6 Months</option>
            <option vale="3">3 Months</option>
            <option vale="2">2 Months</option>
          </select>
        </div>

        <!-- Default input email -->
        <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6">Total interest earnings</label>
        <input type="number" name="totalinterestearnings" id="totalinterestearnings" class="form-control mb-2" readonly>

        <!-- Default input email -->
        <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6">Total earnings</label>
        <input type="number" name="totalearnings" id="totalearnings" class="form-control mb-2" readonly>

        <div class="row mt-3">
          <div class="col-6">
            <button type="reset" class="btn btn-primary btn-md m-0 w-100">Reset</button>
          </div>

          <div class="col-6">
            <button type="button" class="btn btn-primary btn-md m-0 w-100">Calculate</button>
          </div>
        </div>
      </form>
  </div>
  <!-- end of col -->
  </div>
  <hr class="my-5">
</div>
</main>
<!--Main layout-->

