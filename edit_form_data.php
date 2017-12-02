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
    //recrive valua
    $p_id = $_GET['p_id'];

    $sql = "select * from tbl_product where p_id='$p_id'";
    $result = $conn->query($sql);

    $rs=mysqli_fetch_assoc($result);
    ?>
    <h1 align="center">แก้ไขข้อมูลสินค้า</h1>
    <form name="form1" method="post" action="edit_data.php" enctype="multipart/form-data">
      <img src="images/<?php echo $rs['p_photo'];?>" width="400" style="border: 1px solid #cccccc;">
      <br>
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br>
      ชื่อสินค้า : <input name="product_name" type="text" size="50" value="<?php echo $rs['p_name']?>">
      <br><br>
      รายละเอียดสินค้า : <textarea name="detail" cols="30" rows="4"><?php echo $rs['p_detail'];?></textarea>
      <br><br>
      ราคา : <input name="price" type="text" size="50" value="<?php echo $rs['p_price']?>">
      <br><br>

      ประเภทสินค้า : <?php
      $sql2 = "SELECT * FROM tbl_type ORDER BY type_id";
      $result2 = $conn->query($sql2);
      ?>

      <select name="sel_type">
      <?php while($rs2 = mysqli_fetch_assoc($result2)){?>
      <option value="<?php echo $rs2['type_id'];?>"> <?php echo $rs2['type_name'];?>
      </option>
      <?php }//end while ?>
      </select>

      <br><br>
      <input name="p_id" type="hidden" value="<?php echo $rs['p_id'];?>">
      <input name="p_photo" type="hidden" value="<?php echo $rs['p_photo'];?>">
      <input type="submit" value="Submit" class="but" name="butsubmit">
      <input type="reset" value="Reset" class="but" name="butreset">
      <br>
    </form>
    <?php $conn->close();?>
  </body>
</html>
