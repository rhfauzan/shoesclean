<?php
//check variable POST from form"
if(isset($_POST['save'])){
    //Call Connection php mysql
    include "connection.php";

    // sql query set where
    $query = "UPDATE user SET
            username = '$_POST[username]',
            password = '$_POST[password]',
            usertype = '$_POST[usertype]',
            fullname = '$_POST[fullname]'
            WHERE userid = '$_POST[userid]'";
    //run query
    $update = mysqli_query($db_connection, $query);

    if($update){
        //echo"<p>Pet add successfully !</p>";
        echo"<script> alert('user update succesfully !'); </script>";
    }else{
        //echo"<p>Pet add failed !</p>";
        echo"<script> alert('user update failed !'); </script>";
    }

}
?>
<!-- <p><a href="read_pet_210066.php">Back To Pets List</a></p> -->
<script>window.location.replace("read_user.php");</script>