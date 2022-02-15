<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
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
            <a href="./services.html" class="nav-link active" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
            <a href="./trainings.html" class="nav-link" id="trainingNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
              <a href="../jp-school.php"><button type="button" class="btn btn1">
                  <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" />
                </button></a>
              <a href=../mm/jp-school.php><button type="button" class="btn btn2">
                  <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" />
                </button></a>
              <a href=./jp-school.php><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
                  <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" />
                </button></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="btn-group lang-xl" role="group" aria-label="First group">
        <a href="../jp-school.php"><button type="button" class="btn btn1">
            <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" />
          </button></a>
        <a href=../mm/jp-school.php><button type="button" class="btn btn2">
            <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" />
          </button></a>
        <a href=./jp-school.php><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
            <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" />
          </button></a>
      </div>
    </div>
  </nav>

  <!-- JP School header start -->

  <section>
    <div class="header">
      <h3>日本語学校</h3>
      <div class="bg-cover"></div>
      <img src="../assets/images/cover/cover.jpg" alt="jpschool-cover">
    </div>
  </section>
  <!-- JP School header end -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-md-block">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">ホーム</a></li>
      <li class="breadcrumb-item"><a href="./trainings.html">トレーニング</a></li>
      <li class="breadcrumb-item active" aria-current="page">日本語学校</li>
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
            <h2>日本語教室</h2>
            <div class="quote-wrapper">
              <div class="quotes">
                日本語教室。日本で勉強したい方や日本の企業で働きたい方の為に最適な学習環境を提供しています。
                基本レベルから上級レベルまで、様々なレベルで学習できるクラスをご用意しています。
                JKTミャンマーインターナショナルには、ミャンマー人と日本人のとても優秀な教師がいます。
                日本語だけではなく日本人の教師を通じて直接日本の文化も学ぶ事ができます。
                これから日本に行く人たちにとって日本の文化や生活に慣れておくことは日本に行ったあとに大変役立ちます。
                さらに、漢字を練習したい方のために漢字授業の特別クラスもあります！
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
      <h1 class="text-center pb-3">クラスのスケジュール</h1>
      <div class="row">
        <div class="col-12 col-lg-12 schedule-blog-info">
          <div class="schedule-table-block">
            <table class="schedule-table">
              <thead>
                <tr>
                  <th scope="col">名称</th>
                  <th scope="col" style="width: 16em">日程</th>
                  <th scope="col">学費 <br>「チャット」</th>
                  <th scope="col">開始日 と <br> 期間</th>
                  <th scope="col" style="width: 6em">詳細</th>
                  <th scope="col" style="width: 6em">登録</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // if (isset($_SESSION['courseId'])) {
                //   unset($_SESSION['courseId']);
                // }
                include_once("../../jktmyanmarint.admin.com/confs/config.php");
                $schedule = "SELECT course_id, c.title AS course_title, cty.title AS category_title,
                                  t.title AS type_title, level_or_sub, fee, instructor,
                                  services, discount_percent, start_date, duration, sections, note
                                  FROM courses c, categories cty, types t WHERE c.category_id = cty.category_id 
                                  AND c.type_id = t.type_id AND (cty.title = 'JLPT' OR cty.title = 'EJU')  ORDER BY c.created_at LIMIT 4";
                $schedule_result = mysqli_query($conn, $schedule);
                while ($row = mysqli_fetch_array($schedule_result)) {
                ?>
                  <tr id="<?php echo $row["course_id"]; ?>">
                    <td style="display: none">
                      <span id="category_title" class="row-data"><?php echo $row["category_title"] ?></span>
                      <span id="type_title" class="row-data"><?php echo $row["type_title"] ?></span>
                      <span id="course_level" class="row-data"><?php echo $row["level_or_sub"] ?></span>
                      <span id="instructor" class="row-data"><?php echo $row["instructor"] ?></span>
                      <span id="services" class="row-data"><?php echo $row["services"] ?></span>
                      <span id="discount_percent" class="row-data"><?php echo $row["discount_percent"] ?></span>
                      <span id="price" class="row-data"><?php echo $row["fee"]; ?></span>
                      <span id="note" class="row-data"><?php echo $row["note"]; ?></span>
                    </td>
                    <td data-label="名称" scope="row" class="text-right text-lg-left">
                      <?php echo $row["category_title"] . " "; ?>
                      <span id="course_title" class="row-data"><?php echo $row["course_title"]; ?></span>
                      <span><?php echo empty($row["level_or_sub"]) ? '' : '- ' . $row["level_or_sub"]; ?></span>
                      <?php echo " (" . $row["type_title"] . ")"; ?>
                      <?php
                      // echo $row['start_date'] < date("Y-m-d") ? "<br><br><span class='in-progress-badges'>In Progess</span>" : "";
                      ?>
                    </td>
                    <td data-label="日程" class="text-right text-lg-left">
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
                    <td data-label="学費「チャット」">
                      <span id="price"><?php echo $row["fee"] ?></span>
                    </td>
                    <td data-label="開始日 と 期間">
                      <?php if (!empty($row["start_date"])) { ?>
                        <span id="start_date" class="row-data"><?php echo $row["start_date"] ?></span><br><br>
                      <?php } else { ?>
                        <span id="start_date" class="row-data"></span>
                      <?php } ?>
                      <span id="duration" class="row-data"><?php echo $row["duration"] . " Months"; ?></span>
                    </td>
                    <td data-label="詳細">
                      <button class="detail" data-toggle="modal" data-target="#detailModal">
                        <i class="fas fa-eye"></i>
                      </button>
                    </td>
                    <td data-label="登録">
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
          <a href="./school-detail.php" class="view-detail">View More <i class="far fa-hand-point-right"></i></a>
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
          <h4 class="modal-title detail-modal-title">詳細情報</h4>
          <button class="btn-close" data-dismiss="modal">
            <i class='fas fa-times' style='font-size:24px; color: grey'></i>
          </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <table class="detail-schedule">
            <tr>
              <td class="schedule-modal-label">名称 :</td>
              <td>
                <span id="modal_category_title"></span>
                <span id="modal_course_title"></span>
                <span id="modal_level"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">タイプ :</td>
              <td>
                <span id="modal_type_title"></span>
              </td>
            </tr>
            <tr>
                <td class="schedule-modal-label">日程 :</td>
                <td id="modal_days_time" class="modal_days_time">
                  <!-- <span id="modal_days"></span>
                  <span id="modal_time"></span> -->
                </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">学費「チャット」 :</td>
              <td>
                <span id="modal_fees"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">期間 :</td>
              <td>
                <span id="modal_duration"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">開始日 :</td>
              <td>
                <span id="modal_start_date"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">教師 :</td>
              <td>
                <span id="modal_instructor"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">サービス :</td>
              <td>
                <span id="modal_services"></span>
              </td>
            </tr>
            <tr>
              <td class="schedule-modal-label">追加の説明 :</td>
              <td>
                <span id="modal_description"></span>
              </td>
            </tr>
          </table>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn-cancel" data-dismiss="modal">キャンセル</button>
          <a id="modalEnroll"><button type="button" class="btn-submit" id="enroll_class">登録</button></a>
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
          <h3>Leave a Reply</h3>
          <div class="row py-3">
            <div class="col-lg-12 comment-form">
              <form id="comment-form">
                <textarea style="height: 300px; width : 100%" name="comment" id="comment" placeholder="Write Comment"></textarea>
                <span class="warning-message"></span>
              </form>
              <button id="btn-comment" type="button" name="button" onclick="submitCommentForJPSchool(event)" class="about-boxed-btn">
                送る
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
  <!-- footer area start -->
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
  <div class="footer-copyright">Copyright © 2021 | JKT Myanmar International Co., Ltd.</div>
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