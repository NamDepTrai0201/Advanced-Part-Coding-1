<?php
   session_start();
   if($_SESSION ['username'] == null){
    header('location: ../../index.php');
   }
   $con = mysqli_connect('localhost' , 'root' , '' , 'webadvance') or die('Khong the ket noi toi database');
   $id = $_GET['id'];

   $querry = "DELETE FROM categories WHERE id = '$id'";
   if(mysqli_query($con , $querry)){
    header('location: ../index.php');
   }else{
    $re = "loi them moi" . mysqli_error($con);
   }
   mysqli_close($con);
?>