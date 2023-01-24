<?php
if(isset($_POST['upload'])) {
    include "connection.php";

    $folder = 'upload/pegawai/';
    if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {

        $photo=$_FILES['new_photo']['name'];

        $query="UPDATE pegawai SET photo_pegawai='$photo' WHERE id_pegawai='$_POST[id_pegawai]'";

        $upload=mysqli_query($db_connection,$query);

        if($upload) {
            if ($_POST['photo_pegawai'] == 'default.png') unlink($folder . $_POST['photo_pegawai']);

            echo "<script>alert('Change Photo Successed !');window.location.replace('read_pegawai.php');</script>";
        } else {

            echo "<script>alert('Change Photo Failed !');window.location.replace('photo_pegawai.php?id=$_POST[pegawai]');</script>";
        }
    } else {
        echo "<script>alert('Upload Photo Failed !');window.location.replace('photo_pegawai.php?id=$_POST[pegawai]');</script>";
    }
}