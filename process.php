<?php
require "conn.php";
$today = date('Y-m-d');
if(isset($_POST['users'])){
  $selected = $_POST['users'];
  $size = sizeof($selected);
  $task = $_POST['task'];
  for($i=0;$i<$size;$i++){
    $sql = "INSERT INTO `tasks`(`taskID`, `taskTitle`, `taskContent`, `startDate`, `endDate`,`finishedDate`,`userID`) VALUES (NULL,'$task','$task','$today','2023-02-23',NULL,'$selected[$i]')";
    $run = $conn->query($sql);
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div id="container">
    <div id="nav"></div>
    <div></div>
    <div></div
  </div>
</body>
</html>