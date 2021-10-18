<?php 
session_start();
?>
<html>
<head>
    <meta charset="utf-8" />
</head>
<?php
require("connect.php");

    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $matKhau = md5($_POST['password']);

    $target_dir = "img/ava/"; //Thư mục lưu ảnh upload
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //link file ảnh sau khi upload
    
    $result = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file); //upload file ảnh đc chọn từ máy của người đăng ký lên thư mục ảnh của web
    if(!$result) {
        $target_file=NULL;
    }
    if($target_file==NULL){

        $sql = "UPDATE `customer` SET `phone` = ".$phone.", `email` = '".$email."', `password` = '".$matKhau."' Where `customer_id` = ".$_SESSION['customer_id'];
    }else{
        $sql = "UPDATE `customer` SET `phone` = ".$phone.", `email` = '".$email."', `password` = '".$matKhau."',`image`='".$target_file."' Where `customer_id` = ".$_SESSION['customer_id'];


    }

if($conn->query($sql)){    
    echo "
        <script>
        alert('Thông tin của bạn đã được sửa');
        window.location = 'account_info.php';
        </script>
    ";
    $sql = "SELECT image FROM `customer` WHERE customer_id=".$_SESSION['customer_id'];
    $ketQuaTruyVan = $conn->query($sql);
    $avatar = $ketQuaTruyVan->fetch_assoc();
    $_SESSION["image"] = $avatar["image"];
}
else {
    echo "
        <script>
        alert('Không thành công');
        window.location = 'account_info.php';
        </script>
    ";
}
?>
</html>