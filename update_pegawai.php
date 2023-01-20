<?php
   if (isset($_POST['save'])){
      include "connection.php";
   
      $query = "UPDATE pegawai SET
               nama_pegawai = '$_POST[nama_pegawai]',
               gender_pegawai = '$_POST[gender_pegawai]',
               alamat_pegawai = '$_POST[alamat_pegawai]',
               phone_pegawai = '$_POST[phone_pegawai]'
               WHERE id_pegawai = '$_POST[id_pegawai]'
               ";
   
      $update = mysqli_query($db_connection, $query);
   
      }
   ?>
   <?php
//    if(isset($_POST['save'])) {          //check variable POST from FORM
//     include "connection.php";    //call connection
    
//      $folder = 'upload/pegawai/';           //target folder for upload
//      if(move_uploaded_file($_FILES['new_photo_210032']['tmp_name'], $folder . $_FILES['new_photo_210032']['name'])) {
        
//          $photo=$_FILES['new_photo_210032']['name'];

//         $query="UPDATE pegawai SET photo_pegawai='$photo' WHERE id_pegawai='$_POST[id_pegawai]'";

//         $upload=mysqli_query($db_connection,$query);
        
//         if($upload) {
//             if ($_POST['photo_pegawai'] !== 'default.png') unlink($folder . $_POST['photo_pegawai']);

//             echo "<script>alert('Change Photo Successed !');window.location.replace('read_doctors_210032.php');</script>";
//         } else {

//             echo "<script>alert('Change Photo Failed !');window.location.replace('read_doctors_210032.php?id=$_POST[id_pegawai]');</script>";
//         }
//     } else {
//         echo "<script>alert('Upload Photo Failed !');window.location.replace('read_doctors_210032.php?id=$_POST[id_pegawai]');</script>";
//     }

?>
   <!--<p><a href="read_doctor_210036.php">BACK TO DOCTOR LIST</p> -->>
   <script>window.location.replace("read_pegawai.php");</script>

