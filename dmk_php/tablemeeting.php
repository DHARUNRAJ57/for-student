<?php

include("database.php");
// state admin view
 $meeting_show = [];
 $sql = "SELECT * FROM meetings ORDER BY  date  asc";
 if ($result = mysqli_query($mysqli, $sql)) {
    $cr = 0;
    while ($row = mysqli_fetch_assoc($result)) {
       $meeting_show[$cr]['id'] = $row['id'];
       $meeting_show[$cr]['date'] = $row['date'];
       $meeting_show[$cr]['time'] = $row['time'];
       $meeting_show[$cr]['meeting_location'] = $row['meeting_location'];
       $meeting_show[$cr]['meeting_name'] = $row['meeting_name'];
       $meeting_show[$cr]['meeting_type'] = $row['meeting_type'];
       $meeting_show[$cr]['description'] = $row['description'];
       $meeting_show[$cr]['participants'] = $row['participants'];
       $meeting_show[$cr]['constituency'] = $row['constituency'];
       $meeting_show[$cr]['comments'] = $row['comments'];
       $meeting_show[$cr]['actual_attendees'] = $row['actual_attendees'];
       $meeting_show[$cr]['action_taken'] = $row['action_taken'];
       $meeting_show[$cr]['status'] = $row['status'];
      
      $cr++;
    }
    echo json_encode(['data' =>  $meeting_show]);
  } else {
    http_response_code(404);
  }
  ?>