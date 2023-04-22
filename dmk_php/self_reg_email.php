
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
    // $request = json_decode($postdata);
    // $emailId = mysqli_real_escape_string($mysqli, trim($request->email));
    // $sql="SELECT email FROM user_master WHERE mode=4";
    // $res=mysqli_query($mysqli,$sql);
    // $row=mysqli_fetch_assoc($res);
    // $to_mail=$row['email'];
    $request = json_decode($postdata);
    $email = trim($request->email);
    
    $firstname=$request->firstname;
    $lastname=$request->lastname;
    $father_name=$request->father_name;
    $district=$request->district;
    $contact_no=$request->contact_no;
    $date_of_birth=$request->date_of_birth;
    $educational_qualification=$request->educational_qualification;
    $profession=$request->profession;
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='balasuryas44210@gmail.com';
    $mail->Password='tkecxutkxbkuincq';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom("balarsuyas44210@gmail.com");//put mail from
    $mail->addAddress('ushavijay@gmail.com');//put mail to
    $mail->isHTML(true);
    $mail->Subject="DW Admin";
    // $mail->Body="'<b>$firstname $lastname</b>' was self registered in DMK WINGS portal by <b>$email</b>.";
    $mail->Body="Dear Admin,<br>
          A new contributor registration has been received.<br>
          Please find his details<br>
          <p style= margin-left:40px; font-family: Arial, Helvetica, sans-serif;>
               <b> First Name:</b>$firstname<br>
               <b> Last Name:</b>$lastname<br>
               <b>  Email:</b>$email<br>
               <b>  Father Name:</b>$father_name<br>
               <b>District:</b>$district<br>
               <b>Contact No:</b>$contact_no<br>
               <b>Date of Birth:</b>$date_of_birth<br>
               <b> Educational Qualification:</b>$educational_qualification<br>
               <b>Profession:</b>$profession<br></p>
         Thanks,<br>
         EW Admin";
    $mail->send();
    echo "<script>alert('Mail was sent to admin');</script>";
}
// echo json_encode($authdata);
?>
