<!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark default-color scrolling-navbar" id="navbarTop">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="<?php echo base_url();?>lender">
        <img src="<?php echo base_url()?>public/img/logo/logosmw.png" style="width: 60px">
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto smooth-scroll invisible">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>lender"><strong>Dashboard</strong>
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>lender/investments"><strong>Investments</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>lender/withdrawals"><strong>Withdrawals</strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>lender/invest"><strong>Apply Invest</strong></a>
          </li>

        </ul>

        <ul class="navbar-nav">

        <!-- Dropdown -->
          <li class="nav-item dropdown">
              
              <a class="nav-link dropdown-toggle" id="navbarDropdownPhotoLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong><?php echo $_SESSION['email']?> (<?php echo $_SESSION['username']?>)</strong>
              </a>

              <div class="dropdown-menu dropdown-menu-right float-left dropdown-primary z-depth-1" aria-labelledby="navbarDropdownPhotoLink">
                  <p class="ml-2 h6">Brgy. <?php echo $barangay?></p>
                  <a href="<?php echo base_url('main_user_logout/index/'.md5($this->session->user_account_id))?>" class="dropdown-item" onclick="return confirm('Do you want to logout?');">Logout</a>
              </div>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- Navbar -->
