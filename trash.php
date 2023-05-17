<?php
$un = $_COOKIE['userName'];
$ps = $_COOKIE['passWord'];
$id = $_COOKIE['userID'];
if(!isset($un)&&!isset($ps)&&!isset($id)){
    header('location:index.html');
}
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
    <link rel="stylesheet" href="style/trash.css">
    <title>Document</title>

</head>
<body>
    <div id="container">
        <nav>
            <div id="b1"><p>TMY</p></div>
            
            <div id="b2">
                <div id="b2_1"><div id="newT" onclick="home()"><p><i class="fa-solid fa-house">&nbsp;</i>HOME</p></div></div>
                <div id="b2_2">
                    <p>Hi <?php echo $_COOKIE['userName']; ?></p>
                    <div id="img_container">
                        
                        <img src="profiles/default.jpg" alt="pfp">
                    </div>
                </div>
            </div>
        </nav>
        <div id="body">
            <div style="text-align: left; padding-left: 10px;"><button type="button" class="btn btn-secondary" onClick="window.location.reload()"><i class="fa-solid fa-arrows-rotate"></i> Refresh Page</button></div>
            <div id="navigation">
                <div id="nav1">
                    <div id="title">
                        <p>Archived</p>
                    </div>
                    <div id="count">
                        <p id="today">0</p>
                    </div>
                </div>
            </div>
            
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody id="tasks_data">
                      <tr>
                        <dialog id="viewTask">
                            <form method="POST" id="FinishedBtn">
                            <h1 id="ID2">ID</h1>
                            <p>Title</p>
                            <input type="text" class="form-control"  readonly id="Title2">
                            <p>Descriptions</p>
                            <textarea name="" class="form-control" rows="5" id="Content2" readonly>
                            </textarea>
                            <p>Start Date</p>
                            <input type="text" class="form-control" readonly id="Sdate2" >
                            <p>End Date</p>
                            <input type="text" class="form-control" readonly id="Edate2" >
                            <p>Status</p>
                            <input type="text" class="form-control" readonly id="Status2" >
                            <div id="button_div">
                            <div id="buttonright"><button type="button" class="btn btn-danger" id="closeNewT2">Close Dialog</button></div>
                            </div>
                            </form>
                        </dialog>
                      </tr>
                    </tbody>
                  </table>
        </div>
        <div id="sidebar">
        <div id="today" class="today" onclick="today()">
                <a href="#"><p><i class="fa-solid fa-calendar-day">&nbsp;</i>TODAY</p></a>
            </div>
            <div id="today" class="today" onclick="tmw()">
                <a href="#"><p><i class="fa-solid fa-calendar-week">&nbsp;</i>TOMORROW</p></a>
            </div>
            <div id="today" class="today" onclick="sevendays()">
                <a href="#"><p><i class="fa-solid fa-calendar-week">&nbsp;</i>NEXT 7 DAYS</p></a>
            </div>
            <div id="today" class="today" onclick="calendar()">
                <a href="#"><p><i class="fa-solid fa-calendar-days">&nbsp;</i>CALENDAR</p></a>
            </div>
            <div id="today1">
                <p>STATUS</p>
            </div>
            <div id="today" class="today" onclick="home()">
                <a href="#"><p><i class="fa-solid fa-file-circle-question">&nbsp;</i>PENDING</p></a>
            </div>
            <div id="today" class="today" onclick="finish()" >
                <a href="#"><p><i class="fa-solid fa-file-circle-check">&nbsp;</i>COMPLETED</p></a>
            </div>
            <div id="today" class="today" onclick="late()"
            >
                <a href="#"><p><i class="fa-solid fa-file-circle-xmark">&nbsp;</i>LATE</p></a>
            </div>
            <div id="today" class="today"
            style="
            background-color: #444;
            height: 80px;
            cursor: pointer;
            border-color:white;
            border-right-style:none;">
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
    <script type="text/javascript">
            function trash(){
            $.ajax({
                type: "GET",
                url: "backend/trashC.php?token=1",
                dataType: "html",
                success:function(response){
                    $("#today").text(response);
                }
            })
            }
            trash()
            function today(){
                window.location.replace('today.php');
            }
            function settings(){
            window.location.replace('settings.php')
            }
            function tmw(){
                window.location.replace('tmwPage.php');
            }
            function sevendays(){
                window.location.replace('7days.php');
            }
            function calendar(){
            window.location.replace('calendar.php')
            }
            function finish(){
                window.location.replace('finishPage.php')
            }
            function late(){
                window.location.replace('late.php')
            }
            const viewDialog = document.querySelector('#viewTask');
            const closeviewDialog = document.querySelector('#closeNewT2');
            closeviewDialog.addEventListener('click',()=>{
                viewDialog.close();
            })
           function home(){
            window.location.replace("home.php");
           }
           function calendar(){
            window.location.replace('calendar.php')
         }

         function view_record(taskID){
            $.ajax({
                type: "GET",
                url: "backend/viewT2.php?view_id="+taskID,
                dataType: "json",
                success: function(response){
                    var bangers = response.data.taskID;
                    $("#ID2").text('Task ID: '+response.data.taskID);
                    $("#Title2").val(response.data.taskTitle);
                    $("#Content2").val(response.data.taskContent);
                    $("#Sdate2").val(response.data.startDate);
                    $("#Edate2").val(response.data.endDate);
                    $("#Status2").val(response.data.Status);
                    viewDialog.showModal();
                    
                }
            });
        }
       

        function get_finished_all_task(){
            $.ajax({
                type: "GET",
                url: "backend/trashT.php?get_task=1",
                dataType: "html",
                success:function(response){
                    $("#tasks_data").html(response);
                }

            })
        }
        get_finished_all_task();
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


    
    
</body>
</html>