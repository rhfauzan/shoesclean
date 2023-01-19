<?php
		session_start();
		//call connection
		include "connection.php";
		
		//query select
		// $query = "SELECT * FROM user WHERE userid = '$_SESSION[user_photo]'";
		
		// //run query
		// $user=mysqli_query($db_connection,$query);
		
		// //extract data
		// $data=mysqli_fetch_assoc($user);
	?>
<!doctype html>
<html>
<head>
    <title>Shoes Cleaning Service</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
    <h1>Shoes Cleaning Service</h1>
    <h3>Change Photo</h3>
<div>
		<form method="POST" action="user_upload.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td></td>
                <td><img src="upload/user/<?= $_SESSION['photo'] ?>" width="30%"></td>
            </tr>
            <tr>
                <td>New Photo</td>
                <td>: <input type="file" name="new_photo" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;
                    <input type="submit" name="upload" value="upload">
                    <input type="hidden" name="photo" value="<?= $_SESSION['photo'] ?>" />
                    <input type="hidden" name="userid" value="<?= $_SESSION['userid'] ?>" />
                </td>
            </tr>
        </table>
    </form>
    <p><a href="index.php">CANCEL</a></p>
</div>
</body>
</html>