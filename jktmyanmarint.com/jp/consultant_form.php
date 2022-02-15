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
      <a href=./index.html class="navbar-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
        <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
        Myanmar International
      </a>
      <a href=./index.html class="small-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
        <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
        Myanmar International
      </a>
      <a href=./index.html class="icon-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon toggler-icon-color"></span>
      </button>
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto text-sm-start">
          <li class="nav-item">
            <a href=./index.html class="nav-link active"> ホーム </a>
          </li>
          <li class="nav-item">
            <a href="./about.html" class="nav-link active"> 会社情報 </a>
          </li>
          <li class="nav-item">
            <a href="./activities.html" class="nav-link active">
              活動
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./services.html" class="nav-link" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              サービス <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="serviceNavbarDropdown">
              <a class="dropdown-item" href="./overseas.html">海外での雇用</a>
              <a class="dropdown-item" href="./business.html">ビジネスコンサルタント</a>
              <!-- <a class="dropdown-item" href="./announcement.html"
                  >ITサービス</a
                > -->
              <a class="dropdown-item" href="./announcement.html">旅行サービス</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="./trainings.html" class="nav-link active" id="trainingNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              トレーニング <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="trainingNavbarDropdown">
              <a class="dropdown-item" href="./jp-school.php">日本語学校</a>
              <a class="dropdown-item" href="./digital-institute.php">デジタル学院</a>
              <a class="dropdown-item" href="./announcement.html">人材トレーニング</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="./contact.html" class="nav-link active"> お問い合わせ </a>
          </li>
          <li class="lang">
            <div class="btn-group" role="group" aria-label="First group">
              <a href="../consultant_form.php"><button type="button" class="btn btn1">
                  <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" />
                </button></a>
              <a href=../mm/consultant_form.php><button type="button" class="btn btn2">
                  <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" />
                </button></a>
              <a href=./consultant_form.php><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
                  <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" />
                </button></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="btn-group lang-xl" role="group" aria-label="First group">
        <a href="../consultant_form.php"><button type="button" class="btn btn1">
            <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" />
          </button></a>
        <a href=../mm/consultant_form.php><button type="button" class="btn btn2">
            <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" />
          </button></a>
        <a href=./consultant_form.php><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
            <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" />
          </button></a>
      </div>
    </div>
  </nav>

  <!-- JP School header start -->
  <section>
    <div class="header">
      <h3>ビジネスコンサルタントサービス - Appointment Form</h3>
      <div class="bg-cover"></div>
      <img src="../assets/images/cover/cover.jpg" alt="jpschool-cover" />
    </div>
  </section>
  <!-- JP School header end -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-md-block">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">ホーム</a></li>
      <li class="breadcrumb-item"><a href="./trainings.html">サービス</a></li>
      <li class="breadcrumb-item"><a href="./jp-school.php">ビジネスコンサルタントサービス</a></li>
      <li class="breadcrumb-item active" aria-current="page">予約フォーム</li>
    </ol>
  </nav>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-10 col-lg-9 mb-5 mt-4 mx-auto w-100">
          <p id="description">
            フォームのすべてのフィールドに入力してください。 <br>
            ご参加いただきありがとうございます！！
          </p>
          <form id="appointment-form" action="../backend/newConsult_jp.php" method="POST">
            <div class="pb-4 mb-2">
              <label for="name" id="name-label" class="appointment-label">名前 <span class="consultant-required-tag">必須 &nbsp; *</span></label><br />
              <input type="text" id="name" name="name" placeholder="名前を入力してください" required class="appointment-input" />
            </div>

            <div class="pb-4 mb-2">
              <label for="email" id="email-label" class="appointment-label">メール <span class="consultant-required-tag">必須 &nbsp; *</span></label><br />
              <input type="email" id="email" name="email" placeholder="メールを入力してください" class="appointment-input" required />
            </div>

            <div class="pb-4 mb-2">
              <label for="phone" id="phone-label" class="appointment-label">電話番号 <span class="consultant-required-tag">必須 &nbsp; *</span></label><br />
              <input type="text" id="phone" name="phone" placeholder="電話番号を入力してください" class="appointment-input" required />
            </div>

            <div class="pb-4 mb-2 appointment-type">
              <fieldset class="appointment-fieldset">
                <legend class="appointment-legend">相談方法を選択でください<span class="consultant-required-tag">必須 &nbsp; *</span></legend>

                <input type="radio" id="online" name="appointment_type" value="Online" />
                <label for="online" id="radio-label" class="appointment-label">オンライン</label><br />

                <input type="radio" id="office" name="appointment_type" value="Office" />
                <label for="office" id="radio-label" class="appointment-label">オフィス</label><br />

                <input type="radio" id="other" name="appointment_type" value="Other" />
                <label for="other" id="radio-label" class="appointment-label">他の</label><br />
              </fieldset>
            </div>

            <div class="pb-4 mb-2 appointment-date">
              <label class="appointment-label">
                時間 <span class="consultant-required-tag">必須 &nbsp; *</span>
              </label>
              <div class="date-picker">
                <div class="input">
                  <input type="text" class="result" name="appointment_date" placeholder="日付を選択:" id="appointment_date" value="" required />
                  <!-- <div class="result">Select Date: <span></span></div>  -->
                  <button onclick="event.preventDefault()"><i class="fa fa-calendar"></i></button>
                </div>
                <div class="calendar"></div>
              </div>
            </div>

            <div class="pb-4 mb-2 appointment-time">
              <fieldset class="appointment-fieldset">
                <legend class="appointment-legend">推定時間を選択でください <span class="consultant-required-tag">必須 &nbsp; *</span></legend>

                <input type="radio" id="morning" name="appointment_time" value="Morning" />
                <label for="morning" id="radio-label" class="appointment-label">午前</label><br />

                <input type="radio" id="noon" name="appointment_time" value="Afternoon" />
                <label for="noon" id="radio-label" class="appointment-label">午後</label><br />
              </fieldset>
            </div>

            <div class="pb-4 mb-2">
              <label for="dropdown" id="dropdown-label" class="appointment-label">
                期間と料金 <span class="consultant-required-tag">必須 &nbsp; *</span>
                <span class="consultant-note"> &nbsp;**料金は相談内容によって変わります。</span>
              </label>
              <select id="dropdown" name="appointment_duration" class="appointment-select">
                <option value="" disabled selected>
                  料金を選んでください
                </option>
                <option value="Below 60 Minutes">約60分 - $100 Est.</option>
                <option value="1 Hours ~ 2 Hours">約1時間〜2時間 - $200 Est.</option>
                <option value="2 Hours ~ 3 Hours">約2時間〜3時間 - $300 Est.</option>
                <option value="3 Hours ~ 4 Hours">約3時間〜4時間 - $400 Est.</option>
              </select>
            </div>

            <div class="pb-4 mb-2">
              <label for="description" id="description-label" class="appointment-label">相談したい内容について<span class="consultant-required-tag">必須 &nbsp; *</span></label><br />
              <textarea placeholder="相談したい内容について入力してください" id="description" name="about_consultant" class="appointment-textarea" rows="4" cols="50"></textarea>
            </div>

            <div class="text-right">
              <button type="submit" id="submit" class="appointment-button">予定を送信する</button>
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
          <h4 class="modal-title">待ち合わせの確認</h4>
          <button class="btn-close" data-dismiss="modal">
            <i class='fas fa-times' style='font-size:24px; color: grey'></i>
          </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body confirm-modal-body">
          待ち合わせ　を　しても　よろしいですか?
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
      <a href=./index.html><span>JKT</span> Myanmar International </a>
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
          <header>ご連絡ください。</header>
          <p>私たちはあなたと一緒に働く準備ができています。</p>
        </div>
        <a href="./contact.html"><button id="btn-contact" class="primary-btn">お問い合わせ</button></a>
      </div>
      <div class="footer-flex-nav">
        <div class="nav">
          <header>サービス</header>
          <ul class="footer-list" id="first">
            <li>
              <span><a href="./overseas.html">海外雇用サービス（日本のみ）</a></span>
            </li>
            <li>
              <span><a href="./business.html">ビジネスコンサルタント</a></span>
            </li>
            <!-- <li>
                <span><a href="./announcement.html">ITサービス</a></span>
              </li> -->
            <li>
              <span><a href="./announcement.html">旅行サービス</a></span>
            </li>
          </ul>
        </div>
        <div class="nav">
          <header>トレーニング</header>
          <ul class="footer-list" id="second">
            <li>
              <span><a href="./jp-school.php">日本語学校</a></span>
            </li>
            <li>
              <span><a href="./digital-institute.php">デジタル学院</a></span>
            </li>
            <li>
              <span><a href="./announcement.html">人材トレーニング</a></span>
            </li>
          </ul>
        </div>
        <div class="nav">
          <header>お問い合わせ</header>
          <ul class="footer-list" id="last">
            <li>
              <i class="fa fa-phone"></i><a href="tel:+959269564339">+959 269 564 339</a>
            </li>
            <li>
              <i class="fa fa-phone"></i><a href="tel:+959770411708">+959 770 411 708</a>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i>No.86, 3A, Shinsawpu Road, Near Myaynigone Citymart, Sanchaung Township, Yangon, Myanmar.
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