<?php
//check variable POST from form"
if(isset($_GET['id'])){
    //Call Connection php mysql
    include "connection.php";

    // sql query deleete from where
    $query = " DELETE FROM user WHERE userid = '$_GET[id]'";
    //run query
    $delete = mysqli_query($db_connection, $query);

    if($delete){
        //echo"<p>Pet add successfully !</p>";
        echo"<script> alert('user delete succesfully !'); </script>";
    }else{
        //echo"<p>Pet add failed !</p>";
        echo"<script> alert('user delete failed !'); </script>";
    }

}
?>

<script>window.location.replace("read_user.php");</script>