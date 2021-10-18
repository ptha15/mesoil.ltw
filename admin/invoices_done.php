<?php
require('../connect.php');
?>
<?php
// Gan bien $id la id get duoc tu URL
$id = $_GET['id'];
// Viet cau truy van thuc hien xoa ban ghi co id = $id
$sql = "UPDATE `order` SET `order_status` = '1' WHERE order_id = " .$id;

// Thuc hien cau truy van
if($conn->query($sql)){
    echo "<script>
        alert('Cập nhật thành công');
        window.location = 'invoices.php';
        </script>";
}
else {
    echo"<script>
        alert('Không cập nhật được');
        window.location = 'invoices.php';
        </script>";
}
?>