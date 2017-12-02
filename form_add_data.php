<?php include ("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ฟอร์มบันทึกรายการสินค้า</title>

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
    //$type_id = $_GET['type_id'];

    //$sql = "SELECT * FROM tbl_type";
    //$result = $conn->query($sql);

    //$rs=mysqli_fetch_assoc($result);
    ?>
    <h1 align="center">เพิ่มข้อมูลสินค้า</h1>
    <form name="form1" action="add_data.php" method="post" enctype="multipart/form-data">

  ชื่อสินค้า : <input type="text" name="product_name" size="50" required><br><br>
  รายละเอียดสินค้า : <textarea cols="30" rows="4" name="detail"></textarea><br><br>
  ราคา : <input type="text" name="price" size="50"> บาท<br><br>
  ประเภทสินค้า : <?php
  $sql = "SELECT * FROM tbl_type ORDER BY type_id";
  $result = $conn->query($sql);
  ?>
  <select name="sel_type">
  <?php while($rs = mysqli_fetch_assoc($result)){?>
  <option value="<?php echo $rs['type_id'];?>"> <?php echo $rs['type_name'];?>
  </option>
  <?php }//end while ?>
  </select>
  <br><br>
  เลือกรูปภาพ : <input type="file" name="fileToUpload" id="fileToUpload">
  <br><br>
  <input type="submit" value="Submit" class="but" name="butsubmit">
  <input type="reset" value="Reset" class="but" name="butreset">
</form>

  </body>
</html>
