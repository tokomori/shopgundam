<?php
require 'db/connect.php';


if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    // Truy vấn người dùng
    $sql_user = "DELETE FROM user WHERE id = $user_id";
    if(mysqli_query($conn, $sql_user)){
        echo "Xóa thành công";
        header ('location: user.php');
        exit;
    }else{
        echo "Lỗi khi xóa: " .mysqli_error($conn);
    }
}
?>