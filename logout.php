<?php


    if(isset($_GET['token'])){
        setcookie('userID',NULL,time()-3600);
        setcookie('userName',NULL,time()-3600);
        setcookie('passWord',NULL,time()-3600);
        header('Location: index.html');
        $response = array('status'=> true, 'message' =>'bye!');
    }
    echo json_encode($response);
    

?>