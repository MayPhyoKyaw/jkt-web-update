<?php
session_start();
function encrypt_decrypt($action, $string)
{
    /* =================================================
  * ENCRYPTION-DECRYPTION
  * =================================================
  * ENCRYPTION: encrypt_decrypt('encrypt', $string);
  * DECRYPTION: encrypt_decrypt('decrypt', $string) ;
  */
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'JKT-2019-20IT85-MM-JP';
    $secret_iv = 'JKT-2019-serV1ce-MM-JP';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ($action == 'encrypt') {
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } else {
        if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
    }
    return $output;
}
include_once "../jktmyanmarint.admin.com/confs/jobs_config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/images/logo.jpg" />
    <title>JKT Myanmar International - JAPANESE SCHOOL</title>
    <meta name="description" content="We offer entry-level to business-level Japanese and we also offer conversation courses for those who wish to go to Japan for study or work purposes, or to work in a local Japanese company." />
    <meta name="keywords" content="jkt myanmar, jkt, JKT mm, JKT mm international, Business Counseling, IT, training, language school, Overseas Employment, JKT Myanmar International Co., Ltd., JKT Myanmar International" />
    <meta name="author" content="JKT IT Team" />
    <meta name="title" content="JKT Myanmar International Co., Ltd." />
    <meta name="copyright" content="JKT Myanmar International" />
    <meta name="robots" content="japanese school, follow" />
    <meta name="googlebot" content="jkt myanmar, jkt, JKT mm, JKT mm international, Business Counseling, IT, training, language school, Overseas Employment" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="English" />
    <meta name="revisit-after" content="1 days" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />

    <!-- css -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/owl.carousel.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg gray-dark float-panel" data-top="0" data-scroll="300">
        <div class="container-fluid mynav">
            <a href="index.html" class="navbar-brand">
                <img src="./assets/images/logo.jpg" alt="" height="50px" width="50px" />
                <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
                Myanmar International
            </a>
            <a href="index.html" class="small-brand">
                <img src="./assets/images/logo.jpg" alt="" height="50px" width="50px" />
                <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
                Myanmar International
            </a>
            <a href="index.html" class="icon-brand">
                <img src="./assets/images/logo.jpg" alt="" height="50px" width="50px" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon toggler-icon-color"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto text-sm-start">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link active"> HOME </a>
                    </li>
                    <li class="nav-item">
                        <a href="./about.html" class="nav-link active"> ABOUT </a>
                    </li>
                    <li class="nav-item">
                        <a href="./activities.html" class="nav-link active">
                            ACTIVITIES
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link active" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            OUR BUSINESS <i class="fas fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="serviceNavbarDropdown">
                            <a class="dropdown-item category-title" href="./services.html">SERVICES</a>
                            <a class="dropdown-item nav-sub-item" href="./overseas.html">OVERSEAS EMPLOYMENT</a>
                            <a class="dropdown-item nav-sub-item" href="./business.html">BUSINESS CONSULTANT</a>
                            <a class="dropdown-item nav-sub-item" href="./travels.html">TRAVEL AND TOURS</a>
                            <hr class="nav-dropdown-hr nav-sub-item">
                            <a class="dropdown-item category-title" href="./trainings.html">TRAININGS</a>
                            <a class="dropdown-item nav-sub-item" href="./jp-school.php">JAPANESE LANGUAGE SCHOOL</a>
                            <a class="dropdown-item nav-sub-item" href="./digital-institute.php">DIGITAL INSTITUTE</a>
                            <a class="dropdown-item nav-sub-item" href="./announcement.html">HR TRAINING</a>
                        </div>
                    </li>
                    <!-- <li class="nav-item dropdown">
            <a href="./trainings.html" class="nav-link" id="trainingNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              TRAININGS <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="trainingNavbarDropdown">
              <a class="dropdown-item" href="./jp-school.php">JAPANESE LANGUAGE SCHOOL</a>
              <a class="dropdown-item" href="./digital-institute.php">DIGITAL INSTITUTE</a>
              <a class="dropdown-item" href="./announcement.html">HR TRAINING</a>
            </div>
          </li> -->
                    <li class="nav-item">
                        <a href="./contact.html" class="nav-link active"> CONTACT </a>
                    </li>
                    <li class="recruitment-li">
                        <a href="./recruitment.php">
                            <button class="recruitment-btn">
                                <img src="./assets/images/icon/job-search.png" width="20" height="20" />&nbsp; Jobs
                            </button>
                        </a>
                    </li>
                    <li class="lang">
                        <div class="btn-group" role="group" aria-label="First group">
                            <a href="./recruitment.php"><button type="button" class="btn btn1" style="background-color: rgba(91, 175, 231, 0.5)">
                                    <img src="./assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
                            <a href="./mm/recruitment.php"><button type="button" class="btn btn2">
                                    <img src="./assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
                            <a href="./jp/recruitment.php"><button type="button" class="btn btn3">
                                    <img src="./assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="btn-group lang-xl" role="group" aria-label="First group">
                <a href="./recruitment.php"><button type="button" class="btn btn1" style="background-color: rgba(91, 175, 231, 0.5)">
                        <img src="./assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
                <a href="./mm/recruitment.php"><button type="button" class="btn btn2">
                        <img src="./assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
                <a href="./jp/recruitment.php"><button type="button" class="btn btn3">
                        <img src="./assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
            </div>
        </div>
    </nav>

    <!-- JP School header start -->
    <section>
        <div class="header">
            <h3>Recruitment</h3>
            <div class="bg-cover"></div>
            <img src="./assets/images/cover/cover.jpg" alt="jpschool-cover" />
        </div>
    </section>
    <!-- JP School header end -->

    <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-md-block">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recruitment</li>
        </ol>
    </nav>

    <section>
        <div class="container-fluid recruitment-container">
            <div class="tab-container">
                <ul class="tab-header">
                    <li class="side-li"></li>
                    <li id="it" class="tab-nav active"><i class="fas fa-laptop"></i>&nbsp; IT Jobs</li>
                    <li id="tokutei" class="tab-nav"><i class="fas fa-industry"></i>&nbsp;&nbsp; Tokutei Ginou Jobs</li>
                    <li id="general" class="tab-nav"><i class="fas fa-briefcase"></i>&nbsp; General Jobs</li>
                    <li class="side-li"></li>
                </ul>
                <div class="tab-body">
                    <div id="it-jobs" class="tab-data active">
                        <?php
                        $application = "SELECT * FROM en_jobs WHERE job_type = 'IT' ORDER BY created_at DESC, isavailable DESC";
                        $application_result = mysqli_query($jobs_db_conn, $application);
                        $getITCount = "SELECT COUNT(*) FROM en_jobs WHERE job_type = 'IT'";
                        $ITCountFetch = mysqli_query($jobs_db_conn, $getITCount);
                        $ITCountResult = mysqli_fetch_array($ITCountFetch);
                        if($ITCountResult[0] > 0) {
                        while ($row = mysqli_fetch_array($application_result)) {
                        ?>
                            <div class="job-card it-job">
                                <div class="row job-card-title">
                                    <?php  
                                        if($row["isavailable"] === "0") {
                                            echo "<div class='ribbon ribbon-top-left'><span>Unavailable</span></div>";
                                        } 
                                    ?>
                                    <div class="col-12 col-lg-9 text-center text-lg-left <?php echo $row['isavailable'] === "0" ? 'title-for-close' : '' ?>">
                                        <h4>
                                            <?php echo $row["job_title"] . " (" . $row["job_id"] . ")" ?>
                                            <?php if($row["memo"] === "[japan]") { ?><span class="badge-japan">Only In Japan</span><?php } ?>
                                        </h4>
                                        <span class="badges contract-badge"><i class="fas fa-user"></i> &nbsp; <?= $row["employment_type"] ?></span>
                                    </div>
                                    <div class="col-12 col-lg-3 text-lg-right text-center mt-4">
                                        <a href="recruitmentForm.php?job_id=<?= encrypt_decrypt("encrypt", $row["job_id"]) ?>">
                                            <button class="recruitment-apply" <?php echo $row['isavailable'] === "0" ? 'disabled' : '' ?>>
                                                Apply Now &nbsp;<i class='fas fa-location-arrow'></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <hr style="margin-bottom: 0">
                                <div class="row">
                                    <div class="col-12 col-lg-7 col-xl-8 order-2 order-lg-1">
                                        <table class="table recruitment-info-table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-money-check-alt"></i>&nbsp; Salary</th>
                                                    <td><?= $row["wage"] ?><br><?php
                                                                                if (!empty($row["overtime"])) {
                                                                                    echo "<span class='overtime'>Overtime Fees:</span>" . "&nbsp" . $row["overtime"];
                                                                                }
                                                                                ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-business-time"></i>&nbsp; Working Hours</th>
                                                    <td><?= $row["working_hour"] ?> (Breaktime: <?= $row["breaktime"] ?>)</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-calendar-alt"></i>&nbsp; Holidays</th>
                                                    <td><?= $row["holidays"] ?></td>
                                                </tr>
                                                <tr class="last-row">
                                                    <th scope="row" class="info-table-header"><i class="fas fa-map-marker-alt"></i>&nbsp; Location</th>
                                                    <td><?= $row["location"] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-lg-5 col-xl-4 order-1 order-lg-2 mb-2 mb-lg-0 text-lg-right text-center">
                                        <?php $photoArr = explode("|", $row["photos"]) ?>
                                        <img src="./backend/<?= $photoArr[0] ?>" alt="Company Profile" class="company-profile" width="145" height="150" />
                                        <img src="./backend/<?= $photoArr[1] ?>" alt="Company Profile" class="company-profile" width="145" height="150" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl-7 requirements-col">
                                        <span class="requirements-title mt-4"><i class='fas fa-tags'></i> Requirements:</span>
                                        <ul>
                                            <?php
                                            $requirementList = explode("\n", $row["requirements"]);
                                            for ($i = 0; $i < count($requirementList); $i++) {
                                            ?>
                                                <li><?= $requirementList[$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-5">
                                        <span class="benefits-title"><i class='fas fa-medal'></i> Benefits:</span><br>
                                        <ul>
                                            <?php
                                            $benefitList = explode("\n", $row["benefits"]);
                                            for ($i = 0; $i < count($benefitList); $i++) {
                                            ?>
                                                <li><?= $benefitList[$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    } 
                                } else {
                            ?>
                            <h2 class="no-data">Currently Unavailable</h2>
                            <?php } ?>
                        <div id="it-pagination-container"></div>
                    </div>
                    <div id="tokutei-jobs" class="tab-data">
                    <?php
                        $application = "SELECT * FROM en_jobs WHERE job_type = 'Tokutei' ORDER BY created_at DESC, isavailable DESC";
                        $application_result = mysqli_query($jobs_db_conn, $application);
                        $getTokuteiCount = "SELECT COUNT(*) FROM en_jobs WHERE job_type = 'Tokutei'";
                        $TokuteiCountFetch = mysqli_query($jobs_db_conn, $getTokuteiCount);
                        $TokuteiCountResult = mysqli_fetch_array($TokuteiCountFetch);
                        if($TokuteiCountResult[0] > 0) {
                        while ($row = mysqli_fetch_array($application_result)) {
                        ?>
                            <div class="job-card it-job">
                                <div class="row job-card-title">
                                    <?php  
                                        if($row["isavailable"] === "0") {
                                            echo "<div class='ribbon ribbon-top-left'><span>Unavailable</span></div>";
                                        }
                                    ?>
                                    <div class="col-12 col-lg-9 text-center text-lg-left <?php echo $row['isavailable'] === "0" ? 'title-for-close' : '' ?>">
                                        <h4>
                                            <?php echo $row["job_title"] . " (" . $row["job_id"] . ")" ?>
                                            <?php if($row["memo"] === "[japan]") { ?><span class="badge-japan">Only In Japan</span><?php } ?>
                                        </h4>
                                        <span class="badges contract-badge"><i class="fas fa-user"></i> &nbsp; <?= $row["employment_type"] ?></span>
                                    </div>
                                    <div class="col-12 col-lg-3 text-lg-right text-center mt-4">
                                        <a href="recruitmentForm.php?job_id=<?= encrypt_decrypt("encrypt", $row["job_id"]) ?>">
                                            <button class="recruitment-apply" <?php echo $row['isavailable'] === "0" ? 'disabled' : '' ?>>
                                                Apply Now &nbsp;<i class='fas fa-location-arrow'></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <hr style="margin-bottom: 0">
                                <div class="row">
                                    <div class="col-12 col-lg-7 col-xl-8 order-2 order-lg-1">
                                        <table class="table recruitment-info-table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-money-check-alt"></i>&nbsp; Salary</th>
                                                    <td><?= $row["wage"] ?><br><?php
                                                                                if (!empty($row["overtime"])) {
                                                                                    echo "<span class='overtime'>Overtime Fees:</span>" . "&nbsp" . $row["overtime"];
                                                                                }
                                                                                ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-business-time"></i>&nbsp; Working Hours</th>
                                                    <td><?= $row["working_hour"] ?> (Breaktime: <?= $row["breaktime"] ?>)</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-calendar-alt"></i>&nbsp; Holidays</th>
                                                    <td><?= $row["holidays"] ?></td>
                                                </tr>
                                                <tr class="last-row">
                                                    <th scope="row" class="info-table-header"><i class="fas fa-map-marker-alt"></i>&nbsp; Location</th>
                                                    <td><?= $row["location"] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-lg-5 col-xl-4 order-1 order-lg-2 mb-2 mb-lg-0 text-lg-right text-center">
                                        <?php $photoArr = explode("|", $row["photos"]) ?>
                                        <img src="./backend/<?= $photoArr[0] ?>" alt="Company Profile" class="company-profile" width="145" height="150" />
                                        <img src="./backend/<?= $photoArr[1] ?>" alt="Company Profile" class="company-profile" width="145" height="150" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl-7 requirements-col">
                                        <span class="requirements-title mt-4"><i class='fas fa-tags'></i> Requirements:</span>
                                        <ul>
                                            <?php
                                            $requirementList = explode("\n", $row["requirements"]);
                                            for ($i = 0; $i < count($requirementList); $i++) {
                                            ?>
                                                <li><?= $requirementList[$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-5">
                                        <span class="benefits-title"><i class='fas fa-medal'></i> Benefits:</span><br>
                                        <ul>
                                            <?php
                                            $benefitList = explode("\n", $row["benefits"]);
                                            for ($i = 0; $i < count($benefitList); $i++) {
                                            ?>
                                                <li><?= $benefitList[$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                } 
                                } else {
                            ?>
                            <h2 class="no-data">Currently Unavailable</h2>
                            <?php } ?>
                        <div id="tokutei-pagination-container"></div>
                    </div>
                    <div id="general-jobs" class="tab-data">
                    <?php
                        $application = "SELECT * FROM en_jobs WHERE job_type = 'General' ORDER BY created_at DESC, isavailable DESC";
                        $application_result = mysqli_query($jobs_db_conn, $application);
                        $getGeneralCount = "SELECT COUNT(*) FROM en_jobs WHERE job_type = 'General'";
                        $GeneralCountFetch = mysqli_query($jobs_db_conn, $getGeneralCount);
                        $GeneralCountResult = mysqli_fetch_array($GeneralCountFetch);
                        if($GeneralCountResult[0] > 0) {
                        while ($row = mysqli_fetch_array($application_result)) {
                        ?>
                            <div class="job-card it-job">
                                <div class="row job-card-title">
                                    <?php  
                                        if($row["isavailable"] === "0") {
                                            echo "<div class='ribbon ribbon-top-left'><span>Unavailable</span></div>";
                                        }
                                    ?>
                                    <div class="col-12 col-lg-9 text-center text-lg-left <?php echo $row['isavailable'] === "0" ? 'title-for-close' : '' ?>">
                                        <h4>
                                            <?php echo $row["job_title"] . " (" . $row["job_id"] . ")" ?>
                                            <?php if($row["memo"] === "[japan]") { ?><span class="badge-japan">Only In Japan</span><?php } ?>
                                        </h4>
                                        <span class="badges contract-badge"><i class="fas fa-user"></i> &nbsp; <?= $row["employment_type"] ?></span>
                                    </div>
                                    <div class="col-12 col-lg-3 text-lg-right text-center mt-4">
                                        <a href="recruitmentForm.php?job_id=<?= encrypt_decrypt("encrypt", $row["job_id"]) ?>">
                                            <button class="recruitment-apply" <?php echo $row['isavailable'] === "0" ? 'disabled' : '' ?>>
                                                Apply Now &nbsp;<i class='fas fa-location-arrow'></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <hr style="margin-bottom: 0">
                                <div class="row">
                                    <div class="col-12 col-lg-7 col-xl-8 order-2 order-lg-1">
                                        <table class="table recruitment-info-table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-money-check-alt"></i>&nbsp; Salary</th>
                                                    <td><?= $row["wage"] ?><br><?php
                                                                                if (!empty($row["overtime"])) {
                                                                                    echo "<span class='overtime'>Overtime Fees:</span>" . "&nbsp" . $row["overtime"];
                                                                                }
                                                                                ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-business-time"></i>&nbsp; Working Hours</th>
                                                    <td><?= $row["working_hour"] ?> (Breaktime: <?= $row["breaktime"] ?>)</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="info-table-header"><i class="fas fa-calendar-alt"></i>&nbsp; Holidays</th>
                                                    <td><?= $row["holidays"] ?></td>
                                                </tr>
                                                <tr class="last-row">
                                                    <th scope="row" class="info-table-header"><i class="fas fa-map-marker-alt"></i>&nbsp; Location</th>
                                                    <td><?= $row["location"] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-lg-5 col-xl-4 order-1 order-lg-2 mb-2 mb-lg-0 text-lg-right text-center">
                                        <?php $photoArr = explode("|", $row["photos"]) ?>
                                        <img src="./backend/<?= $photoArr[0] ?>" alt="Company Profile" class="company-profile" width="145" height="150" />
                                        <img src="./backend/<?= $photoArr[1] ?>" alt="Company Profile" class="company-profile" width="145" height="150" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl-7 requirements-col">
                                        <span class="requirements-title mt-4"><i class='fas fa-tags'></i> Requirements:</span>
                                        <ul>
                                            <?php
                                            $requirementList = explode("\n", $row["requirements"]);
                                            for ($i = 0; $i < count($requirementList); $i++) {
                                            ?>
                                                <li><?= $requirementList[$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-5">
                                        <span class="benefits-title"><i class='fas fa-medal'></i> Benefits:</span><br>
                                        <ul>
                                            <?php
                                            $benefitList = explode("\n", $row["benefits"]);
                                            for ($i = 0; $i < count($benefitList); $i++) {
                                            ?>
                                                <li><?= $benefitList[$i] ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                } 
                                } else {
                            ?>
                            <h2 class="no-data">Currently Unavailable</h2>
                            <?php } ?>
                        <div id="general-pagination-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- to top button -->
    <button class="to-top-btn" id="toTopJobsRecruitment">
        <i class="fa fa-arrow-up"></i>
    </button>
    <!-- end to top button -->

    <!-- footer start -->
    <footer class="footer">
        <div class="left">
            <a href="index.html"><span>JKT</span> Myanmar International </a>
            <div>
                <a href="https://www.facebook.com/JKT-Japanese-Language-School-100339937999010/">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
        <div class="right">
            <div class="footer-flex">
                <div>
                    <header>Join us for your business</header>
                    <p>We're here to give you a hand whenever you need</p>
                </div>
                <a href="./contact.html"><button id="btn-contact" class="primary-btn">CONTACT US</button></a>
            </div>
            <div class="footer-flex-nav">
                <div class="nav">
                    <header>Services</header>
                    <ul class="footer-list" id="first">
                        <li>
                            <span><a href="./overseas.html">Oversea Employment Services (only Japan)</a></span>
                        </li>
                        <li>
                            <span><a href="./business.html">Business Consultant Service</a></span>
                        </li>
                        <!-- <li>
                <span><a href="./announcement.html">IT Services</a></span>
              </li> -->
                        <li>
                            <span><a href="./travels.html">Travel and Tours</a></span>
                        </li>
                    </ul>
                </div>
                <div class="nav">
                    <header>Training</header>
                    <ul class="footer-list" id="second">
                        <li>
                            <span><a href="./jp-school.php">Japanese Language School</a></span>
                        </li>
                        <li>
                            <span><a href="./digital-institute.php">Digital Institute</a></span>
                        </li>
                        <li>
                            <span><a href="./announcement.html">HR Training</a></span>
                        </li>
                    </ul>
                </div>
                <div class="nav">
                    <header>Contact</header>
                    <ul class="footer-list" id="last">
                        <li>
                            <i class="fa fa-phone"></i><a href="tel:+959269564339">+959 269 564 339</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i><a href="tel:+959770411708">+959 770 411 708</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>No.86, 3A, Shinsawpu Road,
                            Near Myaynigone Citymart, Sanchaung Township, Yangon, Myanmar
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:jkt.mm.int@gmail.com">jkt.mm.int@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-copyright">
        Copyright © 2021 | JKT Myanmar International Co., Ltd.
    </div>
    <!-- script -->
    <script src="./assets/js/jquery-3.6.0.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/float-panel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
    <script src="./assets/js/comment.js"></script>
    <script src="./assets/js/jp-class-schedule.js"></script>
    <script src="./assets/js/recruitmentList.js"></script>
</body>

</html>