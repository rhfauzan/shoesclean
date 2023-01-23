<?php
session_start();
if(isset($_POST['save'])){
        //Call Connection php mysql
        include "connection.php";

        $query = "SELECT id_pegawai FROM pegawai";
        $result = mysqli_query($db_connection, $query);
        $min = 100; $max = 0;
        foreach ($result as $data) :
            if($data['id_pegawai'] < $min) $min = $data['id_pegawai'];
            if($data['id_pegawai'] > $max) $max = $data['id_pegawai'];
        endforeach;
        $random = rand($min, $max);

        $folder = "upload/pelanggan/";

    if(move_uploaded_file($_FILES['photo_sepatu']['tmp_name'],$folder . $_FILES['photo_sepatu']['name'] )){
        $photo=$_FILES['photo_sepatu']['name'];
    
        // sql query INSERT INTO VALUES
        $query = "INSERT INTO pelanggan (nama_pelanggan,merk_sepatu, type_sepatu, photo_sepatu, userid, id_paket, id_pegawai, alamat_pelanggan, phone_pelanggan, metode_pembayaran)
        VALUES ('$_POST[nama_pelanggan]','$_POST[merk_sepatu]','$_POST[type_sepatu]','$photo', '$_SESSION[userid]', '$_POST[id_paket]', '$random', '$_POST[alamat_pelanggan]','$_POST[phone_pelanggan]','$_POST[metode_pembayaran]')";
    
        //run query
        $create = mysqli_query($db_connection, $query);
    
        if($create){
            $data = mysqli_insert_id($db_connection);
            //echo"<p>Pet add successfully !</p>";
            echo"<script> alert('add succesfully !'); window.location.replace('facture.php?id=".$data."'); </script>";
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
    <script>window.location.replace("facture.php");</script>