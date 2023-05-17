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
                <div id="b2_1"><div id="newT"><p>NEW TASK</p></div></div>
                <div id="b2_2">
                    <p>Hi <?php echo $_COOKIE['userName']; ?></p>
                    <div id="img_container">
                        
                        <img src="profiles/<?php echo $pic?>" alt="pfp">
                    </div>
                </div>
            </div>
        </nav>
        <div id="body">
            <div style="text-align: left; padding-left: 10px;"><button type="button" class="btn btn-secondary" onClick="window.location.reload()"><i class="fa-solid fa-arrows-rotate"></i> Refresh Page</button></div>
            <div id="navigation">
                <div id="nav1">
                    <div id="title">
                        <p>TODAY</p>
                    </div>
                    <div id="count">
                        <p id="today">0</p>
                    </div>
                </div>
                <div id="nav2">
                    <div id="title">
                        <p>TOMORROW</p>
                    </div>
                    <div id="count">
                        <p id="tommorow">0</p>
                    </div>
                </div>
                <div id="nav3">
                    <div id="title">
                        <p>NEXT 7 DAYS</p>
                    </div>
                    <div id="count">
                        <p id="week">0</p>
                    </div>
                </div>
                <div id="nav4">
                    <div id="title">
                        <p>ALL</p>
                    </div>
                    <div id="count">
                        <p id="all">0</p>
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
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody id="tasks_data">
                      <tr>
                        
                        <dialog id="viewTask">
                            <form method="POST" id="FinishedBtn">
                            <h1 id="ID2">ID</h1>
                            <p id="font">Title</p>
                            <input type="text" class="form-control"  readonly id="Title2">
                            <p id="font">Descriptions</p>
                            <textarea name="" class="form-control" rows="5" id="Content2" readonly>
                            </textarea>
                            <p id="font">Start Date</p>
                            <input type="text" class="form-control" readonly id="Sdate2" >
                            <p id="font">End Date</p>
                            <input type="text" class="form-control" readonly id="Edate2" >
                            <p id="fonts">Status</p>
                            <input type="text" class="form-control" readonly id="Status2" >
                            <div id="button_div">
                            <div id="buttonleft"><button type="button" class="btn btn-primary" id="fTask">Finish Task</button></div>
                            <div id="buttonright"><button type="button" class="btn btn-danger" id="closeNewT2">Close Dialog</button></div>
                            </div>
                            
                            </form>
                        </dialog>
                        
                        <dialog id="editTask">
                        <h1>Edit</h1>
                        <p id="font">This where you can edit your tasks</p>
                        <form method="POST" id="editForm">
                            <p id="font">ID</p>
                            <input type="text" class="form-control" id="ID" name="ID" readonly>
                            <p id="font">Title</p>
                            <input type="text" class="form-control" id="Title" name="Title">
                            <p id="font">Descriptions</p>
                            <textarea name="Content" class="form-control" rows="5" id="Content">
                                
                            </textarea>
                            <p id="font">Start Date</p>
                            <input type="date" class="form-control" id="Sdate" name="Sdate" readonly    >
                            <p id="font">End Date</p>
                            <input type="date" class="form-control" id="Edate" name="Edate">
                            <p id="font">Status</p>
                            <input type="text" class="form-control" id="Status" name="Status">
                            <div id="button_div">
                            <div id="buttonleft"><button type="submit" class="btn btn-primary">Submit</button></div>
                            <div id="buttonright"><button type="button" class="btn btn-danger" id="closeNewT3">Close Dialog</button></div>
                            </div>
                        </form>
                        </dialog>
                        
                      </tr>
                      
                    </tbody>
                  </table>
        </div>
        <div id="sidebar">
            <div id="today" class="today" onclick="today(window.location.replace('today.php'))">
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
            <div id="today" class="today" style="
        background-color: #444;
        height: 80px;
        cursor: pointer;
        border-color:white;">
                <a href="#"><p><i class="fa-solid fa-file-circle-question">&nbsp;</i>PENDING</p></a>
            </div>
            <div id="today" class="today" onclick="completed()">
                <a href="#s"><p><i class="fa-solid fa-file-circle-check">&nbsp;</i>COMPLETED</p></a>
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
                <a href="settings.php"><p><i class="fa-solid fa-gears">&nbsp;</i>SETTINGS</p></a>
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
    <dialog id="newTask">
        <h1>NEW TASK</h1>
        <p>This page will let you add a new task for you to work on and monitor</p>
        <form method="POST" id="addTask" name="addTask_form">
            <p>Title</p>
            <input type="text" class="form-control" name="titleTD" id="titleTD">
            <p>Description</p>
            <textarea class="form-control" id="contentTD" rows="5" name="contentTD"></textarea>
            <p>End Date</p>
            <input type="date" class="form-control" id="dateTD" name="dateTD">
            <div id="button_div">
                <div id="buttonleft"><button type="submit" class="btn btn-primary" name="addTask"  onclick="return taskValidation()">Submit</button></div>
                <div id="buttonright"><button type="button" class="btn btn-danger" id="closeNewT">Close Dialog</button></div>
            </div>
        </form>
    <script type="text/javascript">
        function settings(){
            window.location.replace('settings.php')
        }
        function trash(){
            window.location.replace('trash.php')
        }
            $(document).ready(function(){
            $("#editForm").submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "backend/editT2.php",
                        data: $("#editForm").serialize(),
                        dataType: "json",
                        success:function(response){
                            if(response.status){
                                editDialog.close();
                                Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                                )
                                $("#editForm")[0].reset();
                                get_all_task();
                                today();
                                all();
                                tommorow();
                                week();
                            }else{
                                editDialog.close();
                                Swal.fire({
                                title: 'Something went wrong!',
                                text: "Try again later :D",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Try again'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                editDialog.showModal();
                                }
                            })
                            }
                        }
                    });
            });
        });
    </script>

    <script type="text/javascript">
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

            function today(){
                window.location.replace('today.php');
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


            $(document).ready(function(){
            $("#addTask").submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "backend/addT.php",
                        data: $("#addTask").serialize(),
                        dataType: "json",
                        success:function(response){
                            if(response.status){
                                addModal.close();
                                Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                                )
                                $("#addTask")[0].reset();
                                get_all_task();
                                today();
                                all();
                                tommorow();
                                week();
                            }else{
                                addModal.close();
                                Swal.fire({
                                title: 'Something went wrong!',
                                text: "Try again later :D",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Try again'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                addModal.showModal();
                                }
                            })
                            }
                        }
                    });
            });
        });
    </script>

    <script type="text/javascript">
        const closeEditDialog = document.querySelector("#closeNewT3");
        const closeViewDialog = document.querySelector("#closeNewT2");

        closeViewDialog.addEventListener('click',()=>{
            viewDialog.close();
        })

        closeEditDialog.addEventListener('click',()=>{
            editDialog.close();
        })

        function completed(){
            window.location.replace('finishPage.php');
        }
        function late(){
            window.location.replace('late.php')
        }

        function delete_record(taskID){
            $.ajax({
                type: "GET",
                url: "backend/deleteT.php?delete_id="+taskID,
                dataType: "json",
                success: function(response){
                    Swal.fire(
                    'Good job!',
                    response.message,
                    'success'
                    )
                    get_all_task();
                    today();
                    all();
                    tommorow();
                    week();
                }
            });
        }

        function view_record(taskID){
            $.ajax({
                type: "GET",
                url: "backend/viewT2.php?view_id="+taskID,
                dataType: "json",
                success: function(response){
                    var bangers = response.data.taskID;
                    if(response.data.Status == "Finished"){
                    $("#ID2").text('Task ID: '+response.data.taskID);
                    $("#Title2").val(response.data.taskTitle);
                    $("#Content2").val(response.data.taskContent);
                    $("#Sdate2").val(response.data.startDate);
                    $("#Edate2").val(response.data.endDate);
                    $("#Status2").val(response.data.Status);
                    $("#fTask").text("Undo");
                    $("#fTask").click(function(){
                        $.ajax({
                            type: "GET",
                            url: "backend/undo.php?taskID="+bangers,
                            dataType: "json",
                            success: function(response){
                                viewDialog.close();   
                                Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                                )
                                get_all_task();
                                today();
                                all();
                                tommorow();
                                week();
                            }
                        })
                    });
                    viewDialog.showModal();
                    }else{
                    $("#ID2").text('Task ID: '+response.data.taskID);
                    $("#Title2").val(response.data.taskTitle);
                    $("#Content2").val(response.data.taskContent);
                    $("#Sdate2").val(response.data.startDate);
                    $("#Edate2").val(response.data.endDate);
                    $("#Status2").val(response.data.Status);
                    $("#fTask").text("Finish");
                    $("#fTask").click(function(){
                        $.ajax({
                            type: "GET",
                            url: "backend/finished.php?taskID="+bangers,
                            dataType: "json",
                            success: function(response){
                                viewDialog.close();   
                                Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                                )
                                get_all_task();
                                today();
                                all();
                                tommorow();
                                week();
                            }
                        })
                    });
                    viewDialog.showModal();
                    }
                }
            });
        }
        function edit_record(taskID){
            $.ajax({
                type: "GET",
                url: "backend/editT.php?edit_id="+taskID,
                dataType: "json",
                success: function(response){
                    $("#ID").val(response.data.taskID);
                    $("#Title").val(response.data.taskTitle);
                    $("#Content").val(response.data.taskContent);
                    $("#Sdate").val(response.data.startDate);
                    $("#Edate").val(response.data.endDate);
                    $("#Status").val(response.data.Status);
                    editDialog.showModal();
                    get_all_task();
                    today();
                    all();
                    tommorow();
                    week();
                }
            });
        }
        
        function today(){
            $.ajax({
                type: "GET",
                url: "backend/today.php?token=1",
                dataType: "html",
                success:function(response){
                    $("#today").text(response);
                }
            })
        }
        function tommorow(){
            $.ajax({
                type: "GET",
                url: "backend/tommorow.php?token=1",
                dataType: "html",
                success:function(response){
                    $("#tommorow").text(response);
                }
            })
        }
        function week(){
            $.ajax({
                type: "GET",
                url: "backend/7days.php?token=1",
                dataType: "html",
                success:function(response){
                    $("#week").text(response);
                }
            })
        }
        function all(){
            $.ajax({
                type: "GET",
                url: "backend/allTask.php?token=1",
                dataType: "html",
                success:function(response){
                    $("#all").text(response);
                }
            })
        }

        function get_all_task(){
            $.ajax({
                type: "GET",
                url: "backend/viewT.php?get_task=1",
                dataType: "html",
                success:function(response){
                    $("#tasks_data").html(response);
                }

            })
        }

        today();
        tommorow();
        week()
        all();
        get_all_task();
    </script>
    </dialog>

    
    
</body>
</html>