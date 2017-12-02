<?php include ("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Type</title>
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
    $type_name=$_POST['type_name'];


    //SQL add new record
    $sql = "insert into tbl_type(type_name) values ('$type_name')";

      if($conn->query($sql)===TRUE){

    ?>
    เพิ่มประเภทสินค้า :<?php echo $type_name; ?>
    <br><br>
    <?php
      }else{
          echo "Error : ".$sql."<br>".$conn->error;
      }
     ?>
    <a href="form_add_type.php">เพิ่มประเภทสินค้า </a> | <a href="form_add_data.php">เพิ่มรายการสินค้า </a> | <a href="list_data.php">แสดงรายการสินค้า </a>
    | <a href="list_type.php">แสดงประเภทสินค้า </a>
    <?php $conn->close(); ?>
  </body>
</html>
