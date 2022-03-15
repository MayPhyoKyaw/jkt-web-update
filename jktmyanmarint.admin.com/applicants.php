<?php
session_start();
include_once 'auth/authenticate.php';
// include('checkUser.php');
include("confs/config.php");
include("confs/jobs_config.php");
// $currentEditingID = "";
// $currentDeletingID = "";

// function setCurrentEditing($id)
// {
//     global $currentEditingID;
//     $currentEditingID = $id;
// }
// function setCurrentDeleting($id)
// {
//     global $currentDeletingID;
//     $currentDeletingID = $id;
// }
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
    <title>JKT Admin - All Enrollments</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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

            <li class="nav-item active">
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
                        <h3>Students</h3>
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
                            <!-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                <a href="newEnroll.php" class="new">
                                    <i class="fas fa-fw fa-user-plus"></i>
                                    New Enrollment
                                </a>
                            </div> -->
                            <div class="card-body px-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered my-table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Job Id</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Date Of Birth</th>
                                                <!-- <th class="filter-link">Nrc</th> -->
                                                <th>Gender</th>
                                                <th>JLPT Level</th>
                                                <th>Resume</th>
                                                <th>Facebook Profile Link</th>
                                                <th>Porfolio Link</th>
                                                <th>Additional Note</th>
                                                <th>created_at</th>
                                                <th>updated_at</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $get_applications = "SELECT * FROM applications ORDER BY updated_at DESC";
                                            $applications_result = mysqli_query($jobs_db_conn, $get_applications);
                                            while ($row1 = mysqli_fetch_assoc($applications_result)) :
                                            ?>
                                                <tr onclick="applicantDetail(this,<?= $row1['applicant_id'] ?>,'<?= $row1['resume'] ?>','<?= $row1['fb_profile_link'] ?>','<?= $row1['porfolio_link'] ?>','<?= $row1['additional_note'] ?>')" data-toggle="modal" data-target="#detailModal" class="tb-row">
                                                    <td style="max-width : 100px;"><?= $row1['applicant_name'] ?></td>
                                                    <td><?= $row1['job_id'] ?></td>
                                                    <td><?= $row1['applicant_email'] ?></td>
                                                    <td><?= $row1['applicant_phone'] ?></td>
                                                    <td style="max-width: 130px;"><?= $row1['applicant_dob'] ?></td>
                                                    <td><?= $row1['gender'] ?></td>
                                                    <td><?= $row1['jlpt_level'] ?></td>
                                                    <td><?php echo empty($row1['resume']) ? "-" : $row1["resume"] ?></td>
                                                    <td>
                                                        <p style="display: none" class="hide-scroll"><?php echo empty($row1['fb_profile_link']) ? "-" : $row1['fb_profile_link']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p style="display: none" class="hide-scroll"><?php echo empty($row1['porfolio_link']) ? "-" : $row1['porfolio_link']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p style="display: none" class="hide-scroll"><?php echo empty($row1['additional_note']) ? "-" : $row1['additional_note']; ?></p>
                                                    </td>
                                                    <td><?= date('Y-m-d', strtotime($row1['created_at'])) ?></td>
                                                    <td><?= date('Y-m-d', strtotime($row1['updated_at'])) ?></td>
                                                    <td><button class="tb-btn tb-btn-edit" onclick="applicant_edit(event,this,<?php echo $row1['applicant_id'] ?>)" data-toggle="modal" data-target="#editingApplicantModal"><i class="fa fa-pencil"></i></button></td>
                                                    <td><button class="tb-btn tb-btn-delete" onclick="applicant_delete(event,this,<?php echo $row1['applicant_id'] ?>)" data-toggle="modal" data-target="#deletingApplicantModal"><i class="fa fa-trash"></button></i></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

    <!-- detail modal -->

    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header pl-5">
                    <h5 class="modal-title ml-3">Applicant Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-11 mx-auto">
                        <table class="table table-striped applicant-detail-table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 12em;">Property</th>
                                    <th scope="col">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td id="detailName"></td>
                                </tr>
                                <tr>
                                    <td>Job Id</td>
                                    <td id="detailJobId"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td id="detailEmail"></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td id="detailPhone"></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td id="detailDob"></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td id="detailGender"></td>
                                </tr>
                                <tr>
                                    <td>JLPT Level</td>
                                    <td id="detailJlptLevel"></td>
                                </tr>
                                <tr>
                                    <td>Resume</td>
                                    <td id="detailResume"></td>
                                </tr>
                                <tr>
                                    <td>Facebook Profile Link</td>
                                    <td id="detailFbPfLink"></td>
                                </tr>
                                <tr>
                                    <td>Porfolio Link</td>
                                    <td id="detailPorfolioLink"></td>
                                </tr>
                                <tr>
                                    <td>Note</td>
                                    <td id="detailNote"></td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td id="detailCreatedAt"></td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td id="detailUpdatedAt"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- editing modal -->
    <div class="modal fade" id="editingModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Applicant's Editing</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="col-12" id="editingApplicantModal" action="backend/editApplicant.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="applicantId" id="applicantId" />
                        <input type="hidden" name="createdAt" id="createdAt" />
                        <div class="form-group mb-4">
                            <label for="applicantName">Enter Applicant Name<span class="my-required-field">Required*</span></label>
                            <input type="text" name="applicantName" id="applicantName" class="form-control" required />
                        </div>
                        <div class="form-group mb-4">
                            <label for="jobId">Enter Job ID<span class="my-required-field">Required*</span></label>
                            <input type="text" name="jobId" id="jobId" class="form-control" placeholder="eg. U Kyaw" required />
                        </div>
                        <div class="form-group mb-4">
                            <label for="email">Enter Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="eg. student@gmail.com" required />
                        </div>
                        <div class="form-group mb-4">
                            <label for="phone">Enter Phone<span class="my-required-field">Required*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="09..." required />
                        </div>
                        <div class="form-group mb-4">
                            <label for="dob">Choose Birthday<span class="my-required-field">Required*</span></label>
                            <input type="date" name="dob" id="dob" class="form-control" required />
                        </div>
                        <div class="form-group mb-4 ">
                            <label>Gender<span class="my-required-field">Required*</span></label><br>
                            <div class="form-control">
                                <label for="gender">Male</label>
                                <input type="radio" name="gender" id="gender" value="Male" required />
                                <label for="gender">Female</label>
                                <input type="radio" name="gender" id="gender" value="Female" required />
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="jlptLevel">JLPT Level<span class="my-required-field">Required*</span></label>
                            <select id="jlptLevel" name="jlptLevel" class="form-control form-control-user" required>
                                <option value="" selected disabled>Choose Applicant JLPT Level</option>
                                <option value="N5">N5</option>
                                <option value="N4">N4</option>
                                <option value="N3">N3</option>
                                <option value="N2">N2</option>
                                <option value="N1">N1</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="resume">Enter Resume</label>
                            <input type="file" name="resume" id="resume" class="form-control resume" placeholder="University or High School" />
                        </div>
                        <div class="form-group mb-4">
                            <label for="fbPfLink">Enter Facebook Profile Link</label>
                            <input type="text" name="fbPfLink" id="fbPfLink" class="form-control" placeholder="University or High School" />
                        </div>
                        <div class="form-group mb-4">
                            <label for="porfolio">Enter Porfolio Link</label>
                            <textarea name="porfolio" id="porfolio" cols="30" rows="5" class="form-control" placeholder="eg. No - , Yangon"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="note">Enter Additional Note</label>
                            <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="eg. No - , Yangon"></textarea>
                        </div>

                        <hr />
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- deleting modal -->
    <div class="modal fade" id="deletingApplicantModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Applicant's Deleting</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You are going to delete <span id="stuName" class="font-weight-bold"></span>.
                        This can't be undone. <span style="color: red; font-weight: bold; font-style: italic;">Are you sure to delete?</span></p>
                    <form action="backend/deleteApplicant.php" id="deleteApplicantForm" method="POST">
                        <input type="hidden" name="applicantId" id="applicantId" />
                        <hr />
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Delete</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/applicants.js"></script>
</body>

</html>