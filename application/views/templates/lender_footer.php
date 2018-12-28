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
<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/mdb.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>public/js/addons/datatables.min.js"></script>
<!-- common functions -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/common_lender_function.js"></script>

<!-- common switch user-->
<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/common_switch_function.js"></script>


<?php
if (isset($borrower_dashboard)) {
    
}
elseif (isset($lender_invest)) {
   //<!-- for lender invest only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/lender_invest_function.js"></script>';
}
elseif (isset($user_profile)) {
   //<!-- for user profile -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/user_profile_function.js"></script>';
}
elseif (isset($user_incomplete)) {
  //<!-- for user incomplete -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/user_incomplete_function.js"></script>';
}
elseif (isset($lender_review_invest_app)) {
  //<!-- for user incomplete -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/lender_review_invest_app_function.js"></script>';
}
elseif (isset($lender_withdrawals)) {
  //<!-- for user incomplete -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/lender_withdrawals_function.js"></script>';
}

?>

</body>
</html>