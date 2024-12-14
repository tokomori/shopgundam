<?php

    require './db/connect.php';

    // lấy dử liệu từ form
    $product_name = $_POST['product_name'];
    $brands_id = $_POST['brands_id'];
    $brands_name = $_POST['brands_name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $created_at = $_POST['created_at'];
    $updated_at = $_POST['updated_at'];
    // câu lệnh thêm sản phẩm
    $sql = "INSERT INTO `products` (`id`, `product_name`, `brands_id`, `brands_name`, `description`, `quantity`, `price`, `image_url`, `category_id`, `created_at`, `updated_at`) 
    VALUES 
    ( NULL,
    '$product_name', 
    '$brands_id', '$brands_name', 
    '$description', 
    '$quantity', 
    '$price', 
    NULL, 
    '$category_id', 
    '$created_at', 
    '$created_at');";

        // echo $sql; exit;
    // thực thi câu lệnh
    $result = mysqli_query($conn, $sql);
    // trở về trang index
    header("Location: index.php");

?>