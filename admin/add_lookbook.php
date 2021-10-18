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

    <title>Mesoil | Thêm thể loại</title>
    <link rel="shortcut icon" href="../img/logo.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <!--JS-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/c11dj7l53u0s1bcpvazbgbfswchc4bcx4mfome3jz1kss7ol/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script type="text/javascript">
      function validateForm()
      {
        var name = document.forms["form_them_lb"]["name"].value;
        var image = document.forms["form_them_lb"]["image"].value;
        var description = document.forms["form_them_lb"]["description"].value;
        if(name.trim()=="")
        {
            alert("Bạn chưa nhập tên thể loại ");
            document.forms["form_them_lb"]["name"].focus();
            return false;
        }
        
        
        if(image.trim()=="")
        {
            alert("Bạn chưa chọn ảnh");
            document.forms["form_them_lb"]["image"].focus();
            return false;
        }
        if(description.trim()=="")
        {
            alert("Bạn chưa nhập mô tả");
            document.forms["form_them_lb"]["description"].focus();
            return false;
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
              <h1 align="center" style="padding-top: 10px">Thêm thể loại</h1>
              <form class="form form-horizontal" method="post" action="adding_lookbook.php" id="form_them_lb" onsubmit="return(validateForm());" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="control-label col-sm-2">Tên thể loại</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên thể loại">
                      </div>
                  </div>  

                <div class="form-group">
                      <label class="control-label col-sm-2">Ảnh </label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" placeholder="Ảnh" id="image" />
                      </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Mô tả </label>
                    <div class="col-sm-10">
                      <textarea name="description" id="description"></textarea>
                    </div>
                </div> 

                  <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                  <input class="btn btn-warning" type="submit" value="Lưu" onclick="saveButton()" />
                  </div>
                  </div>
              </form>                     
            </div>               
        </div>
    </div>


       </div>
    <!-- /#wrapper -->

   
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