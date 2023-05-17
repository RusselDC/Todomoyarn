<?php 
require "conn.php";
$id = $_COOKIE['userID'];
$today = date('Y-m-d');


if(isset($_GET['get_task'])){
    $taskSql = "SELECT * FROM tasks WHERE userID = '$id' AND Status = 'Pending' AND endDate < NOW() OR userID = '$id' AND Status = 'Finished' AND DATE(finishedDate) > DATE(endDate)";
    $result = $conn->query($taskSql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){?>
            <tr>
                <td><?php echo $row['taskID']?></td>
                <td><?php echo $row['taskTitle']?></td>
                <td><?php echo $row['startDate']?></td>
                <td><?php echo $row['endDate']?></td>
                <td><?php echo $row['Status']?></td>
                <td><i class="fa-sharp fa-solid fa-eye" onclick="view_record(<?php echo $row['taskID']?>)"></i></td>
            </tr>
        <?php }
    }
}

?>