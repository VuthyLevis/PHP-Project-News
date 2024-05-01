<?php
include 'connection.php';
function getuser(){
    global $connection;
    if(isset($_POST['btn_register'])){
        $username  = $_POST['username'];
        $email     = $_POST['email'];
        $password  = md5($_POST['password']);
        $gender    = $_POST['gender'];
        $image     = $_FILES['profile']['name'];
         if(!empty($username) && !empty($email) && !empty($password) && !empty($gender) && !empty($image)){
            $thumbnail = date('Y-m-d_H-i-s').'-'.$image;
            uploadimage($thumbnail);
            $sql = "INSERT INTO `db_news` (`id`,`username`, `email`, `passowrd`, `gender`, `image`) 
            VALUES(null,'$username','$email','$password','$gender','$thumbnail')
            "; 
            $result = $connection->query($sql);
            if($result){
                header('location:login.php');
                
         }
    }
  }
}
getuser();
function uploadimage($picture){
    $path = "assets/image/".$picture;
    move_uploaded_file($_FILES['profile']['tmp_name'], $path);
}
?>