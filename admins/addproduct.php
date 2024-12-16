<?php
    require('includes/header.php');
    require('db/connect.php');
?>

<div class="container mt-5">
    <h3 class="text-center">Thêm sản phẩm</h3>
    <form method="post" class="needs-validation" novalidate action="themsanpham.php">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Tên sản phẩm" required>
                <div class="invalid-feedback">
                    Vui lòng nhập tên sản phẩm.
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="brands_id">Mã hãng</label>
                    <select class="form-control" id="brands_id" name="brands_id" style="color: black;">
                        <option value="brands_id">--Vui lòng chọn mã hàng--</option>
                    <?php
                        $sql = "select * from brands order by id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $row ['id'] ?>"><?php echo $row ['id']?>-<?php echo $row ['brands_name']?></option>
                        <?php } ?>
                    </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="brands_name">Tên hãng</label>
                    <select class="form-control" id="brands_name" name="brands_name" style="color: black;">
                        <option value="brands_name">--Vui lòng chọn tên hàng--</option>
                    <?php
                        $sql = "select * from brands order by id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $row ['brands_name'] ?>"><?php echo $row ['brands_name']?></option>
                        <?php } ?>
                    </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="description">Mô tả</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả" required>
                <div class="invalid-feedback">
                    Vui lòng nhập mô tả sản phẩm.
                </div>
            </div>
            <span>Hình ảnh
                <form action="" method="post" enctype="multipart/form-data" class="col-md-6 mb-3">
                    <input type="file" name="image_url[]" id="image_url" multiple></br>

                    <input type="submit" value="Upload" name="submit">
                </form>
            </span>
            <div class="col-md-6 mb-3">
                <label for="quantity">Số lượng</label>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Số lượng" required>
                <div class="invalid-feedback">
                    Vui lòng nhập số lượng.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="price">Giá</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Giá" required>
                <div class="invalid-feedback">
                    Vui lòng nhập giá sản phẩm.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="category_id">Thể loại</label>
                    <select class="form-control" id="category_id" name="category_id" style="color: black;">
                    <option value="category_id">--Vui lòng chọn thể loại--</option>
                    <?php
                        $sql = "select * from categories order by id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?php echo $row ['id'] ?>"><?php echo $row ['name']?></option>
                        <?php } ?>
                    </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="created_at">Ngày tạo</label>
                <input type="text" class="form-control" id="created_at" name="created_at" placeholder="Ngày tạo" required>
                <div class="invalid-feedback">
                    Vui lòng nhập ngày tạo.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="updated_at">Ngày cập nhật</label>
                <input type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Ngày cập nhật" required>
                <div class="invalid-feedback">
                    Vui lòng nhập ngày cập nhật.
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-primary btn-block" value="Thêm sản phẩm">
    </form>


<?php
    require('includes/footer.php');
?>
</div>
