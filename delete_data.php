<?php include("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Product</title>
  </head>
  <body>
    <?php
    //Create connection
    $conn = new mysqli($servername,$username,$password,$database);

    //Check connection
    if($conn->connect_error){
      die("Connection failed : " . $conn->connect_error);
    }

    $conn->query("set NAMES tis620");

    $p_id=$_GET['p_id'];

    $sql="delete from tbl_product where p_id=$p_id";
    $result=$conn->query($sql);

    ?>
    <h1 align="center">รายการสินค้าที่ถูกลบ<br>
      <a href="list_data.php">List All</a>
    </h1>

  </body>
</html>
