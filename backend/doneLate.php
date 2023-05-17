<?php
require "conn.php";
$id = $_COOKIE['userID'];
$today = date('Y-m-d');

if(isset($_GET['token'])){
    $sql = "SELECT COUNT(taskID) AS 'onTime' FROM `tasks` WHERE userID = '$id' AND DATE(finishedDate) > DATE(endDate)";
    $result = $conn->query($sql);
    
    if($result){
        $fetch = $result->fetch_assoc();
        $response = $fetch['onTime'];
    }else{
        $response = array('status'=>false,'data'=> $sql);
    }
    $int_value = intval($response);
    echo json_encode($int_value);
}


?>