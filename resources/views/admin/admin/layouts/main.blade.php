<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> NBC ADMIN Members </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link href="admin/resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->







    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************-->

        <!-- ***********************************-->
        <div class="nav-header">

            <div class="brand-logo">
                <a>
                    <span class="brand-title">

                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="pt-3"> <b> NBC Members Tab </b></h2>
                </div>

            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <br> <br>
                    <li>
                        <a href="leaderdash">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Members</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/addmember"> <i class="icon-plus menu-icon"></i><span class="nav-text">Approve Member</span></a></li>
                            <li><a href="/membersmanage"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Member</span></a></li>
                            <!-- <li><a href="./"> <i class="fa fa-bar-chart menu-icon"></i><span class="nav-text">Salary Table</span></a></li> -->

                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-users"></i><span class="nav-text">Meetings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/newmeeting"> <i class="icon-plus menu-icon"></i><span class="nav-text">Set Up New Meeting</span></a></li>
                            <li><a href="/meeting"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Discover Other Meetings</span></a></li>
                            <!-- <li><a href="./"> <i class="fa fa-bar-chart menu-icon"></i><span class="nav-text">Salary Table</span></a></li> -->

                        </ul>
                    </li>


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-bullhorn"></i><span class="nav-text">Announcements</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/announcement"> <i class="icon-plus menu-icon"></i><span class="nav-text">Create Announcement</span></a></li>
                            <li><a href="/editannouncement"> <i class="fa fa-pencil menu-icon"></i><span class="nav-text">Edit An Announcement</span></a></li>
                            <!-- <li><a href="./"> <i class="fa fa-bar-chart menu-icon"></i><span class="nav-text">Salary Table</span></a></li> -->

                        </ul>
                    </li>


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-address-card-o menu-icon"></i><span class="nav-text">Admin</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./add-admin.php"> <i class="icon-plus menu-icon"></i><span class="nav-text">Add
                                        Admin</span></a></li>
                            <li><a href="./manage-admin.php"> <i class="fa fa-tasks menu-icon"></i><span class="nav-text">Manage Admins</span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/memberleave">
                            <i class="fas fa-calendar"></i><span class="nav-text">Manage Leave For Members</span>
                        </a>
                    </li>
                    <li>
                        <a href="/adminlog">
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="/profile">
                            <!-- <img src="https://icon-library.net//images/icon-profile/icon-profile-20.jpg" width="14"> -->
                            <i class="fa fa-user menu-icon"></i><span class="nav-text"> Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">



            <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div id="modalHead" class="modal-header">
                            <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="addMsg" class="text-center font-weight-bold"></p>
                        </div>
                        <div class="modal-footer ">
                            <div class="mx-auto">
                                <a type="button" id="linkBtn" href="#" class="btn btn-primary">Add Expense For the
                                    Day</a>
                                <a type="button" id="closeBtn" href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row -->

            <div class="container-fluid">

                @yield('content')


            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <div class="footer hide">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="#">Automation Eye Limited</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="admin/resorce/plugins/common/common.min.js"></script>
    <script src="admin/resorce/js/custom.min.js"></script>
    <script src="admin/resorce/js/settings.js"></script>
    <script src="admin/resorce/js/gleek.js"></script>
    <script src="admin/resorce/js/styleSwitcher.js"></script>

</body>

</html>