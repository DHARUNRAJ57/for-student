<?php
// monthwise 
include("database.php");
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
    {
    $request = json_decode($postdata);
    $district=$request->ldistrict;
// $district='SALEM';
$sql6 = "SELECT MONTH(date_added) AS month, COUNT(*) AS count FROM user_master WHERE category ='EN' AND  district= '$district' GROUP BY MONTH(date_added) ORDER BY MONTH(date_added)";
$month = [];
if ($result = mysqli_query($mysqli, $sql6)) {
  $cr = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $month[$cr]['month'] = $row['month'];

    switch ($month[$cr]['month']) {

      case '1':
        $month[$cr]['month'] = 'JAN';
        break;
      case '2':
        $month[$cr]['month'] = 'FEB';
        break;
      case '3':
        $month[$cr]['month'] = 'MAR';
        break;
      case '4':
        $month[$cr]['month'] = 'APR';
        break;
      case '5':
        $month[$cr]['month'] = 'MAY';
        break;
      case '6':
        $month[$cr]['month'] = 'JUN';
        break;
      case '7':
        $month[$cr]['month'] = 'JUL';
        break;
      case '8':
        $month[$cr]['month'] = 'AUG';
        break;
      case '9':
        $month[$cr]['month'] = 'SEP';
        break;
      case '10':
        $month[$cr]['month'] = 'OCT';
        break;
      case '11':
        $month[$cr]['month'] = 'NOV';
        break;
      case '12':
        $month[$cr]['month'] = 'DEC';
        break;

      default:
        $month[$cr]['month'] = 'none';

    }
    $month[$cr]['count'] = $row['count'];
    $cr++;
  }
  echo json_encode($month);
}}
?>