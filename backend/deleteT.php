<?php 
require "conn.php";


if(isset($_GET['delete_id'])){
    $edit_id = $_GET['delete_id'];
    $sql = "UPDATE tasks SET Status = 'Archived' WHERE taskID = '$edit_id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $response = array('status' => true, 'message' => "Record deleted successfuly");
    }else{
        $response = array('status' => false, 'data' => $conn->error);
    }
    echo json_encode($response);
}

?>