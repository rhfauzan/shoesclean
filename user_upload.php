<?php
session_start();
if(isset($_POST['upload'])) {
	include "connection.php";
	
	$folder = 'upload/user/';
	if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {
		
		$photo=$_FILES['new_photo']['name'];
		$query="UPDATE user SET userphoto='$photo' WHERE userid='$_POST[userid]'";
		$upload=mysqli_query($db_connection,$query);
		
		if($upload) {
			$_SESSION['photo'] = $photo;
			if($_POST['photo'] !== 'default.png'){
				unlink($folder . $_POST['photo']);
			}
			echo "<script>alert('Change Photo Success !');window.location.replace('index.php');</script>";
		} else {
			echo "<script>alert('Change Photo Failed !');window.location.replace('change_photo.php?id=$_POST[userid]');</script>";
		}
	} else {
		echo "<script>alert('Upload Photo Successed !');window.location.replace('change_photo.php?id=$_POST[userid]');</script>";
	}
}