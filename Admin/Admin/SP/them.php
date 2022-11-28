<?php
session_start();

if ($_SESSION["username"] == null) {
  header("Location: ../../index.php");
}

$con = mysqli_connect("localhost", "root", "", "webadvance") or die("không thể kết nối tới database");

if (isset($_POST["btn"])) {
  $imgSrc = $_POST["img-src"];
  $mota = $_POST["mota"];
  $gia = $_POST["gia"];
  if (!$imgSrc || !$mota || !$gia) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.back();'>Quay lại</a>";
    exit;
  }

  $query = "INSERT INTO categories (hinhanh, mota, gia) VALUES ('$imgSrc', '$mota', '$gia')";
  if (mysqli_query($con, $query)) {
    header("Location: ../index.php");
  } else {
    $re = "lỗi thêm mới" . mysqli_error($con);
  }

  mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Product</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      transition: all 0.3s ease;
    }

    body {
      padding: 50px;
    }

    table {
      width: fit-content;
      margin-top : 10px
    }

    input {
      border: none;
      outline: none;
      font-size: 15px;
      height: 40px;
      width: 250px;
      padding-left: 10px;
      border-bottom: 2px solid #000;
      background-color: transparent;
      color: #000;
      margin-top : 7px;
      margin-left : 480px
    }

    button {
      margin-block: 30px 50px;
      width: 100px;
      height: 40px;
      border: none;
      outline: none;
      font-weight: 900;
      cursor: pointer;
    }

    .btn-primary {
      color: #fff;
      background-color: #000;
      margin-left : 505px
    }

    .btn-primary:hover {
      opacity: 0.7;
    }

    .btn-secondary {
      background-color: transparent;
      border: 2px solid #000;

    }

    .btn-secondary:hover {
      background-color: #000;
      color: #fff;
    }

    .Firsttd{
        margin-left: 545px;
        position: absolute;
        font-size: 0.5cm;
        margin-top : -13px
    }
  </style>
</head>

<body>
  <form method='POST'>
    <table>
      <tr>
        <td class="Firsttd">Sửa sản phẩm</td>
      </tr>
      <tr>
        <td><input id="img-src" name="img-src" class="form-control" placeholder="Link hình ảnh" type="text"
            autocomplete="off"></td>
      </tr>
      <tr>
        <td><input id="mota" name="mota" class="form-control" placeholder="Mô tả" type="text" autocomplete="off"></td>
      </tr>
      <tr>
        <td><input id="gia" name="gia" class="form-control" placeholder="Giá" type="text" autocomplete="off">đ</td>
      </tr>
      <tr>
        <td>
          <button class="btn-primary" type="submit" id="btn" name="btn">Thêm</button>
          <a href="../index.php"><button class="btn-secondary" type="button">Hủy</button></a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>