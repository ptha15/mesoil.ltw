<?php
	require ('../connect.php');

    date_default_timezone_set('Asia/Ho_Chi_Minh');//Đặt đúng múi giờ Việt Nam để lưu đúng thời gian
    
    $target_dir = "img/news/"; //Thư mục lưu ảnh upload
    $target_file = $target_dir . basename($_FILES["image"]["name"]); //link file ảnh sau khi upload
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //lấy ra đuôi của ảnh
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File không phải là ảnh";
            $uploadOk = 0;
        }
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Xin lỗi, chỉ có JPG, JPEG, PNG & GIF files được cho phép";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Xin lỗi, ảnh của bạn không được upload";
    // if everything is ok, try to upload file
    } else {
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "../".$target_file)) { //upload file ảnh đc chọn từ máy của người đăng ký lên thư mục ảnh của web

	$sql = "INSERT INTO news (name,image,description,content,date_added,date_modified) VALUES ('".$_POST['name']."','".$target_file."','".$_POST['description']."','".$_POST['content']."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
	if($conn->query($sql)){
    echo"<script>
        alert('Thêm mới thành công');
        window.location = 'news.php';
        </script>";
}
 else {
    echo"<script>
        alert('Không thể thêm mới được');
        window.location = 'add_news.php';
        </script>";
 }
 } else {
                echo "Xin lỗi, đã xảy ra lỗi khi upload ảnh";
            }
        }
?>