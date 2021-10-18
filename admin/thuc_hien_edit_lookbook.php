<?php
$id = $_POST['id'];
$name= $_POST['name'];
$description=$_POST['description'];

require('../connect.php'); 

	$target_dir = "img/lookbook/"; //Thư mục lưu ảnh upload
    $target_file = $target_dir . basename($_FILES["image"]["name"]); //link file ảnh sau khi upload

    $result = move_uploaded_file($_FILES["image"]["tmp_name"], "../".$target_file); //upload file ảnh đc chọn từ máy của người đăng ký lên thư mục ảnh của web
    if(!$result) {
        $target_file=NULL;
    }
    if($target_file==NULL){
		$sql ="update `category` set `name`='". $name . "',`description`='".$description."' where `category_id`=".$id;
} else {  
$sql ="update `category` set `name`='". $name . "',`description`='".$description."', `image`='".$target_file."' where `category_id`=".$id;
}

	if($conn->query($sql)){
    echo"<script>
        alert('Sửa thành công');
        window.location = 'lookbook.php';
        </script>";
}
 else {
    echo"<script>
        alert('Sửa thất bại');
        window.location = 'lookbook.php';
        </script>";
 }   
	


?>