<?php include("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Type</title>
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
    // receive valua from foem_add_data
    $type_id=$_POST['type_id'];
    $type_name=$_POST['type_name'];


    //receive edit data
    $sql="UPDATE tbl_type SET type_name='$type_name' where type_id='$type_id'";
    $result=$conn->query($sql);
    ?>
    ประเภทสินค้า : <?php echo $type_name; ?>
    <br><br>

    <a href="list_type.php">แสดงประเภทสินค้า</a> | <a href="list_data.php">แสดงรายการสินค้า </a>
    <?php $conn->close();?>
  </body>
</html>
