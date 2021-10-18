<?php
$name= $_POST['name'];
$phone= $_POST['phone'];
$email=$_POST['email'];
$message=$_POST['message'];

require('connect.php'); 

$sql = " INSERT INTO contact(name,phone,email,message) VALUE ('" .$name."','".$phone."','".$email."','".$message."')";

if($conn->query($sql)){
    echo"<script>
        alert('Tin nhắn của bạn đã được gửi tới chúng tôi');
        window.location = 'contact.php';
        </script>";
}
 else {
    echo"<script>
        alert('Không thể gửi tin nhắn');
        window.location = 'contact.php';
        </script>";
 }
?>