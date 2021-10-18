<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Liên hệ</title>
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>

  <body>
   
    <!-- Navigation -->
    <?php include("navigation.php");?>
    <?php include ("slide.php");?>
    


    <!-- Page Content -->
    <div class="container" style="margin-top: 100px;">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3 my-4">LIÊN HỆ
      </h1>

      <ol class="breadcrumb" style="margin-top: 80px;background-color: white; margin-bottom: 50px;">
        <li class="breadcrumb-item menu">
          <a href="index.php" style="color: black" >TRANG CHỦ</a>
        </li>
        <li class="breadcrumb-item active">LIÊN HỆ</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
          <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6780207290194!2d105.82360931493224!3d21.005539986010966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac811f40b6c1%3A0x84aa40b779a2363c!2zMTIgQ2jDuWEgQuG7mWMsIFRydW5nIExp4buHdCwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1632738895627!5m2!1svi!2s"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Thông tin liên hệ:</h3>
          <p>
            12 Chùa Bộc, Quang Trung, Hà Nội 
            <br>
          </p>
          <p>
            <abbr title="Phone">Phone</abbr>: +84 888 888 888
          </p>
          <p>
            <abbr title="Email">Email</abbr>:
            <a href="mailto:phithuha.bws@gmail.com">mesoil@gmail.com
            </a>
          </p>
          <p>
            <abbr title="Hours"></abbr> Thứ 2 - Chủ Nhật: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>GỬI LỜI NHẮN TỚI CHÚNG TÔI</h3>
          <form class="form form-horizontal" action="add_contact.php" method="post">
            <div class="control-group form-group">
              <div class="controls">
                <label>Họ và tên:</label>
                <input type="text" class="form-control" id="name" name="name" required >
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Số điện thoại:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required >
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Lời nhắn:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" name="message" required maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn button" >Gửi lời nhắn</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include("footer.php");?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
  </body>
</html>

