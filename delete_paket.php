<?php
//check variable POST from form"
if(isset($_GET['id'])){
    //Call Connection php mysql
    include "connection.php";

    // sql query deleete from where
    $query = " DELETE FROM paket WHERE id_paket = '$_GET[id]'";
    //run query
    $delete = mysqli_query($db_connection, $query);

    if($delete){
        //echo"<p>Pet add successfully !</p>";
        echo"<script> alert('delete succesfully !'); </script>";
    }else{
        //echo"<p>add failed !</p>";
        echo"<script> alert('delete failed !'); </script>";
    }

}
?>
<!-- <p><a href="read_pet_210066.php">Back To Pets List</a></p> -->
<script>window.location.replace("pricelist.php");</script>