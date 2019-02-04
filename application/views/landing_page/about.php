
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
            <a class="nav-link" href="<?php echo base_url()?>invest"><strong>Invest</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>loans"><strong>Loans</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>help" ><strong>Help</strong></a>
          </li>

          <li class="nav-item active animated bounce" id="aboutMenu">
            <a class="nav-link" href="<?php echo base_url()?>about"><strong>About us</strong></a>
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
          <div class="view" style="background-image: url('<?php echo base_url()?>public/img/carousel/team.jpg');background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-left align-items-center">

              <!-- Content -->
            <div class="container wow fadeIn" style="width: 450px; margin-left: 12%; margin-top: -10%">
              <img src="<?php echo base_url()?>public/img/carousel/aboutus.png" class="animated bounce rounded img-responsive w-100">
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

          <h2 class="my-2 dark-grey-text h4 text-center" data-wow-delay="0.2s">
                OUR COMMITMENT TO OUR BORROWERS AND INVESTORS
          </h2>
            
            <h5 class="dark-grey-text text-center">Our peer to peer investing platform avoid the risk and work of direct lending. We manage your capital earning fixed returns guaranteed and secured by MangJuam.
            </h5>
          
          

          <div class="row">
            
            <div class="col-lg mt-5">
              <img src="<?php echo base_url()?>public/img/howdoesitwork/4.png" class="rounded img-responsive" width="100%">
              <p class="dark-grey-text text-center mt-2">Investor</p>
            </div>

             <div class="col-lg mt-5 m-auto">
              <div class="row">
                <div class="col-12">
                  <div class="text-center">
                    <img src="<?php echo base_url()?>public/img/howdoesitwork/arrow.png" class="rounded img-responsive" width="50%" style="opacity: .7">
                  </div>
                </div>
                <div class="col-12">
                  <div class="dark-grey-text text-center">
                    Money from investors are combined with capital of the company for loan funding.
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg mt-5">
              <img src="<?php echo base_url()?>public/img/howdoesitwork/5.png" class="rounded img-responsive" width="100%">
              <p class="dark-grey-text text-center mt-2">Loan fund</p>             
            </div>

             <div class="col-lg mt-5 m-auto">
              <div class="row">
                <div class="col-12">
                  <div class="text-center">
                    <img src="<?php echo base_url()?>public/img/howdoesitwork/arrow.png" class="rounded img-responsive" width="50%" style="opacity: .7">
                  </div>
                </div>
                <div class="col-12">
                  <div class="dark-grey-text text-center">
                    The combined funds are used for disbursement to personal and small business loans.
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg mt-5">
              <img src="<?php echo base_url()?>public/img/howdoesitwork/1.png" class="rounded img-responsive" width="100%">
              <p class="dark-grey-text text-center mt-2">Your loan investment</p>             
            </div>

          </div>

        </section>
      <!-- end demo -->

    <hr class="my-5">

            <!-- demo -->  
        <section class="section team-section text-center my-2 wow fadeIn">

          <h2 class="my-2 dark-grey-text h4 text-center" data-wow-delay="0.2s">
                HOW INVESTING WORKS?
          </h2>
          <h5 class="dark-grey-text text-center">Getting started with MangJuam Lending.</h5>

          <div class="row">
            
            <div class="col-lg-3 mt-5">
              <img src="<?php echo base_url()?>public/img/howdoesitwork/1.svg" class="rounded mt-1 img-responsive" width="270px" height="200">
              <p class="text-center ">
                <strong class="h6">1. Create an account</strong>
              </p>
              <p class="dark-grey-text text-center">
                Our borrowers save an estimated 24% compared to other cash loan providers. 
              </p>
            </div>

            <div class="col-lg-3 mt-5">
              <img src="<?php echo base_url()?>public/img/howdoesitwork/2.svg" class="rounded img-responsive" width="270px" height="200">
              <p class="text-center ">
                <strong class="h6">2. Fund the account</strong>
              </p>
              <p class="dark-grey-text text-center">
                Refreshingly fast process.
              </p>
            </div>

            <div class="col-lg-3 mt-5">
              <img src="<?php echo base_url()?>public/img/howdoesitwork/3.svg" class="rounded img-responsive" width="270px" height="200">
              <p class="text-center ">
                <strong class="h6">3. Received confirmation</strong>
              </p>
              <p class="dark-grey-text text-center">
                Pay your loan off at any time.
              </p>
            </div>

            <div class="col-lg-3 mt-5">
              <img src="<?php echo base_url()?>public/img/howdoesitwork/4.svg" class="rounded img-responsive" width="270px" height="200">
              <p class="text-center">
                <strong class="h6">4. Eranings</strong>
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
                <!-- demo -->  
  <section class="section team-section text-center wow fadeIn">

    <h2 class="my-2 mt-4 dark-grey-text h4 text-center" data-wow-delay="0.2s">
          OUR CALCULATOR
    </h2>

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

    <div class="w-100">
      
      <span class="dark-grey-text">
          • Desired Amount - Loan amount of ₱2,000.00 up to ₱100,000.00 <br>
          • Interest Rate - 4-6% per month <br>
          • Months to Pay - 2, 3, 6, 9, 12 months terms <br>
          • Monthly Amortization - Your monthly payment to MangJuam <br>
          *computation results are for estimation purposes only. These do not constitute an approval nor offer by MangJuam<br>
          Actual computations will be provided by your Account Officer upon loan application.<br><br>
        </span>
        <div class="m-auto w-50" style="min-width: 350px">
        <p class="h5 p-2 text-center default-color mb-0 rounded-top white-text">Loan Calculator</p>
        <form class="container-fluid mb-2 p-4 border rounded-bottom border-default">
          <!-- Default input email -->
          <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6 float-left">Desire amount min. 2k</label>
          <input type="number" name="desireamountloan" id="desireamountloan" class="form-control mb-2 pressEnter">

          <div class="form-group" id="">
            <label for="sel1" class="dark-grey-text text-left m-1 h6 float-left">Terms</label>
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
          <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6 float-left">Total interest earnings</label>
          <input type="number" name="totalinterestearnings" id="totalinterestearnings" class="form-control mb-2" readonly>

          <!-- Default input email -->
          <label for="defaultFormLoginEmailEx" class="dark-grey-text text-left m-1 h6 float-left">Total earnings</label>
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

    </div>
          
  </section>
      <!-- end demo -->
  <hr class="my-4">

  </div>

</main>
<!--Main layout-->
