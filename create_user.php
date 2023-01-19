<?php
//check variable POST from form"
if(isset($_POST['save'])){
    //Call Connection php mysql
    include "connection.php";

    //create default password_200035
    $password = password_hash($_POST['usertype'], PASSWORD_DEFAULT);

    // sql query INSERT INTO VALUES
    $query = "INSERT INTO user (username, password_user, usertype, fullname)
    VALUES ('$_POST[username]', '$password',' $_POST[usertype]',' $_POST[fullname]')";

    //run query
    $create = mysqli_query($db_connection, $query);

    if($create){
        //echo"<p>Pet add successfully !</p>";
        echo"<script> alert('user add succesfully !'); </script>";
    }else{
        //echo"<p>Pet add failed !</p>";
        echo"<script> alert('user add failed !'); </script>";
    }

}
?>
<!-- <p><a href="read_pet.php">Back To Pets List</a></p> -->
<script>window.location.replace("form_login.php");</script>