<?php
    require 'conn.php';
    $id = $_COOKIE['userID'];
    
    $query = "SELECT * FROM tasks WHERE userID = '$id' AND Status = 'Pending'";
    $result = mysqli_query($conn, $query);
    $events = array();
    while($row = mysqli_fetch_assoc($result)) {
     $events[] = array(
      'title' => $row['taskTitle'],
      'description' => $row['taskContent'],
      'start' => $row['endDate'],
      'end' => $row['endDate']
     );
    }
    echo json_encode($events);
?>