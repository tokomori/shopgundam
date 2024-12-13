<?php
require('db/connect.php');
    if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' and password = md5('$password')");
        $row = mysqli_fetch_assoc($result);

        if($row){
            header("Location: index.php");
        }else{
            $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d10e854cec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <div class="login-form w3_form">
        <!--  Title-->
            <div class="login w3_login">
                <h2 class="login-header w3_header">Đăng nhập</h2>
				    <div class="w3l_grid">
                    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
                        <form class="login-container" action="" method="POST">
                            <input  type="email" placeholder="Email" Name="email" required="" >
                            <input type="password" placeholder="Password" Name="password" required="">
                            <input type="submit" value="Đăng nhập">
                        </form>
                            <div class="second-section w3_section">
                            <div class="bottom-header w3_bottom">
                                <h3>Hoặc đăng nhập bằng</h3>
                            </div>
                        <div class="social-links w3_social">
                            <ul>
                            <!-- facebook -->
                                <li><a class="facebook" href="#" target="blank"><i class="fa-brands fa-facebook"></i></a></li>

                            <!-- twitter -->
                                <li><a class="twitter" href="#" target="blank"><i class="fa-brands fa-twitter"></i></a></li>

                            <!-- google plus -->
                                <li><a class="googleplus" href="#" target="blank"><i class="fa-brands fa-google"></i></i></a></li>
                            </ul>
                        </div>
                    </div>
                
                <div class="bottom-text w3_bottom_text">
                    <p>Bạn chưa có tài khoản?<a href="register.php">Đăng ký</a></p>
                    <h4> <a href="#">Quên mật khẩu?</a></h4>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
