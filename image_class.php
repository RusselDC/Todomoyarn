<?php
$id = $_COOKIE['userID'];
require 'conn.php';
if(isset($_FILES['image'])){
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    if($error == 0){
        if($img_size > 500000){
            $em = "Sorry, your file is too large";
            $response = array('status'=>FALSE,'message'=>$em);
            echo json_encode($response);
        } else{
           $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
           $img_ex_lc = strtolower($img_ex);
           $allowed_ex = array("jpg","jpeg","png");
           if(in_array($img_ex_lc,$allowed_ex)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = 'profiles/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $sql = "UPDATE users SET img_id = '$new_img_name' WHERE userID='$id'";
                mysqli_query($conn, $sql);
                $response = array(
                    'status' => 'success',
                    'message' => 'The file '.$new_img_name.' has been uploaded.'
                );
                echo json_encode($response);
           }else{
                $em = "You cant upload files of this type";
                $response = array('status'=>'failed','message'=>$em);
                echo json_encode($response);
           }
        }
    }else{
        $em = "unknown error occured";
        $response = array('status'=>FALSE,'message'=>$em);
        echo json_encode($response);
    }

}else{
    $em = "unknown error occured!";
    $response = array('status'=>FALSE,'message'=>$em);
    echo json_encode($response);
}

?>
