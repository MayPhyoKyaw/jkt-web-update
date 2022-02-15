<?php
session_start();
include_once 'auth/authenticate.php';
include("confs/config.php");
$result = mysqli_query($conn, "SELECT * FROM consultants ORDER BY updated_at DESC");
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
    <title>JKT Admin - Consultants</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/fullcalendar.min.css" rel="stylesheet" />
    <!-- <style>
        body {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        }

        #calendar {
            width: 700px;
            margin: 0 auto;
        }

        .response {
            height: 60px;
        }

        .success {
            background: #cdf3cd;
            padding: 10px 60px;
            border: #c3e6c3 1px solid;
            display: inline-block;
        }
    </style> -->
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

            <li class="nav-item active">
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
                        <h3>Consultants</h3>
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
                        <div class="tabs">
                            <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
                            <label for="tab-btn-1">Table View</label>
                            <input type="radio" name="tab-btn" id="tab-btn-2" value="">
                            <label for="tab-btn-2">Calendar View</label>
                            <div id="content-1">
                                <!-- table -->
                                <div class="card shadow mb-4 table-lg">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Type</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Duration</th>
                                                        <th>About</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                        <tr onclick="setCurrentConsultDetail(this)" data-toggle="modal" data-target="#detailModal" class="tb-row">
                                                            <td><?= $row['consultant_id'] ?></td>
                                                            <td><?= $row['name'] ?></td>
                                                            <td><?= $row['email'] ?></td>
                                                            <td><?= $row['phone'] ?></td>
                                                            <td><?= $row['type'] ?></td>
                                                            <td><?= $row['date'] ?></td>
                                                            <td><?= $row['time'] ?></td>
                                                            <td><?= $row['duration'] ?></td>
                                                            <td><?= $row['about'] ?></td>
                                                            <td><?= $row['created_at'] ?></td>
                                                            <td><?= $row['updated_at'] ?></td>
                                                            <td><button class="tb-btn tb-btn-edit" onclick="setCurrentConsultantEdit(event,this)" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button></td>
                                                            <td><button class="tb-btn tb-btn-delete" onclick="setCurrentConsultantDel(event,<?php echo $row['consultant_id'] ?>)" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button></i></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
                                                <form class="col-12" id="editingModal" action="backend/editConsultant.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="appointment_IdEdit" id="appointment_IdEdit">
                                                    <input type="hidden" name="appointment_CreatedAt" id="appointment_CreatedAt">
                                                    <input type="hidden" name="appointment_UpdatedAt" id="appointment_UpdatedAt">
                                                    <label for="name" id="name-label" class="appointment-label">Name </label><br />
                                                    <input type="text" id="appointment_name" name="name" placeholder="Enter Your Name" required class="appointment-input" /><br />

                                                    <label for="email" id="email-label" class="appointment-label">Email </label><br />
                                                    <input type="email" id="appointment_email" name="email" placeholder="Enter Your Email" class="appointment-input" required /><br />

                                                    <label for="phone" id="phone-label" class="appointment-label">Phone Number</label><br />
                                                    <input type="text" id="appointment_phone" name="phone" placeholder="Enter Your Phone Number" class="appointment-input" required /><br />

                                                    <fieldset class="appointment-fieldset">
                                                        <legend class="appointment-legend">Choose a type for your appointment?</legend>

                                                        <input type="radio" id="appointment_type" name="appointment_type" value="Online" />
                                                        <label for="appointment_type" id="radio-label" class="appointment-label">Online</label><br />

                                                        <input type="radio" id="appointment_type" name="appointment_type" value="Office" />
                                                        <label for="appointment_type" id="radio-label" class="appointment-label">Office</label><br />

                                                        <input type="radio" id="appointment_type" name="appointment_type" value="Other" />
                                                        <label for="appointment_type" id="radio-label" class="appointment-label">Other</label><br />
                                                    </fieldset>

                                                    <!-- <div class="mb-4">
                                    <input type="date" style="padding : 30px 20px;" class="form-control" name="appointment_date" id="appointment_date" />
                                </div> -->

                                                    <div class="date-picker">
                                                        <div class="input">
                                                            <input type="text" class="result" name="appointment_date" placeholder="Select Date:" id="appointment_date" value="" readonly />
                                                            <!-- <div class="result">Select Date: <span></span></div>  -->
                                                            <button onclick="event.preventDefault()"><i class="fa fa-calendar"></i></button>
                                                        </div>
                                                        <div class="calendar"></div>
                                                    </div>

                                                    <fieldset class="appointment-fieldset">
                                                        <legend class="appointment-legend">Choose an estimated time for your appointment?</legend>

                                                        <input type="radio" id="appointment_time" name="appointment_time" value="Morning" />
                                                        <label for="appointment_time" id="radio-label" class="appointment-label">Morning</label><br />

                                                        <input type="radio" id="appointment_time" name="appointment_time" value="Afternoon" />
                                                        <label for="appointment_time" id="radio-label" class="appointment-label">Afternoon</label><br />
                                                    </fieldset>

                                                    <label for="dropdown" id="dropdown-label" class="appointment-label">
                                                        Appointment Duration & Fees
                                                        <span class="consultant-note"> &nbsp;**Based on your consultant description</span>
                                                    </label><br />
                                                    <select id="dropdown" name="appointment_duration" class="appointment-select">
                                                        <option value="" disabled selected>
                                                            Select Estimated Appointment Duration & Fees
                                                        </option>
                                                        <option value="Below 60 Minutes">About 60 Minutes - $100 Est.</option>
                                                        <option value="1 Hours ~ 2 Hours">1 Hours ~ 2 Hours - $200 Est.</option>
                                                        <option value="2 Hours ~ 3 Hours">2 Hours ~ 3 Hours- $300 Est.</option>
                                                        <option value="3 Hours ~ 4 Hours">3 Hours ~ 4 Hours- $400 Est.</option>
                                                    </select><br />

                                                    <label for="description" id="description-label" class="appointment-label">About Your Consultant ? </label><br />
                                                    <textarea placeholder="Enter About Your Consultant" id="description" name="about_consultant" class="appointment-textarea" rows="4" cols="50"></textarea>
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
                                                <form class="col-12" action="backend/deleteConsultant.php" method="POST">
                                                    <input type="hidden" name="consulDelId" id="consulDelId">
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

                                <!-- Detial modal -->

                                <div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header pl-5">
                                                <h5 class="modal-title ml-3">Consultants Details</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-11 mx-auto mt-3">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Property</th>
                                                                <th scope="col">Value</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Name</td>
                                                                <td id="consultName"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td id="consultEmail"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone</td>
                                                                <td id="consultPhone"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Type</td>
                                                                <td id="consultType"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date</td>
                                                                <td id="consultDate"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Time</td>
                                                                <td id="consultTime"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Duration</td>
                                                                <td id="consultDuration">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>About</td>
                                                                <td id="consultAbout">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="content-2">
                                <div class="response"></div>
                                <div id='calendar'></div>
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

    <!-- for calendar -->
    <script src="js/fullcalendar/lib/jquery.min.js"></script>
    <script src="js/fullcalendar/lib/moment.min.js"></script>
    <script src="js/fullcalendar/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: "backend/calendar/fetch-event.php",
                displayEventTime: false,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                // selectHelper: true,
                // select: function(start, end, allDay) {
                //     var title = prompt('Event Title:');

                //     if (title) {
                //         var date = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");

                //         $.ajax({
                //             url: 'backend/calendar/add-event.php',
                //             data: 'title=' + title + '&date=' + date,
                //             type: "POST",
                //             success: function(data) {
                //                 displayMessage("Added Successfully");
                //             }
                //         });
                //         calendar.fullCalendar('renderEvent', {
                //                 title: title,
                //                 start: start,
                //                 end: end,
                //                 allDay: allDay
                //             },
                //             true
                //         );
                //     }
                //     calendar.fullCalendar('unselect');
                // },

                editable: true,
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    // var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'backend/calendar/edit-event.php',
                        data: 'start=' + start + '&id=' + event.id,
                        type: "POST",
                        success: function(response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: "backend/calendar/delete-event.php",
                            data: "&id=" + event.id,
                            success: function(response) {
                                if (parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    displayMessage("Deleted Successfully");
                                }
                            }
                        });
                    }
                }

            });
        });

        function displayMessage(message) {
            $(".response").html("<div class='success'>" + message + "</div>");
            setInterval(function() {
                $(".success").fadeOut();
            }, 1000);
        }
    </script>


    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Page level custom scripts -->
    <script src="js/style.js"></script>
    <script src="js/jui.js"></script>
    <script src="js/consultant.js"></script>
    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable({
                "order": [
                    [3, 'desc']
                ]
            });
        })
    </script>

</body>

</html>