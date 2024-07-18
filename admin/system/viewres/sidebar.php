<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/controllers/sidebarActive.php';
?>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
                <a href="pages/controllers/index/hal?i=pages1" class="navbar-brand mx-4 mb-3"><i class="text-primary fa fa-user-lock me-2 pt-4" style="font-size: 5rem;"> <span class="text-primary px-0" style="font-size: 1.7rem;font-weight: bolder;">PAM</span></i>
                        <h4 class="text-primary">LOCKER SYSTEM</h4>
                        <div class="rounded card-header col-12" style="background-color: #EB1616 !important;">
                        </div>
                </a>
                <div class="navbar-nav w-100">
                        <div class="row ms-2 ml-4 rounded" style="border-radius: 100px;" data-wow-delay="0.1s">
                                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 100px;">
                                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px; margin: 0px 0px 0px -50px;">
                                                <i class="fa fa-clock text-primary" style="font-size: 3rem;"></i>
                                        </div>
                                        <div class="ps-3" style="margin: 0px -30px 0px -5px;">
                                                <h5 id="waktu" class="text-white mb-0"></h5>
                                                <h5 id="MyClockDisplay" class="text-white mb-0 " data-toggle="counter-up" onload="showTime()"></h5>
                                                <h5 id="count" name="count" class="text-white mb-0 " data-toggle="counter-up"></h5>
                                        </div>
                                </div>
                        </div>
                        <p class="px-4 pt-4"><b>MENU NAVIGASI</b></p>
                        <a href="pages/controllers/index/hal.php?i=pages1" class="nav-item nav-link <?php echo $p1; ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="pages/controllers/index/hal.php?i=pages2" class="nav-item nav-link <?php echo $p2; ?>"><i class="fa fa-id-card me-2"></i>Akses Personil</a>
                        <a href="pages/controllers/index/hal.php?i=pages14" class="nav-item nav-link <?php echo $p3; ?>"><i class="fa fa-key me-2"></i>Akses Kontrol</a>
                        <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle <?php echo $p4; ?>" data-bs-toggle="dropdown"><i class="fa fa-wrench me-2"></i>Pengaturan</a>
                                <div class="ms-2 dropdown-menu bg-transparent border-0">
                                        <a href="pages/controllers/index/hal.php?i=pages4" class="nav-link dropdown-item px-5"><i class="fa fa-users me-2"></i>Personil</a>
                                        <a href="pages/controllers/index/hal.php?i=pages7" class="nav-link dropdown-item px-5"><i class="fa fa-user me-2"></i>User</a>
                                        <a href="pages/controllers/index/hal.php?i=pages11" class="nav-link dropdown-item px-5"><i class="fa fa-lock me-2"></i>Kunci Loker</a>
                                </div>
                        </div>
                        <a onclick="logoutConfirm()" class="nav-item nav-link"><i class="fa fa-door-open fa-bounce me-2"></i>Log Out</a>
                </div>

        </nav>
</div>

<!-- Sidebar End -->
