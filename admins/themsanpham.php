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

    //upload anh

            $uploaddir = 'uploads/';
            $uploadfile = $uploaddir . basename($_FILES['anhs']['name']);

            $images = 1;
            $imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
            // check 
            if(isset($_POST["submit"])){
                $check = getimagesize($_FILES['anhs']['name']);
                if($check !== false){
                    echo "File is an image - ". $check['mine']. " .";
                    $images = 1;
                } else {
                    echo "File not an image";
                    $images = 0;
                }
            }

                        // $uploaddir = 'admins/uploads/';
                        // $uploadfile = $uploaddir . basename($_FILES['image_url']['name']);

                        // $image_url = '';
                        // for($i=0; $i++; $i){
                        //     $filename = $_FILES['image_url']['name'][$i];

                        //     $location = "uploads/". $filename;
                        //     $extension = pathinfo($location,PATHINFO_EXTENSION);
                        //     $extension = strtolower($extension);

                        //     $valid_extensions = array("jpg", "png");
                        //     $reponse = 0;
                        //     if(in_array(strtolower($extension), $valid_extensions)){
                        //         if(move_uploaded_file($_FILES['image_url']['tmp_name'][$i], $location)){
                        //             // echo "file name : ".$filename."</br>";

                        //             // $totalFilesUploaded++;
                        //             $image_url .= $location . ";";
                        //         }
                        //     }
                        // }
                        // echo $image_url;
    // câu lệnh thêm sản phẩm
    $sql = "INSERT INTO `products` (`id`, `product_name`, `brands_id`, `brands_name`, `description`, `quantity`, `price`, `image_url`, `category_id`, `created_at`, `updated_at`) 
    VALUES 
    ( NULL,
    '$product_name', 
    '$brands_id', '$brands_name', 
    '$description', 
    '$quantity', 
    '$price',  
    'hinhanh.png', 
    '$category_id', 
    '$created_at', 
    '$created_at');";

        // echo $sql; exit;
    // thực thi câu lệnh
    $result = mysqli_query($conn, $sql);
    // trở về trang index
    header("Location: index.php");

?>