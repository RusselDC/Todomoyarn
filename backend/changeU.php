<?php
require "conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT Username FROM users WHERE userID = '$id'";
    $result = $conn->query($sql);
    $Username = $result->fetch_assoc();
}

$response = array("status"=>TRUE,"data"=>$Username);
echo json_encode($response);



?>