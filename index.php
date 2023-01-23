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
            <h1 class="title">Home</h1>
            <br>
            <?php if ($_SESSION['usertype'] == 'Pelanggan') { ?> 
            <h2 class="title">About Us</h2>
            <?php } ?>
            <?php if ($_SESSION['usertype'] == 'Pelanggan') { ?>    
            <div class="container-card-b">
                <img src="assets/user.png" alt="">
                    <p>Shoes cleaning service merupakan aplikasi berbasis web yang memudahkan pengguna untuk membooking waktu untuk membersihkan Sepatu.
                        Sebelum menggunakan aplikasi shoes cleaning service pelanggan harus membuat akun terlebih dahulu, setelah akun berhasil dibuat maka selanjutnya
                        pelanggan melakukan login agar dapat masuk dan menggunakan fungsi yang ada. dalam aplikasi terdapat beberapa fungsi yang ada pada shoes cleaning service untuk
                        pelanggan seperti melihat price list dan booking, setelah pelanggan membooking pelanggan dapat memilih metode pembayaran yang tersedia. Setelah itu ketika pihak shoes cleaning service datang untuk mengambil maupun mengantarkan kembali sepatu pelanggan
                        maka pelanggan harus melakukan konfirmasi penerimaan dan pengembalian.
                    </p>
                    
                    
                </div>
                <?php } ?>

        <?php if ($_SESSION['usertype'] == 'Admin') { ?>
        <div class="container-card">
                <div class="card">
                    <a href="read_pelanggan.php" style="text-decoration:none; color:white;">
                    <img src="assets/sport-shoes.png" class="img-content">
                    <h2>Customer</h2>
                    <p>Daftar data pelanggan</p>
                    </a>
                </div>
                <div class="card">
                    <a href="read_pegawai.php" style="text-decoration:none; color:white;">
                    <img src="assets/employees.png" class="img-content">
                    <h2>Employees</h2>
                    <p>Daftar data pegawai</p>
                    </a>
                </div>
                <div class="card">
                    <a href="read_user.php" style="text-decoration:none; color:white;">
                    <img src="assets/user.png" class="img-content">
                    <h2>Users</h2>
                    <p>Daftar data pengguna</p>
                    </a>
                </div>
                <div class="card">
                    <a href="add_paket.php" style="text-decoration:none; color:white;">
                    <img src="assets/plus (1).png" class="img-content">
                    <h2>Add New Paket</h2>
                    <!-- <p>Daftar data pegawai</p> -->
                    </a>
                </div>
                <div class="card">
                    <a href="report.php" style="text-decoration:none; color:white;">
                    <img src="assets/appointment.png" class="img-content">
                    <h2>Monthly Report</h2>
                    <p>Daftar laporan bulanan</p>
                    </a>
                </div>
            </div>
            <?php } ?>
           

           
            
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