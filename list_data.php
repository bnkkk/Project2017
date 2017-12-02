<?php include ("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>แสดงรายการสินค้า</title>
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
    $sql = "select * from tbl_product order by p_name";
    //$sql="SELECT tbl_product.p_id,tbl_product.p_name,tbl_product.p_detail,tbl_product.p_price,tbl_product.p_photo,tbl_type.type_name
    //FROM tbl_product
    //INNER JOIN tbl_type ON tbl_product.type_id=tbl_type.type_id";
    $result=$conn->query($sql);

     ?>
     <h1> รายการสินค้าทั้งหมด </h1>
     <a href="form_add_data.php">[เพิ่มสินค้า]</a> | <a href="form_add_type.php">เพิ่มประเภทสินค้า </a> |
     <hr>
     <?php
        if (mysqli_num_rows($result)>0){
          //output data of each NoRewindIterator
          while($rs = mysqli_fetch_assoc($result))
          {
      ?>

        <img src="images/<?php echo $rs['p_photo'];?>" width="400" style="border: 1px solid #cccccc;"><br>
        <b>ชื่อสินค้า : </b> <?php echo $rs ['p_name']; ?><br>
        <b>รายละเอียดสินค้า : </b> <?php echo $rs ['p_detail']; ?><br>
        <b>ราคา : </b> <?php echo $rs ['p_price']; ?><b> บาท</b><br>
        <!-- show type name -->
      <?php
          $temp=$rs['type_id'];
          $sql2="select * from tbl_type where type_id=$temp";
          $result2=$conn->query($sql2);
          $rs2 = mysqli_fetch_assoc($result2);
      ?>
        <b>ประเภทสินค้า : </b> <?php echo $rs2['type_name'];?> <br>

        <a href="edit_form_data.php?p_id=<?php echo $rs ['p_id'];?>">[แก้ไขข้อมูล]</a><br>
        <a href="delete_data.php?p_id=<?php echo $rs ['p_id'];?>">[ลบข้อมูล]</a><br>
        ____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________<br>
        <?php
      } //end while
    }else{
      echo "No result";
    }
    mysqli_close($conn);
          ?>
  </body>
</html>
