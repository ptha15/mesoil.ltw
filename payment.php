<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 1){        
    if(isset($_SESSION['gio_hang']) && $_SESSION['gio_hang']['tong_so'] > 0){
        require('connect.php');
        $today = date("Y/m/d"); 

        $sql = "INSERT INTO `order`(`date_added`, `customer_id`, `total`, `payment_name`, `payment_email`, `payment_phone`, `order_status`)
                VALUES ('".$today."', " .$_SESSION['customer_id'].",".$_SESSION['gio_hang']['tong_tien'].",'".$_POST['payment_name']."','".$_POST['payment_address']."','".$_POST['payment_phone']."',0)";                 
        if($conn->query($sql)){
            $sql_latest = "SELECT * FROM `order` ORDER BY `order_id` DESC LIMIT 0,1
                ";
            $ketQuaTruyVan1 = $conn->query($sql_latest);
            if($ketQuaTruyVan1->num_rows > 0){
                while($hoaDon = $ketQuaTruyVan1->fetch_assoc()){
                    $latestId = $hoaDon['order_id'];                
                }
            }
            foreach($_SESSION['gio_hang']['mat_hang'] as $matHang){
                 $thanhTien = $matHang['so_luong'] * $matHang['gia_ban'];
                $sql_chi_tiet = 
                    "INSERT INTO `order_product`
                        (`order_id`, `product_id`, `quantity`, `price`, `total`) 
                    VALUES (".$latestId.", " .$matHang['id'].",".$matHang['so_luong'].", ".$matHang['gia_ban'].",".$thanhTien.")";
                  $conn->query($sql_chi_tiet);
                  //update sl
                $sql_sl = "SELECT quantity From Product Where product_id = ".$matHang['id'];
                $ketQuaSL = $conn->query($sql_sl);
                if($ketQuaSL->num_rows > 0){
                while($Sl = $ketQuaSL->fetch_assoc()){
                    $quantity = $Sl['quantity'];                
                }
                $quantity = $quantity - $matHang['so_luong'];
                if($quantity>0)
                $sql_update_sl = "UPDATE `product` SET `quantity` =".$quantity." where product_id = ".$matHang['id'];
                else
                $sql_update_sl = "UPDATE `product` SET `quantity` =".$quantity.", status = 'H???t h??ng' where product_id = ".$matHang['id'];   
                $conn->query($sql_update_sl);
                    //
            }

            }           
            $_SESSION["gio_hang"]["mat_hang"] = array();
            $_SESSION["gio_hang"]["tong_so"] = 0;
            $_SESSION["gio_hang"]["tong_tien"] = 0;      
            echo
                "<script>
                alert('?????t h??ng th??nh c??ng');
                window.location = 'cart.php';
                </script>";
        }
        else {
            echo
                "<script>
                alert('L???i khi ?????t h??ng');
                window.location = 'cart.php';
                </script>";
        }        
    }
    else{
        echo
        "<script>
        alert('B???n ch??a mua s???n ph???m n??o');
        window.location = 'cart.php';
        </script>"; 
    }        
}
else{
    echo 
    "<script>
    alert('B???n c???n ????ng nh???p ????? mua h??ng');
    window.location = 'login.php';
    </script>";    
}
?>
