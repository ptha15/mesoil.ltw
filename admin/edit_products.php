<?php session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user']==1)
{
?>

<?php 
    $id = $_GET['id'];
    require("../connect.php");
    $sql = "SELECT * FROM product WHERE product_id =".$id;
    $ketQuaTruyVan = $conn->query($sql);
    $matHang = $ketQuaTruyVan->fetch_assoc();      
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesoil | Sửa sản phẩm</title>
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
        var name = document.forms["form_them_sp"]["name"].value;
        var supplier_id = document.forms["form_them_sp"]["supplier_id"].value;
        var lookbook_id = document.forms["form_them_sp"]["lookbook_id"].value;
        var color = document.forms["form_them_sp"]["color"].value;
        var size = document.forms["form_them_sp"]["size"].value;
        var price = document.forms["form_them_sp"]["price"].value;
        var quantity = document.forms["form_them_sp"]["quantity"].value;
        
        if(name.trim()=="")
        {
            alert("Bạn chưa nhập tên sản phẩm");
            document.forms["form_them_sp"]["name"].focus();
            return false
        }
        if(supplier_id<1) 
        {
            alert("Bạn chưa chọn nhà cung cấp");
            document.forms["form_them_sp"]["supplier_id"].focus();
            return false
        }  
        if(lookbook_id<1) 
        {
            alert("Bạn chưa chọn phân loại");
            document.forms["form_them_sp"]["lookbook_id"].focus();
            return false
        } 

        if(price*1<0||price.trim()=="")
        {
            alert("Bạn chưa nhập giá hoặc nhập sai");
            document.forms["form_them_sp"]["price"].focus();
            return false
        }
        if(quantity*1<0||quantity.trim()=="")
        {
            alert("Bạn chưa nhập số lượng hoặc nhập sai");
            document.forms["form_them_sp"]["quantity"].focus();
            return false
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
              <h1 align="center" style="padding-top: 10px">Sửa sản phẩm</h1>
              <form class="form form-horizontal" method="post" action="thuc_hien_edit_products.php" id="form_them_sp" onsubmit="return(validateForm());" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="control-label col-sm-2">Tên sản phẩm </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm" value="<?= $matHang['name'] ?>">
                      </div>
                  </div>  

                  <div class="form-group">
                    <label class="control-label col-sm-2">Nhà cung cấp</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="supplier_id" id="supplier_id">
                        <option value="0">Chọn nhà cung cấp</option>
                         <?php
                         require("../connect.php");                      
                          $sql = "SELECT supplier_id, name from supplier";                                             
                          $ketQuaTraVe = $conn->query($sql);                        
                          while ($supplier = $ketQuaTraVe->fetch_assoc())                          
                           if($supplier['supplier_id']==$matHang['supplier_id']){?>  
                            <option selected="selected" value="<?php echo $matHang['supplier_id'] ?>"><?php echo $supplier['name']?></option> 
                        <?php } else { ?>                           
                            <option value="<?php echo $supplier['supplier_id']?>"><?php echo $supplier['name'];?></option>  
                            <?php
                        }?>               
                      </select>                     
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Size</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="size"  id="size" placeholder="Size" value="<?= $matHang['size'] ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Giá bán </label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="price" id="price" value="<?= $matHang['price'] ?>"/>
                    </div>
                </div>

                <div class="form-group">
                      <label class="control-label col-sm-2">Màu sắc </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="color" placeholder="Màu" id="color" value="<?= $matHang['color'] ?>"/>
                      </div>
                </div> 

                <div class="form-group">
                      <label class="control-label col-sm-2">Phân loại</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="lookbook_id" id="lookbook_id">
                        <option value="0">Chọn thể loại</option>
                          <?php                      
                        $sql = "SELECT category_id, name from category";                                             
                        $ketQuaTraVe = $conn->query($sql);                        
                        while ($category = $ketQuaTraVe->fetch_assoc())                            
                            if($category['category_id']==$matHang['category_id']){?>  
                            <option selected="selected" value="<?php echo $matHang['category_id'] ?>"><?php echo $category['name']?></option> 
                        <?php } else { ?>                           
                            <option value="<?php echo $category['category_id']?>"><?php echo $category['name'];?></option>  
                            <?php
                        }?>                
                      </select>                     
                      </div>
                </div> 

                <div class="form-group">
                    <label class="control-label col-sm-2">Tình trạng </label>
                    <div class="col-sm-10">
                      <select class="form-control" name="status" id="status">
                       <option <?php if($matHang['status']=='Còn hàng'){?> selected="selected" <?php } ?> value="Còn hàng">Còn hàng</option>
                        <option <?php if($matHang['status']=='Hết hàng'){?> selected="selected" <?php } ?> value="Hết hàng">Hết hàng</option>                       
                      </select>                     
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Số lượng </label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="quantity" id="quantity" value="<?= $matHang['quantity'] ?>"/>
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
                      <textarea name="description" id="description"><?php echo $matHang['description']; ?></textarea>
                    </div>
                </div> 

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