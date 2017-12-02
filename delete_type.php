<?php include("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Type</title>
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

    $type_id=$_GET['type_id'];

    $sql="delete from tbl_type where type_id=$type_id";
    $result=$conn->query($sql);

    ?>
    <h1 align="center">รายการสินค้าที่ถูกลบ<br>
      <a href="list_type.php">ประเภทสินค้า</a>
    </h1>

  </body>
</html>
