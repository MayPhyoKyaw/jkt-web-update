<?php
session_start();
include_once 'auth/authenticate.php';
include_once 'confs/config.php';
include_once 'confs/jobs_config.php';
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
    <title>JKT Admin - New Job</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/stepForm.css">
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
                        <h3>New Course Type</h3>
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
                    <form id="multistep_form" action="./backend/newJob.php" method="POST" enctype="multipart/form-data">
                        <?php if (!empty($_SESSION['insertError'])) : ?>
                            <p class="error-alert alert alert-danger my-5 col-9 mx-auto"><?php echo $_SESSION['insertError'] ?> <i id="close-alert" class="fa fa-close"></i></p>
                        <?php endif ?>
                        <!-- progressbar -->
                        <ul id="progress_header">
                            <li><img src="./img/ukFlag.png" alt="" class="versionFlag versionFlag-active"></li>
                            <li><img src="./img/mmFlag.svg" alt="" class="versionFlag"></li>
                            <li><img src="./img/japanFlag.jpg" alt="" class="versionFlag"></li>
                        </ul>
                        <!-- Step 01 -->
                        <div class="multistep-box">
                            <div class="title-box">
                                <h2>Fill In English</h2>
                            </div>
                            <div class="flex-preview">
                                <div><img alt="" id="photo1-preview" src="./img/cmp-default.png"></div>
                                <div><img alt="" id="photo2-preview" src="./img/cmp-default.png"></div>
                            </div>
                            <p class="flex-input">
                                <label for="photo_one" class="custom-file-upload">
                                    <i class="fa fa-cloud-upload mr-2"></i>Company Image
                                </label>
                                <label for="photo_two" class="custom-file-upload">
                                    <i class="fa fa-cloud-upload mr-2"></i>Workplace Image
                                </label>
                            <div>
                                <input type="file" name="photo_one" id="photo_one" class="photo-input" onchange="validateTypeAndSize1(this)">
                                <span id="error_photo_one" class="d-block text-left my-0"></span>
                            </div>
                            <div>
                                <input type="file" name="photo_two" id="photo_two" class="photo-input" onchange="validateTypeAndSize2(this)">
                                <span id="error_photo_two" class="d-block text-left my-0"></span>
                            </div>
                            </p>
                            <hr />
                            <p>
                                <textarea class="no-keydown" name="job_id" placeholder="Job ID" id="job_id" data-toggle="modal" data-target="#JobIdInput"></textarea>
                                <span id="error_job_id"></span>
                            </p>
                            <p>
                                <textarea class="no-keydown" name="eng_company_name" placeholder="Company Name" id="eng_company_name" data-toggle="modal" data-target="#EngNameInput"></textarea>
                                <span id="eng_error_company_name"></span>
                            </p>
                            <p>
                                <textarea class="no-keydown" name="eng_job_title" placeholder="Job Title" id="eng_job_title" data-toggle="modal" data-target="#EngTitleInput"></textarea>
                                <span id="eng_error_job_title"></span>
                            </p>
                            <div class="my-3">
                                <div class="employment-container">
                                    <label for="it">IT</label>
                                    <input class="radio-input" type="radio" id="it" value="IT-IT-IT" name="job_type" checked="checked">
                                    <label for="tokutei" class="ml-4">Tokutei Ginou</label>
                                    <input class="radio-input" type="radio" id="tokutei" value="Tokutei-Tokutei-Tokutei" name="job_type">
                                    <label for="general" class="ml-4">General</label>
                                    <input class="radio-input" type="radio" id="general" value="General-General-General" name="job_type">
                                </div>
                            </div>
                            <div class="my-3">
                                <div class="employment-container">
                                    <label for="permanent">Permanent</label>
                                    <input class="radio-input" type="radio" id="permanent" value="Permanent-Permanent-Permanent" name="employment_type" checked="checked">
                                    <label for="contract" class="ml-4">Contract</label>
                                    <input class="radio-input" type="radio" id="contract" value="Contract-Permanent-Permanent" name="employment_type">
                                </div>
                            </div>
                            <div class="my-3">
                                <textarea class="no-keydown" name="eng_wage" placeholder="Wage in YEN (eg. 10,000)" id="eng_wage" class="input-number" data-toggle="modal" data-target="#EngWageInput"></textarea>
                                <span id="eng_error_wage" class="d-block text-left"></span>
                            </div>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="eng_ot" id="eng_ot" placeholder="Overtime payment" data-toggle="modal" data-target="#EngOtInput"></textarea>
                                <!-- <span id="eng_error_ot">asdasd</span> -->
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="eng_holidays" id="eng_holidays" placeholder="Holidays (Eg. Sat, Sun, Public holidays)" data-toggle="modal" data-target="#EngHolidaysInput"></textarea>
                                <span id="eng_error_holidays"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="eng_workinghr" id="eng_workinghr" placeholder="Working Hour (Eg. 9:00 AM ~ 5:00 PM)" data-toggle="modal" data-target="#EngWorkinghrInput"></textarea>
                                <span id="eng_error_workinghr"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="eng_breaktime" id="eng_breaktime" placeholder="Break Time (Eg. 12:00 PM ~ 1:00 PM)" data-toggle="modal" data-target="#EngBreakTimeInput"></textarea>
                                <span id="eng_error_breaktime"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="eng_requirements" id="eng_requirements" data-toggle="modal" data-target="#EngtextAreaInputReq" placeholder="Requirements"></textarea>
                                <span id="eng_error_requirements"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="eng_benefits" id="eng_benefits" data-toggle="modal" data-target="#EngtextAreaInputBen" placeholder="Benefits"></textarea>
                                <span id="eng_error_benefits"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" rows="4" name="eng_location" id="eng_location" placeholder="Company Address" data-toggle="modal" data-target="#EngLocationInput"></textarea>
                                <span id="eng_error_location"></span>
                            </p>

                            <p class="my-3">
                                <textarea class="no-keydown ta-input" rows="4" name="eng_memo" id="eng_memo" placeholder="Any additional note" data-toggle="modal" data-target="#EngMemoInput"></textarea>
                                <span id="eng_error_memo"></span>
                            </p>
                            <div class="switch-container my-3">
                                <!-- <div>
                                    <p class="label">
                                        <label class="label">Is remote?</label>
                                    </p>
                                    <p class="switch">
                                        <label>
                                            <input type="checkbox" name="remote">
                                            <span class="slider round"></span>
                                        </label>
                                    </p>
                                </div> -->
                                <div>
                                    <p class="label">
                                        <label class="label">Available Now?</label>
                                    </p>
                                    <p class="switch">
                                        <!-- isremote -->
                                        <label>
                                            <input type="checkbox" name="available">
                                            <span class="slider round"></span>
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <p class="nxt-prev-button"><button type="button" name="next" class="fs_next_btn action-button"><img class="form-control-icon" src="img/next.png" alt="form-control-next" /></button></p>
                        </div>


                        <!-- Step 02 -->
                        <div class="multistep-box">
                            <div class="title-box">
                                <h2>မြန်မာဘာသာဖြင့်ဖြည့်ပါ</h2>
                            </div>

                            <p>
                                <textarea class="no-keydown" name="mm_company_name" placeholder="ကုမ္ပဏီအမည်" id="mm_company_name" data-toggle="modal" data-target="#MmNameInput"></textarea>
                                <span id="mm_error_company_name"></span>
                            </p>
                            <p>
                                <textarea class="no-keydown" name="mm_job_title" placeholder="အလုပ်အကိုင်အမည်" id="mm_job_title" data-toggle="modal" data-target="#MmTitleInput"></textarea>
                                <span id="mm_error_job_title"></span>
                            </p>

                            <div class="my-3">
                                <textarea class="no-keydown" name="mm_wage" placeholder="လုပ်အားခ (ဥပမာ. ၁၀,၀၀၀ ယန်း)" id="mm_wage" class="input-number" data-toggle="modal" data-target="#MmWageInput"></textarea>
                                <span id="mm_error_wage" class="d-block text-left"></span>
                            </div>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="mm_ot" id="mm_ot" placeholder="အချိန်ပိုလုပ်အားခ" data-toggle="modal" data-target="#MmOtInput"></textarea>
                                <!-- <span id="mm_error_ot">asdasd</span> -->
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="mm_holidays" id="mm_holidays" placeholder="အားလပ်ရက်များ (ဥပမာ စနေ၊ နေ၊ အစိုးရရုံးပိတ်ရက်)" data-toggle="modal" data-target="#MmHolidaysInput"></textarea>
                                <span id="mm_error_holidays"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="mm_workinghr" id="mm_workinghr" placeholder="အလုပ်ချိန် (ဥပမာ မနက် ၉:၀၀ ~ ညနေ ၅:၀၀)" data-toggle="modal" data-target="#MmWorkinghrInput"></textarea>
                                <span id="mm_error_workinghr"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="mm_breaktime" id="mm_breaktime" placeholder="နားချိန် (ဥပမာ နေ့လည် ၁၂:၀၀ ~ နေ့လည် ၁:၀၀)" data-toggle="modal" data-target="#MmBreakTimeInput"></textarea>
                                <span id="mm_error_breaktime"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="mm_requirements" id="mm_requirements" data-toggle="modal" data-target="#MmtextAreaInputReq" placeholder="လိုအပ်ချက်များ"></textarea>
                                <span id="mm_error_requirements"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="mm_benefits" id="mm_benefits" data-toggle="modal" data-target="#MmtextAreaInputBen" placeholder="အကျိုးခံစားခွင့်များ"></textarea>
                                <span id="mm_error_benefits"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" rows="4" name="mm_location" id="mm_location" placeholder="အလုပ်နေရာ" data-toggle="modal" data-target="#MmLocationInput"></textarea>
                                <span id="mm_error_location"></span>
                            </p>

                            <p class="my-3">
                                <textarea class="no-keydown ta-input" rows="4" name="mm_memo" id="mm_memo" placeholder="အခြားမှတ်ချက်" data-toggle="modal" data-target="#MmMemoInput"></textarea>
                                <span id="mm_error_memo"></span>
                            </p>

                            <p class="nxt-prev-button">
                                <button type="button" name="previous" class="action-button previous"><img class="form-control-icon" src="img/previous.png" alt="form-control-previous"></button>
                                <button type="button" name="next" class="ss_next_btn action-button"><img class="form-control-icon" src="img/next.png" alt="form-control-next"></button>
                            </p>
                        </div>
                        <!-- Step 03 -->
                        <div class="multistep-box">
                            <div class="title-box">
                                <h2>日本語で記入してください</h2>
                            </div>

                            <p>
                                <textarea class="no-keydown" name="jp_company_name" placeholder="会社名" id="jp_company_name" data-toggle="modal" data-target="#JpNameInput"></textarea>
                                <span id="jp_error_company_name"></span>
                            </p>
                            <p>
                                <textarea class="no-keydown" name="jp_job_title" placeholder="役職名" id="jp_job_title" data-toggle="modal" data-target="#JpTitleInput"></textarea>
                                <span id="jp_error_job_title"></span>
                            </p>

                            <div class="my-3">
                                <textarea class="no-keydown" name="jp_wage" placeholder="給与（円）" id="jp_wage" class="input-number" data-toggle="modal" data-target="#JpWageInput"></textarea>
                                <span id="jp_error_wage" class="d-block text-left"></span>
                            </div>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="jp_ot" id="jp_ot" placeholder="残業代" data-toggle="modal" data-target="#JpOtInput"></textarea>
                                <!-- <span id="jp_error_ot">asdasd</span> -->
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="jp_holidays" id="jp_holidays" placeholder="休日 (例えば。土, 日, 祝日)" data-toggle="modal" data-target="#JpHolidaysInput"></textarea>
                                <span id="jp_error_holidays"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="jp_workinghr" id="jp_workinghr" placeholder="勤務時間 (例えば。９：００ 午前 ~ ５：００ 午後)" data-toggle="modal" data-target="#JpWorkinghrInput"></textarea>
                                <span id="jp_error_workinghr"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="jp_breaktime" id="jp_breaktime" placeholder="休憩時間 (例えば。１２：００ 午前 ~ １：００ 午後)" data-toggle="modal" data-target="#JpBreakTimeInput"></textarea>
                                <span id="jp_error_breaktime"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="jp_requirements" id="jp_requirements" data-toggle="modal" data-target="#JptextAreaInputReq" placeholder="必要な資格"></textarea>
                                <span id="jp_error_requirements"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" name="jp_benefits" id="jp_benefits" data-toggle="modal" data-target="#JptextAreaInputBen" placeholder="待遇"></textarea>
                                <span id="jp_error_benefits"></span>
                            </p>
                            <p class="my-3">
                                <textarea class="no-keydown ta-input" rows="4" name="jp_location" id="jp_location" placeholder="勤務地" data-toggle="modal" data-target="#JpLocationInput"></textarea>
                                <span id="jp_error_location"></span>
                            </p>

                            <p class="my-3">
                                <textarea class="no-keydown ta-input" rows="4" name="jp_memo" id="jp_memo" placeholder="追記" data-toggle="modal" data-target="#JpMemoInput"></textarea>
                                <span id="jp_error_memo"></span>
                            </p>
                            <p class="nxt-prev-button">
                                <button type="button" name="previous" class="previous action-button"><img class="form-control-icon" src="img/previous.png" alt="form-control-previous" /></button>
                                <button name="submit" id="submitBtn" class="submit_btn ts_next_btn action-button text-center"><img class="form-control-submit-icon" src="img/check-mark.png" alt="form-control-next" /></button>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- MODALS -->

    <!-- CONFIRM Modal-->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ready to Submit Job Information?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Please click <span class="text-primary">Confirm</span> button to confirm informaiton and click <span class="text-secondary">Cancel</span> button to recheck the data.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="confirmBtn" type="submit" form="multistep_form">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- custom confirm modal -->

    <!-- <div class="custom-confirm" id="customConfirm">
        <div class="confirm-card">
            <button class="confirm-now" id="confirmNow">Confirm</button>
            <button class="cancel" id="confirmCancel">Cancel</button>
        </div>
    </div> -->

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


    <!-- JOB ID INPUT -->
    <div class="modal fade" id="JobIdInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Job ID</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert JOB ID as the format below:</label>
                    <textarea name="JobIdTextArea" id="JobIdTextArea" cols="30" rows="5" placeholder="IT000001"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToJobId()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COMPANY NAME INPUT ENG-->
    <div class="modal fade" id="EngNameInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Company Name</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert company name below:</label>
                    <textarea name="EngNameTextArea" id="EngNameTextArea" cols="30" rows="10" placeholder="Company name"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToNameEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- COMPANY NAME INPUT MM-->
    <div class="modal fade" id="MmNameInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ကုမ္ပဏီအမည်</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>ကုမ္ပဏီအမည်ကို အောက်ပါနေရာတွင်ဖြည့်စွက်ပါ</label>
                    <textarea name="MmNameTextArea" id="MmNameTextArea" cols="30" rows="10" placeholder="ကုမ္ပဏီအမည်"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToNameMm()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COMPANY NAME INPUT JP-->
    <div class="modal fade" id="JpNameInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">会社名</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下に会社名を入力してください。</label>
                    <textarea name="JpNameTextArea" id="JpNameTextArea" cols="30" rows="10" placeholder="会社名"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToNameJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JOB TITLE INPUT ENG -->
    <div class="modal fade" id="EngTitleInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Job Title</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert job title below:</label>
                    <textarea name="EngTitleTextArea" id="EngTitleTextArea" cols="30" rows="10" placeholder="Job Title"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToTitleEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JOB TITLE INPUT MM -->
    <div class="modal fade" id="MmTitleInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">အလုပ်အကိုင်ရာထူး</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အလုပ်အကိုင်ရာထူးကို ကို အောက်ပါနေရာတွင်ဖြည့်စွက်ပါ</label>
                    <textarea name="MmTitleTextArea" id="MmTitleTextArea" cols="30" rows="10" placeholder="အလုပ်အကိုင်ရာထူး"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToTitleMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JOB TITLE INPUT JP -->
    <div class="modal fade" id="JpTitleInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">役職名</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下に肩書きを入力してください。</label>
                    <textarea name="JpTitleTextArea" id="JpTitleTextArea" cols="30" rows="10" placeholder="役職名"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToTitleJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WAGE INPUT -->
    <!-- ENG WAGE INPUT -->
    <div class="modal fade" id="EngWageInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Wage</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert wage as the format below:</label>
                    <textarea name="EngWageTextArea" id="EngWageTextArea" cols="30" rows="10" placeholder="1000 YEN (Hourly)&#10;100000 YEN (Monthly)&#10;1000000 YEN (Yearly)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToWageEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MM WAGE INPUT -->
    <div class="modal fade" id="MmWageInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">လုပ်ခလစာ (ယန်းဖြင့်)</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>လုပ်ခလစာကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MmWageTextArea" id="MmWageTextArea" cols="30" rows="10" placeholder="လုပ်ခလစာ ယန်း (နာရီအလိုက်)&#10;၁၀၀၀၀၀ ယန်း (လအလိုက်)&#10;၁၀၀၀၀၀ ယန်း (နှစ်အလိုက်)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToWageMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JP WAGE INPUT -->
    <div class="modal fade" id="JpWageInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">給与（円）</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で給与を入力してください。</label>
                    <textarea name="JpWageTextArea" id="JpWageTextArea" cols="30" rows="10" placeholder="１０００ 円 (時給)&#10;１０００００ 円 (月給)&#10;１００００００ 円 (年収)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToWageJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OVERTIME INPUT -->
    <!-- ENG OVERTIME INPUT -->
    <div class="modal fade" id="EngOtInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Over-time Pyament</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert over-time payment as the format below:</label>
                    <textarea name="EngOtTextArea" id="EngOtTextArea" cols="30" rows="10" placeholder="1000 YEN (Hourly)&#10;10000 YEN (Daily)&#10;100000 YEN (Monthly)&#10;1000000 YEN (Yearly)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToOtEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MM OT WAGE INPUT -->
    <div class="modal fade" id="MmOtInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">အချိန်ပိုလုပ်အားခ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အချိန်ပိုလုပ်အားခကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MmOtTextArea" id="MmOtTextArea" cols="30" rows="10" placeholder="လုပ်ခလစာ ယန်း (နာရီအလိုက်)&#10;၁၀၀၀၀၀ ယန်း (လအလိုက်)&#10;၁၀၀၀၀၀ ယန်း (နှစ်အလိုက်)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToOtMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JP OT WAGE INPUT -->
    <div class="modal fade" id="JpOtInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">残業代</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で残業代を入力してください。</label>
                    <textarea name="JpOtTextArea" id="JpOtTextArea" cols="30" rows="10" placeholder="１０００ 円 (時給)&#10;１０００００ 円 (月給)&#10;１００００００ 円 (年収)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToOtJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- HOLIDAYS INPUT -->
    <!-- ENG HOLIDAYS INPUT -->
    <div class="modal fade" id="EngHolidaysInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Holidays</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert holidays as the format below:</label>
                    <textarea name="EngHolidaysTextArea" id="EngHolidaysTextArea" cols="30" rows="10" placeholder="Saturday, Sunday&#10;Public holidays&#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToHolidaysEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MM HOLIDAYS INPUT -->
    <div class="modal fade" id="MmHolidaysInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ပိတ်ရက်များ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>ပိတ်ရက်များကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MmHolidaysTextArea" id="MmHolidaysTextArea" cols="30" rows="10" placeholder="စနေ, တနင်္ဂနွေ&#10;အစိုးရရုံးပိတ်ရက်&#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToHolidaysMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JP HOLIDAYS INPUT -->
    <div class="modal fade" id="JpHolidaysInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">休日</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で休日を入力してください。</label>
                    <textarea name="JpHolidaysTextArea" id="JpHolidaysTextArea" cols="30" rows="10" placeholder="土曜日, 日曜日&#10;祝日&#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToHolidaysJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WORKINGHR INPUT -->
    <!-- ENG WORKINGHR INPUT -->
    <div class="modal fade" id="EngWorkinghrInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Working Hours</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert working hours as the format below:</label>
                    <textarea name="EngWorkinghrTextArea" id="EngWorkinghrTextArea" cols="30" rows="10" placeholder="9:00 AM ~ 5:00 PM &#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToWorkinghrEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MM WORKINGHR INPUT -->
    <div class="modal fade" id="MmWorkinghrInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">အလုပ်အချိန်</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အလုပ်အချိန်ကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MmWorkinghrTextArea" id="MmWorkinghrTextArea" cols="30" rows="10" placeholder="မနက် ၉း၀၀ ~ ညနေ ၅း၀၀ &#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToWorkinghrMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JP WORKINGHR INPUT -->
    <div class="modal fade" id="JpWorkinghrInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">勤務時間</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で勤務時間を入力してください。</label>
                    <textarea name="JpWorkinghrTextArea" id="JpWorkinghrTextArea" cols="30" rows="10" placeholder="９：００ 午前 ~ ５：００ 午後 &#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToWorkinghrJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BREAKTIME INPUT -->
    <!-- ENG BREAKTIME INPUT -->
    <div class="modal fade" id="EngBreaktimeInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Break Time</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert break-time as the format below:</label>
                    <textarea name="EngBreaktimeTextArea" id="EngBreaktimeTextArea" cols="30" rows="10" placeholder="9:00 AM ~ 5:00 PM &#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToBreaktimeEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MM BREAKTIME INPUT -->
    <div class="modal fade" id="MmBreaktimeInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">အလုပ်နားချိန်</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အလုပ်နားချိန်ကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MmBreaktimeTextArea" id="MmBreaktimeTextArea" cols="30" rows="10" placeholder="မနက် ၉း၀၀ ~ ညနေ 5:00 &#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToBreaktimeMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JP BREAKTIME INPUT -->
    <div class="modal fade" id="JpBreaktimeInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">休憩時間</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で休憩時間を入力してください。</label>
                    <textarea name="JpBreaktimeTextArea" id="JpBreaktimeTextArea" cols="30" rows="10" placeholder="１２：００ 午前 ~ １：００ 午後 &#10;"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToBreaktimeJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Eng Input Requirements Modal-->
    <div class="modal fade" id="EngtextAreaInputReq" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputFormatLabel">Job Requirements</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert requirements as the format below:</label>
                    <textarea name="EngReqTextArea" id="EngReqTextArea" cols="30" rows="10" placeholder="Requirement 1&#10;Requirement 2&#10;Requirement 3&#10;Requirement 4"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToReqEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Mm Input Requirements Modal-->
    <div class="modal fade" id="MmtextAreaInputReq" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputFormatLabel">အလုပ်၏လိုအပ်ချက်များ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အလုပ်၏လိုအပ်ချက်များကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MMReqTextArea" id="MmReqTextArea" cols="30" rows="10" placeholder="အလုပ်လိုအပ်ချက် ၁&#10;အလုပ်လိုအပ်ချက် ၂&#10;အလုပ်လိုအပ်ချက် ၃&#10;အလုပ်လိုအပ်ချက် ၄"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToReqMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Jp Input Requirements Modal-->
    <div class="modal fade" id="JptextAreaInputReq" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inputFormatLabel">必要な資格</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で必要な資格を入力してください。</label>
                    <textarea name="JpReqTextArea" id="JpReqTextArea" cols="30" rows="10" placeholder="必要な資格 １&#10;必要な資格　２&#10;必要な資格　３&#10;必要な資格　４"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToReqJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Eng Input Benefits Modal-->
    <div class="modal fade" id="EngtextAreaInputBen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Job Benefits</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert benefits as the format below:</label>
                    <textarea name="EngbenTextArea" id="EngbenTextArea" cols="30" rows="10" placeholder="Benefits 1&#10;Benefits 2&#10;Benefits 3&#10;Benefits 4"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToBenEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Mm Input Benefits Modal-->
    <div class="modal fade" id="MmtextAreaInputBen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">အကျိုးခံစားခွင့်များ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အကျိုးခံစားခွင့်များကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MmbenTextArea" id="MmbenTextArea" cols="30" rows="10" placeholder="အကျိုးခံစားခွင့် ၁&#10;အကျိုးခံစားခွင့် ၂&#10;အကျိုးခံစားခွင့် ၃&#10;အကျိုးခံစားခွင့် ၄"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToBenMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Jp Input Benefits Modal-->
    <div class="modal fade" id="JptextAreaInputBen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">待遇</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で待遇を入力してください。</label>
                    <textarea name="JpbenTextArea" id="JpbenTextArea" cols="30" rows="10" placeholder="待遇 １&#10;待遇　２&#10;待遇　３&#10;待遇　４"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToBenJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOCATION INPUT -->
    <!-- ENG LOCATION INPUT -->
    <div class="modal fade" id="EngLocationInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Work Location</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert working location as the format below:</label>
                    <textarea name="EngLocationTextArea" id="EngLocationTextArea" cols="30" rows="10" placeholder="Eg. Sapporo, Hokkaido"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToLocationEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MM LOCATION INPUT -->
    <div class="modal fade" id="MmLocationInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">အလုပ်နေရာ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အလုပ်နေရာကို အောက်ဖော်ပြပါပုံစံအတိုင်းဖြည့်စွက်ပါ</label>
                    <textarea name="MmLocationTextArea" id="MmLocationTextArea" cols="30" rows="10" placeholder="ဥပမာ စပိုရို, ဟိုကိုင်းဒိုး"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToLocationMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JP LOCATION INPUT -->
    <div class="modal fade" id="JpLocationInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">勤務地</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下の形式で勤務地を入力してください。</label>
                    <textarea name="JpLocationTextArea" id="JpLocationTextArea" cols="30" rows="10" placeholder="例えば。　札幌, 北海道"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToLocationJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MEMO INPUT -->
    <!-- ENG MEMO INPUT -->
    <div class="modal fade" id="EngMemoInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Additional Note</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Please insert additional note:</label>
                    <textarea name="EngMemoTextArea" id="EngMemoTextArea" cols="30" rows="10" placeholder="Any memo (only admin can see this)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToMemoEng()">Sure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MM MEMO INPUT -->
    <div class="modal fade" id="MmMemoInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">အခြားမှတ်ချက်</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>အခြားမှတ်ချက်ကို အောက်ပါနေရာတွင်ဖြည့်စွက်ပါ</label>
                    <textarea name="MmMemoTextArea" id="MmMemoTextArea" cols="30" rows="10" placeholder="Memo တစ်ခုခုရေးရန်နေရာ (အက်မင်သာ မြင်နိုင်ပါသည်)"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ပယ်ဖျက်ပါ</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToMemoMm()">သေချာသည်</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JP MEMO INPUT -->
    <div class="modal fade" id="JpMemoInput" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">追記</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>以下に追記を入力してください。</label>
                    <textarea name="JpMemoTextArea" id="JpMemoTextArea" cols="30" rows="10" placeholder="どれかメモ（管理者だけがこれを見ることができます）"></textarea>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">キャンセル</button>
                        <a class="btn btn-primary" data-dismiss="modal" onclick="addTextToMemoJp()">定か</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Core plugin JavaScript-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.0/jquery.easing.js" type="text/javascript"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/newJobStepForm.js"></script>
    <script>
        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
    <script>
        $('#close-alert').click(function(event) {
            $(this).parent().hide();
        });
    </script>
</body>

</html>