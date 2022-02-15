<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "src/PHPMailer.php";
require "src/SMTP.php";
require "src/Exception.php";
//Load Composer's autoloader
// require 'vendor/autoload.php';

include("../confs/config.php");


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

//Create an instance; passing `true` enables exceptions


function sendMail($email, $uname, $classInfo, $insertedId, $payment_type, $account)
{
	$encryptedInsertedId = encrypt_decrypt("encrypt", $insertedId);
	try {
		$mail = new PHPMailer(true);
		//Server settings
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'jktmyanmarint.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		// $mail->Username   = 'noreply.payment@jktmyanmarint.com';                     //SMTP username
		// $mail->Password   = 'noreplyjkt%';             
		$mail->Username   = 'support@jktmyanmarint.com';                            //SMTP password
		$mail->Password   = 'zdMXY~pS;%S2';                        //SMTP password
		// $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		// $mail->Username   = 'payment.jktmmint@gmail.com';                     //SMTP username
		// $mail->Password   = 'payment-jktmmint1!';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		// $mail->setFrom('noreply.payment@jktmyanmarint.com', 'Payment Support (JKT)');
		$mail->setFrom('support@jktmyanmarint.com', 'Payment Support (JKT)');
		// $mail->setFrom('payment.jktmmint@gmail.com', 'Payment Support (JKT)');
		$mail->addAddress($email);     //Add a recipient
		// $mail->addAddress('ellen@example.com');               //Name is optional
		// $mail->addReplyTo('info@example.com', 'Information');
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		//Attachments
		// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Thank you for joining the course - ' . $classInfo["title"] . ' - Here is payment information';
		$mail->Body = "<h1>Dear ";
		$mail->Body .= $uname;
		$mail->Body .= "</h1></br>";
		$mail->Body .= "Welcome! - You tried to enroll our " . $classInfo["level_or_sub"] . " level " . $classInfo["title"] . " course </br>";

		$mail->Body .= "<h3>Check the payment information!</h3>";

		if ($payment_type == "Cash") {
			$mail->Body .= "<p>The course will start on " . $classInfo["start_date"]  . " &nbsp;</p>";
			$mail->Body .= "<p>You can pay on the first day of the course. If you pay fully at once, 5% discount on your course. If you want to pay installment, we accepted 3 times installment before the course completes.</p>";
		} else {
			// 		$mail->Body .= "<h4>" . "Banking system" . "</h4>";
			$mail->Body .= "<p>Please fill out the form below to confirm your payment.&nbsp;";
			$mail->Body .= "Please be sure to submit payment 2 days from now.&nbsp;";
			$mail->Body .= "If you pay fully at once, 5% discount on your course. If you want to pay installment, we accepted 3 times installment before the course completes.&nbsp;";
			$mail->Body .= "If we don't receive any payment, your course enrollment will be cancelled.</p></br>";

			if ($account) {
				$mail->Body .= "<p style='
		width : fit-content;
		margin-top: 20px;
		margin-bottom: 40px;
		padding: 10px 20px;
		color: red;
		font-weight : bold;
		font-size : medium;
		border: 5px double #000;
		display: flex;
		justify-content:space-between;'>
			<span>$payment_type</span>&emsp;
			<span>$account</span>
		</p>";
			}
			$mail->Body .= "<a style='
		text-decoration:none;
		color:#fff;
		background-color:#5bafe7;
		padding:10px 20px;
		margin : 20px 0;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-ms-border-radius: 5px;
		-o-border-radius: 5px;' 
		href='https://jktmyanmarint.com/paymentDetail.php?enroll_id=" . "$encryptedInsertedId" . "'>Go to Payment Confirm</a>";
		}
		global $conn;

		$category_id = intval($classInfo["category_id"]);
		$result = mysqli_query($conn, "SELECT * FROM policies WHERE category_id=$category_id");

		if (mysqli_num_rows($result) > 0) {
			$mail->Body .= "<h3>Policies about the course</h3>";
			$mail->Body .= "<div style='border : 1px solid #5bafe7; padding : 5px 15px; width: fit-content; border-radius : 10px;'>";
			while ($row = mysqli_fetch_assoc($result)) {
				$mail->Body .= "<p>✭&nbsp;" . $row['description'] . "</p>";
			}
			$mail->Body .= "</div>";
		}

		$mail->Body .= "<p style='margin-top: 30px;'>For more detailed payment and courses information, you can contact us directly during business hours (9:00 ~ 17:00) </p>";
		$mail->Body .= "<h4>Regards, <br> JKT Myanmar Internation </h4>";
		$mail->Body .= "--------------------------------";
		$mail->Body .= "<p style='color: grey;'>Phone No.: +959 269 564 339, +959 770 411 708</p>";
		$mail->Body .= "<p style='color: grey;'>Email: jkt.mm.int@gmail.com</p>";
		$mail->Body .= "<p style='color: grey;'>No.86, 3A, Shinsawpu Road, Near Myaynigone Citymart, Sanchaung Township, Yangon, Myanmar</p>";
		// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if ($mail->send()) {
			$mail->smtpClose();
			return array(TRUE, "Email sent!");
		}
		// echo 'Message has been sent';
	} catch (Exception $e) {
		$mail->smtpClose();
		// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return array(FALSE, "Email couldn't be sent. Error : " . $mail->ErrorInfo);
	}
}
