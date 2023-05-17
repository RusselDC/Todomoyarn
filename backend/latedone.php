<?php
require "conn.php";
$id = $_COOKIE['userID'];

if(isset($_GET['token'])){
    $sql = "SELECT COUNT(taskID) AS '7days' FROM `tasks` WHERE userID = '$id' AND Status = 'Finished' AND DATE(finishedDate) > DATE(endDate)";
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