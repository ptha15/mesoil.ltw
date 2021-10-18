<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
?>

<?php
$id = $_GET ['id'];
require('../connect.php'); 

$sql = "SELECT * FROM news
        WHERE news_id = ". $id;
$ketQuaTruyVan = $conn->query($sql);
$news = $ketQuaTruyVan->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="author" content="">

    <title>Mesoil | Sửa tin tức</title>
    <link rel="shortcut icon" href="../img/logo.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <!--JS-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--tiny MCE-->
    <script src="https://cdn.tiny.cloud/1/c11dj7l53u0s1bcpvazbgbfswchc4bcx4mfome3jz1kss7ol/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <!-- summernote-->
    <link href="../css/summernote.css" rel="stylesheet">
    <script src="../js/summernote.js"></script>

    <script type="text/javascript">
      function validateForm()
      {
        var name = document.forms["form_them_tt"]["name"].value;
        var content = document.forms["form_them_tt"]["content"].value;
        if(name.trim()=="")
        {
            alert("Bạn chưa nhập tiêu đề ");
            document.forms["form_them_tt"]["name"].focus();
            return false;
        }

        if(content.trim()=="")
        {
            alert("Bạn chưa nhập nội dung");
            document.forms["form_them_tt"]["content"].focus();
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
              <h1 align="center" style="padding-top: 10px">Sửa tin tức</h1>
              <form class="form form-horizontal" method="post" action="thuc_hien_edit_news.php" id="form_them_tt" onsubmit="return(validateForm());" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="control-label col-sm-2">Tiêu đề bài viết </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Tiêu đề" value="<?= $news['name'] ?>">
                      </div>
                  </div>  

                <div class="form-group">
                      <label class="control-label col-sm-2">Ảnh </label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" placeholder="Ảnh" id="image"/>
                      </div>
                </div>
              
                <div class="form-group">
                    <label class="control-label col-sm-2">Nội dung</label>
                    <div class="col-sm-10">
                    <div id="summernote"><p><?php echo $news['content']; ?></p></div>
                      <script>
                      $(document).ready(function() {
                      $('#summernote').summernote({
                        height: 300,                 // set editor height
                        minHeight: null,             // set minimum height of editor
                        maxHeight: null,             // set maximum height of editor
                        focus: true                  // set focus to editable area after initializing summernote
                      });
                      });
                      </script>
                    </div>
                </div> 
                <input type="hidden" name="content" value="" id="content">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" id="id">
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
    <script type="text/javascript">
        function saveButton()
        {
        var markupStr = $('#summernote').summernote('code');
        document.getElementById("content").value = markupStr;
        }
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