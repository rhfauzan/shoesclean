<?php
    if(isset($_POST['save'])){
        //Call Connection php mysql
        include "connection.php";

        $folder = upload/pelanggan/ $_POST['photo_sepatu'];
    
        // sql query INSERT INTO VALUES
        $query = "INSERT INTO pelanggan (nama_pelanggan,merk_sepatu,type_sepatu photo_sepatu, paket, harga, alamat_pelanggan, phone_pelanggan)
        VALUES ('$_POST[nama_pelanggan]','$_POST[merk_sepatu]','$_POST[type_sepatu]','$folder','$_POST[paket]','$_POST[harga]','$_POST[alamat_pelanggan]','$_POST[phone_pelanggan]')";
    
        //run query
        $create = mysqli_query($db_connection, $query);
    
        if($create){
            //echo"<p>Pet add successfully !</p>";
            echo"<script> alert('add succesfully !'); </script>";
        }else{
            //echo"<p>Pet add failed !</p>";
            echo"<script> alert('add failed !'); </script>";
        }
    
    }
    ?>
    <!-- <p><a href="read_pet_210032.php">Back To Pets List</a></p> -->
    <!-- <script>window.location.replace("read_pelanggan.php");</script> -->