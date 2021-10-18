<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
  echo 
    "<script>   
    window.location = 'dashboard.php';
    </script>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mesoil | Đăng nhập quản trị</title>
    <link rel="shortcut icon" href="../img/logo.jpg">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script>
	  function validateForm() {
	    var x1 = document.forms["form-dang-nhap"]["ten_dang_nhap"].value;
	    if (x1 == "") {
	        alert("Enter your username");
	        document.forms["form-dang-nhap"]["ten_dang_nhap"].focus();
	        return false;
	    }
	    
	    var x2 = document.forms["form-dang-nhap"]["password"].value;
	    if (x2 == "" || x2.length < 4) {
	        alert("Your password is invalid");
	        document.forms["form-dang-nhap"]["password"].focus();
	        return false;
	    }                  
	  }
  </script>
</head>
<body>
<!--Container-->
  <div class="container" style="padding-top: 100px;">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" id="frmdangnhap">                
                    <form id="form-dang-nhap" class="form-horizontal" method="post" action="thuc_hien_login.php" onSubmit="return(validateForm());">
                      <fieldset>
                        
                          <legend class="" style="text-align: center;">Đăng nhập</legend>
                      
                        <div class="control-group">
                         <!-- Username -->
                          <label class="control-label" for="ten_dang_nhap">Tài khoản</label>
                          <div class="controls">
                            <input type="text" id="username" name="ten_dang_nhap" placeholder="Nhập tên tài khoản" class="form-control">                            
                          </div>
                        </div>
                     
                        <div class="control-group">
                          <!-- Password-->
                          <label class="control-label" for="password">Mật khẩu</label>
                          <div class="controls">
                            <input type="password" id="Password" name="password" placeholder="Nhập mật khẩu" class="form-control">                            
                          </div>
                        </div><br />
                     
                        <div class="control-group">
                          <!-- Button -->
                          <div class="controls" style="text-align: center; ">
                            <input class="btn btn-warning" value="Đăng nhập" type="submit" style="width: 200px" />
                          </div>
                        </div>
                      </fieldset>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
</div>
	<!--Container-->
</body>
</html>
<?php } ?>