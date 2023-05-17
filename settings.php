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
    <link rel="stylesheet" href="style/home.css">
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
                    <dialog id="changePdialog">
                        <form method="POST" id="changePform">
                            <h2>Change Password</h2>
                            <p>You can change you password in this window!</p>
                            <label for="">Current Password</label>
                            <input type="password" id="currentP" class="form-control" name="currentP">
                            <hr style="color:black;">
                            <label for="">New password</label>
                            <input type="password" id="newP" class="form-control" name="newP">
                            <label for="">Confirm new password</label>
                            <input type="password" id="newP2" class="form-control" name="newP2">
                            <div id="button_div">
                            <div id="buttonleft"><button type="submit" class="btn btn-primary" id="fTask">Update</button></div>
                            <div id="buttonright"><button type="button" class="btn btn-danger" id="closeNewT2">Close Dialog</button></div>
                            </div>
                        </form>
                    </dialog>
                    <dialog id="changeUdialog">
                        <form method="POST" id="changeUform">
                            <h2>Change Username</h2>
                            <p>You can change you username in this window!</p>
                            <label for="">Current username</label>
                            <input type="text" id="currentU" readonly class="form-control" name="currentU">
                            <hr style="color:black;">
                            <label for="">New username</label>
                            <input type="text" id="newU" class="form-control" name="newU">
                            <label for="">Current Password</label>
                            <input type="password" id="CP"  class="form-control" name="CP">
                            <div id="button_div">
                            <div id="buttonleft"><button type="submit" class="btn btn-primary" id="fTask">Update</button></div>
                            <div id="buttonright"><button type="button" class="btn btn-danger" id="closeNewT3">Close Dialog</button></div>
                            </div>
                        </form>
                    </dialog>
            <div id="settings">
                <h2 style="color: white;">General Account Settings</h2>
                <hr>
                <div id="username">
                    <div id="username1"><p>Username:</p></div>
                    <div id="username2"><p id="usernames">Username</p></div>
                    <div id="username3"><button type="button" class="btn btn-link" style="color:white;text-decoration:none;" onclick="changeU(userID)">Edit</i></button></div>
                </div>
                <hr>
                <div id="username">
                    <div id="username1"><p>Email:</p></div>
                    <div id="username2"><p id="email">Email</p></div>
                    <div id="username3"></div>
                </div>
                <hr>
                <div id="username">
                    <div id="username1"><p>Password:</p></div>
                    <div id="username2"><p id="password">******</p></div>
                    <div id="username3"><button type="button" class="btn btn-link"style="color:white;text-decoration:none;" onclick="changeP(userID)">Edit</i></button></div>
                </div>
                <hr>
                <div id="username">
                    <div id="username1"><p>Image:</p></div>
                    <div id="username2"><p>Go to Image page</p></div>
                    <div id="username3"><button type="button" class="btn btn-link"style="color:white;text-decoration:none;" onclick="picture()">Edit</i></button></div>
                </div>
                <hr>
            </div>
            
        </div>
        <div id="sidebar">
            <div id="today" class="today" onclick="today()">
                <a href="today.php"><p><i class="fa-solid fa-calendar-day">&nbsp;</i>TODAY</p></a>
            </div>
            <div id="today" class="today" onclick="tmw()">
                <a href="tmwPage.php"><p><i class="fa-solid fa-calendar-week">&nbsp;</i>TOMORROW</p></a>
            </div>
            <div id="today" class="today" onclick="sevendays()">
                <a href=""><p><i class="fa-solid fa-calendar-week">&nbsp;</i>NEXT 7 DAYS</p></a>
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
            <div id="today" class="today" 
            style="
        background-color: #444;
        height: 80px;
        cursor: pointer;
        border-color:white;
        border-right-style:none;">
                <a href=""><p><i class="fa-solid fa-gears">&nbsp;</i>SETTINGS</p></a>
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
        const changePdialog = document.querySelector('#changePdialog');
        const closechangePdialog = document.querySelector('#closeNewT2');
        const changeUdialog = document.querySelector('#changeUdialog');
        const closechangePdialog2 = document.querySelector('#closeNewT3');
        function trash(){
            window.location.replace('trash.php')
        }
        function today(){
                window.location.replace('today.php');
            }
        function tmw(){
                window.location.replace('tmwPage.php');
            }
        function sevendays(){
                window.location.replace('7days.php');
        }
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
        function accInfor(){
            $.ajax({
                type:"GET",
                url:"backend/generalsettings.php?id="+userID,
                dataType: "json",
                success:function(response){
                    $("#usernames").text(response.data.Username);
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
                    console.log(greeting);
                    $("#usernamecont").text(greeting+' '+response.data.Username+'!');
                    
                }
            })
        }
        
        closechangePdialog.addEventListener('click',()=>{
            changePdialog.close();
        })
        closechangePdialog2.addEventListener('click',()=>{
            changeUdialog.close();
        })
        function completed(){
            window.location.replace('finishPage.php');
        }
        function home(){
            window.location.replace('home.php');
        }
        function picture(){
            window.location.replace('image.php');
        }
        function changeP(userID){
            changePdialog.showModal();
        }
        function calendar(){
            window.location.replace('calendar.php')
        }
        function late(){
            window.location.replace('late.php')
        }
        $(document).ready(function(){
            $("#changePform").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"backend/changeP.php?id="+userID,
                    data: $("#changePform").serialize(),
                    dataType:"json",
                    success:function(response){
                        if(response.status){
                                accInfor(); 
                                changePdialog.close();
                                $(":input","#changePform").val('');
                                Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                                )
                        }else{
                            changePdialog.close();
                            $(":input","#changePform").val('');
                            Swal.fire({
                                title:"Something went wrong!",
                                text: response.message,
                                icon:"warning",
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Try again'
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    changePdialog.showModal();
                                }
                            })
                        }
                    }
                })
            })
        })
        $(document).ready(function(){
            $("#changeUform").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"backend/changeU2.php?id="+userID,
                    data: $("#changeUform").serialize(),
                    dataType:"json",
                    success:function(response){
                        if(response.status){
                                accInfor();
                                changeUdialog.close();
                                $(":input","#changeUform").val('');
                                Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                                )
                        }else{
                            changeUdialog.close();
                            $(":input","#changeUform").val('');
                            Swal.fire({
                                title:"Something went wrong!",
                                text: response.message,
                                icon:"warning",
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Try again'
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    changeUdialog.showModal();
                                }
                            })
                        }
                    }
                })
            })
        })
        function changeU(userID){
            $.ajax({
                type:"GET",
                url:"backend/changeU.php?id="+userID,
                dataType: "json",
                success:function(response){
                    $("#currentU").val(response.data.Username);
                    changeUdialog.showModal();
                }
            })
        }
        
        accInfor();
    </script>
</html>