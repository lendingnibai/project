<!-- used for bgry and super admin -->
<?php
if (isset($_SESSION['logout'])) 
	$logout = 'set';
else
	$logout = '';
?>
<input type="hidden" name="logout" id="logout" value="<?php echo $logout?>">

<section class="login_admin">
	<center>
		<div class="alert alert-success w-25 mt-5 animated invisible" id="alert_box">
		    <strong id="strong_message">Authenticating!</strong> <span id="alert_message">Please wait...</span>
		 </div>
	</center>

	<div class="text-center">
	  	<img src="http://localhost/mangjuam.com/public/img/logo/logo.png" style="max-height: 100px" class="img-fluid" alt="placeholder.">
	</div>

	<div class="container w-25 card animated fadeIn" style="margin-top: 2%; min-width: 300px">

		<!-- Default form login -->
		<form class="container" id="login_admin_form" method="post" action="<?php echo base_url($method_login.'/login')?>">
		    <p class="h4 mt-3 mb-4 dark-grey-text"><?php echo $login_title?></p>
		    <hr>
		    <!-- Material input -->
			<div class="md-form">
			    <input type="text" id="email_username" name="email_username" class="form-control animated" autofocus>
			    <label for="email_username" >Email or username</label>
			</div>

		    <!-- Material input -->
			<div class="md-form">
			    <input type="password" id="password" name="password" class="form-control animated">
			    <label for="password" >Password</label>
			</div>

		    <div class="text-right my-3">
		        <button class="btn btn-teal btn-sm mr-0" id="btn_login" name="btn_login" type="submit">Login</button>
		    </div>
		</form>

	</div>

</section>
<?php
unset($_SESSION['logout']);
?>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/mdb.min.js"></script>

<!-- login validation form -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/common_login_function.js"></script>
