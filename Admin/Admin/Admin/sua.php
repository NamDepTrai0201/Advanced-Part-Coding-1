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
      margin-left: 479px;
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
      margin-left: 632px;
      position: absolute;
      margin-top: 117px;
    }

    .btn-secondary:hover {
      background-color: #000;
      color: #fff;
    }
    .Firsttd{
        margin-left: 519px;
        position: absolute;
        font-size: 0.9cm;
        margin-top: -41px;
    }
</style>
<body>
	<form action='sua.php?id=<?php echo $id ?>' method='POST'>
	<table>
		<tr>
			<td class="Firsttd">Sửa admin</td>
		</tr>
		<tr>
			
			<td><input id="username" name="username" class="form-control" placeholder="Username" type="text"/></td>
		</tr>
		<tr>
			
			<td><input id="password" name="password" class="form-control" placeholder="Password" type="text"/></td>
		</tr>
		<td>
			<button type="submit" id="btn" name="btn"></i> Save</button></td>
            <a href="../index.php"><button class="btn-secondary" type="button">Hủy</button></a>
		</tr>
	</table>
</form>
</body>
</html>