<?php 
    require 'includes/header.php';
?>

<div class="content-wrapper">
    
    
    <?php 
    require 'db/connect.php';

    // Truy vấn lấy tất cả sản phẩm
    $sql = "SELECT * FROM products ORDER BY product_name";  // Đảm bảo dùng tên đúng của cột
    $result = mysqli_query($conn, $sql);

    // Kiểm tra nếu có sản phẩm
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Mô Tả</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                </tr>
              </thead>";
        echo "<tbody>";

        // Duyệt qua các sản phẩm và hiển thị thông tin trong bảng
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";  // Hiển thị ID sản phẩm
            echo "<td>" . $row['product_name'] . "</td>";  // Hiển thị tên sản phẩm
            echo "<td class='text-truncate' style='max-width: 200px; overflow: hidden; white-space: nowrap;'>" . $row['description'] . "</td>";  // Hiển thị mô tả sản phẩm và cắt bớt nếu quá dài
            echo "<td>" . number_format($row['price']) . ".000</div>VND</td>";  // Hiển thị giá sản phẩm
            echo "<td><img src='" . $row['image_url'] . "' class='img-fluid' alt='product image' style='max-width: 100px;'></td>";  // Hiển thị ảnh sản phẩm
            echo "<td>" . date("d-m-Y H:i:s", strtotime($row['created_at'])) . "</td>";  // Hiển thị ngày tạo
            echo "<td>" . date("d-m-Y H:i:s", strtotime($row['updated_at'])) . "</td>";  // Hiển thị ngày cập nhật
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>Không có sản phẩm nào.</p>";
    }
    ?>

<!-- Footer -->
<?php 
    require 'includes/footer.php';
?>
</div>
