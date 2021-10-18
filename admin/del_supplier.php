<?php
// Gan bien $id la id get duoc tu URL
$id = $_GET['id'];

// Thuc hien ket noi CSDL
require('../connect.php');
// Viet cau truy van thuc hien xoa ban ghi co id = $id
$sql = "DELETE FROM supplier WHERE supplier_id = " .$id;

// Thuc hien cau truy van
if($conn->query($sql)){
    echo"<script>
        alert('Xoá thành công');
        window.location = 'suppliers.php';
        </script>";
}
 else {
    echo"<script>
        alert('Không thể xoá được');
        window.location = 'suppliers.php';
        </script>";
 }

?>