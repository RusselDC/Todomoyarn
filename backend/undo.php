<?php
require "conn.php";

$today = date('Y-m-d');


if(isset($_GET['taskID'])){
    $taskID = $_GET['taskID'];
    $sql = "UPDATE tasks SET `Status` = 'Pending',`finishedDate` = NULL WHERE taskID = '$taskID'";
    $result = $conn->query($sql);


    if($result){
        $response = array('status'=>true,'message'=> 'Successful');
    }else{
        $response = array('status'=>false,'message'=> 'Something went wrong, please try again!');
    }
    echo json_encode($response);  
}


?>