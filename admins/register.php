<?php
require('db/connect.php');
if(isset($_POST['btn-sbm'])){

    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    if(!empty($first_name)&&!empty($last_name)&&!empty($birth_date)&&!empty($email)
    &&!empty($password)&&!empty($phone)&&!empty($gender)&&!empty($address)&&!empty($status)) {
        //insert du lieu
        $sql = "INSERT INTO user (first_name, last_name, birth_date, email, password, phone, gender, address, status) 
        VALUES ('$first_name', '$last_name', '$birth_date', '$email', md5('$password'), '$phone', '$gender', '$address', '$status')";

        if($conn->query($sql)===TRUE){
            echo "Đăng ký thành công, vui lòng quay lại trang đăng nhập";
        }else{
            echo "loi {$sql}" . $conn->error; 
        }
    }else{
        echo "Bạn cần nhập đầy đủ thông tin";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <title>Register</title>
</head>
<body>
<div class="formbold-main-wrapper">
<div class="formbold-form-wrapper">
<form action="register.php" method="POST">
      <div class="formbold-input-wrapp formbold-mb-3">
        <label for="firstname" class="formbold-form-label"> Họ Và Tên </label>

        <div>
          <input
            type="text"
            name="first_name"
            id="firstname"
            placeholder="First name"
            class="formbold-form-input"
          />

          <input
            type="text"
            name="last_name"
            id="lastname"
            placeholder="Last name"
            class="formbold-form-input"
          />
        </div>
      </div>

      <div class="formbold-mb-3">
        <label for="dob" class="formbold-form-label"> Ngày Sinh </label>
        <input type="date" name="birth_date" id="dob" class="formbold-form-input" />
      </div>

      <div class="formbold-mb-3">
        <label class="formbold-form-label">Giới Tính</label>

        <select class="formbold-form-input" name="gender" id="occupation">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="others">Others</option>
        </select>
      </div>

      <div class="formbold-md-3">
        <label class="formbold-form-label">Status</label>
            <select class="formbold-form-input" name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="banned">Banned</option>
            </select>
      </div>

      <div class="formbold-mb-3">
        <label for="email" class="formbold-form-label"> Email </label>
        <input
          type="email"
          name="email"
          id="email"
          placeholder="example@gmail.com"
          class="formbold-form-input"
        />
      </div>

      <div class="formbold-mb-3">
        <label for="email" class="formbold-form-label"> Mật khẩu </label>
        <input
          type="password"
          name="password"
          id="password"
          placeholder="Mật khẩu"
          class="formbold-form-input"
        />
      </div>

      <div class="formbold-mb-3">
        <label for="address" class="formbold-form-label"> Địa chỉ </label>

        <input
          type="text"
          name="address"
          id="address"
          placeholder="Địa chỉ"
          class="formbold-form-input formbold-mb-3"
        />
      </div>

      <div class="formbold-mb-3 formbold-input-wrapp">
        <label for="phone" class="formbold-form-label"> Số Điện Thoại </label>

        <div>
          <input
            type="text" 
            name="phone"
            id="phone"
            placeholder="Số điện thoại"
            class="formbold-form-input"
          />
        </div>
      </div>

      <div class="formbold-checkbox-wrapper">
        <label for="supportCheckbox" class="formbold-checkbox-label">
          <div class="formbold-relative">
            <input
              type="checkbox"
              id="supportCheckbox"
              class="formbold-input-checkbox"
            />
            <div class="formbold-checkbox-inner">
              <span class="formbold-opacity-0">
                <svg
                  width="11"
                  height="8"
                  viewBox="0 0 11 8"
                  class="formbold-stroke-current"
                  fill="none"   
                >
                  <path
                    d="M8.81868 0.688604L4.16688 5.4878L2.05598 3.29507C1.70417 2.92271 1.1569 2.96409 0.805082 3.29507C0.453266 3.66742 0.492357 4.24663 0.805082 4.61898L3.30689 7.18407C3.54143 7.43231 3.85416 7.55642 4.16688 7.55642C4.47961 7.55642 4.79233 7.43231 5.02688 7.18407L10.0696 2.05389C10.4214 1.68154 10.4214 1.10233 10.0696 0.729976C9.71776 0.357624 9.17049 0.357625 8.81868 0.688604Z"
                    fill="white"
                  />
                </svg>
              </span>
            </div>
          </div>
          Tôi hoàn toàn đồng ý với các
          <a href="#"> điều khoản</a>
        </label>
      </div>

      <div class="formbold-checkbox-label">
        Bạn đã có tài khoản?<a href="login.php">Đăng nhập.</a>
      </div>
      <button class="formbold-btn" name="btn-sbm">Đăng ký</button>
    </form>
</div>
</div>
</body>
</html>