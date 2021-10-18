<?php
$userName= $_POST['username'];
$passWord= $_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$admin=$_POST['admin'];
$birthday=$_POST['birthday'];
require('../connect.php'); 

$sql = " INSERT INTO `user`(`username`, `password`,`name`,`email`,`phone`, `admin`, `birthday`,`date_added`)
VALUE ('" .$userName."','".$passWord."','".$name."','".$email."','".$phone."',".$admin.",'".$birthday."','".date("Y-m-d")."')";

if($conn->query($sql)){
    echo"<script>
        alert('Thêm mới thành công');
        window.location = 'employees.php';
        </script>";
}
 else {
    echo"<script>
        alert('Không thể thêm mới được');
        window.location = 'employees.php';
        </script>";
 }
?>