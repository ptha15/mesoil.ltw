<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Danh sách thể loại</title>
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
                        <a class="btn btn-warning" href="../admin/add_lookbook.php" style="float: right; margin-right: 14px">Thêm thể loại</a>
                    </div>
                </div>
                <?php
                require ('../connect.php');
                $sql = "SELECT * FROM category";
                $ketQuaTruyVan = $conn->query($sql);
                ?>
        <div class="container-fluid">
                <table class="table table-striped table-bordered table-hover table-condensed table-reponsive" style="text-align: center;">                    
                    <tr> 
                        <th>ID</th>                          
                        <th>Tên thể loại</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>                          
                        <th>Thao tác</th>
                    </tr>
                    <?php
                    if($ketQuaTruyVan->num_rows > 0){
                    while($category = $ketQuaTruyVan->fetch_assoc()){                    
                    ?>
                    <tr>                            
                        <td><?php echo $category['category_id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><img src="<?php echo ('../'.$category['image']);?>" alt="" height=60px></td>
                        <td><?php echo $category['description']; ?></td>
                        <td>
                        <a class="btn btn-info" href="edit_lookbook.php?id=<?php echo $category['category_id'];?>">Sửa</a> 
                            <span><a class="btn btn-danger" href="del_lookbook.php?id=<?php echo $category['category_id'];?>">Xóa</a></span>
                        </td>
                    </tr> 
                    <?php  
                    }}
                    else{?>
                    <tr>
                        <td colspan="13" style="color: red">Không có thể loại nào</td>
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