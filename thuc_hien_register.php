<?php 
session_start();
?>
<html>
<head>
    <meta charset="utf-8" />
</head>
<?php
        require("connect.php");
        $tenKH= $_POST['name'];
        $tenDN= $_POST['username'];

        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $birthday=$_POST['birthday'];
        $matKhau = md5($_POST['password']);

        $target_dir = "img/ava/"; //Thư mục lưu ảnh upload
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //link file ảnh sau khi upload
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File không phải là ảnh";
                $uploadOk = 0;
            }
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Xin lỗi, chỉ có JPG, JPEG, PNG & GIF files được cho phép";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Xin lỗi, ảnh của bạn không được upload";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { //upload file ảnh đc chọn từ máy của người đăng ký lên thư mục ảnh của web

                $sql="INSERT INTO `customer`(`name`, `username`, `password`, `email`, `phone`,`birthday`,`image`) 
                VALUE ('" .$tenKH."', '".$tenDN."', '".$matKhau."','".$email."','".$phone."','".$birthday."','".$target_file."')";

                    if($conn->query($sql)){    
                    echo "
                        <script>
                        alert('Đăng ký thành công');        
                        </script>
                    ";
                    $sql = "SELECT * FROM `customer`
                        WHERE username = '".$tenDN."'
                            AND password = '".$matKhau."'";
                    $ketQua = $conn->query($sql);
                    if($ketQua->num_rows > 0){  
                    while($nguoiDung = $ketQua->fetch_assoc()){
                        $_SESSION["login"] = 1;
                        $_SESSION["ten_dang_nhap"] = $tenDN;
                        $_SESSION["image"] = $nguoiDung["image"];
                        $_SESSION["gio_hang"]["mat_hang"] = array();
                        $_SESSION["gio_hang"]["tong_so"] = 0;
                        $_SESSION["gio_hang"]["tong_tien"] = 0;
                        $_SESSION['customer_id'] = $nguoiDung['customer_id'];

                    echo "
                            <script>
                            window.location = 'index.php';
                            </script>
                        ";
                    }    
                }
                }
                else {
                    echo "
                        <script>
                        alert('Tài khoản đã tồn tại');
                        window.location = 'register.php';
                        </script>
                    ";
                }
                
            } else {
                echo "Xin lỗi, đã xảy ra lỗi khi upload ảnh";
            }
        }

?>
</html>