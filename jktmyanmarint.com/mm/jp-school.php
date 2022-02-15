<?php 
session_start(); 
function encrypt_decrypt($action, $string) {
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
  <meta name="keywords" content="jkt myanmar, jkt, JKT mm, JKT mm international, Business Counseling, IT, training, language school" />
  <meta name="author" content="JKT IT Team" />
  <meta name="title" content="JKT Myanmar International Co., Ltd." />
  <meta name="copyright" content="JKT Myanmar International" />
  <meta name="robots" content="japanese school, follow" />
  <meta name="googlebot" content="jkt myanmar, jkt, JKT mm, JKT mm international, Business Counseling, IT, training, language school, Overseas Employment, JKT Myanmar International Co., Ltd., JKT Myanmar International" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="English" />
  <meta name="revisit-after" content="1 days" />

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />

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
            <a href="./services.html" class="nav-link active" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
            <a href="./trainings.html" class="nav-link" id="trainingNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
              <a href="../jp-school.php"><button type="button" class="btn btn1">
                  <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
              <a href="./jp-school.php"><button type="button" class="btn btn2" style="background-color: rgba(91, 175, 231, 0.5)">
                  <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
              <a href="../jp/jp-school.php"><button type="button" class="btn btn3">
                  <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="btn-group lang-xl" role="group" aria-label="First group">
        <a href="../jp-school.php"><button type="button" class="btn btn1">
            <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
        <a href="./jp-school.php"><button type="button" class="btn btn2" style="background-color: rgba(91, 175, 231, 0.5)">
            <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
        <a href="../jp/jp-school.php"><button type="button" class="btn btn3">
            <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
      </div>
    </div>
  </nav>

  <!-- JP School header start -->

  <section>
    <div class="header">
      <h3>ဂျပန်ဘာသာစကား သင်တန်း</h3>
      <div class="bg-cover"></div>
      <img src="../assets/images/cover/cover.jpg" alt="jpschool-cover" />
    </div>
  </section>
  <!-- JP School header end -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-lg-block">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">ပင်မစာမျက်နှာ</a></li>
      <li class="breadcrumb-item"><a href="./trainings.html">လေ့ကျင့်သင်ကြားမှုများ</a></li>
      <li class="breadcrumb-item active" aria-current="page">ဂျပန်ဘာသာစကား သင်တန်း</li>
    </ol>
  </nav>

  <!-- Training School Detail Information Blog start -->
  <section>
    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-10 detail-info-blog">
          <div class="detail-info-blog-item-img">
            <img class="card-img rounded-0" src="../assets/images/trainings/jps1.jpg" alt="" />
          </div>
          <div class="blog-details">
            <h2>ဂျပန်ဘာသာစကား သင်တန်းကျောင်း</h2>
            <div class="quote-wrapper">
              <div class="quotes">
                ဂျပန်ဘာသာစကား သင်တန်းကျောင်း။ ဂျပန်သို့
                ပညာသွားရောက်လေ့လာလိုသည်ဖြစ်စေ၊ အလုပ်သွားရောက်လုပ်ကိုင်လိုသော
                ရည်ရွယ်ချက်ဖြင့်ဖြစ်စေ၊ ပြည်တွင်းဂျပန်ကုမ္ပဏီ တစ်ခုခုတွင်
                အလုပ်လုပ်ကိုင်လိုသည်ဖြစ်စေ အကောင်းဆုံးသင်ကြားမှု၊ သင်ယူမှု
                ပတ်ဝန်းကျင် ကို ပံ့ပိုးပေးမည်ဖြစ်ပါသည်။ အတန်းများကို
                အခြေခံမှစ၍ အဆင့်မြင့်အထိ သင်ယူနိုင်ပါသည်။ JKT Myanmar
                International တွင် မြန်မာလူမျိုး ဂျပန်စာဆရာနှင့် ဂျပန်လူမျိုး
                ဂျပန်စာဆရာ ရှိသောကြောင့် ဂျပန်ဘာသာစကားကို သင်ကြားပေးရုံမက
                ကျောင်းသားများကို ဂျပန်လူမျိုးနှင့်
                တိုက်ရိုက်ဂျပန်ယဉ်ကျေးမှုကို သင်ယူစေနိုင်ပါသည်။ ဤအရာသည်
                ဂျပန်၏ယဉ်ကျေးမှု နှင့် အခြေအနေများအား အနည်းနှင့်အများ
                အကျွမ်းတဝင်ဖြစ်နေသောကြောင့် နောက်ပိုင်းတွင်
                ဂျပန်သို့အလုပ်လုပ်ကိုင်ရန်အတွက် များစွာအထောက်အကူပြုနိုင်ပါသည်။
                ထို့အပြင် အခြေခံအတန်းမှ အဆင့်မြင့်အတန်းအထိ အတန်းအမျိုးမျိုး၊
                သို့မဟုတ် kanji
                စာလုံးများကိုလေ့ကျင့်လိုသူများအတွက်အထူးအတန်းတစ်ခုလည်းရှိသည်။
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="hr2" />
    </div>
  </section>
  <!-- Training School Detail Information Blog end -->

  <!-- School Schedule Blog start -->
  <section>
    <div class="container schedule-blog">
      <h1 class="text-center pb-3">အပ်နိုင်သည့်အတန်းအချိန်ဇယား</h1>
      <div class="row">
        <div class="col-12 col-lg-12 schedule-blog-info">
          <div class="schedule-table-block">
            <table class="schedule-table schedule-mm">
              <thead>
                <tr>
                  <th scope="col">အတန်း</th>
                  <th scope="col" style="width: 16em">တက်‌ရောက်ရမည့်အချိန် <br> နှင့် ရက်</th>
                  <th scope="col">သင်တန်းကြေး (ကျပ်)</th>
                  <th scope="col">သင်တန်းစတင်မည့်ရက် <br> နှင့် သင်တန်းကာလ</th>
                  <!-- <th scope="col">သင်တန်းစတင်မည့်ရက်</th> -->
                  <th scope="col" style="width: 6em">အသေးစိတ် သိရှိရန်</th>
                  <th scope="col" style="width: 6em">စာရင်းပေးသွင်းရန်</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_SESSION['courseId'])) {
                  unset($_SESSION['courseId']);
                }
                include_once("../../jktmyanmarint.admin.com/confs/config.php");
                $schedule = "SELECT course_id, c.title AS course_title, cty.title AS category_title,
                                  t.title AS type_title, level_or_sub, fee, instructor,
                                  services, discount_percent, start_date, duration, sections, note
                                  FROM courses c, categories cty, types t WHERE c.category_id = cty.category_id 
                                  AND c.type_id = t.type_id AND (cty.title = 'JLPT' OR cty.title = 'EJU')  ORDER BY c.created_at LIMIT 4";
                $schedule_result = mysqli_query($conn, $schedule);
                while ($row = mysqli_fetch_array($schedule_result)) {
                  $_SESSION['courseId'] = $row['course_id'];
                ?>
                  <tr id="<?php echo $row["course_id"]; ?>">
                    <td style="display: none">
                      <span id="category_title" class="row-data"><?php echo $row["category_title"] ?></span>
                      <span id="type_title" class="row-data"><?php echo $row["type_title"] ?></span>
                      <span id="level_or_sub" class="row-data"><?php echo $row["level_or_sub"] ?></span>
                      <span id="instructor" class="row-data"><?php echo $row["instructor"] ?></span>
                      <span id="services" class="row-data"><?php echo $row["services"] ?></span>
                      <span id="discount_percent" class="row-data"><?php echo $row["discount_percent"] ?></span>
                      <span id="price" class="row-data"><?php echo $row["fee"]; ?></span>
                      <span id="note" class="row-data"><?php echo $row["note"]; ?></span>
                    </td>
                    <td data-label="အတန်း" scope="row" class="text-right text-lg-left">
                      <?php echo $row["category_title"] . " "; ?>
                      <span id="course_title" class="row-data"><?php echo $row["course_title"]; ?></span>
                      <span><?php echo empty($row["level_or_sub"]) ? '' : '- ' . $row["level_or_sub"]; ?></span>
                      <?php echo " (" . $row["type_title"] . ")"; ?>
                      <?php
                      // echo $row['start_date'] < date("Y-m-d") ? "<br><br><span class='in-progress-badges'>In Progess</span>" : "";
                      ?>
                    </td>
                    <td data-label="တက်‌ရောက်ရမည့်အချိန် နှင့် ရက်" class="text-right text-lg-left">
                        <?php
                          // var_dump($row["sections"]);
                          // var_dump($row["sections"][0]); 
                          $sections = json_decode($row["sections"], true);
                          for($i = 0; $i < count($sections); $i++) {
                            // var_dump($sections[$i]["days"]);
                            echo "<div class='sections'>";
                            for($j = 0; $j < count($sections[$i]["days"]); $j++) {
                        ?>
                              <span id="days" class="days schedule-days-badges <?php
                                switch($sections[$i]["days"][$j]) {
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
                            echo "</div>";
                          ?>
                    </td>
                    <td data-label="သင်တန်းကြေး (ကျပ်)">
                      <span id="price"><?php echo number_format($row["fee"]) ?></span>
                    </td>
                    <td data-label="သင်တန်းစတင်မည့်ရက် နှင့် သင်တန်းကာလ">
                      <?php if (!empty($row["start_date"])) { ?>
                        <span id="start_date" class="row-data"><?php echo $row["start_date"] ?></span><br><br>
                      <?php } else { ?>
                        <span id="start_date" class="row-data"></span>
                      <?php } ?>
                      <span id="duration" class="row-data"><?php echo $row["duration"] . " Months"; ?></span>
                    </td>
                    <td data-label="အသေးစိတ် သိရှိရန်">
                      <button class="detail" data-toggle="modal" data-target="#detailModal">
                        <i class="fas fa-eye"></i>
                      </button>
                    </td>
                    <td data-label="စာရင်းပေးသွင်းရန်">
                      <?php $encryptedCourseId = encrypt_decrypt("encrypt", $row['course_id']) ?>
                      <span class="hidden row-data"><?php echo $encryptedCourseId; ?></span>
                        <a href="./classEnroll.php?courseId=<?php echo $encryptedCourseId; ?>"><button class="enroll">
                          <img src="../assets/images/icon/contract.png" alt="" width="20" height="20" />
                        </button></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php
      $query = "select * from courses";
      $result = mysqli_query($conn, $query);
      $rowcount = mysqli_num_rows($result);
      if ($rowcount > 4) {
      ?>
        <div class="container text-center mt-4 mb-5">
          <a href="./school-detail.php" class="view-detail">ပိုမိုသိရှိရန် <i class="far fa-hand-point-right"></i></a>
        </div>
      <?php } else { ?>
        <div></div>
      <?php } ?>
      <hr class="hr" />
    </div>
  </section>
  <!-- School Schedule Blog end -->

  <!-- The Detail Modal -->
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLongTitle" aria-hidden="true">
    <div class="modal-dialog detail-modal" role="document">
      <div class="modal-content detail-modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title detail-modal-title">အတန်း၏ အသေးစိတ်အချက်အလက်</h4>
          <button class="btn-close" data-dismiss="modal">
            <i class='fas fa-times' style='font-size:24px; color: grey'></i>
          </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <table class="detail-schedule">
            <tr>
              <td class="schedule-modal-label">အတန်း</td>
              <td>
                <span id="modal_category_title"></span>
                <span id="modal_course_title"></span>
                <span id="modal_level"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">အတန်း အမျိုးအစား </td>
              <td>
                <span id="modal_type_title"></span>
              </td>
            </tr>
            <tr>
                <td class="schedule-modal-label">တက်‌ရောက်ရမည့်အချိန် နှင့် ရက် :</td>
                <td id="modal_days_time" class="modal_days_time">
                  <!-- <span id="modal_days"></span>
                  <span id="modal_time"></span> -->
                </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">သင်တန်းကြေး (ကျပ်) </td>
              <td>
                <span id="modal_fees"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">သင်တန်းကာလ</td>
              <td>
                <span id="modal_duration"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">သင်တန်းစတင်မည့်ရက်</td>
              <td>
                <span id="modal_start_date"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">သင်ကြားမည့်ဆရာ</td>
              <td>
                <span id="modal_instructor"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">ဝန်ဆောင်မှု </td>
              <td>
                <span id="modal_services"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">အခြားဖော်ပြချက်</td>
              <td>
                <span id="modal_description"></span>
              </td>
            </tr>
          </table>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn-cancel" data-dismiss="modal">Cancel</button>
          <a id="modalEnroll"><button type="button" class="btn-submit" id="enroll_class">Enroll</button></a>
        </div>

      </div>
    </div>
  </div>

  <!-- Detail images area start -->
  <section>
    <div class="container pt-5 pb-3">
      <div class="row slider-blog my-5">
        <div class="col-lg-12">
          <div id="detailImgBlog" class="carousel slide container-blog" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#detailImgBlog" data-slide-to="0" class="active"></li>
              <li data-target="#detailImgBlog" data-slide-to="1"></li>
              <li data-target="#detailImgBlog" data-slide-to="2"></li>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row" id="sliderImgBlog">
                  <div class="col-md-6">
                    <div class="item-box-blog">
                      <div class="detail-item-box-blog-image">
                        <!--Image-->
                        <figure>
                          <img alt="jps2" src="../assets/images/trainings/jps2.jpg" />
                        </figure>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item-box-blog">
                      <div class="detail-item-box-blog-image">
                        <!--Image-->
                        <figure>
                          <img alt="jps3" src="../assets/images/trainings/jps3.jpg" />
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>
                <!--.row-->
              </div>
              <!--.item-->
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-6">
                    <div class="item-box-blog">
                      <div class="detail-item-box-blog-image">
                        <!--Image-->
                        <figure>
                          <img alt="jps4" src="../assets/images/trainings/jps4.jpg" />
                        </figure>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item-box-blog">
                      <div class="detail-item-box-blog-image">
                        <!--Image-->
                        <figure>
                          <img alt="jps5" src="../assets/images/trainings/jps5.jpg" />
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>
                <!--.row-->
              </div>
              <!--.item-->
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-6">
                    <div class="item-box-blog">
                      <div class="detail-item-box-blog-image">
                        <!--Image-->
                        <figure>
                          <img alt="jps6" src="../assets/images/trainings/jps6.jpg" />
                        </figure>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="item-box-blog">
                      <div class="detail-item-box-blog-image">
                        <!--Image-->
                        <figure>
                          <img alt="jps7" src="../assets/images/trainings/jps7.jpg" />
                        </figure>
                      </div>
                    </div>
                  </div>
                </div>
                <!--.row-->
              </div>
              <!--.item-->
            </div>
            <!--.carousel-inner-->
          </div>
          <!--.Carousel-->
        </div>
      </div>
      <hr class="hr3" />
    </div>
  </section>
  <!-- Detail images area end -->

  <!-- Detail Comment area start -->
  <section class="container">
    <div class="row px-0 px-md-5 pt-4 pb-5">
      <div class="col-12 col-lg-7 text-center pb-2 pb-lg-0">
        <iframe id="jp_sh" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJKT-Japanese-Language-School-100339937999010%2F&tabs=timeline&width=500&height=790&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=300620088760320" width="87%" class="ifr" height="550" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
        </iframe>
      </div>
      <div class="col-12 col-lg-5" style="height : 568px;display : flex;flex-direction:column;justify-content : space-between;">
        <a class="ml-md-4 view-detail w-100 text-center" style="margin-top: 7px;" href="https://www.youtube.com/channel/UCElZEkvGrAB-LxXAbcPv0Xg" target="_blank">
          Youtube
          <i class="fab fa-youtube"></i>
        </a>
        <div class="comment-blog px-0 ml-4 w-100">
          <h3>မှတ်ချက် ပေးရန်</h3>
          <div class="row py-3">
            <div class="col-lg-12 comment-form">
              <form id="comment-form-mm">
                <textarea style="height: 300px; width : 100%" name="comment" id="comment" placeholder="မှတ်ချက်ရေးရန်ရိုက်ထည့်ပါ"></textarea>
                <span class="warning-message"></span>
              </form>
              <button id="btn-comment" type="button" name="button" onclick="submitCommentForJPSchool(event)" class="about-boxed-btn">
                မှတ်ချက်ပေးပို့ရန်
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Detail Comment area end -->

  <!-- to top button -->
  <button class="to-top-btn" id="toTop">
    <i class="fa fa-arrow-up"></i>
  </button>
  <!-- end to top button -->

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
  <div class="footer-copyright">
    Copyright © 2021 | JKT Myanmar International Co., Ltd.
  </div>
  <!-- script -->
  <script src="../assets/js/jquery-3.6.0.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/float-panel.js"></script>
  <script src="../assets/js/comment.js"></script>
  <script src="../assets/js/style.js"></script>
  <script src="../assets/js/jp-class-schedule.js"></script>
</body>

</html>