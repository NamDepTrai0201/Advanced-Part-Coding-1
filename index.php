<?php
if (isset($_POST["btn"])) {
  include("connection.php");
  unset($_SESSION["username"]);

  $username = addslashes($_POST["username"]);
  $password = addslashes($_POST["password"]);

  $password = md5($password);
//   $con = mysqli_connect('localhost' , 'root' , '' , 'webadvance') or die('Khong the ket noi toi database');
  $query = mysqli_query($con, "SELECT username, password FROM admin WHERE username = '$username'");

  if (mysqli_num_rows($query) == 0) {
    echo "Tên đăng nhập không tồn tại, vui lòng kiểm tra lại. <a href='javascript: history.back();'>Quay lại</a>";
    exit;
  }

  $row = mysqli_fetch_array($query);
  if ($password != $row["password"]) {
    echo "Mật khẩu không đúng. Vui lòng thử lại. <a href='javascript: history.back();'>Quay lại</a>";
    exit;
  }

  $_SESSION["username"] = $username;
  header("Location: ./Admin/index.php");

  mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url('https://png.pngtree.com/thumb_back/fw800/background/20210907/pngtree-small-fresh-anime-scene-background-picture-image_811034.jpg');
      background-size: 1300px;
      background-color : #ffffff10;
      /* backdrop-filter: blur(3px); */
      /* -webkit-backdrop-filter: blur(5px) */
    }

    .form-control {
      height: 40px;
      width: 250px;
    }

    #btn {
      width: 250px;
      height: 40px;
    }
  </style>
</head>

<body>
  <form align="center" action="index.php" method="POST">
    <div class="form-group">
      <input type="text" id="username" class="form-control" placeholder="Username" name="username" />
      <span id="username_error"></span>
    </div>
    <div class="form-group">
      <input type="password" id="password" class="form-control" placeholder="Password" name="password"/>
      <span id="password_error"></span>
    </div>
    <p align="center">
      <button type="submit" onclick="return validate();" id="btn" name="btn">Login</button>
    </p>
  </form>
  <script>
            // Lấy giá trị của một input
            function getValue(id){
                return document.getElementById(id).value.trim();
            }

            // Hiển thị lỗi
            function showError(key, mess){
                document.getElementById(key + '_error').innerHTML = mess;
            }

            function validate()
            {
                var flag = true;

                // 1 username
                var username = getValue('username');
                if (username == '' || username.length < 5 || !/^[a-zA-Z0-9]+$/.test(username)){
                    flag = false;
                    showError('username', 'Vui lòng kiểm tra lại Username');
                }

                // 2. password
                var password = getValue('password');
                if (password == '' || password.length < 8 ){
                    flag = false;
                    showError('password', 'Vui lòng kiểm tra lại Password');
                }

                return flag;
            }
        </script>
</body>

</html>