<?php
session_start();
require('connect.php');
?>
 <html>
<head>
    <meta charset="utf-8" />
</head>
<?php
$tenNguoiDung = $_POST['ten_dang_nhap'];
$matKhau = md5($_POST['password']);

$sql = "SELECT * FROM `customer`
        WHERE username = '".$tenNguoiDung."'
            AND password = '".$matKhau."'";
$ketQua = $conn->query($sql);
if($ketQua->num_rows > 0){  
    while($nguoiDung = $ketQua->fetch_assoc()){
        
        $_SESSION["login"] = 1;
        $_SESSION["image"] = $nguoiDung["image"];
        $_SESSION["ten_dang_nhap"] = $tenNguoiDung;
        $_SESSION["gio_hang"]["mat_hang"] = array();
        $_SESSION["gio_hang"]["tong_so"] = 0;
        $_SESSION["gio_hang"]["tong_tien"] = 0;
        $_SESSION['customer_id'] = $nguoiDung['customer_id'];
    echo "
            <script>
            alert('Đăng nhập thành công');
            window.location = 'index.php';
            </script>
        ";
    }    
}
else {    
    echo "
        <script>
        alert('Tên đăng nhập hoặc mật khẩu sai');
        window.location = 'login.php';
        </script>
    ";
}
?>
</html>