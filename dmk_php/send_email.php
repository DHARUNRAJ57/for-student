<?php
include("database.php");
$postdata = file_get_contents("php://input");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';




if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);
    $emailId = mysqli_real_escape_string($mysqli, trim($request->email));
    $token = md5($emailId).rand(10,9999);

    /*$expFormat = mktime(
    date("H")+5, date("i"), date("s"), date("m") ,date("d"), date("Y")
    );

   $expDate = date("Y-m-d H:i:s",$expFormat);*/
   $sql="UPDATE user_master SET token='$token' WHERE email='$emailId'";
   $res=mysqli_query($mysqli,$sql);
    $link = "<a href='https://redmindtech.github.io/Dmk-Wings/change-password/".$emailId."/".$token." ' >Click To Reset password</a>";
   //$link = "<a href='http://localhost:4200/change-password/".$emailId."/".$token."'>Click To Reset password</a>";
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='balasuryas44210@gmail.com';
    $mail->Password='tkecxutkxbkuincq';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('balasuryas44210@gmail.com');
    $mail->addAddress($emailId);
    $mail->isHTML(true);
    $mail->Subject="Reset Password";
    $mail->Body="<p>Hello!</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are receiving this email because we received a password reset request for your account.</p>
    $link
    <p>This password reset link will expire once used.</p>
    <p> If you did not request a password reset, no further action is required.</p>
    <p>Thanks,</p>
    <p>EW Admin</p>";
    $mail->send();
    echo "<script>alert('The Reset Password link was sent to your mail');</script>";
}
echo json_encode($authdata);
?>

<p>Hello!</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are receiving this email because we received a password reset request for your account.</p><br>
    <center><a href='$link' class='btn btn-primary'>Reset Password</a></center>
    <p>This password reset link will expire once used.</p>
    <p> If you did not request a password reset, no further action is required.</p>
    <p>Thanks,</p>
    <p>EW Admin</p>
