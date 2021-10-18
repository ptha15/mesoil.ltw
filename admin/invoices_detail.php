<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Chi tiết hóa đơn</title>
    <link rel="shortcut icon" href="../img/logo.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">
        th{text-align: center;}
    </style>
</head>
<body>
	<div id="wrapper">

        <!-- Sidebar -->
        <?php
        	include("simple-sidebar.php");
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">                       
                        <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle" style="margin-bottom: 20px;  margin-left: 14px;">Menu >></a>                        
                    </div>
                    <div class="clearfix"></div>
                </div>
                <h3 align="center">Chi tiết hoá đơn. Mã hoá đơn: <?php echo $_GET['id'] ?></h3>
                <?php
                $id = $_GET['id'];
                require("../connect.php");
                $sql = "Select `order_product`.`order_product_id` as order_product_id, `order_product`.`quantity` as quantity, `order_product`.`price` as price, `total`, `product`.`name` as name from `order_product` join `product` on `order_product`.`product_id` = `product`.`product_id` where `order_id` =".$id;
                                          
                $ketquatruyvan = $conn->query($sql);
                ?>
                <div class="container-fluid">
                    <table class="table table-striped table-bordered table-hover table-condensed table-reponsive" style="text-align: center;">                    
                        <tr>                           
                            <th>Mã chi tiết</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Thành tiền</th>
                        </tr>                    
                    <?php
                    if($ketquatruyvan->num_rows > 0){
                    while($cthoadon = $ketquatruyvan->fetch_assoc()){                    
                    ?>
                        <tr>                            
                            <td><?php echo $cthoadon['order_product_id']; ?></td>
                            <td><?php echo $cthoadon['name']; ?></td>
                            <td><?php echo $cthoadon['quantity']; ?></td>    
                            <td><?php echo number_format($cthoadon['price'], 0, '', ',');?>$</td>                         
                            <td><?php echo number_format($cthoadon['total'], 0, '', ',');?>$</td>                         
                        </tr>    
                    <?php  
                    }}?>
                    </table>

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
<?php    
}else{
    echo 
    "<script>
    alert('Bạn cần đăng nhập để quản trị');
    window.location = 'index.php';
    </script>";
}
?>