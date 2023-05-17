
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="process.php" method="post">
  <?php
  require "conn.php";
  $insert = "SELECT * FROM users WHERE isAdmin = 'FALSE'";
  $result = $conn->query($insert);
  $users = array();
  while($row = $result->fetch_assoc()){
    echo "<input type='checkbox' name='users[]' value='".$row['UserID']."'>".$row['Username']."";
  }
  ?>
  <input type="text" name="task" id="hexd"><br>
  <input type="submit" value="Submit">

</form>
</body>
</html>