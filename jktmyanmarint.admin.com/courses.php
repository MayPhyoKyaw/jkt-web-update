<?php
session_start();
include_once 'auth/authenticate.php';
include("confs/config.php");
$result = mysqli_query($conn, "SELECT course_id, c.title AS course_title, cty.category_id AS category_id, cty.title AS category_title, 
t.type_id AS type_id,t.title AS type_title, c.level_or_sub AS course_level, fee, instructor, services, discount_percent, 
start_date, duration, sections, note, c.created_at AS created_at, c.updated_at AS updated_at 
FROM courses c, categories cty, types t WHERE c.category_id = cty.category_id 
AND c.type_id = t.type_id");
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
    <title>JKT Admin - Courses</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this page -->
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

            <li class="nav-item">
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
                        <h3>Courses</h3>
                    </div>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
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
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                                <a href="newCourse.php" class="new">
                                    <i class="fas fa-fw fa-folder-plus"></i>
                                    New Course
                                </a>
                                <div class="row mt-4 mb-2">
                                    <div class="col-12 col-md-4 filter1"></div>
                                    <div class="col-12 col-md-4 filter2"></div>
                                    <div class="col-12 col-md-4 filter3"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-4 filter4"></div>
                                    <div class="col-12 col-md-4 filter5"></div>
                                    <div class="col-12 col-md-4 filter6"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th><img class="check-icon" style="cursor:pointer;" id="select-all" src="img/1.png" /></th>
                                                <th>Course ID</th>
                                                <th class="select-category-filter">Category Title</th>
                                                <th>Course Title</th>
                                                <th class="select-level-filter">Level</th>
                                                <th class="select-type-filter">Type</th>
                                                <th>Fee</th>
                                                <th class="select-instructor-filter">Instructor</th>
                                                <th>Days & Time</th>
                                                <th>Start Date</th>
                                                <th>Duration</th>
                                                <th>Services</th>
                                                <th class="select-discount-filter">Discount Percent</th>
                                                <th>Note</th>
                                                <th class="select-createdAt-filter">Created At</th>
                                                <th>Updated At</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) :
                                                $sections = json_decode($row["sections"], true);
                                                // var_dump($sections);
                                            ?>
                                                <tr onclick="setCurrentCourseDetail(this)" data-toggle="modal" data-target="#detailModal" class="tb-row">
                                                    <td><img class="check-icon" src="img/1.png" onclick="addToSelected(event,'<?= $row['course_id'] ?>')" /></td>
                                                    <td><?= $row['course_id'] ?></td>
                                                    <td><?= $row['category_title'] ?></td>
                                                    <td><?= $row['course_title'] ?></td>
                                                    <td><?= $row['course_level'] ?></td>
                                                    <td data-toggle="tooltip" data-placement="top" title="<?= $row['type_title'] ?>"><?php echo $row['type_title'] == "Online" ? "💻" : ($row['type_title'] == "In Class" ? "📖" : "💻-📖") ?></td>
                                                    <td><?= number_format($row['fee']) . " MMK" ?></td>
                                                    <td><?php echo $row['instructor'] === "" ? "-" : $row['instructor'] ?></td>
                                                    <td>
                                                        <div class="tb-scroll <?php echo count($sections) < 3 ? 'hide-scroll' : '' ?>">
                                                            <?php
                                                            for ($j = 0; $j < count($sections); $j++) {
                                                                for ($i = 0; $i < count($sections[$j]["days"]); $i++) {
                                                                    $days = array("M" => "Monday", "Tu" => "Tuesday", "W" => "Wednesday", "Th" => "Thursday", "F" => "Friday", "Sa" => "Saturday", "Su" => "Sunday");
                                                                    echo "<span class='days-badges' data-toggle='tooltip' data-placement='top' title='" . $days[$sections[$j]['days'][$i]] . "'>" . $sections[$j]['days'][$i] . "</span>";
                                                                }
                                                                echo "<div class='mt-2'></div>";
                                                                echo "<span class='section-hr-badge mt-3'>" . $sections[$j]['sectionHour'] . "</span>";
                                                                if ($j == count($sections) - 1) {
                                                                    echo "";
                                                                } else {
                                                                    echo "<hr/>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row['start_date'] == null ? "-" : $row['start_date'] ?>
                                                    <td><?= $row['duration'] . " months" ?></td>
                                                    <td><?php echo $row['services'] === "" ? "-" : $row['services'] ?></td>
                                                    <td><?= $row['discount_percent'] . " %" ?></td>
                                                    <td>
                                                        <p class="tb-scroll note-scroll <?php echo strlen($row['note']) < 50 ? 'hide-scroll' : '' ?>"><?php echo $row['note'] === "" ? "-" : $row['note'] ?></p>
                                                    </td>
                                                    <td><?= $row['created_at'] ?></td>
                                                    <td><?= $row['updated_at'] ?></td>
                                                    <td><button class="tb-btn tb-btn-edit" onclick="setCurrentCourseEdit(event,this,<?php echo $row['category_id'] ?>,<?php echo $row['type_id'] ?>)" data-toggle="modal" data-target="#editingModal"><i class="fa fa-pencil"></i></button></td>
                                                    <td><button class="tb-btn tb-btn-delete" onclick="setCurrentCourseDel(event,<?php echo $row['course_id'] ?>)" data-toggle="modal" data-target="#deletingModal"><i class="fa fa-trash"></button></i></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>




                            <form id="deleteSelectedId" action="./backend/deleteSelectedCourse.php" method="post">
                                <input type="hidden" name="courses_ids" id="courses_ids"/>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- detail modal -->

            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header pl-5">
                            <h5 class="modal-title ml-3">Courses Details</h5>
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
                                            <td>Title</td>
                                            <td id="detailCourseTitle"></td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td id="detailCourseCategory"></td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td id="detailCourseType"></td>
                                        </tr>
                                        <tr>
                                            <td>Level/Subjects</td>
                                            <td id="detailCourseLvlorsub"></td>
                                        </tr>
                                        <tr>
                                            <td>Fee</td>
                                            <td id="detailCourseFee"></td>
                                        </tr>
                                        <tr>
                                            <td>Instructor</td>
                                            <td id="detailCourseInstructor"></td>
                                        </tr>
                                        <tr>
                                            <td>Services</td>
                                            <td id="detailCourseServices">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Discount Percent</td>
                                            <td id="detailCourseDiscount">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Start Date</td>
                                            <td id="detailCourseStartDate"></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td id="detailCourseDuration"></td>
                                        </tr>
                                        <tr>
                                            <td>Days & Time</td>
                                            <td id="detailCourseDays"></td>
                                        </tr>

                                        <tr>
                                            <td>Note</td>
                                            <td id="detailCourseNote"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer px-5 mx-2">
                            <!-- <div>
                                <button class="tb-btn d-inline tb-btn-edit"><i class="fa fa-pencil mr-1"></i>Edit</button>
                                <button class="tb-btn d-inline tb-btn-delete"><i class="fa fa-trash mr-1"></i>Delete</button>
                            </div> -->
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
                            <h5 class="modal-title">Editing</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="col-12" id="editingModal" action="backend/editCourse.php" method="POST">
                                <input type="hidden" name="courseIdEdit" id="courseIdEdit" />
                                <input type="hidden" name="courseCreatedAt" id="courseCreatedAt" />
                                <div class="form-group mb-4">
                                    <label for="title">Enter Title<span class="my-required-field">Required*</span></label>
                                    <input type="text" class="form-control form-control-user" id="courseTitleEdit" name="courseTitleEdit" placeholder="Course Title" required />
                                </div>
                                <div class="form-group mb-4">
                                    <label for="categoryId">Choose Category<span class="my-required-field">Required*</span></label>
                                    <select value="" id="courseCategoryIdEdit" name="courseCategoryIdEdit" class="form-control form-control-user" required>
                                        <option selected disabled>Category</option>
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
                                    <select name="courseTypeIdEdit" id="courseTypeIdEdit" class="form-control" required>
                                        <option value="" selected disabled>Type</option>
                                        <?php
                                        $result = mysqli_query($conn, "SELECT * FROM types");
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value='<?= $row["type_id"] ?>'><?php echo $row["title"] ?></option>
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
                                    <!-- here add sections -->
                                    <div id="addSectionHere">

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

            <!-- deleting modal -->
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
                            <form class="col-12" action="backend/deleteCourse.php" method="POST">
                                <input type="hidden" name="currentCourseIdDel" id="currentCourseIdDel">
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
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- for excel print -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/courses-filter.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script src="js/style.js"></script>


</body>

</html>