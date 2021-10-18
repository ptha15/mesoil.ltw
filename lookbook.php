<?php 
session_start();
require("connect.php");
if(isset($_GET['category_id']))
$category_id = 'category_id ='.$_GET['category_id'];
else
$category_id = '1=1';

if(isset($_GET['order']))
{
  if($_GET['order']==1)
  {
    $od = ' name asc ';
  }
  else if ($_GET['order']==2)
  {
    $od = ' price asc ';
  }
  else if ($_GET['order']==3)
  {
    $od = ' price desc ';
  }
}
else
$od = 'category_id';

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Tinh dầu</title>
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/jquery.min.js"></script>

  </head>

  <body>

    <!-- Navigation -->
    <?php include('navigation.php');?>
    <?php include('slide.php');?>
   
    
<!-- Page Content -->
    <div class="container" style="margin-top: 100px;">
      <?php
        $sql = "SELECT * FROM category WHERE category_id =".$_GET['category_id'];
        $ketQuaTruyVan = $conn->query($sql);
              if($ketQuaTruyVan->num_rows>0){
              while($category = $ketQuaTruyVan->fetch_assoc()){
      ?>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3 my-4" ><?php echo $category['name']; ?></h1>

      <ol class="breadcrumb" style="margin-top: 80px; background-color: white">
        <li class="breadcrumb-item menu">
          <a href="index.php" style="color: black" >TRANG CHỦ</a>
        </li>
        <li class="breadcrumb-item active" ><?php echo $category['name']; ?></li>
      </ol>
      <?php
        }}
      ?>
      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4 ">
          <div class="list-group ">
            <?php
              
              $sql = "SELECT * FROM category";
              $ketQuaTruyVan = $conn->query($sql);
              if($ketQuaTruyVan->num_rows > 0){
              while($category = $ketQuaTruyVan->fetch_assoc()){
            ?>
            <a href="lookbook.php?category_id=<?= $category['category_id']?>" class="list-group-item button"><?php echo $category['name']; ?></a>
            <?php  
              }}
            ?>
          </div>
          
        </div>
        <?php 
          
          $size = 10; 
          $sql1 = 'select count(*) as total from product where '.$category_id;
          $total_table  = $conn->query($sql1);
          $_numrow = $total_table->fetch_assoc();
          $numrow = $_numrow['total'];
          $totalPages = ceil($numrow/$size);
          $page = isset($_GET["page"]) ? $_GET["page"] : 1;
          $page = max(1, $page);  //nếu số trang nhận được nhỏ hơn 1 thì cho là trang 1
          $page = min($totalPages, $page); //nếu số trang nhận được lớn hơn Tongsotrang thì cho là trang cuoi cung (la $tongsotrang)  
          //Bước 5: Tính vị trí dòng bắt đầu lấy dữ liệu từ đó
          if($page>0)
          $startrow = ($page-1)*$size;
          else
          $startrow = 0;
          $sql = 'select * from product where '.$category_id.' order by '.$od.' LIMIT '.$startrow.','.$size;
          $ketQuaTraVe = $conn->query($sql);
        ?>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
           <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-12">
        <form class="form-inline" method="get" action="#" id="form_them_sp" style="margin-bottom: 40px;">
            <label class="control-label" style="margin-right: 20px;">Sort by: </label>
            <select class="form-control" name="order" id="status">
              <option value="1" <?php if(isset($_GET['order'])) { if ($_GET['order']==1) { ?> selected = "selected" <?php }} ?> >A->Z</option>
              <option value="2" <?php if(isset($_GET['order'])) { if ($_GET['order']==2) { ?> selected = "selected" <?php }} ?> >Price : Low to High</option> 
              <option value="3" <?php if(isset($_GET['order'])) { if ($_GET['order']==3) { ?> selected = "selected" <?php }} ?>>Price : High to Low</option>                      
            </select>
            <input class="btn button" value="Sort" type="submit" style="margin-left: 20px;">
            <?php if(isset($_GET['category_id'])){?> <input type="hidden" name="category_id" value="<?= $_GET['category_id'] ?>"><?php } ?>
        </form>
        </div>
        <?php if ($ketQuaTraVe->num_rows>0) 
        {
          $i = 0;
          while ($mathang = $ketQuaTraVe->fetch_assoc()) {            
          {
        ?>  
        <div class="col-lg-4 mb-4">
          <div class="product">           
            <div class="product-body">
              <img src="<?php echo $mathang['image'];?>">
            </div>
            <h4 class="product-header"><?php echo $mathang['name']; ?></h4>
            <p class="product-header"><?php echo number_format($mathang['price'], 0, '', '.');?>đ</p>
            <div class="product-footer">
              <a href="product_detail.php?product_id=<?php echo $mathang['product_id'] ?>" class="btn button">CHI TIẾT</a>
            </div>
          </div>
        </div>
        <?php } 
       
        $i++;}}
      else{       
      ?>  
      <h2 class="container" style="text-align: center; color:red">Xin lỗi, không có sản phẩm nào</h2>
      <?php } ?>
      </div>
       <!-- Pagination -->
      <ul class="pagination justify-content-center" style="margin-top: 40px;">
        <?php //Chỉ xuất hiện link lùi về trang trước nếu $page-1 lớn hơn 0 ?>
        <?php if($page-1 > 0) {?>
        <li class="page-item">
          <a class="page-link" href="?page=<?=$page-1?><?php if (isset($_GET['order'])){?>&order=<?php echo $_GET['order'];}?><?php if (isset($_GET['category_id'])){?>&category_id=<?php echo $_GET['category_id'];}?>" aria-label="Previous">
            <span aria-hidden="true" style="color: black;">&laquo;</span>
            <span class="sr-only" style="color: black;">Previous</span>
          </a>
        </li>
        <?php } ?>
        <?php for($i=1; $i <= $totalPages; $i++) {?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $i;?><?php if (isset($_GET['order'])){?>&order=<?php echo $_GET['order'];}?><?php if (isset($_GET['category_id'])){?>&category_id=<?php echo $_GET['category_id'];}?>" style="color: black;"><?=$i;?></a>
        </li>
        <?php } ?>
        <?php //Chỉ xuất hiện link tiến sang trang tiếp theo nếu $page nhỏ hơn $tongsotrang ?>
        <?php if($page < $totalPages) {?>
        <li class="page-item">
          <a class="page-link" href="?page=<?=$page+1?><?php if (isset($_GET['order'])){?>&order=<?php echo $_GET['order'];}?><?php if (isset($_GET['category_id'])){?>&category_id=<?php echo $_GET['category_id'];}?>" aria-label="Next">
            <span aria-hidden="true" style="color: black;">&raquo;</span>
            <span class="sr-only" style="color: black;">Next</span>
          </a>
        </li>
        <?php } ?>  
      </ul>

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
