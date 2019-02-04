<?php
if (!isset($logout)) 
{
$logout = '';
}
?>
<input type="hidden" name="logout" id="logout" value="<?php echo $logout;?>">
<input type="hidden" name="base_url" id="base_url" value="<?php echo strtolower(base_url());?>">
<section class="" style="margin-bottom: 6%">
	<center>
		<div class="alert alert-success w-25 mt-5 animated" id="alertBox" style="visibility: hidden;">
		    <strong id="strongMessage">Authenticating!</strong> <span id="alertMessage">Please wait...</span>
		 </div>
	</center>

	<div class="container w-25 card animated fadeIn" style="margin-top: 5%; min-width: 300px">

		<!-- Default form login -->
		<form class="container" id="loginFormData">
		    <p class="h4 mt-3 mb-4">Barangay</p>

		    <!-- Default input email -->
		    <label for="defaultFormLoginEmailEx" class="grey-text">Email or Username</label>
		    <input type="text" name="emailUsername" id="emailUsername" placeholder="Email or Username" class="form-control pressEnter">


		    <!-- Default input password -->
		    <label for="defaultFormLoginPasswordEx" class="grey-text mt-1">Your password</label>
		    <input type="password" name="password" id="password" placeholder="**********" class="form-control pressEnter">

		    <div class="text-right mt-4 mb-4">
		        <button class="btn btn-primary btn-md mr-0" id="btnLogin" type="button">Login</button>
		    </div>
		</form>

	</div>

</section>

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
<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/barangay_login_function.js"></script>

</body>
</html>
