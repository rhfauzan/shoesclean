<?php
if(isset($_POST['upload'])) {
    include "connection.php";

    $folder = 'upload/sepatu/';
    if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {

        $photo=$_FILES['new_photo']['name'];

        $query="UPDATE pelanggan SET photo_sepatu='$photo' WHERE id_pelanggan='$_POST[id_pelanggan]'";

        $upload=mysqli_query($db_connection,$query);

        if($upload) {
            if ($_POST['photo_sepatu'] == 'default.png') unlink($folder . $_POST['photo_sepatu']);

            echo "<script>alert('Change Photo Successed !');window.location.replace('confirmasi.php');</script>";
        } else {

            echo "<script>alert('Change Photo Failed !');window.location.replace('photo_sepatu.php?id=$_POST[id_pelanggan]');</script>";
        }
    } else {
        echo "<script>alert('Upload Photo Failed !');window.location.replace('photo_sepatu.php?id=$_POST[id_pelanggan]');</script>";
    }
}