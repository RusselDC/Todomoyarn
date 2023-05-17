<?php 
require "conn.php";


if(isset($_GET['view_id'])){
    $edit_id = $_GET['view_id'];
    $sql = "SELECT * FROM tasks WHERE taskID = '$edit_id'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $response = array('status' => true, 'data' => $row);
    }else{
        $response = array('status' => false, 'data' => $edit_id);
    }
    echo json_encode($response);
}

?>