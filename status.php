<?php 
session_start();
include "connection.php";
$query = "SELECT konfirmasi FROM pelanggan WHERE id_pelanggan = '$_GET[id]'";
$result = mysqli_query($db_connection, $query);
$data = mysqli_fetch_assoc($result);
if($data['konfirmasi'] == 'Belum Diterima'){
    $query = "UPDATE pelanggan SET konfirmasi = 'Diterima' WHERE id_pelanggan = '$_GET[id]'";
    $result = mysqli_query($db_connection, $query);
    // if($result){
    //     echo"<script> alert('Sepatu Terambil !'); </script>";
    // }else{
    //     echo"<script> alert('Gagal !'); </script>";
    // }
}
if($data['konfirmasi'] == 'Diterima'){
    $query = "UPDATE pelanggan SET status = 0 WHERE id_pelanggan = '$_GET[id]'";
    $result = mysqli_query($db_connection, $query);
    // if($result){
    //     echo"<script> alert('Sepatu Terambil !'); </script>";
    // }else{
    //     echo"<script> alert('Gagal !'); </script>";}
}


?>
<script>window.location.replace("confirmasi.php");</script>