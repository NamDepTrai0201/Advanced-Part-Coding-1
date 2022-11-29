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
    /* * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      transition: all 0.3s ease;
    } */
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
      width: 140px;
      height: 40px;
      /* border: none; */
      outline: none;
      font-weight: 550;
      cursor: pointer;
      color : #E9E9E9;
      margin-top : -10px;
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
      color : #E9E9E9;
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
        padding-left : 30px;
        background: linear-gradient(40deg, #155263 9%, #155263 43%, #FF6F3C calc(43% + 1px), #FF6F3C 52%, #FF9A3C calc(52% + 1px), #FF9A3C 80%, #FFC93C calc(80% + 1px), #FFC93C 100%);background: linear-gradient(125deg, #ECFCFF 0%, #ECFCFF 40%, #B2FCFF calc(40% + 1px), #B2FCFF 60%, #5EDFFF calc(60% + 1px), #5EDFFF 72%, #3E64FF calc(72% + 1px), #3E64FF 100%);
    }
    .FirstTd{
        margin-left: 23px;
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
      font-weight: 550;
      cursor: pointer;
      color : #E9E9E9;
      position: absolute;
      text-align: center;
      text-decoration: none;
      /* margin-top : 1px */
      /* margin-top : -10px */
    }
    .asuabutton{
        color : white;
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
      margin-left : 1015px;
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
      font-weight: 550;
      cursor: pointer;
      color : #E9E9E9;
      text-align: center;
      text-decoration: none;
      padding : 0;
      font-family: sans-serif;
      transition: all 0.3s ease;
    }
    .XoaButton:hover {
      background-color: #000;
      color: #fff;
    }
    .axoabutton{
        color : white;
    }
    .ListAdmin , .ListSanpham{
        text-align:center;
        background: linear-gradient(125.95deg, #C700BF 10.95%, #7DA900 100%), linear-gradient(341.1deg, #00C2FF 7.52%, #4E00B1 77.98%), linear-gradient(222.34deg, #A90000 12.99%, #00FFE0 87.21%), linear-gradient(130.22deg, #8FA600 18.02%, #5A31FF 100%);
background-blend-mode: screen, color-dodge, color-dodge, normal;
        border: 1px solid;
        width : 150px;
        margin-left : 550px;
        font-family : sans-serif;
    }
    .FirstthTable1{
        /* margin-left: -px; */
        position: absolute;
    }
    .table2{
        border: 1px solid black;
        width: 1250px;
        padding-left : 30px;
        background: linear-gradient(40deg, #155263 9%, #155263 43%, #FF6F3C calc(43% + 1px), #FF6F3C 52%, #FF9A3C calc(52% + 1px), #FF9A3C 80%, #FFC93C calc(80% + 1px), #FFC93C 100%);background: linear-gradient(125deg, #ECFCFF 0%, #ECFCFF 40%, #B2FCFF calc(40% + 1px), #B2FCFF 60%, #5EDFFF calc(60% + 1px), #5EDFFF 72%, #3E64FF calc(72% + 1px), #3E64FF 100%);
    }
    .ImgTd{
        margin-left : 100px;
        /* position : absolute; */
    }
    .firsttdintable2{
        font-family: sans-serif;
        color : #292520;
        font-weight : 700;
        margin-left : -330px;
        text-align : center;
        position: absolute; 
        margin-top : 93px;

    }
    body{
        background: linear-gradient(180deg, #FFB7B7 0%, #727272 100%), radial-gradient(60.91% 100% at 50% 0%, #FFD1D1 0%, #260000 100%), linear-gradient(127.43deg, #00FFFF 0%, #FFFFFF 100%), radial-gradient(100.22% 100% at 70.57% 0%, #FF0000 0%, #00FFE0 100%), linear-gradient(64.82deg, #DBFF00 0%, #3300FF 100%);
background-blend-mode: screen, overlay, color-burn, color-dodge, normal;
    }
    .firstthintable2{
        margin-left : 790px;
        position : absolute;
        font-family : sans-serif;
    }
    .Secondthintable2{
        margin-left : 365px;
        position : absolute;
        font-family : sans-serif;
    }
    .Thirdthintable2{
        margin-left : 965px;
        position : absolute;
        font-family : sans-serif;
    }
    .Fourthintable2{
        margin-left : 1095px;
        position : absolute;
        font-family : sans-serif;
    }
    .secondtdintable2{
        font-family: sans-serif;
        color : #292520;
        font-weight : 700;
        margin-left : -130px;
        text-align : center;
        position: absolute; 
        margin-top : 93px;
    }
    .primary2{
        margin-top : -5px;
        position : absolute;
    }
    .ThemMoiButton1{
        /* margin-left : 988px;
      position: absolute; */
      background-color: transparent;
      border: 1.2px solid #000;
      box-sizing: border-box;
      text-decoration : none;
      /* margin-block: 30px 50px; */
      width: 100px;
      /* height: 40px; */
      /* border: none; */
      outline: none;
      font-weight: 550;
      cursor: pointer;
      color : black;
      height : 30px;
      text-align: center;
      text-decoration: none;
      padding : 0;
      font-family: sans-serif;
      transition: all 0.3s ease;
      background-color : white;
      /* transition: all 0.3s ease; */
    }
    .ThemMoiButton1:hover{
        background-color: black;
        color: #fff;
    }
    .FourthTable1 , .FirstthTable1 , .ThirdthTable1 , .SecondthTable1{
        font-family: sans-serif;
    }
</style>
<body>
    <h3 class="ListAdmin">Danh sách Admin</h3>
    <table class="Table1">
        <tr>
            <th class="FirstthTable1">ID</th>
            <th class="SecondthTable1">Username</th>
            <th class="ThirdthTable1">Password</th>
            <th class="FourthTable1">Tac vu</th>
        </tr>
        <?php
        while($row = mysqli_fetch_array($querry , MYSQLI_ASSOC)){
            $id = $row['id'];
            $user = $row['username'];
            $pass = $row['password'];
        ?>
        <tr class="tr2container">
            <td class="FirstTd"><?php echo $id ?></td>
            <td class="SecondTd"><?php echo $user ?></td>
            <td class="ThirdTd"><?php echo $pass ?></td>
            <td class="SuaButton"><a href="admin/sua.php?id=<?php echo $id ;?>" class="asuabutton">Sửa</a></td>
            <td class="XoaButton"><a href="admin/xoa.php?id=<?php echo $id ;?>" class="axoabutton">Xóa</a></td>
        </tr>
        <?php }
        ?>
    </table>
    <button type="sumbit" onclick="hienthiAdmin();" id="btn" name="btn" class="ThemMoiButton1"> Thêm Mới</button>;


    <h3>======================================================================================================================</h3>
    <h3 class="ListSanpham">Danh sách sản phẩm</h3>
    <table class="table2">
        <tr class="trcontainer1">
            <th>ID</th>
            <th class="Secondthintable2">Hình ảnh</th>
            <th class="firstthintable2">Mô tả</th>
            <th class="Thirdthintable2">Giá</th>
            <th class="Fourthintable2">Tác vụ</th>
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
                <img src="<?php echo $hinhanh ?>" alt="<?php echo $mota ?>" class="ImgTd"></td>
            <td class="firsttdintable2"><?php echo $mota ?></td>
            <td class="secondtdintable2"><?php echo $gia , "đ"?></td>
            <td class="btn-primary2"><a href="SP/sua.php?id=<?php echo $id ;?>" class="btn-primary">Sua</a></td>
            <td><a href="SP/xoa.php?id=<?php echo $id ;?>" class="btn-secondary">Xoa</a></td>
        </tr> 
        <?php }
        mysqli_close($con);
        ?>

    </table>
    <button type="sumbit" onclick="hienthiSP();" id="btn" name="btn" class="ThemMoiButton1"> Thêm Mới</button>
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