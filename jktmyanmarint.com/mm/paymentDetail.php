<?php

if (!isset($_GET["enroll_id"])) {
  header("location: index.html");
}
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
  <link rel="shortcut icon" href="../assets/images/logo.jpg" />
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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/owl.carousel.css" />
  <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
  <nav class="navbar navbar-light navbar-expand-lg gray-dark float-panel" data-top="0" data-scroll="300">
    <div class="container-fluid mynav">
      <a href="./index.html" class="navbar-brand mm-nav-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
        <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
        Myanmar International
      </a>
      <a href="./index.html" class="small-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
        <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
        Myanmar International
      </a>
      <a href="./index.html" class="icon-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon toggler-icon-color"></span>
      </button>
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto text-sm-start">
          <li class="nav-item mm-nav">
            <a href="./index.html" class="nav-link active"> ပင်မစာမျက်နှာ </a>
          </li>
          <li class="nav-item mm-nav">
            <a href="./about.html" class="nav-link active">
              ကျွန်ုပ်တို့‌အကြောင်း
            </a>
          </li>
          <li class="nav-item mm-nav">
            <a href="./activities.html" class="nav-link active">
              လှုပ်ရှားမှုများ
            </a>
          </li>
          <li class="nav-item dropdown mm-nav">
            <a href="#" class="nav-link" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              လုပ်ငန်းများ <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="serviceNavbarDropdown">
              <a class="dropdown-item category-title-mm" href="./services.html">၀န်ဆောင်မှုများ </a>
              <a class="dropdown-item nav-sub-item" href="./overseas.html">နိုင်ငံခြား အလုပ်အကိုင် ရှာဖွေရေး ဝန်ဆောင်မှု</a>
              <a class="dropdown-item nav-sub-item" href="./business.html">စီးပွားရေးဆိုင်ရာ အကြံပေးခြင်း ၀န်ဆောင်မှု</a>
              <!-- <a class="dropdown-item" href="./announcement.html"
                  >အိုင်တီနည်းပညာ ဆိုင်ရာ ၀န်ဆောင်မှု</a
                > -->
              <a class="dropdown-item nav-sub-item" href="./travels.html">ခရီးသွား ၀န်ဆောင်မှု</a>
              <hr class="nav-dropdown-hr nav-sub-item" />
              <a class="dropdown-item category-title-mm" href="./trainings.html">လေ့ကျင့်သင်ကြားမှုများ </a>
              <a class="dropdown-item nav-sub-item" href="./jp-school.php">ဂျပန်ဘာသာစကား သင်တန်း</a>
              <a class="dropdown-item nav-sub-item" href="./digital-institute.php">အိုင်တီနည်းပညာ သင်တန်းကျောင်း</a>
              <a class="dropdown-item nav-sub-item" href="./announcement.html">လူ့စွမ်းအားအရင်းအမြစ် စီမံခန့်ခွဲမှု သင်တန်း</a>
            </div>
          </li>
          <li class="nav-item mm-nav">
            <a href="./contact.html" class="nav-link"> ဆက်သွယ်ရန် </a>
          </li>
          <li class="recruitment-li">
            <a href="./recruitment.php"><button class="recruitment-btn-mm">အလုပ်ခေါ်စာများ</button></a>
          </li>
          <?php $getID = $_GET['enroll_id'] ?>
          <li class="lang">
            <div class="btn-group" role="group" aria-label="First group">
              <a href="../paymentDetail.php?enroll_id=<?php echo $getID; ?>"><button type="button" class="btn btn1">
                  <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
              <a href="./paymentDetail.php?enroll_id=<?php echo $getID; ?>"><button type="button" class="btn btn2" style="background-color: rgba(91, 175, 231, 0.5)">
                  <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
              <a href="../jp/paymentDetail.php?enroll_id=<?php echo $getID; ?>"><button type="button" class="btn btn3">
                  <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="btn-group lang-xl" role="group" aria-label="First group">
        <a href="../paymentDetail.php?enroll_id=<?php echo $getID; ?>"><button type="button" class="btn btn1">
            <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
        <a href="./paymentDetail.php?enroll_id=<?php echo $getID; ?>"><button type="button" class="btn btn2" style="background-color: rgba(91, 175, 231, 0.5)">
            <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
        <a href="../jp/paymentDetail.php?enroll_id=<?php echo $getID; ?>"><button type="button" class="btn btn3">
            <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
      </div>
    </div>
  </nav>

  <!-- JP School header start -->
  <section>
    <div class="header">
      <h3>ငွေပေးချေမှု အတည်ပြုချက်ပေးပို့ခြင်း</h3>
      <div class="bg-cover"></div>
      <img src="../assets/images/cover/cover.jpg" alt="jpschool-cover" />
    </div>
  </section>
  <!-- JP School header end -->

  <!-- Payment Confirm Form start -->
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-6 text-center p-0 mt-3 mb-2">
          <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <?php
            include_once('../../jktmyanmarint.admin.com/confs/config.php');
            $decryptedEnrollId = encrypt_decrypt("decrypt", $getID);
            $nrc = "SELECT * FROM enrollments e, students s WHERE e.student_id = s.student_id AND enrollment_id = $decryptedEnrollId";
            $nrc_result = mysqli_query($conn, $nrc);
            $row = mysqli_fetch_assoc($nrc_result);
            $payment_method = $row["payment_method"];
            $get_bank_name = "SELECT * FROM banking_info WHERE bank_name = '$payment_method'";
            $get_bank_result = mysqli_query($conn, $get_bank_name);
            $bank_row = mysqli_fetch_assoc($get_bank_result);
            $bank_id = $bank_row["bank_id"];
            ?>
            <!-- <h2 id="heading">Sign Up Your User Account</h2> -->
            <p class="enroll-description">ငွေပေးချေမှုကို အတည်ပြုရန် ဤဖောင်ကိုဖြည့်ပါ။</p>
            <form id="paymentForm" action="../backend/paymentSubmit_mm.php" method="POST" enctype="multipart/form-data">
              <span id="nrc" class="hidden"><?php echo $row['nrc']; ?></span>
              <div class="row mx-2">
                <label for="payment_amount">ငွေပေးချေမှုပမာဏ (ကျပ်) ကို ထည့်ပါ</label>
                <input type="number" class="form-input" name="payment_amount" id="payment_amount" placeholder="eg. 250000" />
              </div>
              <div class="row mt-5 mx-2">
                <label class="fieldlabels">မှတ်ပုံတင် အမှတ် <span class="required-tag">required &nbsp; *</span></label>
                <input type="text" class="form-input" name="nrcNumber" id="nrcNumber" placeholder="e.g. 123456" />
                <input type="hidden" name="enrollment_id" id="enrollment_id" value="<?php echo $row["enrollment_id"] ?>" />
                <input type="hidden" name="course_id" id="course_id" value="<?php echo $row["course_id"] ?>" />
                <input type="hidden" name="bank_id" id="bank_id" value="<?php echo $bank_id ?>" />
              </div>
              <span class="nrcNo-required" id="nrcNoRequired"><em></em></span>
              <div class="row mt-5 px-4">
                <label class="fieldlabels">ငွေလွှဲပြီး‌‌ကြောင်း စခရင်ရှော့ကို ကျေးဇူးပြု၍ ‌ထည့်ပေးပါ <span class="required-tag">required &nbsp; *</span></label> <br>
                <div class="preview-zone hidden">
                  <div class="box box-solid">
                    <div class="box-header with-border">
                      <div><b>Preview</b></div>
                    </div>
                    <div class="box-body"></div>
                  </div>
                </div>
                <div class="dropzone-wrapper">
                  <div class="dropzone-desc">
                    <i class="fas fa-upload"></i>
                    <p>ပုံဖိုင်ကို ရွေးပါ သို့မဟုတ် ဤနေရာတွင် ဆွဲချပါ။.</p>
                  </div>
                  <input type="file" name="paymentImg" class="dropzone payment-input">
                </div>
                <span class="ss-required" id="ssRequired"></span>
              </div>
              <div class="mt-5 mb-3">
                <input type="submit" name="paymentSubmit" id="paymentSubmit" class="back-to-courses" value="Submit" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Payment Confirm Form end -->

  <!-- footer start -->
  <footer class="footer">
    <div class="left">
      <a href="./index.html"><span>JKT</span> Myanmar International </a>
      <div>
        <a href="https://www.facebook.com/JKT-Myanmar-International-CoLtd-2508681849366709">
          <i class="fab fa-facebook-f"></i>
        </a>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
      </div>
    </div>
    <div class="right">
      <div class="footer-flex">
        <div>
          <header>လာရောက်ပူးပေါင်းဆောင်ရွက်ရန်ဖိတ်ခေါ်အပ်ပါသည်။</header>
          <p>
            လူကြီးမင်းတို့ နှင့် လုပ်ငန်းများ လက်တွဲလုပ်ဆောင်ဖို့
            အဆင်သင့်ရှိပါသည်။
          </p>
        </div>
        <a href="./contact.html"><button id="btn-contact" class="primary-btn">ဆက်သွယ်ရန်</button></a>
      </div>
      <div class="footer-flex-nav">
        <div class="nav">
          <header>၀န်ဆောင်မှုများ</header>
          <ul class="footer-list" id="first">
            <li>
              <span><a href="./overseas.html">နိုင်ငံခြား အလုပ်အကိုင် ရှာဖွေရေး ဝန်ဆောင်မှု
                  (ဂျပန်နိုင်ငံတွင်သာ)</a></span>
            </li>
            <li>
              <span><a href="./business.html">စီးပွားရေးဆိုင်ရာ အကြံပေးခြင်း ၀န်ဆောင်မှု</a></span>
            </li>
            <!-- <li>
                <span
                  ><a href="./announcement.html"
                    >အိုင်တီနည်းပညာဆိုင်ရာ ၀န်ဆောင်မှု</a
                  ></span
                >
              </li> -->
            <li>
              <span><a href="./travels.html">ခရီးသွား ၀န်ဆောင်မှု </a></span>
            </li>
          </ul>
        </div>
        <div class="nav">
          <header>သင်တန်းများ</header>
          <ul class="footer-list" id="second">
            <li>
              <span><a href="./jp-school.php">ဂျပန်ဘာသာစကား သင်တန်း</a></span>
            </li>
            <li>
              <span><a href="./digital-institute.php">အိုင်တီနည်းပညာ သင်တန်းကျောင်း</a></span>
            </li>
            <li>
              <span><a href="./announcement.html">လူ့စွမ်းအားအရင်းအမြစ် စီမံခန့်ခွဲမှု သင်တန်း</a></span>
            </li>
          </ul>
        </div>
        <div class="nav">
          <header>ဆက်သွယ်ရန်</header>
          <ul class="footer-list" id="last">
            <li>
              <i class="fa fa-phone"></i><a href="tel:+959269564339">၀၉ ၂၆၉ ၅၆၄ ၃၃၉</a>
            </li>
            <li>
              <i class="fa fa-phone"></i><a href="tel:+959770411708">၀၉ ၇၇၀ ၄၁၁ ၇၀၈</a>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i>နံပါတ် - ၈၆၊ ၃က၊
              ရှင်စောပုလမ်း၊ ‌မြေနီကုန်း City Mart အနီး၊ စမ်းချောင်းမြို့နယ်၊
              ရန်ကုန်မြို့။
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
  <div class="footer-copyright">Copyright © 2021 | JKT Myanmar International Co., Ltd.</div>

  <!-- script -->
  <script src="../assets/js/jquery-3.6.0.js"></script>
  <script src="./assets/js/jquery.validate.1.13.1.js"></script>
  <script src="./assets/js/additional-methods.1.13.1.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/float-panel.js"></script>
  <script src="../assets/js/paymentDetail.js"></script>
</body>
<html>