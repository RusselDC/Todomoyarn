<?php
require "conn.php";
$id = $_COOKIE['userID'];
$today = date('Y-m-d');

if(isset($_GET['token'])){
    $sql = "SELECT COUNT(taskID) AS 'all' FROM `tasks` WHERE userID = '$id' AND Status = 'Finished'";
    $result = $conn->query($sql);
    
    if($result){
        $fetch = $result->fetch_assoc();
        $response = $fetch['all'];
    }else{
        $response = array('status'=>false,'data'=> $sql);
    }
    $int_value = intval($response);
    echo json_encode($int_value);
}


?>