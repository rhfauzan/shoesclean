<?php
    if(isset($_POST['save'])){
        //Call Connection php mysql
        include "connection.php";

        $folder = "upload/pelanggan/";

    if(move_uploaded_file($_FILES['photo_sepatu']['tmp_name'],$folder . $_FILES['photo_sepatu']['name'] )){
        $photo=$_FILES['photo_sepatu']['name'];
    
        // sql query INSERT INTO VALUES
        $query = "INSERT INTO pelanggan (nama_pelanggan,merk_sepatu,type_sepatu, photo_sepatu, id_paket, alamat_pelanggan, phone_pelanggan)
        VALUES ('$_POST[nama_pelanggan]','$_POST[merk_sepatu]','$_POST[type_sepatu]','$photo', '$_POST[id_paket]', '$_POST[alamat_pelanggan]','$_POST[phone_pelanggan]')";
    
        //run query
        $create = mysqli_query($db_connection, $query);
    
        if($create){
            //echo"<p>Pet add successfully !</p>";
            echo"<script> alert('add succesfully !'); </script>";
        }else{
            //echo"<p>Pet add failed !</p>";
            echo"<script> alert('add failed !'); </script>";
        }

        
    } else {
        echo "<script>alert('Upload Photo Failed');window.location.replace('booking.php?id=".$_POST['id_paket'].";</script>";
    }
    
    }
    ?>
    <!-- <p><a href="read_pet_210032.php">Back To Pets List</a></p> -->
    <script>window.location.replace("booking.php");</script>