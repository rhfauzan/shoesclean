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

   <!--<p><a href="read_doctor_210036.php">BACK TO DOCTOR LIST</p> -->
   <script>window.location.replace("read_pegawai.php");</script>

