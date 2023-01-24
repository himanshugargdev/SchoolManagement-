<?php
include "header.php";

?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?= include("navBar.php") ?>
  <!-- End Navbar -->

  <div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
      style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
      <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
      <div class="row gx-4 mb-2">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              <?= $_SESSION['admin_name'] ?>
            </h5>
            <p class="mb-0 font-weight-normal text-sm">
              <?= $_SESSION['role'] ?>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="row">
          <div class="col-12 col-xl-6">
            <div class="card card-plain h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Profile Information</h6>
                  </div>
                  <div class="col-md-4 text-end">
                    <a href="javascript:;">
                      <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Edit Profile"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body p-3">

                <hr class="horizontal gray-light my-1">
                <ul class="list-group">
                  <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong>
                    &nbsp; <?= $_SESSION['admin_name'] ?></li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp;
                    <?= $_SESSION['admin_phone'] ?></li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp;
                    <?= $_SESSION['admin_email'] ?></li>
                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp;
                    India</li>
                  <li class="list-group-item border-0 ps-0 pb-0">
                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                      <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                      <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                      <i class="fab fa-instagram fa-lg"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <!-- <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Conversations</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <div class="avatar me-3">
                        <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?= $_SESSION['admin_name'] ?></h6>
                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Anne Marie</h6>
                        <p class="mb-0 text-xs">Awesome work, can you..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Peterson</h6>
                        <p class="mb-0 text-xs">Have a great afternoon..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                      <div class="avatar me-3">
                        <img src="../assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Nick Daniel</h6>
                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                  </ul>
                </div>
              </div> -->
          </div>


          <div class="col-12 mt-4">
            <div class="mb-5 ps-3">
              <h6 class="mb-1">Projects</h6>
              <p class="text-sm">School Management System using Php /Mysqli</p>
            </div>
            <div class="row">
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                  <div class="card-header p-0 mt-n4 mx-3">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                        class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                  <div class="card-body p-3">
                    <p class="mb-0 text-sm">Project #1</p>
                    <a href="javascript:;">
                      <h5>
                        School Management System
                      </h5>
                    </a>
                    <p class="mb-4 text-sm">
                      This is Ossum Project Do by My team Ajay (me),Himanshu, Kapil
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                      <button type="button" onclick='window.location="../login.php"'
                        class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip"
                          data-bs-placement="bottom" title="Elena Morison">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                        </a>
                      </div>
                    </div>
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