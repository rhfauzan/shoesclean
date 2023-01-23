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
                        <li class="list"><a href="index.php">Home</a></li>
                        <li class="list"><a href="#">Price List</a></li>
                        <?php if ($_SESSION['usertype'] == 'Pelanggan') { ?>
                        <li class="list"><a href="booking.php">Booking</a></li>
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
            <h1 class="title">Price list</h1>
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
                    <a href="booking.php?id=<?php echo $data['id_paket']?>" style="text-decoration:none; color:white;">
                    <img src="assets/shoes.png" class="img-content">
                    <h2><?php echo $data['nama_paket']; ?></h2>
                    <p><?php echo $data['deskripsi_paket']; ?></p>
                    <p>Rp. <?php echo $data['harga_paket']; ?></p>
                    </a>
                    <a class="btn-price" href="booking.php?id=<?php echo $data['id_paket']?>">
                        <img class="arrow-price" src="assets/arrow-right.svg" alt="">
                    </a>
                    <?php if ($_SESSION['usertype'] == 'Admin') { ?>
                    <a href="delete_paket.php?id=<?=$data['id_paket']?>"onclick= "return confirm('Are you sure?')" class="btn-del">Delete</a>
                    <?php } ?>
                </div>
                <?php endforeach;?> 

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