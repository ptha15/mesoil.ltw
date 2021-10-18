<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
    $dk = '';
    if(isset($_GET['date_from'])&&isset($_GET['date_end']))
    {
        if($_GET['date_from']!='' && $_GET['date_end']!='')
        {
            $dk = "(od.date_added BETWEEN ('".$_GET['date_from']."') and ('".$_GET['date_end']."'))";
        }    
        else 
        {
            $dk = '1=1';
        }
    }
    else 
        {
            $dk = '1=1';
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Trang quản trị</title>
    <link rel="shortcut icon" href="../img/logo.jpg">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">
        th,td{text-align: center;}
    </style>
    <script type="text/javascript">
        function validateForm()
        {
         var from_date = document.forms["dkien"]["date_from"].value;
         var end_date = document.forms["dkien"]["date_from"].value;
         if(from_date=='')
         {
            alert("Vui lòng nhập đủ điều kiện thời gian");
            document.forms["dkien"]["from_date"].focus();
            return false;
         }
         if(end_date=='')
         {
            alert("Vui lòng nhập đủ điều kiện thời gian");
            document.forms["dkien"]["end_date"].focus();
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
                <!-- /dkien -->
                <div class="row">
                    <form class="form form-horizontal" method="get" action="#" id="dkien" onsubmit="return(validateForm());">
                    <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-offset-2">Ngày bắt đầu</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="date_from" id= "date_from"  >
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-offset-2">Ngày kết thúc</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="date_end" id= "date_end"  >
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-2"></div>
                    <div class="col-sm-3">
                    <input class="btn btn-warning" type="submit" value="Xem" />
                    </div>
                    </div>

                    </form>
                    <div class="clearfix"></div>
                </div> 
                <!-- /dkien -->
                <div class="row">                     
                <div class="container-fluid col-lg-6 col-md-6">
                <h2 align="center" style="padding-bottom: 10px;">Top 5 sản phẩm có doanh thu cao nhất</h2>
                <?php
                        require ('../connect.php');
                        $sql = "Select Sum(cthd.quantity*cthd.price) as ttban, tx.name as name from order_product as cthd , product as tx, `order` as od where cthd.product_id = tx.product_id and cthd.order_id = od.order_id and ".$dk." group by tx.name order by ttban desc limit 0,5";
                        $ketQuaTruyVan = $conn->query($sql);                         
                        ?>
                    <table class="table table-fixed">
                      <thead>
                        <tr>
                          <th class="col-xs-2">STT</th><th class="col-xs-8">Tên sản phẩm</th><th class="col-xs-2">Doanh thu</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        
                        <?php
                        if($ketQuaTruyVan->num_rows > 0){
                            $i=1;
                        while($kq = $ketQuaTruyVan->fetch_assoc()){                    
                        ?>
                        <tr>
                          <td class="col-xs-2"><?php echo $i; ?></td><td class="col-xs-8"><?php echo $kq['name']; ?></td><td class="col-xs-2"><?php echo $kq['ttban']; ?>đ</td>                                  
                        <?php $i++; } } else {?>
                            <td class="col-xs-2"></td><td class="col-xs-8" style="color: red">Không có sản phẩm nào, vui lòng kiểm tra lại điều kiện</td><td class="col-xs-2"></td>
                        <?php } ?>
                        </tr>                  
                      </tbody>                              
                    </table>
                </div>
                <div class="container-fluid col-lg-6 col-md-6">
                <h2 align="center" style="padding-bottom: 10px;">Top 5 sản phẩm bán chạy nhất</h2>
                <?php
                    require ('../connect.php');
                    $sql = "Select Sum(cthd.quantity) as ttban, tx.name as name from order_product as cthd , product as tx, `order` as od where cthd.product_id = tx.product_id and cthd.order_id = od.order_id and ".$dk." group by tx.name order by ttban desc limit 0,5";
                    $ketQuaTruyVan = $conn->query($sql);                         
                ?>
                    <table class="table table-fixed">
                      <thead>
                        <tr>
                          <th class="col-xs-2">STT</th><th class="col-xs-8">Tên sản phẩm</th><th class="col-xs-2">Số lượng</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                          
                            <?php
                            if($ketQuaTruyVan->num_rows > 0){
                                $i=1;
                            while($kq = $ketQuaTruyVan->fetch_assoc()){                    
                            ?>
                        <tr>
                              <td class="col-xs-2"><?php echo $i; ?></td><td class="col-xs-8"><?php echo $kq['name']; ?></td><td class="col-xs-2"><?php echo $kq['ttban']; ?></td>
                              <?php $i++; } } else {?>
                                <td class="col-xs-2"></td><td class="col-xs-8" style="color: red">Không có sản phẩm nào, vui lòng kiểm tra lại điều kiện</td><td class="col-xs-2"></td>
                            <?php } ?>
                        </tr>        
                      </tbody>                              
                    </table>
                </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                </div>
            </div>
         </div>
     </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

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