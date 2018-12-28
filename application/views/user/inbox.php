<style type="text/css">
    body.modal-open {
        overflow: hidden;
    }

.card.chat-room .members-panel-1,
.card.chat-room .chat-1 {
  position: relative;
  overflow-y: scroll; }

.card.chat-room .members-panel-1 {
  height: 570px; }

.card.chat-room .chat-1 {
  height: 495px; }

.card.chat-room .friend-list li {
  border-bottom: 1px solid #e0e0e0; }
  .card.chat-room .friend-list li:last-of-type {
    border-bottom: none; }

.card.chat-room img.rounded-circle {
  border-radius: 50%; }

.card.chat-room img.avatar {
  height: 3rem;
  width: 3rem; }

.card.chat-room .text-small {
  font-size: 0.95rem; }

.card.chat-room .text-smaller {
  font-size: 0.75rem; }

.scrollbar-light-blue::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-light-blue::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-light-blue::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #82B1FF; }


</style>
<main class="mainlayout" style="margin-top: 6%">
  <div class="container dark-grey-text">
    <!-- Intro -->  
    <section class="section inbox-section my-5">

        <?php

        if ($inbox == 'b_inbox') 
        {
        ?>

          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>borrower">Dashboard</a></li>
            <li class="breadcrumb-item active">Inbox <i class="fa fa-envelope" aria-hidden="true"></i></li>
          </ol>

        <?php
        }
        else
        {
        ?>

          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>lender">Dashboard</a></li>
            <li class="breadcrumb-item active">Inbox <i class="fa fa-envelope" aria-hidden="true"></i></li>
          </ol>

        <?php
        }
        ?>
      
      <div class="rounded p-2 white mt-3 card wow fadeIn" style="min-width: 700px">
        
        <p class="h6 mb-1">
         MangJuam Inbox 
        </p>
        <hr>

        <div class="row animated m-auto container-fluid" id="inboxSection" style="min-width: 700px">
          
          <div class="card grey lighten-3 chat-room m-3 mb-4">
            <div class="card-body">

                <!-- Grid row -->
                <div class="row px-lg-2 px-2">

                    <!-- Grid column -->
                    <div class="col-md-6 col-xl-4 px-0">

                        <h6 class="font-weight-bold mb-3 text-center text-lg-left">Admin</h6>
                        <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
                            <ul class="list-unstyled friend-list">
                                <li class="active grey lighten-3 p-2">
                                    <a href="#" class="d-flex justify-content-between">
                                        <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                        <div class="text-small">
                                            <strong>Barangay Admin</strong>
                                            <p class="last-message text-muted">Hello, Are you there?</p>
                                        </div>
                                        <div class="chat-footer">
                                            <p class="text-smaller text-muted mb-0">Just now</p>
                                            <span class="badge badge-danger float-right">1</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="p-2">
                                    <a href="#" class="d-flex justify-content-between">
                                        <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                        <div class="text-small">
                                            <strong>System Admin</strong>
                                            <p class="last-message text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                        <div class="chat-footer">
                                            <p class="text-smaller text-muted mb-0">5 min ago</p>
                                            <span class="text-muted float-right"><i class="fa fa-mail-reply" aria-hidden="true"></i></span>
                                        </div>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                        <div class="chat-message">

                            <ul class="list-unstyled chat-1 scrollbar-light-blue">
                                <li class="d-flex justify-content-between mb-4">
                                    <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                                    <div class="chat-body white p-3 ml-2 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font">System Admin</strong>
                                            <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between mb-4">
                                    <div class="chat-body white p-3 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font">EM Cabua</strong>
                                            <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                        </p>
                                    </div>
                                    <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                                </li>
                                <li class="d-flex justify-content-between mb-4">
                                    <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                                    <div class="chat-body white p-3 ml-2 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font">System Admin</strong>
                                            <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between mb-4">
                                    <div class="chat-body white p-3 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font">EM Cabua</strong>
                                            <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 13 mins ago</small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                        </p>
                                    </div>
                                    <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                                </li>
                                <li class="d-flex justify-content-between mb-4 pb-3">
                                    <img src="<?php echo base_url()?>public/img/anonymous/male.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                                    <div class="chat-body white p-3 ml-2 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font">System Admin</strong>
                                            <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="white">
                                <div class="form-group basic-textarea">
                                    <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-rounded default-color btn-sm waves-effect waves-dark float-right">Send</button>

                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
          </div>

        </div>
      </div>
    </section>
      <!-- end intro -->
  </div>
</main>

