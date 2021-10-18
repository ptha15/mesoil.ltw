<?php require('../connect.php');

	$target_dir = "img/product/"; //Thư mục lưu ảnh upload
    $target_file = $target_dir . basename($_FILES["image"]["name"]); //link file ảnh sau khi upload
 
    $result = move_uploaded_file($_FILES["image"]["tmp_name"], "../".$target_file); //upload file ảnh đc chọn từ máy của người đăng ký lên thư mục ảnh của web
    if(!$result) {
        $target_file=NULL;
    }
    if($target_file==NULL){
        $sql = "UPDATE product SET name ='".$_POST['name']."', supplier_id = ".$_POST['supplier_id'].", category_id = ".$_POST['lookbook_id'].", size = '".$_POST['size']."',price = ".$_POST['price'].", color = '".$_POST['color']."', status = '".$_POST['status']."', quantity = ".$_POST['quantity'].", description = '".$_POST['description']."', date_modified = '".date("Y-m-d")."' where product_id = ".$_POST['id'];
    }else{
       $sql = "UPDATE product SET name ='".$_POST['name']."', supplier_id = ".$_POST['supplier_id'].", category_id = ".$_POST['lookbook_id'].", size = '".$_POST['size']."',price = ".$_POST['price'].", color = '".$_POST['color']."', status = '".$_POST['status']."', quantity = ".$_POST['quantity'].", image = '".$target_file."', description = '".$_POST['description']."', date_modified = '".date("Y-m-d")."' where product_id = ".$_POST['id'];
}

		if($conn->query($sql)){
	    echo"<script>
	        alert('Sửa thành công');
	        window.location = 'products.php';
	        </script>";
	}
	 else {
	    
	    echo"<script>
	        alert('Sửa thất bại');
	        window.location = 'products.php';
	        </script>";
	 }


?>