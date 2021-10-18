<?php
$id = $_POST['id'];
$userName= $_POST['username'];
$passWord= $_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$admin=$_POST['admin'];
$birthday=$_POST['birthday'];


require('../connect.php'); 

$sql ="update `user` set `username`='". $userName . "',`password`='" . $passWord ."',`phone`='".$phone. 
 "',`name`='".$name."',`email`='".$email."',`admin`='".$admin."',`birthday`='".$birthday."'
        where `user_id`=".$id;
 
if($conn->query($sql)){
    echo"<script>
        alert('Sửa thành công');
        window.location = 'employees.php';
        </script>";
}
 else {
    echo"<script>
        alert('Sửa thất bại');
        window.location = 'employees.php';
        </script>";
 }   

?>