<?php
require 'conn.php';
$id = $_COOKIE['userID'];

if(isset($_GET['id'])){
    $id  = $_GET['id'];
    $sql = "SELECT * FROM users WHERE userID = '$id'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $response = array('status' => true, 'data' => $row);
    }else{
        $response = array('status' => false, 'data' => $id);
    }
}
echo json_encode($response);


?>