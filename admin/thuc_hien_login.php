<?php
session_start();
require('../connect.php');
?>
<html>
<head>
	<meta charset="utf-8" />
</head>

<?php
$tenNguoiDung = $_POST['ten_dang_nhap'];
$matKhau = ($_POST['password']);
$sql = "SELECT * FROM `user`
        WHERE username = '".$tenNguoiDung."'
            AND password = '".$matKhau."'";
$ketQua = $conn->query($sql);
if($ketQua->num_rows > 0){  
    while($nguoiDung = $ketQua->fetch_assoc()){
        
        $_SESSION["login_user"] = 1;
        $_SESSION["admin"] = $nguoiDung['admin'];
        $_SESSION["ten_dang_nhap_user"] = $tenNguoiDung;
    echo "
            <script>
            alert('Login Successfully');
            window.location = 'dashboard.php';
            </script>
        ";
    }    
}
else {    
    echo "
        <script>
        alert('Your username or password is incorrect');
        window.location = 'index.php';
        </script>
    ";
}
?>

</html>