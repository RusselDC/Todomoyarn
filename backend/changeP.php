<?php
require "conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $CP = $_POST['currentP'];
    $NP = $_POST['newP'];
    $NP2 = $_POST['newP2'];

    $sql1 = "SELECT * FROM users WHERE userID = '$id'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $password = $row1['Password'];
    if($CP==$password){
        if($NP==$NP2){
            $sql2 = "UPDATE users SET Password = '$NP' WHERE userID = '$id'";
            $result2 = $conn->query($sql2);
            if($result2==TRUE){
                $response = array('status'=>true,'message'=> 'Password updated!');
            }else{
                $response = array('status'=>false,'message'=> 'Something went wrong');
            }
        }else{
            $response = array('status'=>false,'message'=> 'password are not the same');
        }
    }else{
        $response = array('status'=>false,'message'=> 'Wrong password');
    }
}
echo json_encode($response);

?>