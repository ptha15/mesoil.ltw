<?php
// Gan bien $id la id get duoc tu URL
$id = $_GET['id'];

// Thuc hien ket noi CSDL
require("../connect.php");
// Viet cau truy van thuc hien xoa ban ghi co id = $id
$sql = "DELETE FROM `contact` WHERE contact_id = " .$id;

// Thuc hien cau truy van
if($conn->query($sql)){
    echo "<script>
        alert('Xóa thành công');
        window.location = 'contact.php';
        </script>";
}
else {
    echo"<script>
        alert('Không xóa được');
        window.location = 'contact.php';
        </script>";
}
?>