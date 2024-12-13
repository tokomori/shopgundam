<?php 
    require 'includes/header.php';
?>

<div class="content-wrapper">
    <div class="container mt-4">
        <?php 
        require 'db/connect.php';

        // Truy vấn lấy tất cả các thương hiệu
        $sql_brands = "SELECT * FROM brands ORDER BY brands_name";
        $result_brands = mysqli_query($conn, $sql_brands);

        // Duyệt qua các thương hiệu và hiển thị sản phẩm theo từng thương hiệu
        while ($brand = mysqli_fetch_assoc($result_brands)) {
            // Hiển thị tên thương hiệu
            echo "<div class='alert alert-info'><strong>Thương hiệu: </strong>" . $brand['brands_name'] . "</div>";

            // Truy vấn lấy sản phẩm theo thương hiệu (dùng brands_id để phân loại)
            $sql_products = "SELECT * FROM products WHERE brands_id = " . $brand['id'] . " ORDER BY product_name";
            $result_products = mysqli_query($conn, $sql_products);
            
            // Nếu có sản phẩm của thương hiệu, hiển thị trong bảng
            if (mysqli_num_rows($result_products) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-striped table-hover'>";
                echo "<thead class='thead-dark'>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số lượng tồn</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật</th>
                        </tr>
                      </thead>";
                echo "<tbody>";
                
                // Duyệt qua các sản phẩm của thương hiệu
                while ($product = mysqli_fetch_assoc($result_products)) {
                    echo "<tr>";
                    echo "<td>". $product['id'] . "</td>";
                    echo "<td>". $product['product_name'] . "</td>";
                    echo "<td>". $product['quantity'] . "</td>";
                    echo "<td>". number_format($product['price']) . ".000 VND</td>";
                    echo "<td><img src='". $product['image_url'] ."' class='img-fluid' alt='product image' style='max-width: 100px;'></td>";
                    echo "<td>". date("d-m-Y H:i:s", strtotime($product['created_at'])) . "</td>"; // Format datetime
                    echo "<td>". date("d-m-Y H:i:s", strtotime($product['updated_at'])) . "</td>"; // Format datetime
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p>Không có sản phẩm nào cho thương hiệu này.</p>";
            }
        }
        ?>
    </div>

    <!-- Footer -->
    <?php 
        require 'includes/footer.php';
    ?>
</div>
