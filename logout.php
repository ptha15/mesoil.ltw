<html>
<head>
    <meta charset="utf-8" />
</head>
<?php
session_start();
if (isset($_SESSION['login'])){
session_destroy();
}

echo "  <script>
        alert('Đăng xuất thành công!');
        window.location = 'index.php';
        </script>";              
?>
</html>