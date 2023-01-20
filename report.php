<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['login'])){
    echo "<script>alert('please login first ! '); window.location.replace('form_login.php');</script>";
}
?>
<html>
<head>
    <title>Shclean</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
			<div class="logo">
				<h1>Shclean</h1>
			</div>
			<div class="menu">
				<ul>
					<!-- <li><a href="index.php">Home </a></li>
					<li><a href="read_pet.php">Data Pets </a></li>
					<li><a href="read_doctors.php">Data Doctors </a></li>
					<li><a href="read_user.php">Data Users </a></li> -->
                    <?php
                    include "connection.php";
                    $query = "SELECT * FROM user WHERE userid= '$_SESSION[userid]'";
                    $user = mysqli_query($db_connection, $query); 
                    $data = mysqli_fetch_assoc($user);
                    ?>
                    <li>
                        <!-- <a href="change_photo.php">
                        <img src="upload/user/<?= $data['photo']; ?>" class="profile">
                        </a> -->
                    </li>
				</ul>
			</div>
		</div>

        <div class="container-content">
            <h1>Monthiy Report</h1><hr>
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
                    $query="SELECT p.nama_pelanggan, p.merk_sepatu, p.type_sepatu, p.photo_sepatu, pk.nama_paket, pk.harga_paket, p.alamat_pelanggan, p.phone_pelanggan, pg.nama_pegawai FROM paket AS pk
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
                    <td><?=$data['harga_paket']?></td>
                </tr>
                <?php endforeach; ?>
                <tr><th colspan="7" align="right">Total : Rp. <?=$total?></th></tr>
                <?php } else { ?>
                <tr><td colspan="7" align="center">No record !</td></tr>
                <?php } ?>
            </table>
            <?php } ?>
            <br>
            <p><a href="index.php" class="btn-end">Back to Home</a></p>
        </div>

    </div>
    
</body>
</html>