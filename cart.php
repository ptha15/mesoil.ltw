<?php session_start();
if(isset($_SESSION['login']) && $_SESSION['login']==1)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Giỏ hàng</title>
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <script type="text/javascript">
      function validateForm()
      {
        var name = document.forms["form_thanh_toan"]["payment_name"].value;
        var phone = document.forms["form_thanh_toan"]["payment_phone"].value;
        var address = document.forms["form_thanh_toan"]["payment_address"].value;      
        
        if(name.trim()=="")
        {
            alert("Nhập tên thanh toán");
            document.forms["form_thanh_toan"]["payment_name"].focus();
            return false;
        }

        if(phone.trim()=="")
        {
            alert("Nhập tên của bạn");
            document.forms["form_thanh_toan"]["payment_phone"].focus();
            return false;
        }

        if(address.trim()=="")
        {
            alert("Nhập địa chỉ của bạn");
            document.forms["form_thanh_toan"]["payment_address"].focus();
            return false;
        }
        
      }
    </script>
</head>
<body>
	<!-- Navigation -->
    <?php include('navigation.php');?>

    <!--Code-Bắt đầu-->
<div class="container">
    <div class="row">    
    	<div class="col-sm-12"><h1 style="margin-top:50px;margin-bottom: 20px;text-align: center;">Giỏ hàng</h1></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">            
            <table class="table table-striped" style="margin-bottom: 50px;">
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                    <th>Xóa</th>
                </tr>
                <?php
                if(isset($_SESSION['gio_hang']) && $_SESSION['gio_hang']['tong_so'] > 0){
                    $i=1;
                    $tongTien=0;
                    foreach($_SESSION['gio_hang']['mat_hang'] as $matHang){
                        $thanhTien = $matHang['so_luong'] * $matHang['gia_ban'];
                        $tongTien += $thanhTien;
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td><a href="product_detail.php?product_id=<?=$matHang['id']?>"><?=$matHang['ten_mat_hang']?></a></td>
                    <td><?=$matHang['gia_ban']?>đ</td>
                    <td><?=$matHang['so_luong']?></td>
                    <td><?=$thanhTien?>đ</td>
                    <td><a class="btn btn-danger" href="del_cart_detail.php?id=<?php echo $matHang['id'];?>&name=<?php echo $matHang['ten_mat_hang'];?>&quantity=<?php echo $matHang['so_luong'];?>&price=<?php echo $matHang['gia_ban'];?>&key=<?php echo($i-1)?>">Xóa</a></td>                                
                </tr>
                <?php
                    $i++; 
                    }
                    $_SESSION['gio_hang']['tong_tien']=$tongTien;
                ?>
                <tr>
                    <td colspan="6" class="text-center">
                        Total: <strong class="text-primary"><?=$tongTien?>đ</strong>
                    </td>
                </tr>
                <?php   
                }
                else{
                ?>
                <tr>
                    <td colspan="6" style="color: red; font-size: 20px; text-align: center;">Không có sản phẩm nào trong giỏ hàng</td>
                </tr>
                <?php
                }
                ?>
            </table>

        <!--Nếu số hàng trong giỏ >0 thì mới hiện form dưới-->
        <?php  if(isset($_SESSION['gio_hang']) && $_SESSION['gio_hang']['tong_so'] > 0){ ?>
        <div class="container-fluid">
              <h1 align="center" style="margin-bottom: 20px">Thông tin đặt hàng</h1>
              <form class="form form-horizontal" method="post" action="payment.php" id="form_thanh_toan" onsubmit="return(validateForm());">
				<div class="form-group">
				<label class="control-label col-sm-3">Tên thanh toán</label>
				<div class="col-sm-12">
				<input type="text" class="form-control" name="payment_name" id= "payment_name" placeholder="Payment Name">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-3">Số điện thoại</label>
				<div class="col-sm-12">
				<input type="text" class="form-control" name="payment_phone" id= "payment_phone" placeholder="Payment Phone">
				</div>
				</div>
				
				<div class="form-group">
				<label class="control-label col-sm-3">Địa chỉ </label>
				<div class="col-sm-12">
				<input type="text" class="form-control" name="payment_address" id= "payment_address" placeholder="Address">
				</div>
				</div>  



				<div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-12">
                <input class="btn button" type="submit" value="Thanh toán" />
                </div>
                </div>         
            </form>
            </div>
            <?php } ?>
        </div>             
        <div class="col-sm-2"></div>
    </div>          
</div>

<!-- Footer -->
<?php include('footer.php');?>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php    
}else{
    echo 
    "<script>
    alert('Bạn cần đăng nhập để mua hàng');
    window.location = 'login.php';
    </script>";
}
?>