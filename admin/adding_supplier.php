<?php
$name= $_POST['name'];
$email= $_POST['email'];
$phone = $_POST['phone'];
$address= $_POST['address'];

require('../connect.php'); 
$sql = " INSERT INTO supplier (name, email, phone, address ) 
            VALUES ('" .$name."','".$email."', '".$phone."','".$address."')";
if($conn->query($sql)){
    echo"<script>
        alert('Thêm mới thành công');
        window.location = 'suppliers.php';
        </script>";
}
 else {
    echo"<script>
        alert('Không thể thêm mới được');
        window.location = 'suppliers.php';
        </script>";
 }

?>