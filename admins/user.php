<?php
    require('includes/header.php');
?>


<div class="content-wrapper">
    <div class="container mt-4">
        <?php
        require 'db/connect.php';
        // Truy vấn các file trong user
        $sql_user = "SELECT * FROM user ORDER BY id";
        $result_user = mysqli_query($conn, $sql_user);
        
        mysqli_num_rows($result_user);
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-striped table-hover'>";
            echo "<thead class='thead-dark'>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Tình trạng</th>
                        <th>Ngày tạo</th>
                        <th>Tùy biến</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            
            // Duyệt qua các sản phẩm của thương hiệu
            while ($user = mysqli_fetch_assoc($result_user)) {
                echo "<tr>";
                echo "<td>". $user['id'] . "</td>";
                echo "<td>". $user['first_name']." ".$user['last_name'] . "</td>"; //truy vấn first_name và last_name 
                echo "<td>".  date("d-m-Y", strtotime($user['birth_date'])) . "</td>"; // format ngày sinh
                echo "<td>". $user['email'] . "</td>";
                echo "<td>". $user['phone'] . "</td>";
                echo "<td>". $user['gender'] . "</td>";
                echo "<td>". $user['address'] . "</td>";
                echo "<td>". $user['status'] . "</td>";
                echo "<td>". date("d-m-Y", strtotime($user['created_at'])) . "</td>"; // Format datetime
                

                echo "<td>
                <a href='edituser.php?id=".$user['id']."' class='btn btn-warning btn-sm'>Sửa</a>
                <a href='deluser.php?id=".$user['id']."' class='btn btn-danger btn-sm' 
                onclick='return confirm(\"Bạn có chắc chắn muốn xóa người dùng này không?\")'>Xóa</a>
              </td>";

        echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        ?>
    </div>

<?php
    require('includes/footer.php');
?>
</div>