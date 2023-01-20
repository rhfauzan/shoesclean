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
            <h1 class="title">Home</h1>
            <br>
            <h2 class="title">About Us</h2>
            <div class="container-card">
            <img src="assets/user.png" alt="">
                <p>Shoes cleaning service merupakan aplikasi berbasis web yang memudahkan pengguna untuk membooking waktu untuk membersihkan Sepatu.
                    Sebelum menggunakan aplikasi shoes cleaning service pelanggan harus membuat akun terlebih dahulu, setelah akun berhasil dibuat maka selanjutnya
                    pelanggan melakukan login agar dapat masuk dan menggunakan fungsi yang ada. dalam aplikasi terdapat beberapa fungsi yang ada pada shoes cleaning service untuk
                    pelanggan seperti melihat price list dan booking, setelah pelanggan membooking pelanggan dapat memilih metode pembayaran yang tersedia. Setelah itu ketika pihak shoes cleaning service datang untuk mengambil maupun mengantarkan kembali sepatu pelanggan
                    maka pelanggan harus melakukan konfirmasi penerimaan dan pengembalian.
                </p>
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