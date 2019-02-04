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

<script type="text/javascript" src="<?php echo base_url()?>public/js/custom/common_admin_function.js"></script>


<?php
if (isset($admin_dashboard)) {
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/admin_dashboard_function.js"></script>';
}
elseif (isset($manage_barangay)) {
  echo '<script type="text/javascript" src="'.base_url().'public/js/custom/admin_manage_barangay_function.js"></script>';
}
?>

</body>
</html>