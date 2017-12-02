<?php include ("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>แสดงประเภทสินค้า</title>
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
    //select data
    $sql = "select * from tbl_type order by type_id";
    $result=$conn->query($sql);

     ?>
     <h1> ประเภทสินค้าทั้งหมด </h1>
     <a href="form_add_data.php">[เพิ่มสินค้า]</a> | <a href="form_add_type.php">เพิ่มประเภทสินค้า </a> |
     <hr>
     <?php
        if (mysqli_num_rows($result)>0){
          //output data of each NoRewindIterator
          while($rs = mysqli_fetch_assoc($result))
          {
      ?>

        <b>ประเภทสินค้า : </b> <?php echo $rs ['type_name']; ?><br>
        <a href="edit_form_type.php?type_id=<?php echo $rs ['type_id'];?>">[แก้ไขข้อมูล]</a><br>
        <a href="delete_type.php?type_id=<?php echo $rs ['type_id'];?>">[ลบข้อมูล]</a><br>
        ..............................................<br>
        <?php
      } //end while
    }else{
      echo "No result";
    }
    mysqli_close($conn);
          ?>
  </body>
</html>
