<?php
include "header.php";

?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?= include("navBar.php") ?>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">

      <!-- Event /Calender -->
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <a href="events.php">
              <div
                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">Event /Calender</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">&nbsp; </p>
                <h4 class="mb-0">&nbsp;</h4>
              </div>
            </a>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Our </span> Event /Calender</p>
          </div>
        </div>
      </div>


    </div>


    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Near Event's</h6>
            </div>
            <!-- <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm"></i>Add Event</a>
                    </div> -->
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Add Event</h6>
                <form action="index.php" method="post">
                  <div class="mb-3">
                    <label class="form-label">Event Name</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Event Name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Event Title</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Event Title">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Event Desc...</label>
                    <textarea class="form-control form-control-lg" rows="3"></textarea>
                  </div>
                  <div class="mb-3 text-end">
                    <a class="btn bg-gradient-primary mb-0" href="javascript:;"><i
                        class="material-icons text-sm"></i>Add Event</a>
                  </div>
                </form>
              </div>
            </div>

            <div class="col-md-6 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Event's </h6>
                <div class="card card-body   card-plain border-radius-lg  "
                  style="overflow-y: scroll;min-height: 300px; max-height: 500px;">
                  <div class="col-md-12 mb-md-0 mb-4 event-item">
                    <p><b>Name</b><b style="float:right">12-12-2022</b></p>
                    <p><b>title</b></p>
                    <p>loram nnklds klk sdkf klds sdkm;l sdfk kdf kdm</p>
                  </div>


                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</main>



<?php include "footer.php" ?>