<?php
session_start();
$response = isset($_SESSION["response"]) ? $_SESSION["response"] : null;
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
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>

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
            <a href="./services.html" class="nav-link active" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              SERVICES <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="serviceNavbarDropdown">
              <a class="dropdown-item" href="./overseas.html">OVERSEAS EMPLOYMENT</a>
              <a class="dropdown-item" href="./business.html">BUSINESS CONSULTANT</a>
              <a class="dropdown-item" href="./announcement.html">TRAVEL AND TOULS</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="./trainings.html" class="nav-link" id="trainingNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              TRAININGS <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="trainingNavbarDropdown">
              <a class="dropdown-item" href="./jp-school.php">JAPANESE LANGUAGE SCHOOL</a>
              <a class="dropdown-item" href="./digital-institute.php">Digital Institute</a>
              <a class="dropdown-item" href="./announcement.html">HR TRAINING</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="./contact.html" class="nav-link active"> CONTACT </a>
          </li>
          <li class="lang">
            <div class="btn-group" role="group" aria-label="First group">
              <a href="./classEnroll.php?courseId=<?php echo $_GET['courseId'] ?>"><button type="button" class="btn btn1" style="background-color: rgba(91, 175, 231, 0.5)">
                  <img src="./assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
              <a href="./mm/classEnroll.php?courseId=<?php echo $_GET['courseId'] ?>"><button type="button" class="btn btn2">
                  <img src="./assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
              <a href="./jp/classEnroll.php?courseId=<?php echo $_GET['courseId'] ?>"><button type="button" class="btn btn3">
                  <img src="./assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="btn-group lang-xl" role="group" aria-label="First group">
        <a href="./classEnroll.php?courseId=<?php echo $_GET['courseId'] ?>"><button type="button" class="btn btn1" style="background-color: rgba(91, 175, 231, 0.5)">
            <img src="./assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
        <a href="./mm/classEnroll.php?courseId=<?php echo $_GET['courseId'] ?>"><button type="button" class="btn btn2">
            <img src="./assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
        <a href="./jp/classEnroll.php?courseId=<?php echo $_GET['courseId'] ?>"><button type="button" class="btn btn3">
            <img src="./assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
      </div>
    </div>
  </nav>

  <?php
  $decryptedCourseId = encrypt_decrypt("decrypt", $_GET['courseId']);
  $courseId = isset($decryptedCourseId) ? $decryptedCourseId : null;
  include_once("../jktmyanmarint.admin.com/confs/config.php");
  $get_course = "SELECT course_id, c.title AS course_title, cty.title AS category_title, 
                            t.title AS type_title, level_or_sub, fee, instructor, 
                            services, discount_percent, start_date, duration, sections, note
                            FROM courses c, categories cty, types t WHERE course_id = $courseId AND
                            c.category_id = cty.category_id AND c.type_id = t.type_id";
  ?>

  <!-- JP School header start -->
  <section>
    <div class="header">
      <h3>Training Schools - Enrollment Form</h3>
      <div class="bg-cover"></div>
      <img src="./assets/images/cover/cover.jpg" alt="jpschool-cover" />
    </div>
  </section>
  <!-- JP School header end -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-md-block">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
      <li class="breadcrumb-item"><a href="./trainings.html">Trainings</a></li>
      <li class="breadcrumb-item"><a href="./school-detail.php">Training Schools Schedule</a></li>
      <li class="breadcrumb-item active" aria-current="page">Enrollment Form</li>
    </ol>
  </nav>

  <!-- Enrollment Form start -->
  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-11 text-center mt-4 d-block d-lg-flex">
          <div class="tabs d-block d-lg-none">
            <div class="tab">
              <?php 
                 $result = mysqli_query($conn, $get_course);
                 $row = mysqli_fetch_assoc($result);
                 $origin_fee = $row['fee'];
              ?>
              <input type="checkbox" id="chck2" class="accordion">
              <label class="tab-label" for="chck2"><?php echo $row['category_title'] . " " . $row['course_title']; ?></label>
              <div class="tab-content">
                <p class="class-detail">
                  <?php echo $row['level_or_sub'] . " (" . $row['type_title'] . ")"; ?>
                </p>
                <p class="class-detail">
                  <?php
                  if($row['discount_percent'] != 0) {
                    $sale_price = $origin_fee - ($origin_fee * $row['discount_percent'] / 100);
                    echo "<span class='sale-price'>" . number_format($origin_fee) . "</span>&nbsp;";
                    echo number_format($sale_price) . " MMK";
                  } else {
                    echo $origin_fee . " MMK";
                  }
                  ?>
                </p>
                <p class="class-detail">
                  <?php echo $row['instructor'] === "" ? '-' : $row['instructor']; ?>
                </p>
                <p class="class-detail">
                  <?php echo $row['duration'] . " Months"; ?>
                </p>
                <p class="class-detail">
                  <?php echo empty($row['start_date']) ? '-' : $row['start_date']; ?>
                </p>
                <p class='sections-enroll-sm'>
                  <?php
                  // var_dump($row["sections"]);
                  // var_dump($row["sections"][0]); 
                  $sections = json_decode($row["sections"], true);
                  for ($i = 0; $i < count($sections); $i++) {
                    // var_dump($sections[$i]["days"]);
                    // echo "<div class='sections-enroll'>";
                    for ($j = 0; $j < count($sections[$i]["days"]); $j++) {
                  ?>
                      <span id="days" class="days schedule-days-badges <?php
                                                                        switch ($sections[$i]["days"][$j]) {
                                                                          case "Sa":
                                                                          case "Su":
                                                                            echo "weekend";
                                                                            break;
                                                                          default:
                                                                            echo "weekday";
                                                                            break;
                                                                        }
                                                                        ?>"><?php
                        echo $sections[$i]["days"][$j];
                        echo "</span>";
                      }
                        ?>
                      <span class="section-hour schedule-time-badges" id="section_hour">
                        <?php
                        echo $sections[$i]["sectionHour"];
                        ?>
                      </span><br>
                    <?php }
                  // echo "</div>";
                    ?>
                </p>
                <p class="class-detail">
                  <?php echo $row['services']; ?>
                </p>
                <p class="class-detail note">
                  <?php $note = $row['note'] === '' ? '-' : $row['note'];
                  echo $note; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-11 col-lg-7 text-center p-0 mt-3 mb-2">
          <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <!-- <h2 id="heading">Sign Up Your User Account</h2> -->
            <p class="enroll-description">Fill all form field to go to next step</p>
            <?php
            if (!empty($response)) {
            ?>
              <form id="enrollmentForm" action="./backend/classEnroll.php" method="POST" enctype="multipart/form-data">
                <!-- progressbar -->
                <ul id="progressbar">
                  <li class="active" id="personal"></li>
                  <li id="payment"></li>
                  <li id="confirm"></li>
                </ul>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div> <br> <!-- fieldsets -->
                <fieldset id="userInformation">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">User Information:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 1 - 3</h2>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
                        <img id="image-preview" src="<?php echo $response["data"]["src"] ?>" alt="user image" />
                        <input type="hidden" name="src" id="src" value="" />
                      </div>
                      <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 file-input">
                        <label class="fieldlabels">Upload Your Photo: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="file" name="photo" class="form-input" id="file-input" value="./assets/images/icon/close.png" />
                      </div>
                      <p class="alert col-12 pb-0 help-block"><?php if ($response["type"] === "error") echo $response["message"]; ?></p>
                    </div>
                    <input type="hidden" name="courseId" value="<?php echo $courseId  ?>"/>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Full Name: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="text" class="form-input" name="uname" id="uname" value="<?php echo $response["data"]["uname"] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Date of Birth: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="date" class="form-input" name="dob" id="dob" value="<?php echo $response["data"]["dob"] ?>" required />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Father Name: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="text" class="form-input" name="fname" id="fname" placeholder="e.g. U Aye" value="<?php echo $response["data"]["fname"] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">NRC: <span class="required-tag">required &nbsp; *</span></label>
                        <div class="row">
                          <?php $stateNumberArr = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14"] ?>
                          <!-- <input type="text" class="form-input" name="nrc" id="nrc" placeholder="e.g. Please Enter NRC" required />  -->
                          <div class="col-12 col-lg-2 col-xl-2">
                            <select name="nrcCode" id="nrcCode" class="form-input nrc">
                              <!-- <option  value="<?php echo $response["data"]["nrcCode"] ?>"  selected disabled><?php echo $response["data"]["nrcCode"] ?></option> -->
                              <?php
                              for ($i = 0; $i < count($stateNumberArr); $i++) {
                                if ($response["data"]["nrcCode"] == $i) {
                                  echo "<option value='" . $stateNumberArr[$i] . "' selected>";
                                } else {
                                  echo "<option value='" . $stateNumberArr[$i] . "'>";
                                }
                                echo $stateNumberArr[$i];
                                echo "</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-12 col-lg-5 col-xl-5">
                            <select name="township" id="township" class="form-input nrc">
                              <option value="<?php echo $response["data"]["township"] ?>" selected><?php echo $response["data"]["township"] ?></option>
                            </select>
                          </div>
                          <div class="col-12 col-lg-3 col-xl-3">
                            <select name="type" id="type" class="form-input nrc">
                              <!-- <option value="<?php echo $response["data"]["type"] ?>" selected disabled><?php echo $response["data"]["type"] ?></option> -->
                              <option value="(C) - (နိုင်)" <?php if ($response["data"]["type"] == "(C) - (နိုင်)") echo "selected" ?>>(C) - (နိုင်)</option>
                              <option value="(AC) - (ဧည့်)" <?php if ($response["data"]["type"] == "(AC) - (ဧည့်)") echo "selected" ?>>(AC) - (ဧည့်)</option>
                              <option value="(NC) - (ပြု)" <?php if ($response["data"]["type"] == "(NC) - (ပြု)") echo "selected" ?>>(NC) - (ပြု)</option>
                              <option value="(V) - (စ)" <?php if ($response["data"]["type"] == "(V)") echo "selected" ?>>(V) - (စ)</option>
                              <option value="(M) - (သ)" <?php if ($response["data"]["type"] == "(M) - (သ)") echo "selected" ?>>(M) - (သ)</option>
                              <option value="(N) - (သီ)" <?php if ($response["data"]["type"] == "(N) - (သီ)") echo "selected" ?>>(N) - (သီ)</option>
                            </select>
                          </div>
                          <div class="col-12 col-lg-2 col-xl-2">
                            <input type="text" class="form-input nrc" name="nrcNumber" id="nrcNumber" value="<?php echo $response["data"]["nrcNumber"] ?>" placeholder="123456" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Email:</label>
                        <input type="email" class="form-input" name="email" id="email" value="<?php echo $response["data"]["email"] ?>" placeholder="abc@gmail.com" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Phone Number: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="text" class="form-input" name="phone" id="phone" value="<?php echo $response["data"]["phone"] ?>" placeholder="09..." />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Address: <span class="required-tag">required &nbsp; *</span></label>
                        <textarea name="address" class="form-input" id="address" placeholder="e.g. No.(), (...) Road, (...) City."><?php echo htmlspecialchars(
                                                                                                                                      $response["data"]["address"],
                                                                                                                                      ENT_QUOTES,
                                                                                                                                      'UTF-8'
                                                                                                                                    ) ?></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Education: <span class="required-tag">required &nbsp; *</span></label>
                        <textarea name="edu" class="form-input" id="edu" placeholder="e.g. University or High School"><?php echo htmlspecialchars(
                                                                                                          $response["data"]["edu"],
                                                                                                          ENT_QUOTES,
                                                                                                          'UTF-8'
                                                                                                        ) ?></textarea>
                      </div>
                    </div>
                    <input type="button" name="next" id="userInfo" class="next action-button" value="Next" />
                </fieldset>
                <!-- <fieldset id="classInformation">
                <div class="form-card">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="enrollForm-title">Class:</h2>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-12">
                      <?php
                      // include_once("../../admin/confs/config.php"); 
                      // $course = "SELECT course_id, c.title AS course_title, c.level as level_or_sub, t.title AS type_title, 
                      //             ct.title AS category_title, sections FROM courses c, types t, categories ct 
                      //             WHERE c.type_id = t.type_id AND c.category_id = ct.category_id";
                      // $course_result = mysqli_query($conn, $course);
                      ?>
                      <span id="selected_option"></span>
                      <label class="fieldlabels">Class Category: <span class="required-tag">required &nbsp; *</span></label>
                      <select name="classId" id="className" class="form-input">
                        <option value="" selected disabled>Choose class</option>
                        <?php
                        // while($row = mysqli_fetch_array($course_result)) { 
                        ?>
                          <option value="<?php // echo $row['course_id'] 
                                          ?>"><?php // echo $row['course_title'] . ' ' . $row['level_or_sub'] . ' (' . $row['type_title'] . ')' 
                                              ?></option>
                        <?php //} 
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-12">
                      <label class="fieldlabels">Class Time: <span class="required-tag">required &nbsp; *</span></label>
                      <select name="classTime" id="classTime" class="form-input">
                        <option value="" selected disabled>Choose class time</option>
                        <option value="12:00~2:00pm">12:00~2:00pm</option>
                        <option value="10:00~12:00pm">10:00~12:00pm</option>
                      </select>
                    </div>
                  </div>
                </div>
                <input type="button" name="next" class="next action-button" value="Next" />
                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
              </fieldset> -->
                <fieldset id="paymentMethod">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">Payment:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 2 - 3</h2>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                        <label class="fieldlabels">Select One of the Payment Method: <span class="required-tag">required &nbsp; *</span></label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="CB Bank" <?php echo "checked" ?> />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/CB.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="KBZ Bank" />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/kbz.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="AYA Bank" />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/AYA.png)"></div>
                        </label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="Kpay" />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/KPAY.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="Cash" />
                          <div class="bank-image in-cash">In Cash <i class="fas fa-money-check"></i></div>
                        </label>
                      </div>
                      <span id="radioMsg"></span>
                    </div>
                  </div>
                  <input type="button" name="next" class="next action-button" value="Next" />
                  <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>
                <fieldset id="success">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">Finish:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 3 - 3</h2>
                      </div>
                    </div> <br><br>
                    <h2 class="blue-text text-center"><strong>Successfully Submitted!</strong></h2> <br>
                    <div class="row justify-content-center">
                      <div class="col-3">
                        <img src="./assets/images/blue-tick.png" class="fit-image">
                      </div>
                    </div> <br><br>
                    <div class="row justify-content-center">
                      <div class="col-7 text-center">
                        <h5 class="blue-text text-center">We will send email during business hours (9:00~17:00). Please check your email for payment information. </h5>
                      </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                      <a href="classEnroll.php" class="back-to-courses">Browse Courses</a>
                    </div>
                  </div>
                </fieldset>
              </form>
            <?php } else { ?>

              <form id="enrollmentForm" action="./backend/classEnroll.php" method="POST" enctype="multipart/form-data">
                <!-- progressbar -->
                <ul id="progressbar">
                  <li class="active" id="personal"></li>
                  <li id="payment"></li>
                  <li id="confirm"></li>
                </ul>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div> <br> <!-- fieldsets -->
                <fieldset id="userInformation">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">User Information:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 1 - 3</h2>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
                        <img id="image-preview" src="./assets/images/default-profile-icon.jpg" alt="user image" />
                        <input type="hidden" name="src" id="src" value="" />
                      </div>
                      <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 file-input">
                        <label class="fieldlabels">Upload Your Photo: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="file" name="photo" class="form-input" id="file-input" />
                      </div>

                    </div>
                    <input type="hidden" name="courseId" value="<?php if (isset($courseId)) echo $courseId  ?>" />
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Full Name: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="text" class="form-input" name="uname" id="uname" placeholder="eg. Win Win" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Date of Birth: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="date" class="form-input" name="dob" id="dob" required />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Father Name: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="text" class="form-input" name="fname" id="fname" placeholder="e.g. U Aye" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12">
                        <label class="fieldlabels">NRC: <span class="required-tag">required &nbsp; *</span></label>
                        <div class="row">
                          <?php $stateNumberArr = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14"] ?>
                          <!-- <input type="text" class="form-input" name="nrc" id="nrc" placeholder="e.g. Please Enter NRC" required />  -->
                          <div class="col-12 col-lg-2 col-xl-2">
                            <select name="nrcCode" id="nrcCode" class="form-input nrc">
                              <option value="" selected disabled>State</option>
                              <?php
                              for ($i = 0; $i < count($stateNumberArr); $i++) {
                                echo "<option value='" . $stateNumberArr[$i] . "'>";
                                echo $stateNumberArr[$i];
                                echo "</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-12 col-lg-5 col-xl-5">
                            <select name="township" id="township" class="form-input nrc">
                              <option value="" selected disabled>Township</option>
                            </select>
                          </div>
                          <div class="col-12 col-lg-3 col-xl-3">
                            <select name="type" id="type" class="form-input nrc">
                              <option value="" selected disabled>Type</option>
                              <option value="(C)">(C) - (နိုင်)</option>
                              <option value="(AC)">(AC) - (ဧည့်)</option>
                              <option value="(NC)">(NC) - (ပြု)</option>
                              <option value="(V)">(V) - (စ)</option>
                              <option value="(M)">(M) - (သ)</option>
                              <option value="(N)">(N) - (သီ)</option>
                            </select>
                          </div>
                          <div class="col-12 col-lg-2 col-xl-2">
                            <input type="text" class="form-input nrc" name="nrcNumber" id="nrcNumber" placeholder="123456" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Email:</label>
                        <input type="email" class="form-input" name="email" id="email" placeholder="abc@gmail.com" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Phone Number: <span class="required-tag">required &nbsp; *</span></label>
                        <input type="text" class="form-input" name="phone" id="phone" placeholder="09..." />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Address: <span class="required-tag">required &nbsp; *</span></label>
                        <textarea name="address" class="form-input" id="address" placeholder="e.g. No.(), (...) Road, (...) City."></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">Education: <span class="required-tag">required &nbsp; *</span></label>
                        <textarea name="edu" class="form-input" id="edu" placeholder="e.g. University or High School"></textarea>
                      </div>
                    </div>
                    <input type="button" name="next" id="userInfo" class="next action-button" value="Next" />
                </fieldset>
                <fieldset id="paymentMethod">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">Payment:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 2 - 3</h2>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                        <label class="fieldlabels">Select One of the Payment Method: <span class="required-tag">required &nbsp; *</span></label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="CB Bank" />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/CB.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="KBZ Bank" />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/kbz.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="AYA Bank" />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/AYA.png)"></div>
                        </label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="KBZ Pay" />
                          <div class="bank-image" style="background-image: url(./assets/images/banks/KPAY.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="Cash" />
                          <div class="bank-image in-cash">In Cash <i class="fas fa-money-check"></i></div>
                        </label>
                      </div>
                      <span id="radioMsg"></span>
                    </div>
                  </div>
                  <input type="button" name="next" class="next action-button" value="Next" />
                  <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>
                <fieldset id="success">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">Finish:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">Step 3 - 3</h2>
                      </div>
                    </div> <br><br>
                    <h2 class="blue-text text-center"><strong>Successfully Submitted!</strong></h2> <br>
                    <div class="row justify-content-center">
                      <div class="col-3">
                        <img src="./assets/images/blue-tick.png" class="fit-image">
                      </div>
                    </div> <br><br>
                    <div class="row justify-content-center">
                      <div class="col-7 text-center">
                        <h5 class="blue-text text-center">We will send email during business hours (9:00~17:00). Please check your email for payment information. </h5>
                      </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                      <a href="classEnroll.php" class="back-to-courses">Browse Courses</a>
                    </div>
                  </div>
                </fieldset>
              </form>
            <?php } ?>
          </div>
        </div>
        <div class="col-12 col-lg-4 offset-lg-1 d-none d-lg-block text-center mb-5 mt-5 pt-3">
          <div class="tabs">
            <div class="tab">
              <input type="checkbox" id="chck1" class="accordion" checked>
              <label class="tab-label ml-4" for="chck1"><?php echo $row['category_title'] . " " . $row['course_title']; ?></label>
              <div class="tab-content">
                <p class="class-detail">
                  <?php echo $row['level_or_sub'] . " (" . $row['type_title'] . ")"; ?>
                </p>
                <p class="class-detail">
                  <?php
                  if($row['discount_percent'] != 0) {
                    $sale_price = $origin_fee - ($origin_fee * $row['discount_percent'] / 100);
                    echo "<span class='sale-price'>" . number_format($origin_fee) . "</span>&nbsp;";
                    echo number_format($sale_price) . " MMK";
                  } else {
                    echo $origin_fee . " MMK";
                  }
                  ?>
                </p>
                <p class="class-detail">
                  <?php echo $row['instructor'] === "" ? '-' : $row['instructor']; ?>
                </p>
                <p class="class-detail">
                  <?php echo $row['duration'] . " Months"; ?>
                </p>
                <p class="class-detail">
                  <?php echo empty($row['start_date']) ? '-' : $row['start_date']; ?>
                </p>
                <p class='sections-enroll'>
                  <?php
                  // var_dump($row["sections"]);
                  // var_dump($row["sections"][0]); 
                  $sections = json_decode($row["sections"], true);
                  for ($i = 0; $i < count($sections); $i++) {
                    // var_dump($sections[$i]["days"]);
                    // echo "<div >";
                    for ($j = 0; $j < count($sections[$i]["days"]); $j++) {
                  ?>
                      <span id="days" class="days schedule-days-badges accordion-badges <?php
                                                                        switch ($sections[$i]["days"][$j]) {
                                                                          case "Sa":
                                                                          case "Su":
                                                                            echo "weekend";
                                                                            break;
                                                                          default:
                                                                            echo "weekday";
                                                                            break;
                                                                        }
                                                                        ?>"><?php
                        echo $sections[$i]["days"][$j];
                        echo "</span>";
                      }
                        ?>
                      <span class="section-hour schedule-time-badges" id="section_hour">
                        <?php
                        echo $sections[$i]["sectionHour"];
                        ?>
                      </span><br>
                    <?php }
                  // echo "</div>";
                    ?>
                </p>
                <p class="class-detail">
                  <?php echo $row['services']; ?>
                </p>
                <p class="class-detail note">
                  <?php $note = $row['note'] === '' ? '-' : $row['note'];
                  echo $note; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Enrollment Form end -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmationModal">
    Launch demo modal
  </button> -->

  <!-- The Confirmation Modal -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-box">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Registration confirmation</h4>
          <button class="btn-close" data-dismiss="modal">
            <i class='fas fa-times' style='font-size:24px; color: grey'></i>
          </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body confirm-modal-body">
          Are you sure, you want to <span style="color: #001c69">submit your enrollment for this course</span>?
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn-cancel" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn-submit" id="submitConfirm" data-dismiss="modal">Submit</button>
        </div>

      </div>
    </div>
  </div>

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
              <span><a href="./announcement.html">Travel and Tours</a></span>
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

  <!-- script -->
  <script src="./assets/js/jquery-3.6.0.js"></script>
  <script src="./assets/js/validation.js"></script>
  <script src="./assets/js/additional-methods"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/float-panel.js"></script>
  <script src="./assets/js/multistepForm.js"></script>
  <script src="./assets/js/userImgPreview.js"></script>
</body>
<html>