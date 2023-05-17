<?php 
require "conn.php";


if(isset($_POST['email'])){
    $eMail = $_POST['email'];
    $userName = $_POST['username'];
    $passWord = $_POST['password1'];

    $usernameCheck = "SELECT * FROM users WHERE Username = '$userName'";
    $query = $conn->query($usernameCheck);
    $rows = mysqli_num_rows($query);
    if($rows>0){
        $response = array('status'=>false,'message'=> 'username already exists');
        echo json_encode($response);
    }else{
        $registerSql = "INSERT INTO `users`(`UserID`, `Email`, `Username`, `Password`) VALUES (NULL,'$eMail','$userName','$passWord')";
        $message = "Registered Successfuly";

        $resultSql  = mysqli_query($conn,$registerSql);
        if($resultSql==TRUE){
        $response = array('status'=>true,'message'=> $message);
        }else{
        $response = array('status'=>false,'message'=> $conn->error);
        }
    echo json_encode($response);
    }

    
}
?>