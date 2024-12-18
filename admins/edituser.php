<?php 
    require 'includes/header.php'; 
?>

<div class="content-wrapper">
    <div class="container mt-4">
        <?php
            require 'db/connect.php';
            if(isset($_GET['id'])){
            $user_id = $_GET['id'];

            $sql_edit = "SELECT * FROM user WHERE id = $user_id";
            $result_user = mysqli_query($conn, $sql_edit);
            $user = mysqli_fetch_assoc($result_user);
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Lấy dữ liệu từ form sửa
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $birth_date = $_POST['birth_date'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $status = $_POST['status'];

            //Cập nhật vào cơ sở dữ liệu
            $update_sql = "UPDATE user SET first_name = '$first_name', last_name = '$last_name',
            birth_date = '$birth_date', email = '$email', phone = '$phone',
            gender = '$gender', address = '$address', status = '$status' WHERE id = $user_id";
            if(mysqli_query($conn, $sql_edit)){
                echo "Sửa thành công";
                header ('location: user.php');
                exit;
            }else{
                echo "Lỗi khi sửa: " . mysqli_error($conn);
                }
            }
        }
        ?>
        <form method="POST">
            <input class="col-md-6 mb-3" type="text" name="first_name" value="<?= $user['first_name'] ?>" required>
            <input class="col-md-6 mb-3" type="text" name="last_name" value="<?= $user['last_name'] ?>" required>
            <input class="col-md-6 mb-3" type="date" name="birth_date" value="<?= $user['birth_date'] ?>" required>
            <input class="col-md-6 mb-3" type="email" name="email" value="<?= $user['email'] ?>" required>
            <input class="col-md-6 mb-3" type="text" name="phone" value="<?= $user['phone'] ?>" required>
            <select class="col-md-6 mb-3" name="gender">
                <option value="male" <?= $user['gender'] == 'male' ? 'selected' : '' ?>>Nam</option>
                <option value="female" <?= $user['gender'] == 'female' ? 'selected' : '' ?>>Nữ</option>
            </select>
            <input class="col-md-6 mb-3" type="text" name="address" value="<?= $user['address'] ?>" required>
            <select class="col-md-6 mb-3" name="status">
                <option value="active" <?= $user['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= $user['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                <option value="banned" <?= $user['status'] == 'Banned' ? 'selected' : '' ?>>Banned</option>
            </select>
            <button class="col-md-6 mb-3" type="submit">Cập nhật</button>
        </form>

    </div>
    <?php 
        require 'includes/footer.php'; 
    ?>
</div>