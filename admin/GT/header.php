<?php

   include('session.php');

   $msg ='';

?>

<!doctype html>

<html lang="en">



    <head>

        

        <meta charset="utf-8" />

        <title>Dashboard | Giddy Cruise Transport</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta content="We provide safe, affordable,and convenient daily transportation." name="description" />

        <meta content="Bhoyee Global Enterprise" name="author" />

        <!-- App favicon -->

        <link rel="shortcut icon" href="assets/images/favicon.ico">



        <!-- jquery.vectormap css -->

        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />



        <!-- DataTables -->

        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />



        <!-- Responsive datatable examples -->

        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  



        <!-- Bootstrap Css -->

        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->

        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- App Css-->

        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />



    </head>



    <body data-topbar="dark">

    

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->



        <!-- Begin page -->

        <div id="layout-wrapper">



            

            <header id="page-topbar">

                <div class="navbar-header">

                    <div class="d-flex">

                        <!-- LOGO -->

                        <div class="navbar-brand-box">

                            <a href="index.html" class="logo logo-dark">

                                <span class="logo-sm">

                                    <img src="assets/images/logo-sm.png" alt="logo-sm" height="22">

                                </span>

                                <span class="logo-lg">

                                    <img src="assets/images/logo-dark.png" alt="logo-dark" height="20">

                                </span>

                            </a>



                            <a href="index.html" class="logo logo-light">

                                <span class="logo-sm">

                                    <img src="assets/images/logo-sm.png" alt="logo-sm-light" height="25">

                                </span>

                                <span class="logo-lg">

                                    <img src="assets/images/logo-light.png" alt="logo-light" height="25">

                                </span>

                            </a>

                        </div>



                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">

                            <i class="ri-menu-2-line align-middle"></i>

                        </button>



                        <!-- App Search-->

                        <form class="app-search d-none d-lg-block">

                            <div class="position-relative">

                                <input type="text" class="form-control" placeholder="Search...">

                                <span class="ri-search-line"></span>

                            </div>

                        </form>



                        <!-- <div class="dropdown dropdown-mega d-none d-lg-block ms-2">

                            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">

                                Mega Menu

                                <i class="mdi mdi-chevron-down"></i> 

                            </button>

                         

                        </div> -->

                    </div>



                    <div class="d-flex">



                        <div class="dropdown d-inline-block d-lg-none ms-2">

                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"

                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="ri-search-line"></i>

                            </button>

                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"

                                aria-labelledby="page-header-search-dropdown">

                    

                                <form class="p-3">

                                    <div class="mb-3 m-0">

                                        <div class="input-group">

                                            <input type="text" class="form-control" placeholder="Search ...">

                                            <div class="input-group-append">

                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>



                        <div class="dropdown d-none d-sm-inline-block">

                            <button type="button" class="btn header-item waves-effect"

                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img class="" src="assets/images/flags/us.jpg" alt="Header Language" height="16">

                            </button>

                     

                        </div>



                        <div class="dropdown d-none d-lg-inline-block ms-1">

                            <button type="button" class="btn header-item noti-icon waves-effect"

                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="ri-apps-2-line"></i>

                            </button>

                            <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                                <div class="px-lg-2">

                                    <div class="row g-0">

                                        <div class="col">

                                            <a class="dropdown-icon-item" href="#">

                                                <img src="assets/images/brands/github.png" alt="Github">

                                                <span>GitHub</span>

                                            </a>

                                        </div>

                                        <div class="col">

                                            <a class="dropdown-icon-item" href="#">

                                                <img src="assets/images/brands/bitbucket.png" alt="bitbucket">

                                                <span>Bitbucket</span>

                                            </a>

                                        </div>

                                        <div class="col">

                                            <a class="dropdown-icon-item" href="#">

                                                <img src="assets/images/brands/dribbble.png" alt="dribbble">

                                                <span>Dribbble</span>

                                            </a>

                                        </div>

                                    </div>



                                    <div class="row g-0">

                                        <div class="col">

                                            <a class="dropdown-icon-item" href="#">

                                                <img src="assets/images/brands/dropbox.png" alt="dropbox">

                                                <span>Dropbox</span>

                                            </a>

                                        </div>

                                        <div class="col">

                                            <a class="dropdown-icon-item" href="#">

                                                <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">

                                                <span>Mail Chimp</span>

                                            </a>

                                        </div>

                                        <div class="col">

                                            <a class="dropdown-icon-item" href="#">

                                                <img src="assets/images/brands/slack.png" alt="slack">

                                                <span>Slack</span>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div> -->

                        </div>



                        <div class="dropdown d-none d-lg-inline-block ms-1">

                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">

                                <i class="ri-fullscreen-line"></i>

                            </button>

                        </div>



                        <div class="dropdown d-inline-block">

                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"

                                  data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="ri-notification-3-line"></i>

                                <span class="noti-dot"></span>

                            </button>

                            <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"

                                aria-labelledby="page-header-notifications-dropdown">

                                <div class="p-3">

                                    <div class="row align-items-center">

                                        <div class="col">

                                            <h6 class="m-0"> Notifications </h6>

                                        </div>

                                        <div class="col-auto">

                                            <a href="#!" class="small"> View All</a>

                                        </div>

                                    </div>

                                </div>

                                <div data-simplebar style="max-height: 230px;">

                                    <a href="" class="text-reset notification-item">

                                        <div class="d-flex">

                                            <div class="avatar-xs me-3">

                                                <span class="avatar-title bg-primary rounded-circle font-size-16">

                                                    <i class="ri-shopping-cart-line"></i>

                                                </span>

                                            </div>

                                            <div class="flex-1">

                                                <h6 class="mb-1">Your order is placed</h6>

                                                <div class="font-size-12 text-muted">

                                                    <p class="mb-1">If several languages coalesce the grammar</p>

                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                    <a href="" class="text-reset notification-item">

                                        <div class="d-flex">

                                            <img src="assets/images/users/avatar-3.jpg"

                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">

                                            <div class="flex-1">

                                                <h6 class="mb-1">James Lemire</h6>

                                                <div class="font-size-12 text-muted">

                                                    <p class="mb-1">It will seem like simplified English.</p>

                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                    <a href="" class="text-reset notification-item">

                                        <div class="d-flex">

                                            <div class="avatar-xs me-3">

                                                <span class="avatar-title bg-success rounded-circle font-size-16">

                                                    <i class="ri-checkbox-circle-line"></i>

                                                </span>

                                            </div>

                                            <div class="flex-1">

                                                <h6 class="mb-1">Your item is shipped</h6>

                                                <div class="font-size-12 text-muted">

                                                    <p class="mb-1">If several languages coalesce the grammar</p>

                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>

                                                </div>

                                            </div>

                                        </div>

                                    </a>



                                    <a href="" class="text-reset notification-item">

                                        <div class="d-flex">

                                            <img src="assets/images/users/avatar-4.jpg"

                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">

                                            <div class="flex-1">

                                                <h6 class="mb-1">Salena Layfield</h6>

                                                <div class="font-size-12 text-muted">

                                                    <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>

                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>

                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                </div>

                                <div class="p-2 border-top">

                                    <div class="d-grid">

                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">

                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..

                                        </a>

                                    </div>

                                </div>

                            </div> -->

                        </div>



                        <div class="dropdown d-inline-block user-dropdown">

                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"

                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"

                                    alt="Header Avatar">

                                <span class="d-none d-xl-inline-block ms-1">Admin</span>

                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>

                            </button>

                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->

                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>

                                <!-- <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a> -->

                                <a class="dropdown-item d-block" href="#"><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>

                                <!-- <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>

                                <div class="dropdown-divider"></div> -->

                                <a class="dropdown-item text-danger" href="logout.php"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>

                            </div>

                        </div>



                        <!-- <div class="dropdown d-inline-block">

                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">

                                <i class="ri-settings-2-line"></i>

                            </button>

                        </div> -->

            

                    </div>

                </div>

            </header>



            <!-- ========== Left Sidebar Start ========== -->

            <div class="vertical-menu">



                <div data-simplebar class="h-100">



                    <!-- User details -->

                    <div class="user-profile text-center mt-3">

                        <div class="">

                            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">

                        </div>

                        <div class="mt-3">

                            <h4 class="font-size-16 mb-1">Super Admin</h4>

                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>

                        </div>

                    </div>



                    <!--- Sidemenu -->

                    <div id="sidebar-menu">

                        <!-- Left Menu Start -->

                        <ul class="metismenu list-unstyled" id="side-menu">

                            <li class="menu-title">Menu</li>



                            <li>

                                <a href="dashboard.php" class="waves-effect">

                                    <i class="ri-dashboard-line"></i>  <!-- <span class="badge rounded-pill bg-success float-end">3</span> -->

                                    <span>Dashboard</span>

                                </a>

                            </li>
                                 <li>

                                <a href="gqoute.php" class="waves-effect">

                                    <i class="ri-dashboard-line"></i>  <!-- <span class="badge rounded-pill bg-success float-end">3</span> -->

                                    <span>ON/OFF Price</span>

                                </a>

                            </li>


                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class="ri-suitcase-3-line"></i>

                                    <span>Booking</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="bookingConf.php">Confirm Booking</a></li>

                                    <li><a href="mangbook.php">View Today's Booking</a></li>

                                </ul>

                            </li>

                          

                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class="ri-car-fill"></i>

                                    <span>Bus / Car</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="mcar.php">Add / Manage Vehicle</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class="ri-team-fill"></i>

                                    <span>Passangers</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="psearch.php">View / Manage Passanger</a></li>

                                </ul>

                            </li>



                       

                         



                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class="ri-layout-3-line"></i>

                                    <span>Routes</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="true">

                                    <li>

                                       

                                            <li><a href="addcity.php">Add / Manage City / Terminal</a></li>

                                            <li><a href="addroute.php">Add Route</a></li>

                                            <li><a href="route.php">View / Manage Single Trip</a></li>

                                            <li><a href="mtrip.php">Manage Bulk Trips</a></li>

                                            <li><a href="deltrip.php">Delete Trips</a></li>

                                         

                                        

                                    </li>



                                </ul>

                            </li>

                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class="ri-ticket-line"></i>

                                    <span>Seats</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="seat.php">View / Manage Seats</a></li>

                                  

                                </ul>

                            </li>

                            <li>

                                <a href="search.php" class=" waves-effect">

                                    <i class="ri-search-2-line"></i>

                                    <span>Search Transaction</span>

                                </a>

                            </li>

                



                            <li class="menu-title">Money</li>



                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class="ri-money-dollar-box-line"></i>

                                    <span>Payment</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="adminpayment.php">View Payments</a></li>

                                    <li><a href="https://giddycruisetransportation.com/thepayment.php">Make Payment</a></li>

                                 

                                </ul>

                            </li>



                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class=" ri-funds-box-line"></i>

                                    <span>Sales</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="sales.php">View Sales</a></li>

                               

                                </ul>

                            </li>



                            <li class="menu-title">Invoice</li>



                            <li>

                                <a href="javascript: void(0);" class="has-arrow waves-effect">

                                    <i class="ri-money-dollar-box-line"></i>

                                    <span>Receipt / Invoice</span>

                                </a>

                                <ul class="sub-menu" aria-expanded="false">

                                    <li><a href="quote.php">Send Unpaid Invoice</a></li>

                                    <li><a href="invoice.php">Send Paid Invoice</a></li>
                                    <li><a href="c_paid_invoice.php">Send Custom Paid Invoice</a></li>

                                    <li><a href="salespdf.php" target="_blank">Today Total Sales</a></li>

                                    <li><a href="totalsalespdf.php" target="_blank">Total Sales Invoice</a></li>

                                    <li><a href="totalUnpaidsalespdf.php" target="_blank">Total UnPaid Sales</a></li>

                                

                                </ul>

                            </li>





                            <li class="menu-title">Security</li>



                            

                            <li>

                                <a href="pwd.php" class=" waves-effect">

                                    <i class="ri-key-2-line"></i>

                                    <span>Change Password</span>

                                </a>

                            </li>



                            <li>

                                <a href="logout.php" class=" waves-effect">

                                    <i class="ri-shut-down-line"></i>

                                    <span>Logout</span>

                                </a>

                            </li>

                           





                          



                        </ul>

                    </div>

                    <!-- Sidebar -->

                </div>

            </div>

            <!-- Left Sidebar End -->

