<?php 
require "conn.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $NU = $_POST['newU'];
    $CP = $_POST['CP'];
    $CU = $_POST['currentU'];
    $sql1 = "SELECT * FROM users WHERE userID = '$id'";
    $result1 = $conn->query($sql1);
    $row = $result1->fetch_assoc();
    $password = $row['Password'];
    if($password == $CP){
        if($CU == $NU){
            $response  = array('status'=>FALSE,'message'=>'Please choose a different username');
        }else{
            $sql2 = "UPDATE users SET Username = '$NU' WHERE userID = '$id'";
            $result2 = $conn->query($sql2);
            if($result2==TRUE){
                $response = array('status'=>TRUE,'message'=>'Username updated succesfuly!');
            }else{
                $response  = array('status'=>FALSE,'message'=>'Something went wrong');
            }
        }
    }else{
        $response  = array('status'=>FALSE,'message'=>'Wrong Password');
    }
}
    echo json_encode($response);
?>