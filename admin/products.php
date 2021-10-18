<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
    if(isset($_GET['product_name']))
    $mcd = "  where product.name like '%".$_GET['product_name']."%'";
    else
    $mcd ='where 1=1';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Danh sách sản phẩm</title>
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
                        <a class="btn btn-warning" href="../admin/add_products.php" style="float: right; margin-right: 14px">Thêm sản phẩm</a>
                    </div>
                </div>
                <div class="row">
                    <form class="form form-horizontal" method="get" action="#" id="dkien">                            
                    <div class="form-group">
                    	<label class="control-label col-sm-3 col-sm-offset-2">Tên sản phẩm</label>
                    	<div class="col-sm-3">
                    		<input type="text" class="form-control" name="product_name" id= "product_name">      
                		</div>
                    	<div class="col-sm-3">
                    		<input class="btn btn-warning" type="submit" value="Xem">
                    	</div>
                    </div>                          
                    </form>
                </div>
                <?php
                require("../connect.php");
                $sql = "SELECT product.product_id, product.name as product_name, size, price, color, status, quantity, product.image as image, product.description as description, date_added, date_modified, category.name as category_name, supplier.name as supplier_name from product join supplier on product.supplier_id = supplier.supplier_id join category on product.category_id = category.category_id ".$mcd." order by date_added desc";                             
                $ketquatruyvan = $conn->query($sql);
                ?>
                <div class="container-fluid">
                    <table class="table table-striped table-bordered table-hover table-condensed table-reponsive" style="text-align: center;">                    
                        <tr>                           
                            <th>Tên sản phẩm</th>
                            <th>Nhà cung cấp</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th>Màu</th>
                            <th>Thể loại</th>
                            <th>Tình trạng</th>
                            <th>Số lượng</th>
                            <th>Ảnh</th>                           
                            <th>Ngày thêm</th>
                            <th>Ngày sửa</th>
                            <th>Thao tác</th>
                        </tr>
                    
                        
                    <?php
                    if($ketquatruyvan->num_rows > 0){
                    while($mathang = $ketquatruyvan->fetch_assoc()){                    
                    ?>
                        <tr>                            
                            <td><?php echo $mathang['product_name']; ?></td>
                            <td><?php echo $mathang['supplier_name']; ?></td>
                            <td><?php echo $mathang['size']; ?></td>
                            <td><?php echo number_format($mathang['price'], 0, '', ',');?>đ</td>
                            <td><?php echo $mathang['color']; ?></td>
                            <td><?php echo $mathang['category_name']; ?></td>
                            <td><?php echo $mathang['status']; ?></td>
                            <td><?php echo $mathang['quantity']; ?></td>
                            <td><img src="<?php echo ('../'.$mathang['image']);?>" alt="" height=60px></td>                         
                            <td><?php echo date_format(new DateTime($mathang['date_added']),"d-m-Y"); ?></td>
                            <td><?php echo date_format(new DateTime($mathang['date_modified']),"d-m-Y"); ?></td>

                            
                            <td>
                            <a class="btn btn-info" href="edit_products.php?id=<?php echo $mathang['product_id'];?>">Sửa</a> 
                            <span><a class="btn btn-danger" href="del_products.php?id=<?php echo $mathang['product_id'];?>">Xóa</a></span>
                            </td>
                        </tr>    
                    <?php  
                    }}
                    else{?>
                    <tr>
                        <td colspan="13" style="color: red">Không có sản phẩm nào</td>
                    </tr>
                    <?php } ?>
                    
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