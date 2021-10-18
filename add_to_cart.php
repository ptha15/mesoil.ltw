<?php
session_start();
$matHangId = $_POST['mat_hang_id'];
$tenMatHang = $_POST['ten_mat_hang'];
$giaBan = $_POST['gia_ban'];
$tonkho = $_POST['ton_kho'];
$tinhtrang = $_POST['tinh_trang'];



if(isset($_SESSION['login']) && $_SESSION['login'] == 1){        
    if(isset($_POST['so_luong']) && $_POST['so_luong'] >0&&$_POST['so_luong']<=$tonkho&&$tinhtrang =='Còn hàng'){
        foreach($_SESSION['gio_hang']['mat_hang'] as $matHang)
        {
            if ($matHangId == $matHang['id'])
            {
                echo
                "<script>
                alert('Sản phẩm đã có trong giỏ hàng, vui lòng xoá và chọn lại số lượng ');
                window.location = 'product_detail.php?product_id=$matHangId';
                </script>";
                return false;
            }   
        }

        {
            $soLuong = $_POST['so_luong'];        
            $_SESSION['gio_hang']['mat_hang'][] = array(
                'id' => $matHangId,
                'ten_mat_hang' => $tenMatHang,
                'gia_ban' => $giaBan,
                'so_luong' => $soLuong
            );
            $_SESSION['gio_hang']['tong_so'] += $soLuong;
            echo
            "<script>
            alert('Đã thêm vào giỏ');
            window.location = 'product_detail.php?product_id=$matHangId';
            </script>";
            return true;  
        }      
    }
    else{
        echo
        "<script>
        alert('Số lượng không hợp lệ hoặc sản phẩm đã hết hàng');
        window.location = 'product_detail.php?product_id=$matHangId';
        </script>"; 
    }        
}
else{
    echo 
    "<script>
    alert('Bạn cần đăng nhập để mua hàng');
    window.location = 'login.php';
    </script>";    
}
?>
