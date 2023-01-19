<?php
session_start();
if(!isset($_SESSION['login'])){
    echo "<script>alert('please login first ! '); window.location.replace('form_login.php');</script>";
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
                        <li class="list"><a href="#">Home</a></li>
                        <li class="list"><a href="#">Price List</a></li>
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
            <h1 class="title">Home</h1>
            <br>
            <h2 class="title">Price List</h2>
            <div class="container-card">
                <?php
                include "connection.php";
                $query = "SELECT * FROM paket";
                $paket = mysqli_query($db_connection, $query); 
                $i=1;
                foreach ($paket as $data):
                    
                ?>
                <div class="card">
                    <a href="booking.php" style="text-decoration:none; color:white;">
                    <img src="assets/shoes.png" class="img-content">
                    <h2><?php echo $data['nama_paket']; ?></h2>
                    <p><?php echo $data['deskripsi_paket']; ?></p>
                    <p><?php echo $data['harga_paket']; ?></p>
                    </a>
                    <a class="btn-price" href="#">
                        <img class="arrow-price" src="assets/arrow-right.svg" alt="">
                    </a>
                </div>
                <?php endforeach;?> 

                <!-- <div class="card">
                    <a href="read_pet_210032.php" style="text-decoration:none; color:white;">
                    <img src="assets/shoes.png" class="img-content">
                    <h2>Deep Clean</h2>
                    <p>Cuci Bagian Luar Dalam Sepatu</p>
                    <p>Rp.30.000</p>
                    </a>
                    <a class="btn-price" href="#">
                        <img class="arrow-price" src="assets/arrow-right.svg" alt="">
                    </a>
                </div>

                <div class="card">
                    <a href="read_pet_210032.php" style="text-decoration:none; color:white;">
                    <img src="assets/shoes.png" class="img-content">
                    <h2>Treatment Leather</h2>
                    <p>Cuci & Merawat Sepatu Kulit</p>
                    <p>Rp.40.000</p>
                    </a>
                    <a class="btn-price" href="#">
                        <img class="arrow-price" src="assets/arrow-right.svg" alt="">
                    </a>
                </div>

                <div class="card">
                    <a href="read_pet_210032.php" style="text-decoration:none; color:white;">
                    <img src="assets/shoes.png" class="img-content">
                    <h2>Treatment Sepatu Putih</h2>
                    <p>Cuci & Memutihkan Sepatu Putih</p>
                    <p>Rp.40.000</p>
                    </a>
                    <a class="btn-price" href="#">
                        <img class="arrow-price" src="assets/arrow-right.svg" alt="">
                    </a>
                </div> -->
            </div>
            <img src="Veterinary-bro.svg" class="img-homepage">
            
        <br>
        
        <p><a href="logout.php" class="btn-end">Logout</a></p>
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