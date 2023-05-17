<?php
require "conn.php";
$today = date('Y-m-d');
$id = $_COOKIE['userID'];


if(isset($_POST['titleTD'])){
    $title = $_POST['titleTD'];
    $content = $_POST['contentTD'];
    $startDate = $today;
    $endDate = $_POST['dateTD'];
    

    $addSql = "INSERT INTO `tasks`(`taskID`, `taskTitle`, `taskContent`, `startDate`, `endDate`, `finishedDate`, `userID`) VALUES (NULL,'$title','$content','$startDate','$endDate',NULL,'$id')";
    $result = $conn->query($addSql);
    $message = "task added";
    $failed = "proccess failed";

    if($result){
        $response = array('status'=>true,'message'=> $message);
    }else{
        $response = array('status'=>false,'message'=> $failed);
    }
    echo json_encode($response);
}







?>