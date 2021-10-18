<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Essential oil</title>
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
      .addnew a:hover{
        transition:0.5s;
      }
    </style>
  </head>

  <body>

    <!-- Navigation -->
    <?php 
      include("navigation.php");
    ?>
    <!--Slider-->
    <?php 
      include("slide.php");
    ?>

    <!-- Page Content -->
    <div class="container" style="margin-top: 100px;">

      <h2 class="list-header">Mesoil</h2>

      <!-- Marketing Icons Section -->
      <div class="row" style="margin-top: 80px">
        <?php
        //Kết nối CSDL
          require("connect.php");
          $sql = "SELECT * FROM news ORDER BY news_id DESC LIMIT 0,3";
          $ketQuaTruyVan = $conn->query($sql);   
          if($ketQuaTruyVan->num_rows > 0){
          while($news = $ketQuaTruyVan->fetch_assoc()){
        ?>
        <div class="col-lg-4 mb-4">
          <div class="product">           
            <div class="product-body">
              <p class="product-text"><img src="<?php echo $news['image'];?>" style="width: 310px; height: 310px;"></p>
            </div>
            <h4 class="product-header" style="text-align: center;"><?php echo $news['name'];?></h4>
            <div class="product-footer" style="text-align: center;">
              <a href="news_detail.php?news_id=<?= $news['news_id'] ?>" class="btn button">Xem thêm</a>
            </div>
          </div>
        </div>
        <?php  
          }}
        ?>
      </div>
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2 class="list-header">SẢN PHẨM</h2>
      <div class="row lookbook-area">
        <?php   
          
          $sql = "SELECT * FROM category";
          $ketQuaTruyVan = $conn->query($sql);   
          if($ketQuaTruyVan->num_rows > 0){
          while($category = $ketQuaTruyVan->fetch_assoc()){
        ?>
        <div class=" col-sm-6 portfolio-item" style="padding-top: 30px;">
          <div class="card h-100 addnew">
            <a href="lookbook.php?category_id=<?= $category['category_id'] ?>"><img class="card-img-top" src="<?php echo $category['image'];?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="lookbook.php?category_id=<?= $category['category_id'] ?>"><?php echo $category['name']; ?></a>
              </h4>
              <p class="card-text"><?php echo $category['description']; ?></p>
            </div>
          </div>
        </div>
        <?php  
          }}
        ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
     <?php 
      include("footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  </body>

</html>
