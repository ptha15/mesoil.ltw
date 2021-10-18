<?php session_start();
if(isset($_GET['news_id']))
{$news_id = $_GET['news_id'];
require('connect.php');}
else
header('location: news.php');

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Tin tức chi tiết</title>
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style type="text/css">
      .addnew img:hover{
        opacity: 0.5;
        transition:0.5s;
      }
    </style>
  </head>

  <body>

    <!-- Navigation -->
    <?php include('navigation.php');?>
    <?php include('slide.php');?>


    <!-- Page Content -->
    <div class="container" style="margin-top: 100px">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3" style="text-align: center;">TIN TỨC CHI TIẾT</h1>
      <?php
        $sql="SELECT * FROM news WHERE news_id =".$news_id;
        $ketQuaTruyVan = $conn->query($sql);
        if($ketQuaTruyVan->num_rows>0){
        while($news = $ketQuaTruyVan->fetch_assoc()){
      ?>

      <ol class="breadcrumb" style="margin-top: 50px; background-color: white">
        <li class="breadcrumb-item">
          <a href="index.php" style="color: black">TRANG CHỦ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="news.php" style="color: black">DANH SÁCH TIN TỨC</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $news['name']; ?></li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
          <h1><?php echo $news['name']; ?></h1>
          <!-- Date/Time -->
          <p><i>Được đăng vào lúc: <?php echo date_format(new DateTime($news['date_modified']),"d-m-Y H:i:s"); ?></i></p>

          <hr>
          <?php echo $news['content']; ?>

          <hr>
          <?php }} ?>
          <div class="addnew">
            <h5>Xem thêm:</h5>
            <?php
              $sql="SELECT * FROM news LIMIT 0,3";
              $ketQuaTruyVan = $conn->query($sql);
              if($ketQuaTruyVan->num_rows>0){
              while($news = $ketQuaTruyVan->fetch_assoc()){
            ?>
              <ul><a href="news_detail.php?news_id=<?= $news['news_id'] ?>"><?php echo $news['name'];?></a></ul>
            <?php  
              }}
            ?>
            <a href="https://www.facebook.com/"><img src="img/icon/facebook.png" style="width: 100px;"></a>  
            <a href="https://www.instagram.com/"><img src="img/icon/instagram.png" style="width: 50px"></a>

          </div>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">TIN TỨC KHÁC</h5>
            <div class="card-body">
              <?php
              $sql="SELECT * FROM news LIMIT 0,6";
              $ketQuaTruyVan = $conn->query($sql);
              if($ketQuaTruyVan->num_rows>0)
              while($news = $ketQuaTruyVan->fetch_assoc()){
              ?>
              <!-- Project One -->
              <div class="row addnew">
                <div class="col-md-6">
                  <a href="news_detail.php?news_id=<?php echo $news['news_id'] ?>">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?= $news['image'] ?>" style="width: auto; height: 90px; " alt="">
                  </a>
                </div>
                <div class="col-md-6">
                  <a href="news_detail.php?news_id=<?php echo $news['news_id'] ?>">
                    <p style="font-size: 80%;text-align: left; color: "><?php echo $news['name']?></p>
                  </a>
                </div>
              </div>
              <hr>
              <!-- /.row -->
              <?php  
                }
              ?>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
