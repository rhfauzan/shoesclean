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
            <h1 class="title">price list</h1>
            <br>
            <h2 class="title">Price List</h2>
            <div class="container-card">
                <form method="post" action="create_booking.php" enctype="multipart/form-data">
                <?php
                include "connection.php";
                $query = "SELECT * FROM paket WHERE id_paket = '$_GET[id]'";
                $paket = mysqli_query($db_connection,$query);
                $data = mysqli_fetch_assoc($paket);
                ?>
                      <div class="user-details">
                        <div class="input-box">
                          <span class="details">Nama</span>
                          <input type="text" placeholder="Masukan Nama" name="nama_pelanggan" required>
                        </div>
                        <div class="input-box">
                          <span class="details">Alamat</span>
                          <input type="text" placeholder="Masukan Alamat" name="alamat_pelanggan" required>
                        </div>
                        <div class="input-box">
                          <span class="details">No.Telephone</span>
                          <input type="number" placeholder="Masukan No.Telephone" name="phone_pelanggan" required>
                        </div>
                        <div class="input-box">
                          <span class="details">Merk Sepatu</span>
                          <input type="text" placeholder="Masukan Merk Sepatu" name="merk_sepatu" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Type Sepatu</span>
                            <select name="type_sepatu" required>
                                <option value="">Choose</option>
                                <option value="Sneakers">Sneakers</option>
                                <option value="Leathers">Leathers</option>
                                <option value="Sports">Sports</option>
                            </select>
                        </div>
                        <div class="input-box">
                          <span class="details">Foto Sepatu</span>
                          <input type="file" name="photo_sepatu" required>
                        </div>
                        <div class="input-box">
                          <span class="details">Paket</span>
                          <input type="text" placeholder="Masukan Destinasi" name="nama_paket"value="<?=$data['nama_paket']?>" readonly>
                          </input>  
                        </div>
                        <div class="input-box">
                          <span class="details">Harga</span>
                          <input type="number" placeholder="Harga Paket" id="harga" name="harga_paket"value="<?=$data['harga_paket']?>" readonly>
                        </div>
                        <div class="input-box">
                            <span class="details">Metode Pembayaran</span>
                            <select name="metode_pembayaran" required>
                                <option value="">Choose</option>
                                <option value="COD">COD</option>
                                <option value="BRI">BRI</option>
                                <option value="OVO">OVO</option>
                                <option value="SHOPEEPAY">SHOPEEPAY</option>
                                <option value="GOPAY">GOPAY</option>
                                <option value="DANA">DANA</option>
                            </select>
                        </div>
                        
                      </div>
                      
                      <div class="button">
                        <input target="_blank" type="submit" name="save" value="Pesan">
                        <input type="hidden" name="photo" value="<?= $_SESSION['photo'] ?>" />
                        <input type="hidden" name="id_paket" value="<?=$data['id_paket']?>">
                        <!-- <input type="hidden" name="userid" value="<?=$data['userid']?>"> -->
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