  <!--Footer-->
  <footer class="page-footer text-center teal darken-3 font-small mt-4">


    <!--Copyright-->
    <div class="footer-copyright py-3">
      © <?php echo date('Y'); ?> Copyright:
      <a href="#!" > MangJuam.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/admin_bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/admin_mdb.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>public/js/addons/datatables.min.js"></script>
<!-- common functions -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/common_borrower_function.js"></script>
<!-- common switch user-->
<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/common_switch_function.js"></script>


<?php
if (isset($borrower_dashboard)) {
    
}
elseif (isset($borrower_loan)) {
   //<!-- for borrower loan only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/borrower_loan_function.js"></script>';
}
elseif (isset($user_profile)) {
   //<!-- for user profile -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/user_profile_function.js"></script>';
}
elseif (isset($user_incomplete)) {
  //<!-- for user incomplete -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/user_incomplete_function.js"></script>';
}
elseif (isset($borrower_review_loan_app)) {
  //<!-- for user incomplete -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/borrower_review_loan_app_function.js"></script>';
}
?>

</body>
</html>