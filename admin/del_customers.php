<?php
// Gan bien $id la id get duoc tu URL
$id = $_GET['id'];
// Thuc hien ket noi CSDL
require("../connect.php");
// Viet cau truy van thuc hien xoa ban ghi co id = $id
$sql = "DELETE FROM `customer` WHERE customer_id = ".$id;
// Thuc hien cau truy van

if($conn->query($sql)){
    echo "<script>
        alert('Xóa thành công');
        window.location = 'customers.php';
        </script>";
}
else {
    echo"<script>
        alert('Không xóa được');
        window.location = 'customers.php';
        </script>";
}
?>