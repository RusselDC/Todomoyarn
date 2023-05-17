<?php
require "conn.php";
$id = $_COOKIE['userID'];

if(isset($_GET['token'])){
    $sql = "SELECT COUNT(taskID) AS '7days' FROM `tasks` WHERE userID = '2025' AND endDate BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 7 DAY) AND Status = 'Pending'";
    $result = $conn->query($sql);
    
    if($result){
        $fetch = $result->fetch_assoc();
        $response = $fetch['7days'];
    }else{
        $response = array('status'=>false,'data'=> $sql);
    }
    $int_value = intval($response);
    echo json_encode($int_value);
}


?>