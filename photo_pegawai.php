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
        if($_SESSION['usertype'] != 'Admin') {
            echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
        }
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
                        <?php if ($_SESSION['usertype'] == 'Pelanggan') { ?>  
                        <!-- <li class="list"><a href="booking.php">Booking</a></li> -->
                        <li class="list"><a href="confirmasi.php">Konfirmasi</a></li>
                        <?php } ?>
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
             
            <br>
            <h1 class="title">Change Pegawai Photo</h1>
            <div class="container-card">
            <br>
            <?php 
      //call connection php mysql
            include "connection.php";

            //make query SELECT FROM WHERE
            $query="SELECT * FROM pegawai WHERE id_pegawai ='$_GET[id]'";

            //run query
            $pet=mysqli_query($db_connection,$query);

            //extract data from query result
            $data=mysqli_fetch_assoc($pet);
            ?>
            <form method="post" action="upload_pegawai.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td></td>
                        <td><img src="upload/pegawai/<?=$data['photo_pegawai']?>" width="100" height="100"></td>
                    </tr>
                    <tr>
                        <td>New Photo</td>
                        <td>: <input type="file" name="new_photo" required /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;
                        <input type="submit" name="upload" value="UPLOAD" />
                        <input type="hidden" name="photo_pegawai" value="<?=$data['photo_pegawai']?>" />
                        <input type="hidden" name="id_pegawai" value="<?=$data['id_pegawai']?>" />
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