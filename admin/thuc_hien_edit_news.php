<?php require('../connect.php');

date_default_timezone_set('Asia/Ho_Chi_Minh');//Đặt đúng múi giờ Việt Nam để lưu đúng thời gian

	$target_dir = "img/news/"; //Thư mục lưu ảnh upload
    $target_file = $target_dir . basename($_FILES["image"]["name"]); //link file ảnh sau khi upload

    $result = move_uploaded_file($_FILES["image"]["tmp_name"], "../".$target_file); //upload file ảnh đc chọn từ máy của người đăng ký lên thư mục ảnh của web
    if(!$result) {
        $target_file=NULL;
    }
    if($target_file==NULL){

$sql = "UPDATE news SET name ='".$_POST['name']."',content = '".$_POST['content']."', date_modified = '".date("Y-m-d H:i:s")."' where news_id = ".$_POST['id'];
} else {

$sql = "UPDATE news SET name ='".$_POST['name']."', image = '".$target_file."', content = '".$_POST['content']."', date_modified = '".date("Y-m-d H:i:s")."' where news_id = ".$_POST['id'];
}

	if($conn->query($sql)){
    echo"<script>
        alert('Sửa thành công');
        window.location = 'news.php';
        </script>";
}
 else {
    
    echo"<script>
        alert('Sửa thất bại');
        window.location = 'news.php';
        </script>";
 }


?>