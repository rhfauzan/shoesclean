<?php
if(isset($_POST['save'])) { //chech variable POST from FORM
    include "connection.php"; //call connection php mysql

//sql query INSERT INTO SET
$query = "INSERT INTO perawatan SET
            id_pelanggan    = '$_POST[pet_id]',
            id_pegawai = '$_POST[doctor_id]',
            diagnose  = '$_POST[diagnose]',
            treatment = '$_POST[treatment]',
            cost      = '$_POST[cost]'";

// run query
$create = mysqli_query($db_connection, $query);

if($create) { //check if query TRUE/success
    // echo "<p>Medical updated successfully !</p>"; // success msg (html version)
    echo "<script> alert ('Medical added successfully !'); </script>"; //success msg (javascript version)
} else {
    // echo "<p>Medical updated failed !</p>"; // fail msg (html version)
    echo "<script> alert ('Medical add failed !'); </script>"; //fail msg (javascript version)
    }   
}
?>
<!-- <p><a href="read_doctor.php">BACK TO DOCTORS LIST</a></p> -->
<script>window.location.replace("perwatan.php?id_pelanggan=<?=$_POST['id_pelanggan'];?>");</script>