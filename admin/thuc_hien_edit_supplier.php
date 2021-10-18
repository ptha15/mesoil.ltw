<?php
require('../connect.php');
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$sql ="update supplier set name = '". $name . "', email = '" . $email . "', phone = '" . $phone . "',address = '" . $address . "'
        where supplier_id=".$id;
        
if($conn->query($sql)){
    echo"<script>
        alert('Sửa thành công');
        window.location = 'suppliers.php';
        </script>";
}
 else {
    echo"<script>
        alert('Sửa thất bại');
        window.location = 'suppliers.php';
        </script>";
 }   
?>