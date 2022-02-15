<?php
session_start();
include_once 'auth/authenticate.php';
include("confs/config.php");
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
    <title>JKT Admin - New Course</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
            <li class="nav-item active">
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
                        <h3>New Course</h3>
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
                        <form id="courseForm" class="col-12 col-md-11 col-lg-8 mx-auto" action="backend/newCourse.php" method="POST">
                            <div class="form-group mb-4">
                                <label for="title">Enter Title<span class="my-required-field">Required*</span></label>
                                <input type="text" class="form-control form-control-user" id="title" name="title" aria-describedby="tileField" placeholder="Course Title" required />
                            </div>
                            <div class="form-group mb-4">
                                <label for="categoryId">Choose Category<span class="my-required-field">Required*</span></label>
                                <select name="categoryId" id="categoryId" name="categoryId" class="form-control form-control-user" required>
                                    <option value="" selected disabled>Category</option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM categories");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value='<?= $row["category_id"] ?>'><?= $row["title"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="typeId">Choose Type<span class="my-required-field">Required*</span></label>
                                <select name="typeId" id="typeId" class="form-control" required>
                                    <option value="" selected disabled>Type</option>
                                    <?php
                                    $result = mysqli_query($conn, "SELECT * FROM types");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value='<?= $row["type_id"] ?>'><?= $row["title"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-gorup mb-4">
                                <label for="level_or_sub">Enter level/subjects<span class="my-required-field">Required*</span></label>
                                <input type="text" name="level_or_sub" id="level_or_sub" class="form-control" placeholder="eg. N5 or physic/chemistry/Biology..." required />
                            </div>
                            <div class="mb-4 mx-auto row justify-content-between">
                                <div class=" input-left mb-3 mb-md-0">
                                    <label for="fee">Enter Fees<span class="my-required-field">Required*</span></label>
                                    <input type="number" class="form-control" id="fee" name="fee" aria-describedby="feeField" placeholder="eg. 250,000" required />
                                </div>
                                <div class="input-right">
                                    <label for="discountPercent">Enter Discount (%)</label>
                                    <input type="number" class="form-control" id="discountPercent" name="discountPercent" aria-describedby="discountField" placeholder="eg. 5" />
                                </div>
                            </div>
                            <div class="mb-4 mx-auto row justify-content-between">
                                <div class=" input-left mb-3 mb-md-0">
                                    <label for="startDate">Choose Start Date</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" aria-describedby="dateField" />
                                </div>
                                <div class="input-right">
                                    <label for="duration">Duration (Months)<span class="my-required-field">Required*</span></label>
                                    <input type="number" class="form-control" id="duration" name="duration" aria-describedby="monthsField" placeholder="Duration In Months" required />
                                </div>
                            </div>

                            <div class="form-group mb-4 section-gp" id="timeSection">
                                <button class="btn mt-2 btn-user btn-success" id="addSection">Add Section</button>
                                <hr />
                                <label class="mb-2 d-block mt-3 sectionno">Section 1</label>
                                <div class="row justify-content-between px-3 mt-2">
                                    <?php foreach ([["st" => "M", "lg" => "MON"], ["st" => "Tu", "lg" => "TUE"], ["st" => "W", "lg" => "WED"], ["st" => "Th", "lg" => "THU"], ["st" => "F", "lg" => "FRI"], ["st" => "Sa", "lg" => "SAT"], ["st" => "Su", "lg" => "SUN"]] as $day) { ?>
                                        <div class="custom-control custom-checkbox small days-checkbox form-day-check">
                                            <input type="checkbox" id="day1<?= $day["st"] ?>" value="<?= $day["st"] ?>" name="days1[]" class="day-chck">
                                            <label class="mb-0 mt-1" for="day1<?= $day["st"] ?>"><?= $day["lg"] ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="mt-4 mb-3 mx-auto row justify-content-between">
                                    <div class=" input-left mb-3 mb-md-0">
                                        <label for="startTime">Class Starts At:<span class="my-required-field">Required*</span></label>
                                        <input type="time" class="form-control" id="startTime1" name="startTime1" aria-describedby="startTimeField" />
                                    </div>
                                    <div class="input-right">
                                        <label for="endTime">Class Ends At:<span class="my-required-field">Required*</span></label>
                                        <input type="time" class="form-control" id="endTime1" name="endTime1" aria-describedby="endTimeField" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="instructor">Enter Instructor Name</label>
                                <input type="text" class="form-control" name="instructor" id="instructor" placeholder="Mr./Mrs. ..." />
                            </div>
                            <div class="form-group mb-4">
                                <label for="services">Enter Services</label>
                                <textarea class="form-control" name="services" id="services" rows="5" placeholder="eg. Text Book"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="note">Enter Additional Note</label>
                                <textarea class="form-control" name="note" id="note" rows="5" placeholder="Any Additional Note"></textarea>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-facebook btn-user btn-block" id="course_submit">
                                <i class="fa fa-paper-plane fa-fw"></i> Create
                            </button>
                        </form>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/sectionControl.js"></script>
</body>

</html>