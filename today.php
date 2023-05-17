<?php
require "conn.php";
$un = $_COOKIE['userName'];
$ps = $_COOKIE['passWord'];
$id = $_COOKIE['userID'];
if(!isset($un)&&!isset($ps)&&!isset($id)){
    header('location:index.html');
}
$userSql = "SELECT * FROM users WHERE userID = '$id'";
$result = $conn->query($userSql);
$row = $result->fetch_assoc();
$pic = $row['img_id'];
?>
<!DOCTYPE html>
<html lang="en" id="javonites">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="javascript/jquery.js"></script>
    <script src="sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6e55733586.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/today.css">
    <script src="javascript/home.js" defer></script>
    <title>Document</title>
    

</head>
<body>
    <div id="container">
        <nav>
            <div id="b1"><p>TMY</p></div>
            
            <div id="b2">
                <div id="b2_1"><div id="newT" onclick="home()"><p><i class="fa-solid fa-house">&nbsp;</i>HOME</p></div></div>
                <div id="b2_2">
                    <p id="usernamecont"></p>
                    <div id="img_container">
                        
                        <img src="" alt="pfp" id="img">
                    </div>
                </div>
            </div>
        </nav>
        <div id="body">
            <div id="settings">
                <h2 id="tday" style="color:white;">Tasks Due Today</h2>
                <hr>
                <div id="username" style="border-style: none; background-color:#444; margin-bottom:0; margin-top:0;">
                    <div id="username1" style="margin-bottom:0; margin-top:0; border-style:none;"><p id="usernames"style="color:white;margin-bottom:0; margin-top:0; font-size:20px;">Title</p></div>
                    <div id="username2" style="margin-bottom:0; margin-top:0;"><p id="usernames"style="color:white;margin-bottom:0; margin-top:0; font-size:20px;">Description</p></div>
                    <div id="username3" style="margin-bottom:0; margin-top:0; border-style:none;"><p style="color:white;margin-bottom:0; margin-top:0; font-size:20px;">Start Date</p></div>
                
                </div>
                <div id="todaycontent">

                </div>
                
            </div>
            
        </div>
        <div id="sidebar">
        <div id="today" class="today" style="
        background-color: #444;
        height: 80px;
        cursor: pointer;
        border-color:white;">
                <a href="#"><p><i class="fa-solid fa-calendar-day">&nbsp;</i>TODAY</p></a>
            </div>
            <div id="today" class="today" onclick="tmw()">
                <a href="#"><p><i class="fa-solid fa-calendar-week">&nbsp;</i>TOMORROW</p></a>
            </div>
            <div id="today" class="today" onclick="sevendays()">
                <a href="#"><p><i class="fa-solid fa-calendar-week">&nbsp;</i>NEXT 7 DAYS</p></a>
            </div>
            <div id="today" class="today" onclick="calendar()">
                <a href=""><p><i class="fa-solid fa-calendar-days">&nbsp;</i>CALENDAR</p></a>
            </div>
            <div id="today1">
                <p>STATUS</p>
            </div>
            <div id="today" class="today" onclick="home()">
                <a href=""><p><i class="fa-solid fa-file-circle-question">&nbsp;</i>PENDING</p></a>
            </div>
            <div id="today" class="today" onclick="completed()">
                <a href="finishPage.php"><p><i class="fa-solid fa-file-circle-check">&nbsp;</i>COMPLETED</p></a>
            </div>
            <div id="today" class="today" onclick="late()">
                <a href=""><p><i class="fa-solid fa-file-circle-xmark">&nbsp;</i>LATE</p></a>
            </div>
            <div id="today" class="today" onclick="trash()">
                <a href=""><p><i class="fa-solid fa-trash">&nbsp;</i>TRASH</p></a>
            </div>
            <div id="today1">
                <p>SETTINGS</p>
</div>
            <div id="today" class="today" onclick="settings()">
                <a href="#"><p><i class="fa-solid fa-gears">&nbsp;</i>SETTINGS</p></a>
            </div>
            <div id="Logout" class="today" onclick="logout()">
                <a href="#" style="color: white;" ><p><i class="fa-sharp fa-solid fa-arrow-right-from-bracket">&nbsp;</i>LOG OUT</p></a>
            </div>
            <div id="today1">
                
            </div>
            <div id="today1">
                <p>RUSSEL DC.</p>
            </div>
        </div>
        
    </div>
</body>
                    
    <script type="text/javascript">
        var userID = <?php echo $id?>;

        function home(){
            window.location.replace('home.php');
        }
        
        function tmw(){
            window.location.replace('tmwPage.php');
        }
        function completed(){
            window.location.replace('finishPage.php');
        }

        function settings(){
            window.location.replace('settings.php')
        }
        
        function sevendays(){
            window.location.replace('7days.php');
        }
        function calendar(){
            window.location.replace('calendar.php')
        }
        function late(){
            window.location.replace('late.php')
        }
        function trash(){
            window.location.replace('trash.php')
        }

        function today(){
            $.ajax({
                type: 'GET',
                url: 'backend/todayDue.php?id='+userID,
                dataType: 'html',
                success:function(response){
                    $("#todaycontent").html(response);
                }
            })
        }
        today();
        
        

        function accInfor(){
            $.ajax({
                type:"GET",
                url:"backend/generalsettings.php?id="+userID,
                dataType: "json",
                success:function(response){
                    $("#email").text(response.data.Email);
                    let pw = response.data.Password;
                    var password = pw.replace(/./g,'*');
                    $("#password").text(password);
                    $("#img").attr('src', 'profiles/'+response.data.img_id);
                    let date = new Date();
                    let hour = date.getHours();
                    let greeting;

                    if (hour < 12) {
                    greeting = "Good morning";
                    } else if (hour < 18) {
                    greeting = "Good afternoon";
                    } else {
                    greeting = "Good evening";
                    }
                    $("#usernamecont").text(greeting+' '+response.data.Username+'!');
                    
                }
            })
        }
        
        accInfor();
        function logout(){
                Swal.fire({
                title: 'Are you sure you want to log out?',
                icon: 'question',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> YES',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText:'<i class="fa fa-thumbs-down"></i> NO',
                cancelButtonAriaLabel: 'Thumbs down' 
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                        type: "GET",    
                        url: "logout.php?token=1",
                        dataType: "html",
                        success:function(response){ 
                            window.location.replace("index.html");
                        }
                        })
                    }else{
                        Swal.fire('Great! You can now continue your task!')
                    }
                })
            }
    </script>
</html>