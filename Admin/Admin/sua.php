<?php
   session_start();
   if($_SESSION ['username'] == null){
    header('location: ../../index.php');
   }
   $con = mysqli_connect('localhost' , 'root' , '' , 'webadvance') or die('Khong the ket noi toi database');
   $id = $_GET['id'];
   
   if(isset($_POST['btn'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if(!$user || !$pass){
        echo "Vui lòng đăng nhập đầy đủ tên đăng nhập và mật khẩu . <a href='javascript: history.go(-1)'>trở lại</a>";
        exit;
    }
    $pass = md5($pass);
    $querry = "UPDATE admin SET username = '$user' , password = '$pass' WHERE id = '$id'";
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
	<form action='sua.php?id=<?php echo $id ?>' method='POST'>
	<table>
		<tr>
			<td>Sua Admin</td>
		</tr>
		<tr>
			<td>Username: </td>
			<td><input id="username" name="username" class="form-control" placeholder="Username" type="text"/></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input id="password" name="password" class="form-control" placeholder="Password" type="text"/></td>
		</tr>
		<td>
			<button type="submit" id="btn" name="btn"></i> Save</button></td>
		</tr>
	</table>
</form>
</body>
</html>