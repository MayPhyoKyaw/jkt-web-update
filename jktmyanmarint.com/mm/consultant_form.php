<?php
session_start();
$response = isset($_SESSION["response"]) ? $_SESSION["response"] : null;
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
            <a href="./services.html" class="nav-link" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              ၀န်ဆောင်မှုများ <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="serviceNavbarDropdown">
              <a class="dropdown-item" href="./overseas.html">နိုင်ငံခြား အလုပ်အကိုင် ရှာဖွေရေး ဝန်ဆောင်မှု</a>
              <a class="dropdown-item" href="./business.html">စီးပွားရေးဆိုင်ရာ အကြံပေးခြင်း ၀န်ဆောင်မှု</a>
              <!-- <a class="dropdown-item" href="./announcement.html"
                  >အိုင်တီနည်းပညာ ဆိုင်ရာ ၀န်ဆောင်မှု</a
                > -->
              <a class="dropdown-item" href="./announcement.html">ခရီးသွား ၀န်ဆောင်မှု</a>
            </div>
          </li>
          <li class="nav-item dropdown mm-nav">
            <a href="./trainings.html" class="nav-link active" id="trainingNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              လေ့ကျင့်သင်ကြားမှုများ <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="trainingNavbarDropdown">
              <a class="dropdown-item" href="./jp-school.php">ဂျပန်ဘာသာစကား သင်တန်း</a>
              <a class="dropdown-item" href="./digital-institute.php">အိုင်တီနည်းပညာ သင်တန်းကျောင်း</a>
              <a class="dropdown-item" href="./announcement.html">လူ့စွမ်းအားအရင်းအမြစ် စီမံခန့်ခွဲမှု သင်တန်း</a>
            </div>
          </li>
          <li class="nav-item mm-nav">
            <a href="./contact.html" class="nav-link active"> ဆက်သွယ်ရန် </a>
          </li>
          <li class="lang">
            <div class="btn-group" role="group" aria-label="First group">
              <a href="../consultant_form.php"><button type="button" class="btn btn1">
                  <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
              <a href="./consultant_form.php"><button type="button" class="btn btn2" style="background-color: rgba(91, 175, 231, 0.5)">
                  <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
              <a href="../jp/consultant_form.php"><button type="button" class="btn btn3">
                  <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="btn-group lang-xl" role="group" aria-label="First group">
        <a href="../consultant_form.php"><button type="button" class="btn btn1">
            <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
        <a href="./consultant_form.php"><button type="button" class="btn btn2" style="background-color: rgba(91, 175, 231, 0.5)">
            <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
        <a href="../jp/consultant_form.php"><button type="button" class="btn btn3">
            <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
      </div>
    </div>
  </nav>

  <!-- JP School header start -->
  <section>
    <div class="header">
      <h3>စီးပွားရေးဆိုင်ရာ အကြံပေးခြင်း ၀န်ဆောင်မှု - ကြိုတင်ချိန်းဆိုမှု ပြုလုပ်ရန်</h3>
      <div class="bg-cover"></div>
      <img src="../assets/images/cover/cover.jpg" alt="jpschool-cover" />
    </div>
  </section>
  <!-- JP School header end -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-lg-block">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">ပင်မစာမျက်နှာ</a></li>
      <li class="breadcrumb-item"><a href="./trainings.html">၀န်ဆောင်မှုများ</a></li>
      <li class="breadcrumb-item"><a href="./jp-school.php">စီးပွားရေးဆိုင်ရာ အကြံပေးခြင်း ၀န်ဆောင်မှု</a></li>
      <li class="breadcrumb-item active" aria-current="page">ကြိုတင်ချိန်းဆိုမှု ပြုလုပ်ရန်</li>
    </ol>
  </nav>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-10 col-lg-9 mb-5 mt-4 mx-auto w-100">
          <p id="description">
            ကျေးဇူးပြု၍ ဖောင်၏ အကွက်အားလုံးကို ဖြည့်ပါ။ <br>
            ကျွန်ုပ်တို့နှင့်ပူးပေါင်းသည့်အတွက် ကျေးဇူးတင်ပါသည်။
          </p>
          <form id="appointment-form" action="../backend/newConsult_mm.php" method="POST">
            <div class="pb-4 mb-2">
              <label for="name" id="name-label" class="appointment-label">အမည် <span class="consultant-required-tag">required &nbsp; *</span></label><br />
              <input type="text" id="name" name="name" placeholder="အမည်ထည့်ပါ" required class="appointment-input" />
            </div>

            <div class="pb-4 mb-2">
              <label for="email" id="email-label" class="appointment-label">အီးမေးလ် <span class="consultant-required-tag">required &nbsp; *</span></label><br />
              <input type="email" id="email" name="email" placeholder="အီးမေးလ်ထည့်ပါ" class="appointment-input" required />
            </div>

            <div class="pb-4 mb-2">
              <label for="phone" id="phone-label" class="appointment-label">ဖုန်းနံပါတ် <span class="consultant-required-tag">required &nbsp; *</span></label><br />
              <input type="text" id="phone" name="phone" placeholder="ဖုန်းနံပါတ်ထည့်ပါ" class="appointment-input" required />
            </div>

            <div class="pb-4 mb-2 appointment-type">
              <fieldset class="appointment-fieldset">
                <legend class="appointment-legend">ဆွေးနွေးခြင်းပြုလုပ်မည့် ပုံစံကို‌ရွေးချယ်ပါ။ <span class="consultant-required-tag">required &nbsp; *</span></legend>

                <input type="radio" id="online" name="appointment_type" value="Online" />
                <label for="online" id="radio-label" class="appointment-label">အွန်လိုင်းဖြင့်</label><br />

                <input type="radio" id="office" name="appointment_type" value="Office" />
                <label for="office" id="radio-label" class="appointment-label">ရုံးတွင်</label><br />

                <input type="radio" id="other" name="appointment_type" value="Other" />
                <label for="other" id="radio-label" class="appointment-label">အခြား</label><br />
              </fieldset>
            </div>

            <div class="pb-4 mb-2 appointment-date">
              <label class="appointment-label">
                ဆွေးနွေးခြင်းပြုလုပ်မည့် ရက် <span class="consultant-required-tag">required &nbsp; *</span>
              </label>
              <div class="date-picker">
                <div class="input">
                  <input type="text" class="result" name="appointment_date" placeholder="ရက်ရွေးချယ်ရန် - " id="appointment_date" value="" required />
                  <!-- <div class="result">Select Date: <span></span></div>  -->
                  <button onclick="event.preventDefault()"><i class="fa fa-calendar"></i></button>
                </div>
                <div class="calendar"></div>
              </div>
            </div>

            <div class="pb-4 mb-2 appointment-time">
              <fieldset class="appointment-fieldset">
                <legend class="appointment-legend">ဆွေးနွေးခြင်းပြုလုပ်မည့် ခန့်မှန်းခြေအချိန်ကိုရွေးချယ်ပါ <span class="consultant-required-tag">required &nbsp; *</span></legend>

                <input type="radio" id="morning" name="appointment_time" value="Morning" />
                <label for="morning" id="radio-label" class="appointment-label">မနက်ပိုင်း</label><br />

                <input type="radio" id="noon" name="appointment_time" value="Afternoon" />
                <label for="noon" id="radio-label" class="appointment-label">နေ့လည်ပိုင်း</label><br />
              </fieldset>
            </div>

            <div class="pb-4 mb-2">
              <label for="dropdown" id="dropdown-label" class="appointment-label">
                ဆွေးနွေးခြင်းပြုလုပ်မည့် ကြာချိန် နှင့် ကျသင့်‌ငွေ <span class="consultant-required-tag">required &nbsp; *</span>
                <span class="consultant-note"> &nbsp;**ကျသင့်‌ငွေသည် လူကြီးမင်းဆွေးနွေးသည့် အကြောင်းအရာပေါ်မူတည်၍ ပြောင်းလဲနိုင်ပါသည်။</span>
              </label>
              <select id="dropdown" name="appointment_duration" class="appointment-select">
                <option value="" disabled selected>
                  ဆွေးနွေးခြင်းပြုလုပ်မည့် ခန့်မှန်းကြာချိန်ကိုရွေးချယ်ပါ။
                </option>
                <option value="Below 60 Minutes">၁နာရီခန့် - $100 Est.</option>
                <option value="1 Hours ~ 2 Hours">၁နာရီ မှ ၂နာရီ အတွင်း - $200 Est.</option>
                <option value="2 Hours ~ 3 Hours">၂နာရီ မှ ၃နာရီ အတွင်း - $300 Est.</option>
                <option value="3 Hours ~ 4 Hours">၃နာရီ မှ ၄နာရီ အတွင်း - $400 Est.</option>
              </select>
            </div>

            <div class="pb-4 mb-2">
              <label for="description" id="description-label" class="appointment-label">ဆွေးနွေးမည့် အကြောင်းအရာ <span class="consultant-required-tag">required &nbsp; *</span></label><br />
              <textarea placeholder="ဆွေးနွေးမည့် အကြောင်းအရာရိုက်ထည့်ပါ" id="description" name="about_consultant" class="appointment-textarea" rows="4" cols="50"></textarea>
            </div>

            <div class="text-right">
              <button type="submit" id="submit" class="appointment-button">ချိန်းဆိုမှုပေးပို့ရန်</button>
            </div>
          </form>
        </div>
      </div>
  </section>

  <!-- The Confirmation Modal -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-box">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ကြိုတင်ချိန်းဆိုမှု အတည်ပြုချက်</h4>
          <button class="btn-close" data-dismiss="modal">
            <i class='fas fa-times' style='font-size:24px; color: grey'></i>
          </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body confirm-modal-body">
          ကြိုတင်ချိန်းဆိုမှု ပြုလုပ်ရန် သေချာပါသလား?
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
              <span><a href="./announcement.html">ခရီးသွား ၀န်ဆောင်မှု </a></span>
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

  <!-- script -->
  <script src="../assets/js/jquery-3.6.0.js"></script>
  <script src="../assets/js/jquery-ui-1.11.2.min.js"></script>
  <script src="../assets/js/validation.js"></script>
  <script src="../assets/js/additional-methods"></script>
  <script src="../assets/js/validation.js"></script>
  <script src="../assets/js/additional-methods"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/float-panel.js"></script>
  <script src="../assets/js/consultant.js"></script>
</body>
<html>