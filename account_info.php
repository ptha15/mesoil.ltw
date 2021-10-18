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

    <title>Mesoil | Thông tin tài khoản</title>
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script>
      function validateForm() {
        var x1 = document.forms["form-dang-ky"]["name"].value;
        if (x1 == "") {
            alert("Hãy nhập tên của bạn");
            document.forms["form-dang-ky"]["name"].focus();
            return false;
        }
        var x2 = document.forms["form-dang-ky"]["username"].value;
        if (x2 == "") {
            alert("Hãy nhập tên tài khoản");
            document.forms["form-dang-ky"]["username"].focus();
            return false;
        }
        
        var x3 = document.forms["form-dang-ky"]["email"].value;
        if (x3 == "") {
            alert("Hãy nhập email");
            document.forms["form-dang-ky"]["email"].focus();
            return false;
        }
        var x4 = document.forms["form-dang-ky"]["password"].value;
        if (x4 == "" || x4.length < 6) {
            alert("Hãy nhập đúng mật khẩu");
            document.forms["form-dang-ky"]["password"].value='';
            document.forms["form-dang-ky"]["nhap_lai_mat_khau"].value='';
            document.forms["form-dang-ky"]["password"].focus();
            return false;
        }
        var x5 = document.forms["form-dang-ky"]["nhap_lai_mat_khau"].value;
        if (x5 != x4) {
            alert("Hãy nhập đúng xác nhận mật khẩu");
            document.forms["form-dang-ky"]["password"].value='';
            document.forms["form-dang-ky"]["nhap_lai_mat_khau"].value='';
            document.forms["form-dang-ky"]["nhap_lai_mat_khau"].focus();
            return false;
        }     
        var x6 = document.forms["form-dang-ky"]["birthday"].value;
        if (x6 == "") {
            alert("Hãy nhập ngày sinh của bạn");
            document.forms["form-dang-ky"]["birthday"].focus();
            return false;
        }    
         var x7 = document.forms["form-dang-ky"]["phone"].value;
        if (x7 == "") {
            alert("Hãy nhập số điện thoại của bạn");
            document.forms["form-dang-ky"]["phone"].focus();
            return false;
        }
      
      }
    </script>
</head>
<body>
	<!-- Navigation -->
    <?php include("navigation.php");?>
    <?php
      require('connect.php');
      $sql = "SELECT * FROM customer WHere customer_id = ".$_SESSION['customer_id'];
      $ketQuaTruyVan = $conn->query($sql);
      if ($ketQuaTruyVan->num_rows>0) 
                  {
                      $i = 0;
                      while ($KH = $ketQuaTruyVan->fetch_assoc())
                      {
    ?>
	<!--Container-->
         <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">                
                    <form id="form-dang-ky" class="form-horizontal" action="thuc_hien_edit_customer.php" method="post" onsubmit="return(validateForm());" style="margin-top: 70px;" enctype="multipart/form-data">
                      <fieldset>
                        <div id="legend">
                          <legend  style="text-align: center; font-weight: bold; font-size: 200%;">SỬA THÔNG TIN TÀI KHOẢN</legend>
                        </div>
                        <hr>
                        <div class="control-group">
                           <!-- Name -->
                         <label class="control-label" for="name">Tên</label>
                          <div class="controls">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" disabled value="<?php echo $KH['name']; ?>">
                            
                          </div>
                        </div>  
                        <div class="control-group">
                        <!-- Ngày sinh-->
                         <label class="control-label" for="birthday">Ngày sinh</label>
                          <div class="controls">
                            <input type="date" id="birthday" name="birthday" placeholder="Birthday" class="form-control" disabled value="<?php echo $KH['birthday']; ?>">
                           
                          </div>
                        </div>  
                        <div class="control-group">
                        <!-- Phone-->
                         <label class="control-label" for="phone">Số điện thoại</label>
                          <div class="controls">
                            <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control" value="<?php echo $KH['phone']; ?>">
                         
                          </div>
                        </div>  
                        <div class="control-group">
                         <!-- E-mail -->
                          <label class="control-label" for="email">Email</label>
                          <div class="controls">
                            <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $KH['email']; ?>">
                          
                          </div>
                        </div>
                        <div class="control-group">
                          <!-- Username -->
                          <label class="control-label" for="username">Tên tài khoản</label>
                          <div class="controls">
                            <input type="text" id="username" name="username" placeholder="Username" class="form-control" disabled value="<?php echo $KH['username']; ?>">                          
                          </div>
                        </div>
                     
                        <div class="control-group">  
                      
                         <!-- Password-->
                          <label class="control-label" for="password">Mật khẩu</label>
                          <div class="controls">
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control" >
                            <p class="help-block">Mật khẩu của bạn cần lớn hơn hoặc bằng 6 kí tự</p>
                          </div>
                        </div>
                     
                        <div class="control-group">
                          <!-- nhập lại mật khẩu -->
                          <label class="control-label" for="password_confirm">Xác nhận mật khẩu</label>
                          <div class="controls">
                            <input type="password" id="nhap_lai_mat_khau" name="nhap_lai_mat_khau" placeholder="Confirm password" class="form-control" >
                          
                          </div>
                        </div>

                        <div class="control-group">
                          <!-- nhập lại mật khẩu -->
                          <label class="control-label" for="image">Thêm ảnh đại diện</label>
                          <div class="controls">
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"/>
                          
                          </div>
                        </div>
                        <div class="control-group">
                          <!-- Button -->
                          <hr>
                          <div class="controls" style="text-align: center;">
                            <input class="btn button"  style="width: 200px"  value="Lưu thông tin" type="submit" />
                          </div>
                        </div>
                      </fieldset>
                    </form>
                    <?php }} ?>
                </div>
                <div class="col-sm-3"></div>
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
    alert('Bạn cần đăng nhập');
    window.location = 'login.php';
    </script>";
}
?>