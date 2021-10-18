<?php 
session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1 && $_SESSION['admin']==1)
{
?>

<?php
$id = $_GET ['id'];
require('../connect.php'); 

$sql = "SELECT * FROM user
        WHERE user_id = ". $id;
$ketQuaTruyVan = $conn->query($sql);

if($ketQuaTruyVan->num_rows>0){
    while($u= $ketQuaTruyVan->fetch_assoc()){
        $userName = $u['username'];
        $passWord = $u['password'];
        $name=$u['name'];
        $email=$u['email'];
        $phone=$u['phone'];
        $admin=$u['admin'];
        $birthday=$u['birthday'];
        $dateAdded=$u['date_added'];
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

    <title>Mesoil | Sửa tài khoản quản trị</title>
    <link rel="shortcut icon" href="../img/logo.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <script type="text/javascript">
      function validateForm()
      {
        var username = document.forms["form_them_nv"]["username"].value;
        var password = document.forms["form_them_nv"]["password"].value;
        var name = document.forms["form_them_nv"]["name"].value;
        var email = document.forms["form_them_nv"]["email"].value;
        var phone = document.forms["form_them_nv"]["phone"].value;
        var birthday = document.forms["form_them_nv"]["birthday"].value;
        
        if(username.trim()=="")
        {
            alert("Bạn chưa nhập tên đăng nhập");
            document.forms["form_them_nv"]["username"].focus();
            return false
        }

        if(password.trim()=="")
        {
            alert("Bạn chưa nhập mật khẩu");
            document.forms["form_them_nv"]["password"].focus();
            return false
        }

        if(name.trim()=="")
        {
            alert("Bạn chưa nhập tên");
            document.forms["form_them_nv"]["name"].focus();
            return false
        }

        if(email.trim()=="")
        {
            alert("Bạn chưa nhập email");
            document.forms["form_them_nv"]["email"].focus();
            return false
        }

        if(phone.trim()=="")
        {
            alert("Bạn chưa nhập số điện thoại");
            document.forms["form_them_nv"]["phone"].focus();
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

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">                       
                        <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle" style="margin-bottom: 20px;  margin-left: 14px;">Menu >></a>
                    </div>
                </div>
            <div class="container-fluid">
                <div class="container-fluid">
              <h1 align="center" style="padding-bottom: 20px">Sửa quản trị viên</h1>
              <form class="form form-horizontal" method="post" action="thuc_hien_edit_employees.php" id="form_them_nv" onsubmit="return(validateForm());">
                  <div class="form-group">
                  <label class="control-label col-sm-2">Tên người dùng </label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" id= "username" placeholder="Tên người dùng" value="<?php echo $userName ?>">
                  </div>
                  </div>

                  <div class="form-group">
                  <label class="control-label col-sm-2"> Mật khẩu</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" id= "password" placeholder="Password" value="<?php echo $passWord ?>">
                  </div>
                  </div>

                <div class="form-group">
                <label class="control-label col-sm-2"> Tên </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id= "name" placeholder="Name" value="<?php echo $name ?>">
                </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-2"> Email </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id= "email" placeholder="Email" value="<?php echo $email ?>">
                </div>
                </div>   

                <div class="form-group">
                <label class="control-label col-sm-2"> Điện thoại </label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id= "phone" placeholder="phone" value="<?php echo $phone ?>">
                </div>
                </div> 
                            

                <div class="form-group">
                <label class="control-label col-sm-2">Admin </label>
                <div class="col-sm-10">
                <select class="form-control" name="admin" id="admin">
                <option <?php if($admin==1){?> selected = "selected" <?php } ?> value="1">Quản lý</option>
                <option <?php if($admin==0){?> selected = "selected" <?php } ?> value="0">Nhân viên</option>                     
                </select>                     
                </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-2">Ngày sinh </label>
                <div class="col-sm-10">
                <input type="date" class="form-control" name="birthday" id= "birthday"  placeholder="Birthday" value="<?php echo $birthday ?>">
                </div>
                </div>

                <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">

                <div class="form-group">                    
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
    alert('Bạn cần đăng nhập quyền admin để quản trị');
    window.location = 'index.php';
    </script>";
}
?>