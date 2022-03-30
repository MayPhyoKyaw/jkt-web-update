<?php
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
                        <a href=./index.html class="nav-link"> ホーム </a>
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
                        <a href="#" class="nav-link active" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            会社の事業 <i class="fas fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="serviceNavbarDropdown">
                            <a class="dropdown-item category-title" href="./services.html">サービス</a>
                            <a class="dropdown-item nav-sub-item" href="./overseas.html">海外での雇用</a>
                            <a class="dropdown-item nav-sub-item" href="./business.html">ビジネスコンサルタント</a>
                            <!-- <a class="dropdown-item" href="./announcement.html"
                  >ITサービス</a
                > -->
                            <a class="dropdown-item nav-sub-item" href="./travels.html">旅行サービス</a>
                            <hr class="nav-dropdown-hr nav-sub-item" />
                            <a class="dropdown-item category-title" href="./trainings.html">トレーニング</a>
                            <a class="dropdown-item nav-sub-item" href="./jp-school.php">日本語学校</a>
                            <a class="dropdown-item nav-sub-item" href="./digital-institute.php">デジタル学院</a>
                            <a class="dropdown-item nav-sub-item" href="./announcement.html">人材トレーニング</a>
                        </div>
                    </li>
                    <!-- <li class="nav-item dropdown">
              <a
                href="./trainings.html"
                class="nav-link active"
                id="trainingNavbarDropdown"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
              >
                トレーニング <i class="fas fa-angle-down"></i>
              </a>
              <div
                class="dropdown-menu"
                aria-labelledby="trainingNavbarDropdown"
              >
                <a class="dropdown-item" href="./jp-school.php"
                  >日本語学校</a
                >
                <a class="dropdown-item" href="./digital-institute.php"
                  >デジタル学院</a
                >
                <a class="dropdown-item" href="./announcement.html"
                  >人材トレーニング</a
                >
              </div>
            </li> -->
                    <li class="nav-item">
                        <a href="./contact.html" class="nav-link active"> お問い合わせ </a>
                    </li>
                    <li class="recruitment-li">
                        <a href="./recruitment.php">
                            <button class="recruitment-btn">
                                <img src="../assets/images/icon/job-search.png" width="20" height="20" />&nbsp; 採用情報
                            </button>
                        </a>
                    </li>
                    <?php
                        $getJobId = $_GET["job_id"];
                    ?>
                    <li class="lang">
                        <div class="btn-group" role="group" aria-label="First group">
                            <a href="../recruitmentForm.php?job_id=<?= $getJobId ?>"><button type="button" class="btn btn1">
                                    <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" />
                                </button></a>
                            <a href="../mm/recruitmentForm.php?job_id=<?= $getJobId ?>"><button type="button" class="btn btn2">
                                    <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" />
                                </button></a>
                            <a href="./recruitmentForm.php?job_id=<?= $getJobId ?>"><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
                                    <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" />
                                </button></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="btn-group lang-xl" role="group" aria-label="First group">
                <a href="../recruitmentForm.php?job_id=<?= $getJobId ?>"><button type="button" class="btn btn1">
                        <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" />
                    </button></a>
                <a href="../mm/recruitmentForm.php?job_id=<?= $getJobId ?>"><button type="button" class="btn btn2">
                        <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" />
                    </button></a>
                <a href="./recruitmentForm.php?job_id=<?= $getJobId ?>"><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
                        <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" />
                    </button></a>
            </div>
        </div>
    </nav>

    <!-- JP School header start -->
    <section>
        <div class="header">
            <h3>応募フォーム</h3>
            <div class="bg-cover"></div>
            <img src="../assets/images/cover/cover.jpg" alt="jpschool-cover" />
        </div>
    </section>
    <!-- JP School header end -->

    <nav aria-label="breadcrumb" class="breadcrumb-nav d-none d-md-block">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html">ホーム</a></li>
            <li class="breadcrumb-item"><a href="./recruitment.php">採用情報</a></li>
            <li class="breadcrumb-item active" aria-current="page">応募フォーム</li>
        </ol>
    </nav>

    <section class="main">
        <div>
            <div class="container-fluid" style="padding: 0 100px">
                <div class="row text-center mt-4 mt-lg-0">
                    <div class="col-11 col-md-10 mx-auto job-process-block">
                        <img src="../assets/images/jp_process.png" class="job-process" alt="Process Image" width="100%" height="360" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-11 text-center mt-4 d-block d-lg-flex mx-auto">
                        <div class="tabs d-block d-lg-none">
                            <div class="tab">
                                <?php
                                $decrypted_job_id = encrypt_decrypt("decrypt", $getJobId);
                                $job_id = isset($decrypted_job_id) ? $decrypted_job_id : null;
                                include_once "../../jktmyanmarint.admin.com/confs/jobs_config.php";
                                $get_job = "SELECT * FROM jp_jobs WHERE job_id = '$job_id'";
                                $job_result = mysqli_query($jobs_db_conn, $get_job);
                                $row = mysqli_fetch_array($job_result);
                                ?>
                                <input type="checkbox" id="check" class="accordion">
                                <label class="tab-label" for="check"><?php echo $row['job_title'] . " (" . $row['job_id'] . ")"; ?></label>
                                <div class="tab-content">
                                    <table class="table company-info-table">
                                        <tr>
                                            <th><i class="fas fa-yen-sign"></i></th>
                                            <td>
                                                <?php
                                                echo $row["wage"];
                                                echo !empty($row["overtime"]) ?  $row["overtime"] : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-user"></i></th>
                                            <td><?php echo $row["employment_type"] === "Permanent" ? "正社員" : "契約社員"; ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-business-time"></th>
                                            <td><?php echo $row["working_hour"] . "<br>休憩時間：" . $row["breaktime"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-calendar-alt"></i></th>
                                            <td><?= $row["holidays"] ?></td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-map-marker-alt"></i></th>
                                            <td><?= $row["location"] ?></td>
                                        </tr>
                                        <tr>
                                            <?php $requirementList = explode("\n", $row["requirements"]); ?>
                                            <th><i class='fas fa-tags'></i></th>
                                            <td>
                                                <?php for ($i = 0; $i < count($requirementList); $i++) { ?>
                                                    <p><?= $requirementList[$i] ?></p>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php $benefitList = explode("\n", $row["benefits"]); ?>
                                            <th><i class='fas fa-medal'></i></th>
                                            <td>
                                                <?php for ($i = 0; $i < count($benefitList); $i++) { ?>
                                                    <p><?= $benefitList[$i] ?></p>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-8 mb-5 mt-4 mx-auto">
                        <p id="description">
                            フォームのすべてのフィールドに入力してください。 <br>
                            ご参加いただきありがとうございます！！
                        </p>
                        <form id="jpRecruitmentForm" action="../backend/jp_newApplicants.php" method="POST" enctype="multipart/form-data">
                            <div class="pb-4 mb-2">
                                <label for="name" id="name-label" class="appointment-label">名前 <span class="consultant-required-tag">必須 &nbsp; *</span></label><br />
                                <input type="text" id="recruitmentName" name="recruitmentName" placeholder="名前を入力してください" required class="appointment-input form-field" />
                            </div>

                            <div class="pb-4 mb-2">
                                <label for="email" id="email-label" class="appointment-label">メール <span class="consultant-required-tag">必須 &nbsp; *</span></label><br />
                                <input type="email" id="recruitmentEmail" name="recruitmentEmail" placeholder="メールを入力してください" class="appointment-input form-field" required />
                            </div>

                            <div class="pb-4 mb-2">
                                <label for="phone" id="phone-label" class="appointment-label">電話番号 <span class="consultant-required-tag">必須 &nbsp; *</span></label><br />
                                <input type="text" id="recruitmentPhone" name="recruitmentPhone" placeholder="電話番号を入力してください" class="appointment-input form-field" required />
                            </div>

                            <div class="pb-4 mb-2 appointment-date">
                                <label class="appointment-label">生年月日 <span class="consultant-required-tag">必須 &nbsp; *</span></label>
                                <input type="date" id="recruitmentDob" name="recruitmentDob" placeholder="生年月日を入力してください" class="appointment-input form-field" required />
                            </div>

                            <div class="pb-4 mb-2 appointment-type">
                                <fieldset class="appointment-fieldset">
                                    <legend class="appointment-legend">性別 <span class="consultant-required-tag">必須 &nbsp; *</span></legend>

                                    <input type="radio" id="male" name="gender" value="Male" />
                                    <label for="male" id="gender" class="recruitment-gender-label">男性</label><br />

                                    <input type="radio" id="female" name="gender" value="Female" />
                                    <label for="female" id="gender" class="recruitment-gender-label">女性</label><br />
                                </fieldset>
                            </div>

                            <div class="pb-4 mb-2">
                                <label for="dropdown" id="dropdown-label" class="appointment-label">
                                    日本語能力レベル <span class="consultant-required-tag">必須 &nbsp; *</span>
                                </label>
                                <select id="dropdown" name="recruitmentJpSkill" class="appointment-select">
                                    <option value="" disabled selected>
                                        日本語能力レベルを選んでください
                                    </option>
                                    <option value="N5">N5</option>
                                    <option value="N4">N4</option>
                                    <option value="N3">N3</option>
                                    <option value="N2">N2</option>
                                    <option value="N1">N1</option>
                                </select>
                            </div>

                            <div class="pb-4 mb-2">
                                <label class="appointment-label">履歴書 </label>
                                <input type="file" id="recruitmentCv" name="recruitmentCv" placeholder="Please attach your cv" class="cv-input form-field" />
                                <span class="resume-help-block" id="resumeHelp"></span>
                            </div>

                            <div class="pb-4 mb-2">
                                <label for="phone" id="phone-label" class="appointment-label">フェイスブック　プロフィールリンク</label><br />
                                <input type="text" id="fbProfileLink" name="fbProfileLink" placeholder="https://www.facebook.com/{some facebook id}" class="appointment-input form-field" />
                            </div>

                            <div class="pb-4 mb-2">
                                <label for="description" id="description-label" class="appointment-label">ポートフォリオ リンク</label><br />
                                <textarea placeholder="https://github.com/{git user name}/{user repository}" id="portfolioLinks" name="portfolioLinks" class="appointment-textarea" rows="4" cols="50"></textarea>
                            </div>

                            <div class="pb-4 mb-2">
                                <label for="description" id="description-label" class="appointment-label">追記</label><br />
                                <textarea placeholder="追加メモを入力してください" id="recruitmentNote" name="recruitmentNote" class="appointment-textarea" rows="4" cols="50"></textarea>
                            </div>

                            <div class="text-right">
                                <button id="jpRecruitmentSend" type="button" class="appointment-button">送信</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-10 col-lg-4 d-none d-lg-block company-info">
                        <h4><?= $row["job_title"] . " (" . $row['job_id'] . ")" ?></h4>
                        <table class="table company-info-table mt-4">
                            <tr>
                                <th><i class="fas fa-yen-sign"></i></th>
                                <td>
                                    <?php
                                    echo $row["wage"];
                                    echo !empty($row["overtime"]) ?  $row["overtime"] : '';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-user"></i></th>
                                <td><?php echo $row["employment_type"] === "Permanent" ? "正社員" : "契約社員"; ?></td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-business-time"></th>
                                <td><?php echo $row["working_hour"] . "<br>休憩時間： " . $row["breaktime"] ?></td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-calendar-alt"></i></th>
                                <td><?= $row["holidays"] ?></td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-map-marker-alt"></i></th>
                                <td><?= $row["location"] ?></td>
                            </tr>
                            <tr>
                                <?php $requirementList = explode("\n", $row["requirements"]); ?>
                                <th><i class='fas fa-tags'></i></th>
                                <td>
                                    <?php for ($i = 0; $i < count($requirementList); $i++) { ?>
                                        <p><?= $requirementList[$i] ?></p>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <?php $benefitList = explode("\n", $row["benefits"]); ?>
                                <th><i class='fas fa-medal'></i></th>
                                <td>
                                    <?php for ($i = 0; $i < count($benefitList); $i++) { ?>
                                        <p><?= $benefitList[$i] ?></p>
                                    <?php } ?>
                                </td>
                            </tr>
                            <!-- <tr>
                                <th>
                                    <div class="loading">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </th>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
    </section>

    <!-- The Confirmation Modal -->
    <div class="modal fade" id="recruitmentConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-box">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">確認</h4>
                    <button class="btn-close" data-dismiss="modal">
                        <i class='fas fa-times' style='font-size:24px; color: grey'></i>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body confirm-modal-body">
                    よろしいですか、採用フォームを送信しますか？
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" data-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn-submit" id="recruitmentSubmit" data-dismiss="modal">送信</button>
                </div>
            </div>
        </div>
    </div>

    <!-- to top button -->
    <button class="to-top-btn" id="toTop">
        <i class="fa fa-arrow-up"></i>
    </button>
    <!-- end to top button -->

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
                            <span><a href="./travels.html">旅行サービス</a></span>
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
    <div class="footer-copyright">
        Copyright © 2021 | JKT Myanmar International Co., Ltd.
    </div>
    <!-- script -->
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/jquery-ui-1.11.2.min.js"></script>
    <script src="../assets/js/validation.js"></script>
    <!-- <script src="./assets/js/jquery.validate.1.13.1.js"></script> -->
    <script src="../assets/js/additional-methods"></script>
    <!-- <script src="./assets/js/additional-methods.1.13.1.js"></script> -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/float-panel.js"></script>
    <script src="../assets/js/style.js"></script>
    <script src="../assets/js/recruitmentForm.js"></script>
</body>

</html>