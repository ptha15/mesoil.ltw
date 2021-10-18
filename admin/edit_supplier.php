<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
?>
<?php
require('../connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM supplier WHERE supplier_id = ". $id;
$ketQuaTruyVan = $conn->query($sql);

if($ketQuaTruyVan->num_rows>0){
    while($supplier= $ketQuaTruyVan->fetch_assoc()){
        $name = $supplier['name'];
        $email = $supplier['email'];
		$phone = $supplier['phone'];
		$address = $supplier['address'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Sửa nhà cung cấp</title>
    <link rel="shortcut icon" href="../img/logo.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <!--JS-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function validateForm()
      {        
        var name = document.forms["form_them_ncc"]["name"].value;
        var email = document.forms["form_them_ncc"]["email"].value;
        var phone = document.forms["form_them_ncc"]["phone"].value;
        var address = document.forms["form_them_ncc"]["address"].value;       
        

        if(name.trim()=="")
        {
            alert("Bạn chưa nhập tên");
            document.forms["form_them_ncc"]["name"].focus();
            return false
        }

        if(email.trim()=="")
        {
            alert("Bạn chưa nhập email");
            document.forms["form_them_ncc"]["email"].focus();
            return false
        }

        if(phone.trim()=="")
        {
            alert("Bạn chưa nhập điện thoại");
            document.forms["form_them_ncc"]["phone"].focus();
            return false
        }

        if(address.trim()=="")
        {
            alert("Bạn chưa nhập địa chỉ");
            document.forms["form_them_ncc"]["address"].focus();
            return false
        }      
        

      }
    </script>
</head>
<body>
	<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Quản trị website
                    </a>
                </li>
                <li>
                    <a href="../admin/dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a href="../admin/danh_sach_khach_hang.php">Khách Hàng</a>
                </li>
                <li>
                    <a href="../admin/danh_sach_mat_hang.php">Sản phẩm</a>
                </li>
                <li>
                    <a href="../admin/danh_sach_nha_san_xuat.php">Nhà sản xuất</a>
                </li>
                <li>
                    <a href="../admin/danh_sach_nguoi_dung.php">Người dùng</a>
                </li>
                <li>
                    <a href="../admin/danh_sach_ncc.php">Nhà cung cấp</a>
                </li>
                <li>
                    <a href="../admin/danh_sach_hoa_don.php">Hoá đơn bán</a>
                </li>
                <li>
                    <a href="../admin/dang_xuat.php">Đăng xuất</a>
                </li>
            </ul>
        </div>


       <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">                       
                        <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle" style="margin-bottom: 20px;  margin-left: 14px;">Menu >></a>
                    </div>
                    <div class="clearfix"></div>
                </div>            
            <div class="container-fluid">
              <h1 style="text-align: center;">Sửa nhà cung cấp</h1>
            <form class="form form-horizontal" method="post" action="thuc_hien_edit_supplier.php" id="form_them_ncc" onsubmit="return(validateForm())" >
                <div class="form-group">
                    <label class="control-label col-sm-2">Tên nhà cung cấp </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Điện thoại</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Địa chỉ</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo $address ?>">
                    </div>
                </div>
                <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                    <input class="btn btn-warning" type="submit" value="Lưu" />
                    </div>
                </div>
            </form>
        </div>               
        </div>
    </div>


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