<?php
   session_start();
   if($_SESSION ['username'] == null){
    header('location: ../../index.php');
   }
   $con = mysqli_connect('localhost' , 'root' , '' , 'webadvance') or die('Khong the ket noi toi database');

   if(isset($_POST['btn'])){
    $imgSrc = $_POST["img-src"];
    $mota = $_POST["mota"];
    $gia = $_POST["gia"];
    if(!$imgSrc || !$mota || !$gia){
        echo "Vui lòng đăng nhập đầy đủ tên đăng nhập và mật khẩu . <a href='javascript: history.go(-1)'>trở lại</a>";
        exit;
    }
    // $pass = md5($pass);
    $querry = "INSERT INTO categories (img-src,mota,gia) VALUES ('$imgSrc' , '$mota' , '$gia')";
    if(mysqli_query($con , $querry)){
        header('location: ../index.php');
    }else{
        $re = "loi them moi" . mysqli_error($con);
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
	<form action='them.php' method='POST'>
	<table>
		<tr>
			<td>Thêm sản phẩm</td>
		</tr>
		<tr>
            <td>image source: </td>
            <td><input id="img-src" name="img-src" class="form-control" type="text"></td>
		<tr>
            <td>Mô tả: </td>
            <td><input id="mota" name="mota" class="form-control" placeholder="Mô tả" type="text"></td>
		</tr>
        <tr>
            <td>Giá: </td>
            <td><input id="gia" name="gia" class="form-control" placeholder="Giá" type="text">đ</td>
        </tr>
		<td>
			<button type="submit" id="btn" name="btn"></i> Save</button></td>
		</tr>
	</table>
</form>
</body>
</html>