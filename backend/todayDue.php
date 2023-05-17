<?php 

require 'conn.php';
$today = date('Y-m-d');
$id = $_COOKIE['userID'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $taskSql = "SELECT * FROM tasks WHERE userID = '$id' AND Status = 'Pending' AND endDate = '$today'";
    $result = $conn->query($taskSql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){?>
            <div id="username">
            <div id="username1"><p><?php echo $row['taskTitle']?></p></div>
            <div id="username2"><p id="usernames"><?php echo $row['taskContent']?></p></div>
            <div id="username3"><p><?php echo $row['startDate']?></p></div>
            <br>
            </div>
            
        <?php }
    }
}



?>