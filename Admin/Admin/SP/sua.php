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

<body>
  <form method='POST'>
    <table>
      <tr>
        <td>Sua san pham</td>
      </tr>
      <tr>
        <td>image source: </td>
        <td><input id="img-src" name="img-src" class="form-control" type="text"></td>
      </tr>
      <tr>
        <td>Mô tả: </td>
        <td><input id="mota" name="mota" class="form-control" placeholder="Mô tả" type="text"></td>
      </tr>
      <tr>
        <td>Giá: </td>
        <td><input id="gia" name="gia" class="form-control" placeholder="Giá" type="text">đ</td>
      </tr>
      <td>
        <button type="submit" id="btn" name="btn">Save</button>
        <a href="../index.php"><button type="button">Cancel</button></a>
      </td>
      </tr>
    </table>
  </form>
</body>

</html>