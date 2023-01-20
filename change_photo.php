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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shclean.co</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="navbar">
                    <img class="logo" src="assets/logo.png">
                    <ul>
                        <li class="list"><a href="index.php">Home</a></li>
                        <li class="list"><a href="pricelist.php">Price List</a></li>
                        <li class="list"><a href="booking.php">Booking</a></li>
                    </ul>
                    <?php
                    include "connection.php";
                    $query = "SELECT * FROM user WHERE userid= '$_SESSION[userid]'";
                    $user = mysqli_query($db_connection, $query); 
                    $data = mysqli_fetch_assoc($user);
                    ?>
                    <a href="change_photo.php">
                        <img class="profile" src="upload/user/<?= $data['userphoto']; ?>">
                    </a>
                    
            </div>
        </div>

        <div class="content">
            <h1 class="title">Profile</h1>
            <br>
            <h2 class="title">Change Photo</h2>
            <div class="container-card">
            <a href="logout.php" class="btn-end">Logout</a>
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
            </div>
           
            
        <br>
        
        
        </div>
        
    </div>

    <footer>
            <img class="logo-footer" src="assets/logo2.png">
        
            
        <div class="follow">
            <h1>FOLLOW US</h1>
            <div class="sosmed">
                <img src="assets/whatsapp (1).png" class="img-footer">
                <img src="assets/instagram.png" class="img-footer">
                <img src="assets/youtube (1).png" class="img-footer">
            </div>
            
        </div>
    </footer>
</body>
</html>