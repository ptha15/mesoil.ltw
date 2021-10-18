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

    <title>Mesoil | Hóa đơn bán hàng</title>
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
                </div>
                <?php
                require("../connect.php");
                $sql = "Select `order`.`order_id`, `payment_name`, `payment_email`, `payment_phone`, `total`, `order_status`, `date_added`, `comment`, `customer`.`username` as username FROM `order` join `customer` on `order`.`customer_id` = `customer`.`customer_id`  order by `order_status`,`date_added`";                
                $ketquatruyvan = $conn->query($sql);
                ?>
                <div class="container-fluid">
                    <table class="table table-striped table-bordered table-hover table-condensed table-reponsive" style="text-align: center;">                    
                        <tr>                           
                            <th>Mã hoá đơn</th>
                            <th>Username</th>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng hoá đơn</th>
                            <th>Ngày đặt hàng</th>                            
                            <th>Thao tác</th>
                        </tr>
                        <?php
                        if($ketquatruyvan->num_rows > 0){
                        while($hoadon = $ketquatruyvan->fetch_assoc()){                    
                        ?>
                        <tr>                            
                            <td><?php echo $hoadon['order_id']; ?></td>
                            <td><?php echo $hoadon['username']; ?></td>
                            <td><?php echo $hoadon['payment_name']; ?></td>
                            <td><?php echo $hoadon['payment_email']; ?></td>
                            <td><?php echo $hoadon['payment_phone']; ?></td>
                            <td><?php echo number_format($hoadon['total'], 0, '', ',');?>đ</td>                            
                            <?php if($hoadon['order_status']==1){?>
                            <td>Đã giao hàng</td>
                            <?php } else { ?>
                            <td>Chưa giao hàng</td> <?php } ?>                                                         
                            <td><?php echo date_format(new DateTime($hoadon['date_added']),"d-m-Y"); ?></td>                                                 
                            <td>
                            <span><a class="btn btn-default" href="invoices_detail.php?id=<?php echo $hoadon['order_id']; ?>">Chi tiết</a></span> 
                            <?php if($hoadon['order_status']==0){?>
                            <a class="btn btn-info" href="invoices_done.php?id=<?php echo $hoadon['order_id']; ?>">Đã giao hàng</a>
                            <?php } ?>                            
                            <span><a class="btn btn-danger" href="del_invoices.php?id=<?php echo $hoadon['order_id']; ?>">Xóa</a></span>
                            </td>
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