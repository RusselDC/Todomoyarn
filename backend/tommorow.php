<?php
require "conn.php";
$id = $_COOKIE['userID'];

if(isset($_GET['token'])){
    $sql = "SELECT COUNT(taskID) AS 'tmw' FROM `tasks` WHERE userID = '$id' AND `endDate` = DATE(DATE_ADD(NOW(), INTERVAL 1 DAY)) AND Status = 'Pending'";
    $result = $conn->query($sql);
    
    if($result){
        $fetch = $result->fetch_assoc();
        $response = $fetch['tmw'];
    }else{
        $response = array('status'=>false,'data'=> $sql);
    }
    $int_value = intval($response);
    echo json_encode($int_value);
}


?>