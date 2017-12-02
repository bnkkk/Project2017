<?php include("connect.php");?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Product</title>
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
    $p_id=$_POST['p_id'];
    $product_name=$_POST['product_name'];
    $detail=$_POST['detail'];
    $price=$_POST['price'];
    $p_photo=$_POST['p_photo'];
    $sel_type=$_POST['sel_type'];

    // step Upload file
    $filename=$_FILES["fileToUpload"]["name"];
    if($filename!=""){

       // step Upload file
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // Check if file already exists
      if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  $filename=basename( $_FILES["fileToUpload"]["name"]);
              } else {
                      echo "Sorry, there was an error uploading your file.";
              }// end if move_uploaded_file
      }//$uploadOk == 0

    }else{
            $filename=$p_photo;
    } //$filename!=""
    //receive edit data
    $sql="UPDATE tbl_product SET p_name='$product_name',p_detail='$detail',p_price='$price',p_photo='$filename',type_id='$sel_type' where p_id='$p_id'";
    $result=$conn->query($sql);
    ?>

    <!-- show type name -->
  <?php
      $sql2="select * from tbl_type where type_id=$sel_type";
      $result2=$conn->query($sql2);
      $rs2 = mysqli_fetch_assoc($result2);
  ?>

    <img src="images/<?php echo $filename;?> "width="400" style="border: 1px solid #cccccc;"><br>
    ชื่อสินค้า :<?php echo $product_name; ?> 
    <br><br>
    รายละเอียด : <?php echo $detail; ?>
    <br><br>
    ราคา : <?php echo $price; ?> บาท
    <br><br>
    ประเภทสินค้า : </b> <?php echo $rs2['type_name'];?> <br>
    <br><br>

    <a href="form_add_data.php">เพิ่มรายการสินค้า </a> | <a href="list_data.php">แสดงรายการสินค้า </a>
    <?php $conn->close();?>
  </body>
</html>
