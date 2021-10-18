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

    <title>Mesoil | Thêm nhà cung cấp</title>
    <link rel="shortcut icon" href="../img/logo.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
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
        <?php
        	include("simple-sidebar.php");
        ?>
        <!-- /#sidebar-wrapper -->

       <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">                       
                        <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle" style="margin-bottom: 20px;  margin-left: 14px;">Menu >></a>
                    </div>
                </div>            
            <div class="container-fluid">
              <h1 style="text-align: center;">Thêm nhà cung cấp</h1>
            <form class="form form-horizontal" method="post" action="adding_supplier.php" id="form_them_ncc" onsubmit="return(validateForm())" >
                <div class="form-group">
                    <label class="control-label col-sm-2">Tên nhà cung cấp </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Điện thoại</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Địa chỉ</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                    </div>
                </div>
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