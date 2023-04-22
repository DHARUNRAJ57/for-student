<?php
include("database.php");
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);
    $email = mysqli_real_escape_string($mysqli, trim($request->email));
    $password=$request->password;
    $cpassword=$request->cpassword;

    if($password==$cpassword)
    {
    $sql="UPDATE user_master SET password='$password',token='' WHERE email='$email'";
    if ($mysqli->query($sql) === TRUE) {
        $authdata = [
        'email'=>$email,
        'password'=>$password,
        'cpassword'=>$cpassword
        ];
        echo json_encode($authdata);
        }
}
}
?>
