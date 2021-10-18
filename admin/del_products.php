<?php
require('../connect.php');
?>
<?php
// Gan bien $id la id get duoc tu URL
$id = $_GET['id'];
// Viet cau truy van thuc hien xoa ban ghi co id = $id
$sql = "DELETE FROM `product` WHERE product_id = " .$id;

// Thuc hien cau truy van
if($conn->query($sql)){
    echo "<script>
        alert('Xóa thành công');
        window.location = 'products.php';
        </script>";
}
else {
    echo"<script>
        alert('Không xóa được');
        window.location = 'products.php';
        </script>";
}
?>