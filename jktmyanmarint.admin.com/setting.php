<?php
session_start();
include_once 'auth/authenticate.php';
include('auth/hashFunc.php');
include("confs/config.php");
$admin_query = "SELECT * FROM admins WHERE admin_id = $adminId";
$admin_result = mysqli_query($conn, $admin_query);
$admin_row = mysqli_fetch_assoc($admin_result);
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
    <title>JKT Admin</title>

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
                        <h3>Setting</h3>
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
                <div class="container-fluid">
                    <div class="row pt-3">
                        <div class="col-12 col-sm-9 col-md-8 mx-auto mt-4 mb-3">
                            <div class="row">
                                <div class="col-7 pl-4">
                                    <h4 class="setting-title">
                                        <i class="fas fa-user"> &nbsp; </i><?php echo $admin_row['admin_name'] ?>
                                    </h4>
                                </div>
                                <div class="col-5 text-right pr-5 pb-3">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#username_change" aria-expanded="false" aria-controls="username_change">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="collapse <?php echo isset($_SESSION['name_block_show']) ? $_SESSION['name_block_show'] : '';
                                                    unset($_SESSION['name_block_show']); ?>" id="username_change">
                                <div class="card card-body">
                                    <h4 class="pb-3 pt-2">Change Username : </h4>
                                    <form action="backend/changeUsername.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control form-control-user" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Enter Password" required>
                                            <span id="pswErr" class="invalid-warning"><?php echo isset($_SESSION['chgNameErr']) ? $_SESSION['chgNameErr'] : '';
                                                                                        unset($_SESSION['chgNameErr']); ?></span>
                                        </div>
                                        <button type="submit" name="changeSubmit1" class="btn btn-facebook btn-user btn-block">
                                            <i class="fas fa-edit"></i> Change
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-9 col-md-8 mx-auto mt-4 mb-3">
                            <div class="row">
                                <div class="col-7 pl-4">
                                    <h4 class="setting-title">
                                        <i class="fas fa-key"></i> &nbsp;Change Password :
                                    </h4>
                                </div>
                                <div class="col-5 text-right pr-5 pb-3">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#password_change" aria-expanded="false" aria-controls="password_change">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="collapse <?php echo isset($_SESSION['pswd_block_show']) ? $_SESSION['pswd_block_show'] : '';
                                                    unset($_SESSION['pswd_block_show']); ?>" id="password_change">
                                <div class="card card-body">
                                    <h4>
                                        <?php $getPsd = encrypt_decrypt("decrypt", $admin_row['password']); ?>
                                        <i class="fas fa-eye-slash pswd-hide" id="hidePsd" onclick="showHide()"></i>
                                        <i class="fas fa-eye pswd-show" id="showPsd" style="display: none;" onclick="showHide()"></i>
                                        <input type="password" class="show-password" value="<?php echo $getPsd ?>" id="displayPassword" disabled />
                                    </h4>
                                    <form action="backend/changePassword.php" method="POST" id="chgPswdForm">
                                        <div class="form-group">
                                            <input type="password" name="oldPassword" id="oldPassword" class="form-control form-control-user" placeholder="Enter Old Password" required>
                                            <span id="pswErr" class="invalid-warning"><?php echo isset($_SESSION['chgPswErr']) ? $_SESSION['chgPswErr'] : '';
                                                                                        unset($_SESSION['chgPswErr']); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="newPassword" id="newPassword" class="form-control form-control-user" placeholder="Enter New Password" required>
                                            <span id="pswErr" class="invalid-warning"><?php echo isset($_SESSION['notEqual']) ? $_SESSION['notEqual'] : '';
                                                                                        unset($_SESSION['notEqual']); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-user" placeholder="Re-enter New Password" required>
                                            <span id="pswErr" class="invalid-warning"><?php echo isset($_SESSION['notEqual']) ? $_SESSION['notEqual'] : '';
                                                                                        unset($_SESSION['notEqual']); ?></span>
                                        </div>
                                        <button type="submit" name="changePswdSubmit" class="btn btn-facebook btn-user btn-block">
                                            <i class="fas fa-edit"></i> Change
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-9 col-md-8 mx-auto mt-4">
                            <div class="row">
                                <div class="col-7 pl-4">
                                    <h4 class="setting-title">
                                        <i class='fas fa-landmark'></i> &nbsp;Banking Information :
                                    </h4>
                                </div>
                                <div class="col-5 text-right pr-5 pb-3">
                                    <button class="btn btn-primary mr-3" id="bank_info_show_btn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-success" id="bank_info_add_btn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3" id="bank_info_show">
                                <div class="card card-body">
                                    <h4 class="pb-3 pt-2">Your Current Banking Information: </h4>
                                    <div class="form-group">
                                        <?php
                                        $banking_query = "SELECT * FROM banking_info";
                                        $banking_result = mysqli_query($conn, $banking_query);
                                        while ($row = mysqli_fetch_array($banking_result)) {
                                        ?>
                                            <label class="form-control form-control-user" style="height: 45px;">
                                                <span id="banking_id" style="display: none;"><?php echo $row['bank_id']; ?></span>
                                                <span style="line-height: 30px;" class="display_banking"><?php echo $row['bank_name'] . " : " . $row['account_number'] . " - " . $row['account_name']; ?></span>
                                                <button class="btn btn-danger showDelModal" style="float: right;" data-toggle="modal" data-target="#deleteConfirm" id="showDelModal">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <span style="display: none;" id="accNo"><?php echo $row['account_number'] ?></span>
                                            </label>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3" id="bank_info_add" <?php echo isset($_SESSION['addBank_block_show']) ? $_SESSION['addBank_block_show'] : '';
                                                                    unset($_SESSION['addBank_block_show']); ?>>
                                <div class="card card-body">
                                    <h4 class="pb-3 pt-2">Add Banking Information: </h4>
                                    <form action="backend/addBankingInfo.php" method="POST">
                                        <div class="form-group">
                                            <select name="bankName" id="bankName" class="form-control form-control-user" required>
                                                <option value="" selected disabled>Select Bank</option>
                                                <option value="AYA Bank">AYA Bank</option>
                                                <option value="KBZ Bank">KBZ Bank</option>
                                                <option value="CB Bank">CB Bank</option>
                                                <option value="UAB Bank">UAB Bank</option>
                                                <option value="Shwe Bank">Shwe Bank</option>
                                                <option value="A Bank">A Bank</option>
                                                <option value="AYA Pay">AYA Pay</option>
                                                <option value="KBZ Pay">KBZ Pay</option>
                                                <option value="CB Pay">CB Pay</option>
                                                <option value="Wave Money">Wave Money</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="newAccountNumber" id="newAccountNumber" class="form-control form-control-user" placeholder="Enter Bank Account Number" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="newAccountName" id="newAccountName" class="form-control form-control-user" placeholder="Enter Bank Account Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-user" placeholder="Enter Password" required>
                                            <span id="pswErr" class="invalid-warning"><?php echo isset($_SESSION['addBankErr']) ? $_SESSION['addBankErr'] : '';
                                                                                        unset($_SESSION['addBankErr']); ?></span>
                                        </div>
                                        <button type="submit" name="add_banking" class="btn btn-facebook btn-user btn-block">
                                            <i class="fas fa-plus"></i> Add
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Modal -->
            <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmTitle">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="backend/delete_banking.php" method="POST" id="bankDelete">
                            <div class="modal-body text-center mt-4">
                                Are you sure you want to delete &nbsp; <span class="show-bank-account" id="showBankAcc"></span> ?
                                <input type="hidden" id="accNumber" name="bankAccount" value="" />
                                <div class="text-left delete-bank-form">
                                    <label for="password">Please Enter Password: </label>
                                    <input type="password" name="password" id="password" placeholder="Password" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="deleteBankConfirm" id="deleteBankConfirm" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#warning" id="showDelModal">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="warning" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteConfirmTitle">Incorrect Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center my-4">
                            Your password is incorrect! Please Try Again.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/bank-info-toggle.js"></script>
    <script src="js/setting.js"></script>
</body>

</html>