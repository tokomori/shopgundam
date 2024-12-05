<?php
    require('includes/header.php');
?>


<div>
    <p>Nhà sản xuất</p>
    <?php
    require('../db/connect.php');
    $sql_str = "select * from brands order by brands_name";
    $result = mysqli_query($conn,$sql_str);
    if ($result->num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            echo "Nhà sản xuất: " . $row ['brands_name'];
        }
        
        
    }else{
        echo 'khong co nha san xuat nao';
    }
    
    ?>
</div>

<?php
    require('includes/footer.php');
?>