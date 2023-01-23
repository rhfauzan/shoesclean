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

        <?php if ($_SESSION['usertype'] == 'Admin') { ?>
        <div class="container-card-c">
        <h2 class="title-back"><a href="index.php">Back</a></h2>
        <br>
        <?php 
            $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
            $year = date('Y');
            ?>
            
            <form>
                <p>Select
                <select name="month" required>
                        <option value="">Month</option>
                        <?php for($m=1;$m<=12;$m++) { ?>
                        <option value="<?=$m?>"><?=$months[$m-1]?></option>
                        <?php } ?>
                    </select>
                    <select name="year" required>
                        <option value="">Year</option>
                        <?php for($y=0;$y<=2;$y++) { ?>
                        <option value="<?=$year-$y?>"><?=$year-$y?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="View Report">
                </p>
            </form>
            <br>
            <?php
            if(isset($_GET['year'])) {
                include 'connection.php';
                //$query="SELECT * FROM medicals";
                    $query="SELECT p.nama_pelanggan, p.merk_sepatu, p.type_sepatu, p.photo_sepatu, pk.nama_paket, pk.harga_paket, p.alamat_pelanggan, p.phone_pelanggan, pg.nama_pegawai, p.konfirmasi FROM paket AS pk
                            INNER JOIN pelanggan AS p ON pk.id_paket=p.id_paket INNER JOIN pegawai AS pg ON p.id_pegawai=pg.id_pegawai WHERE MONTH(p.tanggal)='$_GET[month]' AND YEAR(p.tanggal)='$_GET[year]' GROUP BY p.id_pelanggan";
                $report=mysqli_query($db_connection,$query);
            ?>
            <h4>Report periode <?=$months[$_GET['month']-1]?> - <?=$_GET['year']?></h4>
            <br>
            <table class="table-content">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Photo </th>
                    <th>Nama Paket</th>
                    <th>Nama Pegawai</th>
                    <th>Alamat</th>
                    <th>No.Tlp</th>
                    <th>status</th>
                    <th>Harga Paket</th>

                </tr>
                <?php
                if(mysqli_num_rows($report) > 0) {
                    $i=1; $total=0;
                    foreach($report as $data) :
                        $total=$total+$data['harga_paket']
                ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$data['nama_pelanggan']?></td>
                    <td><?=$data['merk_sepatu']?></td>
                    <td><?=$data['type_sepatu']?></td>
                    <td><img src="upload/pelanggan/<?=$data['photo_sepatu']; ?>" widht="50" height="50"></td>
                    <td><?=$data['nama_paket']?></td>
                    <td><?=$data['nama_pegawai']; ?></td>
                    <td><?=$data['alamat_pelanggan']?></td>
                    <td><?=$data['phone_pelanggan']?></td>
                    <td><?=$data['konfirmasi']?></td>
                    <td><?=$data['harga_paket']?></td>
                </tr>
                <?php endforeach; ?>
                <tr><th colspan="11" align="right">Total : Rp. <?=$total?></th></tr>
                <?php } else { ?>
                <tr><td colspan="7" align="center">No record !</td></tr>
                <?php } ?>
            </table>
            <?php } ?>
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