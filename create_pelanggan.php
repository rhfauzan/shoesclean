<?php
    if(isset($_POST['save'])){
        //Call Connection php mysql
        include "connection.php";
    
        // sql query INSERT INTO VALUES
        $query = "INSERT INTO pelanggan (nama_pelanggan, photo_sepatu, alamat_pelanggan, phone_pelanggan)
        VALUES ('$_POST[nama_pelanggan]','$_POST[photo_sepatu]','$_POST[alamat_pelanggan]','$_POST[phone_pelanggan]'";
    
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
    <script>window.location.replace("read_pelanggan.php");</script>