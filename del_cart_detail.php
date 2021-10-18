<?php 
session_start();
if(isset($_GET['id'])&&isset($_SESSION['login']) && $_SESSION['login']==1&&isset($_GET['key']))
{
	$key=$_GET['key'];
	$id = $_GET['id'];
	$quantity = $_GET['quantity'];
	$name = $_GET['name'];
	$price = $_GET['price'];
	unset($_SESSION['gio_hang']['mat_hang'][$key]);
	$_SESSION['gio_hang']['tong_so'] -= $quantity;
	$_SESSION['gio_hang']['mat_hang'] = array_values($_SESSION['gio_hang']['mat_hang']);
 	echo"<script>
    alert('Xoá thành công');
    window.location = 'cart.php';
    </script>"; 
}
else
{
    echo"<script>
        window.location = 'cart.php';
        </script>";    
}
?>