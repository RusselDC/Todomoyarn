<?php
require "conn.php";
$id = $_COOKIE['userID'];

if(isset($_POST['ID'])){
    $ID = $_POST['ID'];
    $Title = $_POST['Title'];
    $Content = $_POST['Content'];
    $Sdate = $_POST['Sdate'];
    $Edate = $_POST['Edate'];
    $Status = $_POST['Status'];

    $sql = "UPDATE `tasks` SET `taskTitle`='$Title',`taskContent`='$Content',`startDate`='$Sdate',`endDate`='$Edate',`Status`='$Status',`finishedDate`=NULL,`userID`='$id' WHERE taskID = '$ID'";
    $result = $conn->query($sql);

    $message = "Task Updated Successsfuly";
    $error = "Task didnt change";

    if($result){
        $response = array('status'=>true,'message'=> $message);
    }else{
        $response = array('status'=>false,'message'=> $error);
    }
    echo json_encode($response);
}


?>