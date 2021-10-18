<?php 
session_start();
require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Tin tức</title>
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
    <?php include('navigation.php');?>
    <!-- Navigation -->
    <?php include('slide.php');?>

    <!-- Page Content -->
    <div class="container" style="margin-top: 100px;">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3 my-4">TIN TỨC</h1>
      <ol class="breadcrumb button" style="margin-top: 80px; background-color: white">
        <li class="breadcrumb-item menu">
          <a href="index.php" style="color: black" >TRANG CHỦ</a>
        <li class="breadcrumb-item active">TIN TỨC</li>
      </ol>
      <?php 
          
          $size = 3; 
          $sql1 = 'select count(*) as total from news';
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
          $sql = 'select * from news LIMIT '.$startrow.','.$size;
          $ketQuaTraVe = $conn->query($sql);
           if ($ketQuaTraVe->num_rows>0) 
          {
            $i = 0;
            while ($news = $ketQuaTraVe->fetch_assoc()) {            
          {
          ?>     
      <!-- Project One -->
      <div class="row">
        <div class="col-md-7 addnew">
          <a href="news_detail.php?news_id=<?php echo $news['news_id'] ?>">
            <img class="img-fluid rounded mb-3 mb-md-0" src="<?= $news['image'] ?>"  alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3><?php echo $news['name']?></h3>
          <p><?php echo $news['content']?></p>
          <a href="news_detail.php?news_id=<?php echo $news['news_id'] ?>" class="btn button">Xem thêm
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
      <!-- /.row -->

      <hr>
      <?php } 
       
        $i++;}}
        else{       
      ?>  
        <h2 class="container" style="text-align: center; color:red">Xin lỗi, không có tin tức nào</h2>
      <?php } ?>

      <!-- Pagination -->
      <ul class="pagination justify-content-center" style="margin-top: 40px;">
        <?php //Chỉ xuất hiện link lùi về trang trước nếu $page-1 lớn hơn 0 ?>
        <?php if($page-1 > 0) {?>
        <li class="page-item">
          <a class="page-link" href="?page=<?=$page-1?>" aria-label="Previous">
            <span aria-hidden="true" style="color: black;">&laquo;</span>
            <span class="sr-only" style="color: black;">Previous</span>
          </a>
        </li>
        <?php } ?>
        <?php for($i=1; $i <= $totalPages; $i++) {?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $i;?>" style="color: black;"><?=$i;?></a>
        </li>
        <?php } ?>
        <?php //Chỉ xuất hiện link tiến sang trang tiếp theo nếu $page nhỏ hơn $tongsotrang ?>
        <?php if($page < $totalPages) {?>
        <li class="page-item">
          <a class="page-link" href="?page=<?=$page+1?>" aria-label="Next">
            <span aria-hidden="true" style="color: black;">&raquo;</span>
            <span class="sr-only" style="color: black;">Next</span>
          </a>
        </li>
        <?php } ?>  
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('footer.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
