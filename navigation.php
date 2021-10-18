    <?php
      require("connect.php");
      $sql = "SELECT * FROM category";
      $ketQuaTruyVan = $conn->query($sql);
    ?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #DE8971;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="color: white; font-size: 200%; margin-left:40px;"><MAIN>MESOIL</MAIN></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php"> TRANG CHỦ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="introduction.php">VỀ CHÚNG TÔI</a>
            </li>     
             <li class="nav-item">
            </li>   
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                SẢN PHẨM
              </a>
              
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio" style="background-color: black;">
                <?php
                  if($ketQuaTruyVan->num_rows > 0){
                  while($category = $ketQuaTruyVan->fetch_assoc()){
                ?>
                <a class="dropdown-item" href="lookbook.php?category_id=<?= $category['category_id'] ?>"><?php echo $category['name']; ?></a>
                <?php  
                  }}
                ?>
              </div>
            </li>           
            <li class="nav-item" style="width: 80px;">
              <a class="nav-link" href="news.php" style="width: 80px;">TIN TỨC</a>
            </li>
            <li class="nav-item" style="width: 80px;">
              <a class="nav-link" href="contact.php" style="width: 80px;">LIÊN HỆ</a>
            </li>
            <li class="nav-item dropdown" style="width: 160px;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 160px; text-align: left;">
                  <?php if(isset($_SESSION['login']) && $_SESSION['login']==1){
                    ?>
                    <img src="<?php echo $_SESSION['image']; ?>" style="width: 25px; height: 25px;">

                  <?php
                  echo $_SESSION['ten_dang_nhap'];
                }else 
                    echo "ACCOUNT"; ?>
                  <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio" style="background-color: black;">
                <?php if(isset($_SESSION['login']) && $_SESSION['login']==1){ ?>
                <a class="dropdown-item" href="account_info.php"> THÔNG TIN TÀI KHOẢN</a>
                <a class="dropdown-item" href="logout.php">ĐĂNG XUẤT</a>
                <?php } else { ?> 
                <a class="dropdown-item" href="login.php">ĐĂNG NHẬP</a>
                <a class="dropdown-item" href="register.php">ĐĂNG KÝ</a>
                <?php } ?>
              </div>
            </li>
            <li class="nav-item nav-right" style="width: 160px; margin-left: 30px;">
              <a class="nav-link" href="cart.php" style="width: 160px;"><i class="fa fa-shopping-cart"></i> GIỎ HÀNG
              <?php if(isset($_SESSION['login']) && $_SESSION['login']==1)
                { echo "(".$_SESSION['gio_hang']['tong_so'].")";}?>
              </a>
            </li>           
          </ul>
        </div>
      </div>
    </nav>