
<!--Section: Basic examples-->
<section class="wow fadeIn">

    <div class="row" style="min-height: 700px">
        
        <div class="col-md-12">     
            <div class="card bg-white">
                <h2 class="p-2 m-0 teal text-center rounded-top text-white">List of All Logs (Brgy. Admin)</h2>
                <form class="sticky-top bg-white p-3" method="get" action="<?php echo base_url('admin/get_this_logs')?>">
                        <div class="row">
                            <div class="col-xl-3 col-md-12">
                                <select class="mdb-select" searchable="Search Name" name="id">
                                    <option value="" disabled selected>Select Name</option>
                                    <?php
                                    foreach ($brgy_admin_names_ids->result() as $row) 
                                    {
                                    ?>
                                        <option value="<?php echo md5(md5($row->brgy_account_id))?>"><?php echo $row->first_name.' '.$row->last_name?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <label for="date_from">Name</label>
                            </div>
                            <div class="col-xl-3 col-md-12">
                                <!-- Material input -->
                                <div class="md-form mt-2 mb-0">
                                    <input id="date_from" name="date_from" placeholder="Select date from" type="text" class="form-control datepicker">
                                    <label for="date_from">From</label>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-12">
                                <!-- Material input -->
                                <div class="md-form mt-2 mb-0">
                                    <input id="date_to" name="date_to" placeholder="Select date to" type="text" class="form-control datepicker">
                                    <label for="date_from">To</label>
                                </div>
                            </div>
                            <div class="col-xl-3 mb-md-3 col-md-12">
                                <!-- Material input -->
                                <button type="submit" class="btn btn-sm w-100 mt-3 m-0 btn-default">Search</button>
                            </div>
                        </div>
                    </form>
                <div class="card-body table-responsive" style="max-height: 700px">


                    <table id="" class="table table-sm table-striped table border-top table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm">Name
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Action
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Date Time
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Email
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">Barangay
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                          <th class="th-sm">User Type
                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($brgy_admin_logs->result() as $row) 
                        {
                        ?>
                            <tr>
                                <td><?php echo $row->first_name.' '.$row->last_name?></td>
                                <td><?php echo $row->action?></td>
                                <td><?php echo $row->date_time?></td>
                                <td><?php echo $row->email?></td>
                                <td><?php echo $row->barangay?></td>
                                <td><?php echo $row->user_type?></td>
                            </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>Barangay</th>
                          <th>User Type</th>
                        </tr>
                      </tfoot>
                    </table>

                </div>

            </div>

        </div>

    </div>
    <!-- end of card table -->

</section>
<!--Section: Basic examples-->
