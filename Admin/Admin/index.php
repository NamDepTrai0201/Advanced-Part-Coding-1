<?php
   session_start();
   if($_SESSION['username'] == null){
    header('Location: ../index.php');
   }
   $con = mysqli_connect('localhost' , 'root' , '' , 'webadvance') or die('Khong the ket noi toi database');
   $querry = mysqli_query($con , "select * from admin") or die('Khong the truy van database');
   $querry1 = mysqli_query($con , "select * from categories") or die('Khong the truy van toi database');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .btn-primary {
      color: #fff;
      background-color: #000;
      /* margin-left : 505px */
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      transition: all 0.3s ease;
      background-color: transparent;
      border: 2px solid #000;
      text-decoration : none;
      margin-block: 30px 50px;
      width: 100px;
      height: 40px;
      /* border: none; */
      outline: none;
      font-weight: 700;
      cursor: pointer;
      color : black;
    }

    .btn-primary:hover {
      opacity: 0.7;
    }
    .btn-secondary{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      transition: all 0.3s ease;
    }
    img {
     width: 600px;
     height: 200px;
     object-fit: contain;
}
    .btn-secondary {
      background-color: transparent;
      border: 2px solid #000;
      text-decoration : none;
      /* margin-block: 30px 50px; */
      width: 100px;
      height: 40px;
      /* border: none; */
      outline: none;
      font-weight: 700;
      cursor: pointer;
      color : black;
    }
    .btn-secondary:hover {
      background-color: #000;
      color: #fff;
    }
    /* .trcontainer1{
        border: 1px solid black;
        justify-content : space-around;
    }
    .mod{
        margin-left: 200px;
    } */
    .Table1{
        border: 1px solid black;
        width: 1250px;
    }
    .FirstTd{
        margin-left: 20px;
        /* position: absolute; */
    }
    .SecondTd{
        margin-left: 180px;
        position:absolute;
    }
    .ThirdTd{
        margin-left: 510px;
        position:absolute;
    }
    .SuaButton{
      color: #fff;
      background-color: #000;
      margin-left : 900px;
      /* margin-top: -px; */
      /* margin: 0; */
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      transition: all 0.3s ease;
      background-color: transparent;
      border: 1.2px solid #000;
      /* margin-block: 30px 50px; */
      width: 50px;
      /* height: 40px;  */
      /* border: none; */
      outline: none;
      font-weight: 600;
      cursor: pointer;
      color : black;
      position: absolute;
      text-align: center;
      text-decoration: none;
    }
    .SuaButton:hover {
      opacity: 0.7;
    }
    /* .XoaButton{
        position: absolute;
    } */
    a{
        text-decoration: none;
    }
    .XoaButton{
      margin-left : 1020px;
      position: absolute;
      background-color: transparent;
      border: 1.2px solid #000;
      box-sizing: border-box;
      text-decoration : none;
      /* margin-block: 30px 50px; */
      width: 50px;
      /* height: 40px; */
      /* border: none; */
      outline: none;
      font-weight: 600;
      cursor: pointer;
      color : black;
      text-align: center;
      text-decoration: none;
      padding : 0;
      font-family: sans-serif;
    }
    .XoaButton:hover {
      background-color: #000;
      color: #fff;
    }
    .ListAdmin , .ListSanpham{
        text-align:center;
    }
</style>
<body>
    <h3 class="ListAdmin">Danh sach Admin</h3>
    <table class="Table1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Tac vu</th>
        </tr>
        <?php
        while($row = mysqli_fetch_array($querry , MYSQLI_ASSOC)){
            $id = $row['id'];
            $user = $row['username'];
            $pass = $row['password'];
        ?>
        <tr>
            <td class="FirstTd"><?php echo $id ?></td>
            <td class="SecondTd"><?php echo $user ?></td>
            <td class="ThirdTd"><?php echo $pass ?></td>
            <td class="SuaButton"><a href="admin/sua.php?id=<?php echo $id ;?>">Sửa</a></td>
            <td class="XoaButton"><a href="admin/xoa.php?id=<?php echo $id ;?>">Xóa</a></td>
        </tr>
        <?php }
        ?>
    </table>
    <button type="sumbit" onclick="hienthiAdmin();" id="btn" name="btn"> Them moi </button>;


    <h3>======================================================================================================================</h3>
    <h3 class="ListSanpham">Danh sach san pham</h3>
    <table>
        <tr class="trcontainer1">
            <th>ID</th>
            <th>hinh anh</th>
            <th>mo ta</th>
            <th>Gia</th>
            <th>Tac vu</th>
        </tr>
        <?php
        while($row = mysqli_fetch_array($querry1 , MYSQLI_ASSOC)){
            $id = $row['id'];
            $hinhanh = $row['hinhanh'];
            $mota = $row['mota'];
            $gia = $row['gia'];
        ?>
        <tr>
            <td><?php echo $id ?></td>
            <td>
                <img src="<?php echo $hinhanh ?>" alt="<?php echo $mota ?>"></td>
            <td><?php echo $mota ?></td>
            <td><?php echo $gia ?></td>
            <td><a href="SP/sua.php?id=<?php echo $id ;?>" class="btn-primary">Sua</a></td>
            <td><a href="SP/xoa.php?id=<?php echo $id ;?>" class="btn-secondary">Xoa</a></td>
        </tr> 
        <?php }
        mysqli_close($con);
        ?>

    </table>
    <button type="sumbit" onclick="hienthiSP();" id="btn" name="btn"></i> Them moi</button>
    <script>
        function hienthiAdmin(){
            location.replace("admin/them.php");
        }
        function hienthiSP(){
            location.replace("SP/them.php");
        }
    </script>
</body>
</html>