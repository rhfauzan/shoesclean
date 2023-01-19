<?php
session_start();
if(!isset($_SESSION['login'])){
    echo "<script>alert('please login first ! '); window.location.replace('form_login_210032.php');</script>";
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
                        <li class="list"><a href="#">Booking</a></li>
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
                <form method="post" action="create_booking_210032.php">
                    
                      <div class="user-details">
                        <div class="input-box">
                          <span class="details">Nama</span>
                          <input type="text" placeholder="Masukan Nama" name="nama_210032" required>
                        </div>
                        <div class="input-box">
                          <span class="details">Email</span>
                          <input type="text" placeholder="Masukan Email" name="email_210032" required>
                        </div>
                        <div class="input-box">
                          <span class="details">No.Telephone</span>
                          <input type="number" placeholder="Masukan No.Telephone" name="no_tlp_210032" required>
                        </div>
              
                        <div class="input-box">
                          <span class="details">Tanggal</span>
                          <input type="date" placeholder="Masukan No.Telephone" name="tanggal_210032" required>
                        </div>
              
                        <div class="input-box">
                          <span class="details">Destinasi</span>
                          <input type="text" placeholder="Masukan Destinasi" name="id_wisata_210032"value="<?=$data['nama_tempat_210032']?>" required>
                          </input>  
                        </div>
                        <div class="input-box">
                          <span class="details">Harga</span>
                          <input type="number" placeholder="Harga Tiket" id="harga" name="id_wisata_210032"value="<?=$data['harga_tiket_210032']?>" required>
                        </div>
                        <div class="input-box">
                          <span  class="details">Jumlah Tiket</span>
                          <input type="number" placeholder="Masukan Jumlah Tiket" id="jumlah" name="jumlah_tiket_210032" required onchange=(hitung());>
                        </div>
                        <div class="input-box">
                          <span class="details">Total harga</span>
                          <input type="text" placeholder="Total Harga" id="total" name="total_harga_210032" required>
                        </div>
                        
                      </div>
                      
                      <div class="button">
                        <input type="submit" name="save" value="Pesan">
                        <input type="hidden" name="id_wisata_210032" value="<?=$data['id_wisata_210032']?>">
                      </div>
                    </form>
            </div>
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