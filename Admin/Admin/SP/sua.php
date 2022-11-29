<?php
  session_start();

  if ($_SESSION["username"] == null) {
    header("Location: ../../index.php");
  }

   $con = mysqli_connect("localhost", "root", "", "webadvance") or die("không thể kết nối tới database");
   $id = $_GET["id"];

   if (isset($_POST["btn"])) {
    $imgSrc = $_POST["img-src"];
    $mota = $_POST["mota"];
    $gia = $_POST["gia"];
   if (!$imgSrc || !$mota || !$gia) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.back();'>Quay lại</a>";
    exit;
    }

    $query = "UPDATE categories SET hinhanh = '$imgSrc', mota = '$mota', gia = '$gia' WHERE id = '$id'";
    if (mysqli_query($con, $query)) {
        header("Location: ../index.php");
    }else{
    $re = "lỗi sửa" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
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
      /* margin-block: 30px 50px; */
      width: 100px;
      height: 40px;
      border: none;
      outline: none;
      font-weight: 900;
      cursor: pointer;
      margin-left: 478px;
      margin-top: 15px;
    }

    .btn-primary {
      color: #fff;
      background-color: #000;
      /* margin-left : 505px;
      position: absolute; */
    }

    .btn-primary:hover {
      opacity: 0.7;
    }

    .btn-secondary {
      background-color: transparent;
      border: 2px solid #000;
      margin-left: 52px;
      position: absolute;
      margin-top: 15px;
    }

    .btn-secondary:hover {
      background-color: #000;
      color: #fff;
    }
    .Firsttd{
        margin-left: 497px;
        position: absolute;
        font-size: 0.9cm;
        margin-top: -41px;
    }
</style>
<body>
  <form method='POST'>
    <table>
      <tr>
        <td class="Firsttd">Sua san pham</td>
      </tr>
      <tr>
        <td><input id="img-src" name="img-src" class="form-control" type="text" placeholder="Link ảnh"></td>
      </tr>
      <tr>
        <td><input id="mota" name="mota" class="form-control" placeholder="Mô tả" type="text"></td>
      </tr>
      <tr>
        <td><input id="gia" name="gia" class="form-control" placeholder="Giá" type="text">đ</td>
      </tr>
      <td>
        <button type="submit" id="btn" name="btn">Save</button>
        <a href="../index.php"><button type="button" class="btn-secondary">Cancel</button></a>
      </td>
      </tr>
    </table>
  </form>
</body>

</html>