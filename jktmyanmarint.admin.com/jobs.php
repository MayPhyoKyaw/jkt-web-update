<?php
session_start();
include_once 'auth/authenticate.php';
include("confs/config.php");
include("confs/jobs_config.php");
$en_result = mysqli_query($jobs_db_conn, "SELECT * FROM en_jobs");
$mm_result = mysqli_query($jobs_db_conn, "SELECT * FROM mm_jobs");
$jp_result = mysqli_query($jobs_db_conn, "SELECT * FROM jp_jobs");

$get_notifications = "SELECT * FROM notifications WHERE seen=0 AND created_at >= DATE_SUB(NOW(),INTERVAL 6 HOUR)";
$noti_result = mysqli_query($conn, $get_notifications);
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="img/logo.jpg" />
    <title>JKT Admin - Jobs</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <style>
        .jd-top,
        .jd-mid {
            display: flex;
            justify-content: space-between;
        }

        .jd-mid p {
            width: 50%;
            text-align: left;
        }

        .jd-mid .left,
        .jd-mid .middle {
            margin-right: 20px;
        }

        .jd-mid .right {
            margin-left: 20px;
        }

        .jd-mid label {
            display: block;
            font-weight: 600;
        }

        .jd-img {
            height: 150px;
            width: 150px;
            object-fit: cover;
            margin-left: 30px;
        }

        .property {
            width: 150px;
        }

        .value {
            width: 250px;
        }

        .status-pillow {
            padding: 5px 6px;
            font-style: italic;
            font-size: small;
            color: #fff;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
        }

        .borderless {
            width: 400px;
        }

        .borderless td,
        .borderless th {
            border: none;
        }

        .addon {
            border: 1px solid #ddd;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">JKT Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block my-1">

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="./students.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Enrollments</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="newEnroll.php">
                            <i class="fas fa-fw fa-user-plus"></i>
                            <span>New Enrollment</span>
                        </a>
                        <a class="collapse-item" href="enrollments.php">
                            <i class="fas fa-fw fa-paperclip"></i>
                            <span>All Enrollments</span>
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>Courses</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="newCourse.php">
                            <i class="fas fa-fw fa-folder-plus"></i>
                            <span>New Course</span>
                        </a>
                        <a class="collapse-item" href="courses.php">

                            <i class="fas fa-fw fa-folder-open"></i>
                            <span>All Courses</span>
                        </a>
                        <a class="collapse-item" href="categories.php">
                            <i class="fas fa-fw fa-clipboard-list"></i>
                            <span>Categories</span>

                        </a>
                        <a class="collapse-item" href="types.php">

                            <i class="fas fa-fw fa-thumbtack"></i>
                            <span>Course types</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Payments</span>
                </a>
                <div id="collapsePayment" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./payment.php">
                            <i class="fas fa-fw fa-check"></i>
                            <span>Approved Payments</span></a>
                        <a class="collapse-item" href="./pendingPayments.php">
                            <i class="fas fa-fw fa-dollar-sign"></i>
                            <span>Pending Payments</span></a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block my-1">

            <li class="nav-item">
                <a class="nav-link" href="./consultants.php">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Consultants</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecruitment" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Recruitment</span>
                </a>
                <div id="collapseRecruitment" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./jobs.php">
                            <i class="fas fa-fw fa-suitcase"></i>
                            <span>All jobs</span></a>
                        <a class="collapse-item" href="./applicants.php">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Applicants</span></a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block my-1">

            <li class="nav-item">
                <a class="nav-link" href="./policies.php">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>Policy</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search nav-title">
                        <h3>Jobs</h3>
                    </div>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php if (mysqli_num_rows($noti_result) > 0) { ?>
                                    <span class="badge badge-danger badge-counter"><?php echo mysqli_num_rows($noti_result) ?>+</span>
                                <?php } else { ?>
                                    <span class="badge badge-info badge-counter"><?php echo mysqli_num_rows($noti_result) ?></span>
                                <?php } ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifications Center
                                </h6>
                                <?php while ($row = mysqli_fetch_assoc($noti_result)) : ?>
                                    <a class="dropdown-item d-flex align-items-center" href="notiView.php?id=<?php echo $row["noti_id"] ?>">
                                        <div class="mr-3">
                                        <?php if ($row["type"] == "PENDING_REQUEST") : ?>
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-user-plus text-white"></i>
                                                </div>
                                            <?php elseif ($row["type"] == "PENDING_PAYMENT") : ?>
                                                <div class="icon-circle bg-success">
                                                    <i class="fas fa-donate text-white"></i>
                                                </div>
                                            <?php elseif ($row["type"] == "NEW_APPOINTMENT") : ?>
                                                <div class="icon-circle bg-secondary">
                                                    <i class="fas fa-user-tie text-white"></i>
                                                </div>
                                            <?php elseif ($row["type"] == "NEW_JOB_APPLICATION") :  ?>
                                                <div class="icon-circle bg-info">
                                                    <i class="fas fa-solid fa-briefcase text-white"></i>
                                                </div>    
                                            <?php else :  ?>
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?php echo $row["created_at"] ?></div>
                                            <span class="font-weight-bold"><?php echo $row["title"] ?></span>
                                        </div>
                                    </a>
                                <?php endwhile; ?>

                                <a class="dropdown-item text-center small text-gray-500" href="notiView.php">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> -->
                                <a class="dropdown-item" href="./setting.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <div class="row">
                        <div class="card shadow mb-4 table-lg">
                            <div class="card-header py-3" style="display: flex;justify-content:space-between;">
                                <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                                <a href="newJob.php" class="new">
                                    <i class="fas fa-fw fa-folder-plus"></i>
                                    Post New Job
                                </a>

                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-language fa-2xl"></i>
                                    </button>
                                    <div class="dropdown-menu" style="min-width: 30px;" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" id="click-btn-1">
                                            <img src="img/ukFlag.png" alt="" height="20" class="outsidetablabel" width="22">
                                        </a>
                                        <a class="dropdown-item" id="click-btn-2">
                                            <img src="img/mmFlag.svg" alt="" height="20" class="outsidetablabel" width="22">
                                        </a>
                                        <a class="dropdown-item" id="click-btn-3">
                                            <img src="img/japanFlag.jpg" alt="" height="20" class="outsidetablabel" width="22">
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3 px-4" id="en-filters">
                                <div class="col-12 col-md-4 en-filter1"></div>
                                <div class="col-12 col-md-4 en-filter2"></div>
                                <div class="col-12 col-md-4 en-filter3"></div>
                            </div>
                            <div class="row mt-3 px-4" id="mm-filters">
                                <div class="col-12 col-md-4 mm-filter1"></div>
                                <div class="col-12 col-md-4 mm-filter2"></div>
                                <div class="col-12 col-md-4 mm-filter3"></div>
                            </div>
                            <div class="row mt-3 px-4" id="jp-filters">
                                <div class="col-12 col-md-4 jp-filter1"></div>
                                <div class="col-12 col-md-4 jp-filter2"></div>
                                <div class="col-12 col-md-4 jp-filter3"></div>
                            </div>
                            <div class="card-body">
                                <div class="tabs">

                                    <div id="content-1">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="enDT" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th class="en-company-filter">Company</th>
                                                        <th class="en-type-filter">Type</th>
                                                        <th>Wage</th>
                                                        <th>OT wage</th>
                                                        <th>holidays</th>
                                                        <th>working_hour</th>
                                                        <th>breaktime</th>
                                                        <th>location</th>
                                                        <th class="en-available-filter">Available</th>
                                                        <th>Updated At</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($en_result)) : ?>
                                                        <tr onclick="jobDetail(event,this,'<?= $row['created_at'] ?>','<?= $row['requirements'] ?>','<?= $row['benefits'] ?>','<?= $row['memo'] ?>','<?= $row['photos'] ?>')" data-toggle="modal" data-target="#detailModal" class="tb-row">
                                                            <td><?= $row['job_id'] ?></td>
                                                            <td><?= $row['job_title'] ?></td>
                                                            <td><?= $row['company_name'] ?></td>
                                                            <td><?= $row['job_type'] . "~" . $row['employment_type'] ?></td>
                                                            <td><?= $row['wage'] ?></td>
                                                            <td><?= $row['overtime'] ?></td>
                                                            <td><?= $row['holidays'] ?></td>
                                                            <td><?= $row['working_hour'] ?></td>
                                                            <td><?= $row['breaktime'] ?></td>
                                                            <td><?= $row['location'] ?></td>
                                                            <td><?php echo $row['isavailable'] == 1 ? "&#9989;" : "&#10060;" ?></td>
                                                            <td><?= $row['updated_at'] ?></td>
                                                            <td><button class="tb-btn tb-btn-edit" onclick="setCurrentJobEdit(this)" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button></td>
                                                            <td><button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'<?php echo $row['job_id'] ?>')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button></i></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="content-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="mmDT" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th class="mm-company-filter">Company</th>
                                                        <th class="mm-type-filter">Type</th>
                                                        <th>Wage</th>
                                                        <th>OT wage</th>
                                                        <th>holidays</th>
                                                        <th>working_hour</th>
                                                        <th>breaktime</th>
                                                        <th>location</th>
                                                        <th class="mm-available-filter">Available</th>
                                                        <th>Updated At</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($mm_result)) : ?>
                                                        <tr onclick="jobDetail(event,this,'<?= $row['created_at'] ?>','<?= $row['requirements'] ?>','<?= $row['benefits'] ?>','<?= $row['memo'] ?>','<?= $row['photos'] ?>')" data-toggle="modal" data-target="#detailModal" class="tb-row">
                                                            <td><?= $row['job_id'] ?></td>
                                                            <td><?= $row['job_title'] ?></td>
                                                            <td><?= $row['company_name'] ?></td>
                                                            <td><?= $row['job_type'] . "~" . $row['employment_type'] ?></td>
                                                            <td><?= $row['wage'] ?></td>
                                                            <td><?= $row['overtime'] ?></td>
                                                            <td><?= $row['holidays'] ?></td>
                                                            <td><?= $row['working_hour'] ?></td>
                                                            <td><?= $row['breaktime'] ?></td>
                                                            <td><?= $row['location'] ?></td>
                                                            <td><?php echo $row['isavailable'] == 1 ? "&#9989;" : "&#10060;" ?></td>
                                                            <td><?= $row['updated_at'] ?></td>
                                                            <td><button class="tb-btn tb-btn-edit" onclick="setCurrentJobEdit(this)" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button></td>
                                                            <td><button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'<?php echo $row['job_id'] ?>')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button></i></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="content-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="jpDT" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th class="jp-company-filter">Company</th>
                                                        <th class="jp-type-filter">Type</th>
                                                        <th>Wage</th>
                                                        <th>OT wage</th>
                                                        <th>holidays</th>
                                                        <th>working_hour</th>
                                                        <th>breaktime</th>
                                                        <th>location</th>
                                                        <th class="jp-available-filter">Available</th>
                                                        <th>Updated At</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($jp_result)) : ?>
                                                        <tr onclick="jobDetail(event,this,'<?= $row['created_at'] ?>','<?= $row['requirements'] ?>','<?= $row['benefits'] ?>','<?= $row['memo'] ?>','<?= $row['photos'] ?>')" data-toggle="modal" data-target="#detailModal" class="tb-row">
                                                            <td><?= $row['job_id'] ?></td>
                                                            <td><?= $row['job_title'] ?></td>
                                                            <td><?= $row['company_name'] ?></td>
                                                            <td><?= $row['job_type'] . "~" . $row['employment_type'] ?></td>
                                                            <td><?= $row['wage'] ?></td>
                                                            <td><?= $row['overtime'] ?></td>
                                                            <td><?= $row['holidays'] ?></td>
                                                            <td><?= $row['working_hour'] ?></td>
                                                            <td><?= $row['breaktime'] ?></td>
                                                            <td><?= $row['location'] ?></td>
                                                            <td><?php echo $row['isavailable'] == 1 ? "&#9989;" : "&#10060;" ?></td>
                                                            <td><?= $row['updated_at'] ?></td>
                                                            <td><button class="tb-btn tb-btn-edit" onclick="setCurrentJobEdit(this)" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button></td>
                                                            <td><button class="tb-btn tb-btn-delete" onclick="setCurrentJobDel(event,'<?php echo $row['job_id'] ?>')" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button></i></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- editing Modal -->
            <div class="modal fade" id="editingModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editing</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="col-12" id="editingModal" action="backend/editJob.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="jobIdEdit" id="jobIdEdit">

                                <hr />
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-primary" type="submit" value="Update">
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <!-- delete modal -->
            <div class="modal fade" id="deletingModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Deleting</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete?</p>
                            <form class="col-12" action="backend/deleteJob.php" method="POST">
                                <input type="hidden" name="jobIdDel" id="jobIdDel">
                                <hr />
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-primary" type="submit" value="Delete">
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- detail modal -->
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title px-2">Job Detail</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mx-0">
                                <div class="jd-top">
                                    <table class="table text-left px-3 borderless">
                                        <tbody>
                                            <tr>
                                            <tr class="property">
                                                <td class="property">
                                                    Job ID
                                                </td>
                                                <td class="value" id="detailJobId">
                                                    ID
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="property">Job Title</td>
                                                <td class="value" id="detailJobTitle">the Title</td>
                                            </tr>
                                            <tr>
                                                <td class="property">Company Name</td>
                                                <td class="value" id="detailCompany">Company</td>
                                            </tr>
                                            <tr>
                                                <td class="property">Status</td>
                                                <td class="value"><span id="detailAvailable" class="status-pillow">Unavailable</span></td>
                                            </tr>
                                            <tr>
                                                <td class="property">Created At</td>
                                                <td class="value" id="detailCreatedAt">12/3/2022</td>
                                            </tr>
                                            <tr>
                                                <td class="property">Updated At</td>
                                                <td class="value" id="detailUpdatedAt">18/3/2022</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                        <img id="detailPhoto1" alt="" class="jd-img">
                                        <img id="detailPhoto2" alt="" class="jd-img">
                                    </div>
                                </div>
                                <div class="jd-mid px-3 my-3">
                                    <p class="left">
                                        <label>Working Hours</label>
                                        <span id="detailWorkingHr">Working Hours</span>
                                    </p>
                                    <p class="middle">
                                        <label>Holidays</label>
                                        <span id="detailHolidays">Holidays</span>
                                    </p>
                                    <p class="right">
                                        <label class="text-danger">Break-time</label>
                                        <span id="detailBreakTime">break-time</span>
                                    </p>
                                </div>
                                <div class="jd-mid px-3 my-3">
                                    <p class="left">
                                        <label>Employment Type</label>
                                        <span id="detailType"></span>
                                    </p>
                                    <p class="middle">
                                        <label>Salary</label>
                                        <span id="detailWage">100,000 Yen Monthly</span>
                                    </p>
                                    <p class="right">
                                        <label class="text-warning">Over-time wage</label>
                                        <span id="detailOverTime">3000 Yen Daily</span>
                                    </p>
                                </div>
                                <hr />
                                <div class="jd-mid px-3 my-3">
                                    <p class="left">
                                        <label>Requirements</label>
                                        <span id="detailReq">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Nisi lacus sed viverra tellus in hac habitasse platea dictumst. Dis parturient montes nascetur ridiculus. Egestas tellus rutrum tellus pellentesque eu tincidunt.</span>
                                    </p>
                                    <p class="right">
                                        <label>Benefits</label>
                                        <span id="detailBen">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec tincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Nisi lacus sed viverra tellus in hac habitasse platea dictumst. Dis parturient montes nascetur ridiculus. Egestas tellus rutrum tellus pellentesque eu tincidunt.</span>
                                    </p>
                                </div>
                                <hr />
                                <div class="jd-mid px-3 my-3">
                                    <p class="left">
                                        <label>Work Location</label>
                                        <span id="detailLocation">Egestas tellus rutrum tellus pellentesque eu tincidunt.</span>
                                    </p>
                                    <p class="right addon px-3 py-3">
                                        <label class="text-success">Additional Note</label>
                                        <span id="detailNote">Dis parturient montes nascetur ridiculus. Egestas tellus rutrum tellus pellentesque eu tincidunt.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mr-3">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; JKT Myanmar International 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="auth/logoutBackend.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->
    <script src="js/style.js"></script>
    <script src="js/job-filter.js"></script>
    <!-- for excel print -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script>
        // tab content initial state
        document.getElementById("content-1").style.display = "block";

        // filter btns initial state
        document.getElementById("en-filters").style.display = "flex";
        document.getElementById("mm-filters").style.display = "none";
        document.getElementById("jp-filters").style.display = "none";
        document.getElementById("click-btn-1").addEventListener("click", function() {
            // tabs content change on click
            document.getElementById("content-1").style.display = "block";
            document.getElementById("content-2").style.display = "none";
            document.getElementById("content-3").style.display = "none";

            // for filter btns
            document.getElementById("en-filters").style.display = "flex";
            document.getElementById("mm-filters").style.display = "none";
            document.getElementById("jp-filters").style.display = "none";
        })
        document.getElementById("click-btn-2").addEventListener("click", function() {
            // tabs content change on click
            document.getElementById("content-2").style.display = "block";
            document.getElementById("content-1").style.display = "none";
            document.getElementById("content-3").style.display = "none";

            // for filter btns
            document.getElementById("en-filters").style.display = "none";
            document.getElementById("mm-filters").style.display = "flex";
            document.getElementById("jp-filters").style.display = "none";
        })
        document.getElementById("click-btn-3").addEventListener("click", function() {
            // tabs content change on click
            document.getElementById("content-3").style.display = "block";
            document.getElementById("content-1").style.display = "none";
            document.getElementById("content-2").style.display = "none";

            // for filter btns
            document.getElementById("en-filters").style.display = "none";
            document.getElementById("mm-filters").style.display = "none";
            document.getElementById("jp-filters").style.display = "flex";
        })
    </script>
    <script src="">

    </script>
</body>

</html>