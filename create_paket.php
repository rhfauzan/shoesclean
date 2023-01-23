<?php
    if(isset($_POST['save'])){
        //Call Connection php mysql
        include "connection.php";
    
        // sql query INSERT INTO VALUES
        $query = "INSERT INTO paket (nama_paket, deskripsi_paket, harga_paket)
        VALUES ('$_POST[nama_paket]','$_POST[deskripsi_paket]','$_POST[harga_paket]')";
    
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
    <script>window.location.replace("index.php");</script>