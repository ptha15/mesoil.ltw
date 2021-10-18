<?php
require('../connect.php');
?>
<?php
// Gan bien $id la id get duoc tu URL
$id = $_GET['id'];
// Viet cau truy van thuc hien xoa ban ghi co id = $id
$sql1 = "DELETE FROM `order` WHERE order_id = " .$id;
$sql2 = "DELETE FROM `order_product` WHERE order_id = " .$id;

// Thuc hien cau truy van
if($conn->query($sql1) && $conn->query($sql2)){
    echo "<script>
        alert('Xóa thành công');
        window.location = 'invoices.php';
        </script>";
}
else {
    echo"<script>
        alert('Không xóa được');
        window.location = 'invoices.php';
        </script>";
}
?>