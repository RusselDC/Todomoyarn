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
    <link rel="stylesheet" href="style/calendar.css">
    <script src='node_modules/fullcalendar/index.global.js'></script>
    <script src="javascript/home.js" defer></script>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('todaycontent');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          height:650,
          events: 'backend/fetchTasks.php',

          eventClick: function(info){
                info.jsEvent.preventDefault();
                info.el.style.borderColor = 'red';
                
                Swal.fire({
                    title: info.event.title,
                    icon:'info',
                    html:'<p style="color:black;text-align:center;">'+info.event.extendedProps.description+'</p>',
                });
          }
        });
        calendar.render();
      });
    </script>
    <title>Document</title>
    

</head>
<body>
    <div id="container">
        <nav>
            <div id="b1"><p style="font-weight: 800;">TMY</p></div>
            
            <div id="b2">
                <div id="b2_1"><div id="newT" onclick="home()"><p style="font-weight: 800;"><i class="fa-solid fa-house">&nbsp;</i>HOME</p></div></div>
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
                <h2 id="tday" style="color:white;">Task Calendar</h2>
                <hr>
                <div id="todaycontent">

                </div>
                
            </div>
            
        </div>
        <div id="sidebar">
        <div id="today" class="today" onclick="today()">
                <a href="#"><p><i class="fa-solid fa-calendar-day">&nbsp;</i>TODAY</p></a>
            </div>
            <div id="today" class="today" onclick="tmw()"
        >
                <a href="#"><p><i class="fa-solid fa-calendar-week">&nbsp;</i>TOMORROW</p></a>
            </div>
            <div id="today" class="today" onclick="sevendays()"
            
            >
                <a href="#"><p><i class="fa-solid fa-calendar-week">&nbsp;</i>NEXT 7 DAYS</p></a>
            </div>
            <div id="today" class="today"
            style="
        background-color: #444;
        height: 80px;
        cursor: pointer;
        border-color:white;
        border-right-style:none;"
            >
                <a href="#"><p><i class="fa-solid fa-calendar-days">&nbsp;</i>CALENDAR</p></a>
            </div>
            <div id="today1">
                <p>STATUS</p>
            </div>
            <div id="today" class="today" onclick="home()">
                <a href="#"><p><i class="fa-solid fa-file-circle-question">&nbsp;</i>PENDING</p></a>
            </div>
            <div id="today" class="today" onclick="completed()">
                <a href="#"><p><i class="fa-solid fa-file-circle-check">&nbsp;</i>COMPLETED</p></a>
            </div>
            <div id="today" class="today" onclick="late()">
                <a href="#"><p><i class="fa-solid fa-file-circle-xmark">&nbsp;</i>LATE</p></a>
            </div>
            <div id="today" class="today" onclick="trash()">
                <a href="#"><p><i class="fa-solid fa-trash">&nbsp;</i>TRASH</p></a>
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
        function settings(){
            window.location.replace('settings.php')
        }
        var userID = <?php echo $id?>;
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

        function home(){
            window.location.replace('home.php');
        }
        function completed(){
            window.location.replace('finishPage.php');
        }
        function tmw(){
            window.location.replace('tmwPage.php')
        }
        function today(){
            window.location.replace('today.php')
        }
        function sevendays(){
            window.location.replace('7days.php');
        }
        function late(){
            window.location.replace('late.php')
        }
        function trash(){
            window.location.replace('trash.php')
        }
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
    </script>
</html>