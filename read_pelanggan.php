<?php 
//     session_start();
//     if(!isset($_SESSION['login'])) {
// 	    echo "<script>alert('Please Login First !');window.location.replace('form_login_210066.php');</script>";
// }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shoes Cleaning Service</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-img" style="background-image: url(img/pets.jpg);">
        <div class="med">
            <h3>List Pelanggan</h3>
            <!-- <button class="action-btn"><a href="add_Pelanggan.php">Add New Pelanggan</a></button> -->
            <table border="1" cellspacing="0" cellpadding="4">
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
                    <th colspan="2">Action</th>
                </tr>
                <?php
            //call connection
            include "connection.php";
            //make a sql query
            $query = "SELECT * FROM pelanggan AS p INNER JOIN paket AS pk ON p.id_paket=pk.id_paket INNER JOIN pegawai AS pg ON p.id_pegawai=pg.id_pegawai GROUP BY p.id_pelanggan";
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
                    <td><button class="action-btn"><img src="upload/pelanggan/<?=$data['photo_sepatu']; ?>" widht="50" height="50"><br>
                    <a href="photo_sepatu.php?id=<?=$data['id_pelanggan']?>">Change photo</a>
                    </td>
                    <td><?=  $data['nama_paket']; ?></td>
                    <td><?=  $data['harga_paket']; ?></td>
                    <td><?=  $data['nama_pegawai']; ?></td>
                    <td><?=  $data['alamat_pelanggan']; ?></td>
                    <td><?=  $data['phone_pelanggan']; ?></td>
                    <td><button class="action-btn">
                            <p><a href="edit_pelanggan.php?id=<?=$data['id_pelanggan']?>">Edit Pet</a></p>
                        </button></td>
                    <td><button class="action-btn">
                            <p><a href="delete_pelanggan.php?id=<?=$data['id_pelanggan']?>"
                                    onclick="return confirm('Are you sure?')">Delete Pet</a></p>
                        </button></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <button class="action-btn"><a href="index.php">Menu</a></button>

</body>

</html>