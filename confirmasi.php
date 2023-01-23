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
            <h1 class="title">Home</h1>
            <br>

        <?php if ($_SESSION['usertype'] == 'Pelanggan') { ?>
        <div class="container-card-c">
        <h2 class="title-back"><a href="index.php">Back</a></h2>
        <table class="table-content">
                <tr class="theader">
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Merk Sepatu</th>
                    <th>Type Sepatu</th>
                    <th>Photo Sepatu</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Nama Pegawai</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>status</th>
                    <th colspan="2"></th>
                </tr>
                <?php
            //call connection
            include "connection.php";
            //make a sql query
            $query = "SELECT * FROM pelanggan AS p INNER JOIN paket AS pk ON p.id_paket=pk.id_paket
                    INNER JOIN pegawai AS pg ON p.id_pegawai=pg.id_pegawai WHERE userid = '$_SESSION[userid]' AND p.status = 1 GROUP BY p.id_pelanggan";
            //run query
            $pelanggan = mysqli_query($db_connection, $query);

            $i=1;
            foreach ($pelanggan as $data) :
        ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td align="center">
                           <?=$data['nama_pelanggan']; ?>
                    </td>
                    <td><?=  $data['merk_sepatu']; ?></td>
                    <td><?=  $data['type_sepatu']; ?></td>
                    <td><img src="upload/pelanggan/<?=$data['photo_sepatu']; ?>" widht="50" height="50" style="border-radius: 50%;"><br>
                    <a href="photo_sepatu.php?id=<?=$data['id_pelanggan']?>">Change photo</a>
                    </td>
                    <td><?=  $data['nama_paket']; ?></td>
                    <td><?=  $data['harga_paket']; ?></td>
                    <td><?=  $data['nama_pegawai']; ?></td>
                    <td><?=  $data['alamat_pelanggan']; ?></td>
                    <td><?=  $data['phone_pelanggan']; ?></td>
                    <td><?=  $data['konfirmasi']; ?></td>
                    <td>
                    <?php if($data['konfirmasi'] == 'Belum Diterima') { ?>
                            <p><a class="btn-end" href="status.php?id=<?=$data['id_pelanggan']?>">Sepatu Diterima</a></p>
                    <?php } else { ?>
                            <p><a class="btn-end-act">Sepatu Terambil</a></p>
                    <?php } ?>
                    </td>
                    <td>
                        <?php if($data['konfirmasi'] == 'Diterima') { ?>
                            <p><a class="btn-done" href="status.php?id=<?=$data['id_pelanggan']?>"
                                    onclick="return confirm('Are you sure?')">Selesai</a></p>
                        <?php } else { ?>
                            <p>Belum Selesai</p>
                        <?php } ?>
                        </td>
                </tr>
                <?php endforeach; ?>
            </table>
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