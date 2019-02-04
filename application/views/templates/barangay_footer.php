

    </div>
</main>
<!--Main layout-->

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
<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/common_barangay_function.js"></script>


<?php
if (isset($barangay_dashboard)) {
  //for barangay dashboard page only
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_dashboard_function.js"></script>';
}
elseif (isset($barangay_investments)) {
  //for barangay investment only
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_investments_function.js"></script>';
}
elseif (isset($barangay_loans)) {
  //for barangay loans only
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_loans_function.js"></script>';
}
elseif (isset($barangay_manage_funds)) {
  //<!-- for manage brgy only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_manage_funds_function.js"></script>';
}
elseif (isset($barangay_staff)) {
  //<!-- for brgy staff only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_staff_function.js"></script>';
}
elseif (isset($barangay_incomplete)) {
  //<!-- for brgy incomplete only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_incomplete_function.js"></script>';
}
elseif (isset($barangay_manage_users)) {
  //<!-- for brgy incomplete only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_manage_users_function.js"></script>';
}
elseif (isset($barangay_loan_applications)) {
  //<!-- for brgy incomplete only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_loan_applications_function.js"></script>';
}
elseif (isset($barangay_investment_applications)) {
  //<!-- for brgy incomplete only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_investment_applications_function.js"></script>';
}
elseif (isset($barangay_withdrawals)) {
  //<!-- for brgy incomplete only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_withdrawals_function.js"></script>';
}
elseif (isset($barangay_payments)) {
  //<!-- for brgy incomplete only -->
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/barangay_payments_function.js"></script>';
}

?>

</body>
</html>