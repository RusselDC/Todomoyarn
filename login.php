<?php 
require "conn.php";
if(isset($_POST['username'])){
    $userName = $_POST['username'];
    $passWord = $_POST['password'];

    $loginsql = "SELECT * FROM users WHERE Username = '$userName' AND Password = '$passWord'";

    
    $failed = "Login Failed";

    $resultSql  = mysqli_query($conn,$loginsql);
    $rows = mysqli_num_rows($resultSql);

    if($rows >= 1){
        $id = "SELECT * FROM users WHERE Username ='$userName' AND Password = '$passWord'";
        $result = $conn->query($id);
        $fetch = mysqli_fetch_assoc($result);
        $userID = $fetch['UserID'];
        $status = $fetch['isAdmin'];
        if($status == "TRUE"){
        $message = "TRUE";
        $response = array('status'=>true,'message'=> $message);
        setcookie("userName",$userName);
        setcookie("passWord",$passWord);
        setcookie('userID',$userID);
        }else{
        $message = "FALSE";
        $response = array('status'=>true,'message'=> $message);
        setcookie("userName",$userName);
        setcookie("passWord",$passWord);
        setcookie('userID',$userID);
        
        }
        
        
        
    }else{
        $response = array('status'=>false,'message'=> $failed);
    }
    echo json_encode($response);
}
?>