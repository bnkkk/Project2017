<?php include ("connect.php");?>
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
    //recive valua
    $type_id = $_GET['type_id'];

    $sql = "select * from tbl_type where type_id='$type_id'";
    $result = $conn->query($sql);

    $rs=mysqli_fetch_assoc($result);
    ?>
    <h1 align="center">แก้ไขประเภทสินค้า</h1>
    <form name="form1" method="post" action="edit_type.php">
      ประเภทสินค้า : <input name="type_name" type="text" size="50" value="<?php echo $rs['type_name']?>">
      <br><br>
      <input name="type_id" type="hidden" value="<?php echo $rs['type_id'];?>">
      <input type="submit" value="Submit" class="but" name="butsubmit">
      <input type="reset" value="Reset" class="but" name="butreset">
      <br>
    </form>
    <?php $conn->close();?>
  </body>
</html>
