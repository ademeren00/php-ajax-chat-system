<?php require_once("system/db.php"); ?>

<?php
if (!isset($_SESSION["ad"])) {
    header("Location:login.php");
}
?>
<?php require_once("include/header.php"); ?>

<div class="layout-wrapper d-lg-flex">

    <!-- Start left sidebar-menu -->
    <div class="side-menu flex-lg-column me-lg-1 ms-lg-0">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/images/logo.svg" alt="" height="30">
                </span>
            </a>

            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="assets/images/logo.svg" alt="" height="30">
                </span>
            </a>
        </div>
        <!-- end navbar-brand-box -->

        <!-- Start side-menu nav -->
        <div class="flex-lg-column my-auto">
            <ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile">
                    <a class="nav-link" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">
                        <i class="ri-user-2-line"></i>
                    </a>
                </li>
                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Chats">
                    <a class="nav-link " id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat" role="tab">
                        <i class="ri-message-3-line"></i>
                    </a>
                </li>
                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Groups">
                    <a class="nav-link active" id="pills-groups-tab" data-bs-toggle="pill" href="#pills-groups" role="tab">
                        <i class="ri-group-line"></i>
                    </a>
                </li>
                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Contacts">
                    <a class="nav-link" id="pills-contacts-tab" data-bs-toggle="pill" href="#pills-contacts" role="tab">
                        <i class="ri-contacts-line"></i>
                    </a>
                </li>
                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
                    <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting" role="tab">
                        <i class="ri-settings-2-line"></i>
                    </a>
                </li>
                <li class="nav-item dropdown profile-user-dropdown d-inline-block d-lg-none">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="profile-user rounded-circle">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Profile <i class="ri-profile-line float-end text-muted"></i></a>
                        <a class="dropdown-item" href="#">Setting <i class="ri-settings-3-line float-end text-muted"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out <i class="ri-logout-circle-r-line float-end text-muted"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- end side-menu nav -->

        <div class="flex-lg-column d-none d-lg-block">
            <ul class="nav side-menu-nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link light-dark-mode" href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" title="Dark / Light Mode">
                        <i class='ri-sun-line theme-mode-icon'></i>
                    </a>
                </li>

                <li class="nav-item btn-group dropup profile-user-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/users/avatar-1.jpg" alt="" class="profile-user rounded-circle">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Profile <i class="ri-profile-line float-end text-muted"></i></a>
                        <a class="dropdown-item" href="#">Setting <i class="ri-settings-3-line float-end text-muted"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="auth-login.html">Log out <i class="ri-logout-circle-r-line float-end text-muted"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Side menu user -->
    </div>
    <!-- end left sidebar-menu -->

    <!-- start chat-leftsidebar -->
    <div class="chat-leftsidebar me-lg-1 ms-lg-0">

        <div class="tab-content">
            <!-- Start Profile tab-pane -->
            <div class="tab-pane" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                <!-- Start profile content -->
                <div>
                    <div class="px-4 pt-4">
                        <div class="user-chat-nav float-end">
                            <div class="dropdown">
                                <a href="#" class="font-size-18 text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">My Profile</h4>
                    </div>

                    <div class="text-center p-4 border-bottom">
                        <div class="mb-4">
                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="">
                        </div>

                        <h5 class="font-size-16 mb-1 text-truncate"><?= $_SESSION["ad"] ?> <?= $_SESSION["soyad"] ?></h5>

                    </div>
                    <!-- End profile user -->

                    <!-- Start user-profile-desc -->
                    <div class="p-4 user-profile-desc" data-simplebar>
                        <div class="text-muted">
                            <p class="mb-4"><?= $_SESSION["aciklama"] ?></p>
                        </div>


                        <div id="tabprofile" class="accordion">
                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="about2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="true" aria-controls="about">
                                        <h5 class="font-size-14 m-0">
                                            <i class="ri-user-2-line me-2 ms-0 ms-0 align-middle d-inline-block"></i> About
                                        </h5>
                                    </button>
                                </div>
                                <div id="about" class="accordion-collapse collapse show" aria-labelledby="about2" data-bs-parent="#tabprofile">
                                    <div class="accordion-body">
                                        <div>
                                            <p class="text-muted mb-1">Name</p>
                                            <h5 class="font-size-14">Patricia Smith</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Email</p>
                                            <h5 class="font-size-14">adc@123.com</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Time</p>
                                            <h5 class="font-size-14">11:40 AM</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Location</p>
                                            <h5 class="font-size-14 mb-0">California, USA</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End About card -->

                            <div class="card accordion-item border">
                                <div class="accordion-header" id="attachfile2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#attachfile" aria-expanded="false" aria-controls="attachfile">
                                        <h5 class="font-size-14 m-0">
                                            <i class="ri-attachment-line me-2 ms-0 ms-0 align-middle d-inline-block"></i> Attached Files
                                        </h5>
                                    </button>
                                </div>
                                <div id="attachfile" class="accordion-collapse collapse" aria-labelledby="attachfile2" data-bs-parent="#tabprofile">
                                    <div class="accordion-body">
                                        <div class="card p-2 border mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3 ms-0">
                                                    <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                                        <i class="ri-file-text-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="text-start">
                                                        <h5 class="font-size-14 mb-1">Admin-A.zip</h5>
                                                        <p class="text-muted font-size-13 mb-0">12.5 MB</p>
                                                    </div>
                                                </div>

                                                <div class="ms-4 me-0">
                                                    <ul class="list-inline mb-0 font-size-18">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="text-muted px-1">
                                                                <i class="ri-download-2-line"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item dropdown">
                                                            <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card p-2 border mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3 ms-0">
                                                    <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="text-start">
                                                        <h5 class="font-size-14 mb-1">Image-1.jpg</h5>
                                                        <p class="text-muted font-size-13 mb-0">4.2 MB</p>
                                                    </div>
                                                </div>

                                                <div class="ms-4 me-0">
                                                    <ul class="list-inline mb-0 font-size-18">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="text-muted px-1">
                                                                <i class="ri-download-2-line"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item dropdown">
                                                            <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card p-2 border mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3 ms-0">
                                                    <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="text-start">
                                                        <h5 class="font-size-14 mb-1">Image-2.jpg</h5>
                                                        <p class="text-muted font-size-13 mb-0">3.1 MB</p>
                                                    </div>
                                                </div>

                                                <div class="ms-4 me-0">
                                                    <ul class="list-inline mb-0 font-size-18">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="text-muted px-1">
                                                                <i class="ri-download-2-line"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item dropdown">
                                                            <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card p-2 border mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-3 ms-0">
                                                    <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                                        <i class="ri-file-text-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="text-start">
                                                        <h5 class="font-size-14 mb-1">Landing-A.zip</h5>
                                                        <p class="text-muted font-size-13 mb-0">6.7 MB</p>
                                                    </div>
                                                </div>

                                                <div class="ms-4 me-0">
                                                    <ul class="list-inline mb-0 font-size-18">
                                                        <li class="list-inline-item">
                                                            <a href="#" class="text-muted px-1">
                                                                <i class="ri-download-2-line"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item dropdown">
                                                            <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Attached Files card -->
                        </div>
                        <!-- end profile-user-accordion -->

                    </div>
                    <!-- end user-profile-desc -->
                </div>
                <!-- End profile content -->
            </div>
            <!-- End Profile tab-pane -->

            <!-- Start chats tab-pane -->
            <div class="tab-pane" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                <!-- Start chats content -->
                <div>
                    <div class="px-4 pt-4">
                        <h4 class="mb-4">Chats</h4>
                        <div class="search-box chat-search-box">
                            <div class="input-group mb-3 rounded-3">
                                <span class="input-group-text text-muted bg-light pe-1 ps-3" id="basic-addon1">
                                    <i class="ri-search-line search-icon font-size-18"></i>
                                </span>
                                <input type="text" class="form-control bg-light" placeholder="Search messages or users" aria-label="Search messages or users" aria-describedby="basic-addon1">
                            </div>
                        </div> <!-- Search Box-->
                    </div> <!-- .p-4 -->



                    <!-- Start chat-message-list -->
                    <div>
                        <h5 class="mb-3 px-3 font-size-16">Recent</h5>

                        <div class="chat-message-list px-2" data-simplebar>

                            <ul class="list-unstyled chat-list chat-user-list">

                                <li>
                                    <a href="#">
                                        <div class="d-flex">
                                            <div class="chat-user-img online align-self-center me-3 ms-0">
                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                                <span class="user-status"></span>
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15 mb-1">Patrick Hendricks</h5>
                                                <p class="chat-user-message text-truncate mb-0">Hey! there I'm available</p>
                                            </div>
                                            <div class="font-size-11">05 min</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="unread">
                                    <a href="#">
                                        <div class="d-flex">
                                            <div class="chat-user-img away align-self-center me-3 ms-0">
                                                <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15 mb-1">Mark Messer</h5>
                                                <p class="chat-user-message text-truncate mb-0"><i class="ri-image-fill align-middle me-1 ms-0"></i> Images</p>
                                            </div>
                                            <div class="font-size-11">12 min</div>
                                            <div class="unread-message">
                                                <span class="badge badge-soft-danger rounded-pill">02</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="d-flex">
                                            <div class="chat-user-img align-self-center me-3 ms-0">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        G
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15 mb-1">General</h5>
                                                <p class="chat-user-message text-truncate mb-0">This theme is awesome!</p>
                                            </div>
                                            <div class="font-size-11">20 min</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="active">
                                    <a href="#">
                                        <div class="d-flex">
                                            <div class="chat-user-img online align-self-center me-3 ms-0">
                                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15 mb-1">Doris Brown</h5>
                                                <p class="chat-user-message text-truncate mb-0">Nice to meet you</p>
                                            </div>
                                            <div class="font-size-11">10:12 AM</div>
                                        </div>
                                    </a>
                                </li>



                                <li class="typing">
                                    <a href="#">
                                        <div class="d-flex">
                                            <div class="chat-user-img align-self-center online me-3 ms-0">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        A
                                                    </span>
                                                </div>
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15 mb-1">Albert Rodarte</h5>
                                                <p class="chat-user-message text-truncate mb-0">typing<span class="animate-typing">
                                                        <span class="dot"></span>
                                                        <span class="dot"></span>
                                                        <span class="dot"></span>
                                                    </span></p>
                                            </div>
                                            <div class="font-size-11">04:56 PM</div>
                                        </div>
                                    </a>
                                </li>


                                <li>
                                    <a href="#">
                                        <div class="d-flex">
                                            <div class="chat-user-img away align-self-center me-3 ms-0">
                                                <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                                <span class="user-status"></span>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-size-15 mb-1">Paul Haynes</h5>
                                                <p class="chat-user-message text-truncate mb-0">Good morning</p>
                                            </div>
                                            <div class="font-size-11">12/07</div>
                                        </div>
                                    </a>
                                </li>




                            </ul>
                        </div>
                    </div>
                    <!-- End chat-message-list -->
                </div>
                <!-- Start chats content -->
            </div>
            <!-- End chats tab-pane -->

            <!-- Start groups tab-pane -->
            <div class="tab-pane fade show active" id="pills-groups" role="tabpanel" aria-labelledby="pills-groups-tab">
                <!-- Start Groups content -->
                <div>
                    <div class="p-4">
                        <div class="user-chat-nav float-end">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link text-decoration-none text-muted font-size-18 py-0" data-bs-toggle="modal" data-bs-target="#addgroup-exampleModal">
                                    <i class="ri-group-line me-1 ms-0"></i>
                                </button>
                            </div>

                        </div>
                        <h4 class="mb-4">Groups</h4>

                        <!-- Start add group Modal -->
                        <div class="modal fade" id="addgroup-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addgroup-exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-size-16" id="addgroup-exampleModalLabel">Create New Group</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form>
                                            <div class="mb-4">
                                                <label for="addgroupname-input" class="form-label">Group Name</label>
                                                <input type="text" class="form-control" id="addgroupname-input" placeholder="Enter Group Name">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Group Members</label>
                                                <div class="mb-3">
                                                    <button class="btn btn-light btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#groupmembercollapse" aria-expanded="false" aria-controls="groupmembercollapse">
                                                        Select Members
                                                    </button>
                                                </div>

                                                <div class="collapse" id="groupmembercollapse">
                                                    <div class="card border">
                                                        <div class="card-header">
                                                            <h5 class="font-size-15 mb-0">Contacts</h5>
                                                        </div>
                                                        <div class="card-body p-2">
                                                            <div data-simplebar style="max-height: 150px;">

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        A
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck1" checked>
                                                                                <label class="form-check-label" for="memberCheck1">Albert Rodarte</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck2">
                                                                                <label class="form-check-label" for="memberCheck2">Allison Etter</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        C
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck3">
                                                                                <label class="form-check-label" for="memberCheck3">Craig Smiley</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        D
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck4">
                                                                                <label class="form-check-label" for="memberCheck4">Daniel Clay</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        I
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck5">
                                                                                <label class="form-check-label" for="memberCheck5">Iris Wells</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        J
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck6">
                                                                                <label class="form-check-label" for="memberCheck6">Juan Flakes</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck7">
                                                                                <label class="form-check-label" for="memberCheck7">John Hall</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck8">
                                                                                <label class="form-check-label" for="memberCheck8">Joy Southern</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        M
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck9">
                                                                                <label class="form-check-label" for="memberCheck9">Michael Hinton</label>
                                                                            </div>
                                                                        </li>

                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck10">
                                                                                <label class="form-check-label" for="memberCheck10">Mary Farmer</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        P
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck11">
                                                                                <label class="form-check-label" for="memberCheck11">Phillis Griffin</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        R
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck12">
                                                                                <label class="form-check-label" for="memberCheck12">Rocky Jackson</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="p-3 fw-bold text-primary">
                                                                        S
                                                                    </div>

                                                                    <ul class="list-unstyled contact-list">
                                                                        <li>
                                                                            <div class="form-check">
                                                                                <input type="checkbox" class="form-check-input" id="memberCheck13">
                                                                                <label class="form-check-label" for="memberCheck13">Simon Velez</label>
                                                                            </div>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="addgroupdescription-input" class="form-label">Description</label>
                                                <textarea class="form-control" id="addgroupdescription-input" rows="3" placeholder="Enter Description"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Create Groups</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End add group Modal -->

                        <div class="search-box chat-search-box">
                            <div class="input-group rounded-3">
                                <span class="input-group-text text-muted bg-light pe-1 ps-3" id="basic-addon1">
                                    <i class="ri-search-line search-icon font-size-18"></i>
                                </span>
                                <input type="text" class="form-control bg-light" placeholder="Search groups..." aria-label="Search groups..." aria-describedby="basic-addon1">
                            </div>
                        </div> <!-- Search Box-->
                    </div>

                    <!-- Start chat-group-list -->
                    <div class="p-4 chat-message-list chat-group-list" data-simplebar>


                        <ul class="list-unstyled chat-list">


                            <?php
                            $uyeler_cek = $db->query("SELECT * FROM kullanicilar ORDER BY id DESC LIMIT 10", PDO::FETCH_ASSOC);
                            if ($uyeler_cek->rowCount()) {
                                foreach ($uyeler_cek as $row) {
                                    if ($row["id"] == $_SESSION["id"]) {
                                        continue;
                                    }

                            ?>
                                    <li class="kisiler" id="<?= Sifrele($row["id"]) ?>">
                                        <a href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="chat-user-img me-3 ms-0">
                                                    <div class="avatar-xs">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            <?= substr($row["ad"], 0, 1); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-0"><?= $row["ad"] ?> <?= $row["soyad"] ?></h5>
                                                    <h6 class="email" class="text-truncate font-size-14 mb-0"><?= $row["email"] ?></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                            <?php
                                }
                            }
                            ?>



                        </ul>
                    </div>
                    <!-- End chat-group-list -->
                </div>
                <!-- End Groups content -->
            </div>
            <!-- End groups tab-pane -->

            <!-- Start contacts tab-pane -->
            <div class="tab-pane" id="pills-contacts" role="tabpanel" aria-labelledby="pills-contacts-tab">
                <!-- Start Contact content -->
                <div>
                    <div class="p-4">
                        <div class="user-chat-nav float-end">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add Contact">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link text-decoration-none text-muted font-size-18 py-0" data-bs-toggle="modal" data-bs-target="#addContact-exampleModal">
                                    <i class="ri-user-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <h4 class="mb-4">Contacts</h4>

                        <!-- Start Add contact Modal -->
                        <div class="modal fade" id="addContact-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-size-16" id="addContact-exampleModalLabel">Add Contact</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form>
                                            <div class="mb-3">
                                                <label for="addcontactemail-input" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="addcontactemail-input" placeholder="Enter Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="addcontact-invitemessage-input" class="form-label">Invatation Message</label>
                                                <textarea class="form-control" id="addcontact-invitemessage-input" rows="3" placeholder="Enter Message"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Invite Contact</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Add contact Modal -->

                        <div class="search-box chat-search-box">
                            <div class="input-group bg-light  input-group-lg rounded-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-link text-decoration-none text-muted pe-1 ps-3" type="button">
                                        <i class="ri-search-line search-icon font-size-18"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-light" placeholder="Search users..">
                            </div>
                        </div>
                        <!-- End search-box -->
                    </div>
                    <!-- end p-4 -->

                    <!-- Start contact lists -->
                    <div class="p-4 chat-message-list chat-group-list" data-simplebar>

                        <div>
                            <div class="p-3 fw-bold text-primary">
                                A
                            </div>

                            <ul class="list-unstyled contact-list">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Albert Rodarte</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="font-size-14 m-0">Allison Etter</h5>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Share <i class="ri-share-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Block <i class="ri-forbid-line float-end text-muted"></i></a>
                                                <a class="dropdown-item" href="#">Remove <i class="ri-delete-bin-line float-end text-muted"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end contact list A -->


                    </div>
                    <!-- end contact lists -->
                </div>
                <!-- Start Contact content -->
            </div>
            <!-- End contacts tab-pane -->

            <!-- Start settings tab-pane -->
            <div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                <!-- Start Settings content -->
                <div>
                    <div class="px-4 pt-4">
                        <h4 class="mb-0">Settings</h4>
                    </div>

                    <div class="text-center border-bottom p-4">
                        <div class="mb-4 profile-user">
                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="">
                            <button type="button" class="btn btn-light bg-light avatar-xs p-0 rounded-circle profile-photo-edit">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </div>

                        <h5 class="font-size-16 mb-1 text-truncate"><?= $_SESSION["ad"] ?> <?= $_SESSION["soyad"] ?></h5>

                    </div>
                    <!-- End profile user -->

                    <!-- Start User profile description -->
                    <div class="p-4 user-profile-desc" data-simplebar>
                        <div id="settingprofile" class="accordion">
                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="personalinfo1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#personalinfo" aria-expanded="true" aria-controls="personalinfo">
                                        <h5 class="font-size-14 m-0">Personal Info</h5>
                                    </button>
                                </div>
                                <div id="personalinfo" class="accordion-collapse collapse show" aria-labelledby="personalinfo1" data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="float-end">
                                            <button type="button" class="btn btn-light btn-sm"><i class="ri-edit-fill me-1 ms-0 align-middle"></i> Edit</button>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-1">Name</p>
                                            <h5 class="font-size-14">Patricia Smith</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Email</p>
                                            <h5 class="font-size-14">adc@123.com</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Time</p>
                                            <h5 class="font-size-14">11:40 AM</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Location</p>
                                            <h5 class="font-size-14 mb-0">California, USA</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end personal info card -->

                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="privacy1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy" aria-expanded="false" aria-controls="privacy">
                                        <h5 class="font-size-14 m-0">Privacy</h5>
                                    </button>
                                </div>
                                <div id="privacy" class="accordion-collapse collapse" aria-labelledby="privacy1" data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Profile photo</h5>
                                                </div>
                                                <div class="dropdown ms-2 me-0">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Everyone</a>
                                                        <a class="dropdown-item" href="#">selected</a>
                                                        <a class="dropdown-item" href="#">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Last seen</h5>

                                                </div>
                                                <div class="ms-2 me-0">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" id="privacy-lastseenSwitch" checked>
                                                        <label class="form-check-label" for="privacy-lastseenSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Status</h5>
                                                </div>
                                                <div class="dropdown ms-2 me-0">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Everyone</a>
                                                        <a class="dropdown-item" href="#">selected</a>
                                                        <a class="dropdown-item" href="#">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Read receipts</h5>
                                                </div>
                                                <div class="ms-2 me-0">
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input" id="privacy-readreceiptSwitch" checked>
                                                        <label class="form-check-label" for="privacy-readreceiptSwitch"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-3 border-top">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-13 mb-0 text-truncate">Groups</h5>

                                                </div>
                                                <div class="dropdown ms-2 me-0">
                                                    <button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Everyone <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Everyone</a>
                                                        <a class="dropdown-item" href="#">selected</a>
                                                        <a class="dropdown-item" href="#">Nobody</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end privacy card -->

                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="security1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#security" aria-expanded="false" aria-controls="security">
                                        <h5 class="font-size-14 m-0"></i> Security</h5>
                                    </button>
                                </div>
                                <div id="security" class="accordion-collapse collapse" aria-labelledby="security1" data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-13 mb-0 text-truncate">Show security notification</h5>

                                            </div>
                                            <div class="ms-2 me-0">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="security-notificationswitch">
                                                    <label class="form-check-label" for="security-notificationswitch"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end security card -->

                            <div class="accordion-item card border mb-2">
                                <div class="accordion-header" id="help1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <h5 class="font-size-14 m-0"></i> Help</h5>
                                    </button>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="help1" data-bs-parent="#settingprofile">
                                    <div class="accordion-body">
                                        <div class="py-3">
                                            <h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">FAQs</a></h5>
                                        </div>
                                        <div class="py-3 border-top">
                                            <h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Contact</a></h5>
                                        </div>
                                        <div class="py-3 border-top">
                                            <h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Terms & Privacy policy</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end profile-setting-accordion -->
                    </div>
                    <!-- End User profile description -->
                </div>
                <!-- Start Settings content -->
            </div>
            <!-- End settings tab-pane -->
        </div>
        <!-- end tab content -->

    </div>
    <!-- end chat-leftsidebar -->


    <!-- Start User chat -->


    <div class="user-chat w-100 overflow-hidden">

        <div class="messages"></div>


        <form method="post" class="gonder">
            <!-- start chat input section -->
            <div class="chat-input-section p-3 p-lg-4 border-top mb-0">

                <div class="row g-0">

                    <div class="col">
                        <input type="text" name="mesaj" class="form-control form-control-lg bg-light border-light" placeholder="Enter Message...">
                        <input type="hidden" value="<?= $_SESSION["_token"] ?>" name="token">
                        <input type="hidden" value="<?= Sifrele("mesaj_gonder") ?>" name="islem">
                        
                        <input type="hidden" value="<?= substr($_SESSION["ad"], 0, 1); ?>" name="harf">
                        <input type="hidden" value="<?= date('d.m.Y H:i:s') ?>" name="saat">
                    </div>
                    <div class="col-auto">
                        <div class="chat-input-links ms-md-2 me-md-0">
                            <ul class="list-inline mb-0">

                                <li class="list-inline-item">
                                    <button type="submit" class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light">
                                        <i class="ri-send-plane-2-fill"></i> <span class="mySpinner"></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end chat input section -->
        </form>
    </div>




    <?php
    require_once("include/footer.php");
    $db = null;
    ?>