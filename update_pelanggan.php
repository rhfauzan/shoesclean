<?php
//check variable POST from form"
if(isset($_POST['save'])){
    //Call Connection php mysql
    include "connection.php";

    // sql query set where
    $query = "UPDATE pelanggan SET
            nama_pelanggan = '$_POST[nama_pelanggan]',
            alamat_pelanggan = '$_POST[alamat_pelanggan]',
            phone_pelanggan = '$_POST[phone_pelanggan]',
            WHERE id_pelanggan = '$_POST[id_pelanggan]'";
    //run query
    $update = mysqli_query($db_connection, $query);

    if($update){
        //echo"<p>add successfully !</p>";
        echo"<script> alert('update succesfully !'); </script>";
    }else{
        //echo"<p>add failed !</p>";
        echo"<script> alert('update failed !'); </script>";
    }

}
?>
<!-- <p><a href="read_pet_210066.php">Back To Pets List</a></p> -->
<script>window.location.replace("read_pelanggan.php");</script>