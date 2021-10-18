<?php 
session_start();
if(isset($_GET['product_id']))
{
  $product_id = $_GET['product_id'];
  require('connect.php');
}
else
header('location: lookbook.php');

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Sản phẩm chi tiết</title>
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Thư viện tạo popup ảnh sản phẩm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.0/jquery.fancybox.min.css" />
    <script src="https://cdn.tiny.cloud/1/c11dj7l53u0s1bcpvazbgbfswchc4bcx4mfome3jz1kss7ol/tinymce/5/tinymce.min.js"></script>


    <style type="text/css">
      .img-shadow img{
      box-shadow: 5px 5px 5px #666;
      -moz-box-shadow: 5px 5px 5px #666;
      -webkit-box-shadow: 5px 5px 5px #666;

      transition: all 1s ease;
      -webkit-transition: all 1s ease;
      -moz-transition: all 1s ease;
      -o-transition: all 1s ease;

    }
    .img-shadow img:hover{
      transform: scale(1.1,1.1);
      -webkit-transform: scale(1.1,1.1);
      -moz-transform: scale(1.1,1.1);
      -o-transform: scale(1.1,1.1);
      -ms-transform: scale(1.1,1.1);
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
      <h1 class="mt-4 mb-3 my-4">Sản phẩm chi tiết</h1>

      <?php
        $sql = "SELECT category.name as category_name,product.name as product_name,product.category_id FROM category JOIN product ON category.category_id=product.category_id WHERE product_id =".$product_id;
        $ketQuaTruyVan = $conn->query($sql);
        if($ketQuaTruyVan->num_rows>0){
        while($mathang = $ketQuaTruyVan->fetch_assoc()){
      ?>

      <ol class="breadcrumb" style="background-color: white; margin-top: 80px; margin-bottom: 50px;">
        <li class="breadcrumb-item">
          <a href="index.php" style="color: black">TRANG CHỦ</a>
        </li>
        <li class="breadcrumb-item">
          <a href="lookbook.php?category_id=<?= $mathang['category_id']?>" style="color: black"><?php echo $mathang['category_name']; ?></a>
        </li>
        <li class="breadcrumb-item active"><?php echo $mathang['product_name']; ?></li>
      </ol>
      <?php }} ?>
      <!-- Intro Content -->
      <div class="row">
        <?php
          $sql = "select * from product where product_id =".$product_id;
          $ketQuaTruyVan = $conn->query($sql);
          if($ketQuaTruyVan->num_rows>0)
          while($mathang = $ketQuaTruyVan->fetch_assoc()){

        ?>
        <div class="col-lg-6 img-shadow">
          <img class="img-fluid mb-4" src="<?php echo $mathang['image'];?>" style="width: 750px; height: 600px; " alt="">
        </div>
        <div class="col-lg-6">
          <h1 style="margin-left: 100px; color: brown;"><?php echo $mathang['name']; ?></h1>
          <hr>
          <h5 style="margin-left: 100px"><?php echo $mathang['size']; ?></h5>
          <hr>
          <h5 style="margin-left: 100px"><?php echo $mathang['color']; ?></h5>
          <hr>
          <?php if ($mathang['status']=='Còn hàng'){ ?>
          <h5 style="margin-left: 100px">CÒN HÀNG</h5>
          <?php }else{ ?>
          <h5 style="margin-left: 100px; color: red;">HẾT HÀNG</h5>
          <?php } ?>
          <hr>
          <h5 style="margin-left: 100px"><?php echo number_format($mathang['price'], 0, '', ',');?>đ</h5>
          <hr>
          <form class="form-inline" method="post" action="add_to_cart.php" id="form_them_gio_hang" style="margin-left: 30px;">
            <input class="form-control" id="so_luong" name="so_luong" placeholder="Số lượng" type="number">
            <input type="hidden" value="<?= $product_id?>" name="mat_hang_id" />
            <input type="hidden" value="<?= $mathang['name']?>" name="ten_mat_hang" />
            <input type="hidden" value="<?= $mathang['price']?>" name="gia_ban" />
            <input type="hidden" value="<?= $mathang['quantity']?>" name="ton_kho" />
            <input type="hidden" value="<?= $mathang['status']?>" name="tinh_trang" />
            <input class="btn button" value="Thêm vào giỏ hàng" type="submit" style="margin-left: 30px;">
          </form>
          <hr>
          <p style="margin-left: 0px"><?php echo $mathang['description']; ?></p>
          <hr>

        </div>

        <?php $category_id=$mathang['category_id']; //truyền category_id của sp trên vào biến $category_id, để dùng lấy danh sách sản phẩm liên quan phía dưới
         } 

        ?>
      </div>
 


      <!-- Team Members -->
      <h2 style="text-align: center; margin-top: 100px;">SẢN PHẨM LIÊN QUAN</h2>

      <div class="row" style="margin-top: 50px">
        <?php
          
          $sql = "SELECT * FROM product WHERE category_id =".$category_id." and product_id !=".$product_id." LIMIT 0,3";
          $ketQuaTruyVan = $conn->query($sql);
          if($ketQuaTruyVan->num_rows>0)
          while($mathang = $ketQuaTruyVan->fetch_assoc()){
        ?>
        <div class="col-lg-4 mb-4">
          <div class="product">           
            <div class="product-body">
              <p class="product-text"><img src="<?php echo $mathang['image'];?>" style="width: 310px;"></p>
            </div>
            <h4 class="product-header"><?php echo $mathang['name']; ?></h4>
            <p class="product-header"><?php echo number_format($mathang['price'], 0, '', '.');?>đ</p>
            <div class="product-footer">
              <a href="product_detail.php?product_id=<?php echo $mathang['product_id'] ?>" class="btn button">Mua ngay</a>
            </div>
          </div>
        </div>
        <?php  
          }
        ?>
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
