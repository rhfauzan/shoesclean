<?php
    // echo $_POST['doctors_name_210032'] . "<br>";
    // echo $_POST['doctors_gender_210032'] . "<br>";
    // echo $_POST['doctors_address_210032'] . "<br>";
    // echo $_POST['doctors_phone_210032'] . "<br>";
    if(isset($_POST['save'])){
        //Call Connection php mysql
        include "connection.php";
    
        // sql query INSERT INTO VALUES
        $query = "INSERT INTO pegawai (nama_pegawai, gender_pegawai, alamat_pegawai, phone_pegawai)
        VALUES ('$_POST[nama_pegawai]',' $_POST[gender_pegawai]',' $_POST[alamat_pegawai]',' $_POST[phone_pegawai]')";
    
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
    <script>window.location.replace("read_pegawai.php");</script>
?>
