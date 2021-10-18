
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Đăng nhập</title>
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script>
	  function validateForm() {
	    var x1 = document.forms["form-dang-nhap"]["ten_dang_nhap"].value;
	    if (x1 == "") {
	        alert("Hãy nhập tên đăng nhập");
	        document.forms["form-dang-nhap"]["ten_dang_nhap"].focus();
	        return false;
	    }
	    
	    var x2 = document.forms["form-dang-nhap"]["password"].value;
	    if (x2 == "" || x2.length < 4) {
	        alert("Mật khẩu không chính xác");
	        document.forms["form-dang-nhap"]["password"].focus();
	        return false;
	    }	                    
	  }
  </script>
</head>
<body>
	<!-- Navigation -->
    <?php include("navigation.php");?>
    <!--Container-->
  <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" id="frmdangnhap" style="margin-top: 70px;">                
                    <form id="form-dang-nhap" class="form-horizontal" action="thuc_hien_login.php" method="post" onSubmit="return(validateForm());">
                      <fieldset>
                        <div id="legend">
                          <legend class="" style="font-weight: bold; font-size: 200%;text-align: center;">Đăng nhập</legend>
                        </div>
                        <div class="control-group">
                         <!-- Username -->
                          <label class="control-label" for="ten_dang_nhap">Tên đăng nhập</label>
                          <div class="controls">
                            <input type="text" id="username" name="ten_dang_nhap" placeholder="Enter your Username" class="form-control">                            
                          </div>
                        </div>
                     
                        <div class="control-group">
                          <!-- Password-->
                          <label class="control-label" for="password">Mật khẩu</label>
                          <div class="controls">
                            <input type="password" id="Password" name="password" placeholder="Enter your Password" class="form-control">                            
                          </div>
                        </div><br />
                     
                        <div class="control-group">
                          <!-- Button -->
                          <div class="controls" style="text-align: center; ">
                            <input class="btn button" value="Đăng nhập" type="submit" style="width: 200px" />
                          </div>
                        </div>
                      </fieldset>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
	</div>
	<!-- Footer -->
    <?php include('footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>