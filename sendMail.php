<?php
  $temp_code = $_POST['temp_code'];
  $email = $_POST['email'];

  $to = $email;
  $subject = "$temp_code - Verification Code BoxCoding";
  $txt = "

        <div class='cont' style='margin: 0 auto; width: 450px;'>
            <img style='border-radius: 50em; height: 35px; margin-top: 20px;' src='https://avabucks.it/favicon.png'>
            <hr style='border: none; border-top: 1px solid rgb(0, 0, 0, .1); margin: 20px 0;'>
            <p style='margin-bottom: 20px; font-size: 16px;'>Hi,</p>
            <p style='margin-bottom: 20px; font-size: 16px;'>You have recently signed up for BoxCoding. To complete it, confirm your account.</p>
            <p style='margin-bottom: 20px; font-size: 16px;'>Enter the following code to confirm your account:</p>
            <div class='code' style='font-size: 20px; text-align: center; margin: 40px 0; padding: 15px; background-color: rgb(97, 61, 193, .1); border: 2px solid rgb(97, 61, 193, .8); border-radius: 9px; width: 90px; font-weight: 700; color: rgb(10, 10, 10, .9);'>$temp_code</div>
            <hr style='border: none; border-top: 1px solid rgb(0, 0, 0, .1); margin: 20px 0;'>
            <span style='font-size: 13px; opacity: .7;'>This message has been sent to $to, as requested by you.</span>
            <span style='font-size: 13px; opacity: .7;'>BoxCoding By Avabucks</span>
        </div>
";

$headers = 'From: BoxCoding Avabucks <info@boxcoding.com>' . "\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$returnpath = '-f info@boxcoding.com';
$status = mail($to,$subject,$txt,$headers, $returnpath);

?>
