<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Cleaning Service</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
			<div class="logo">
				<h1>Shoes Cleaning Service</h1>
			</div>
			<div class="menu">
				<ul>
					<!-- <li><a href="index.php">Home </a></li>
					<li><a href="read_pet.php">Data Pets </a></li>
					<li><a href="read_doctors.php">Data Doctors </a></li>
					<li><a href="read_user.php">Data Users </a></li> -->
				</ul>
			</div>
		</div>

        <div class="container-content">
            <h3>Medicals Records</h3>
            <?php
                include "connection.php";
                //make query dari id
                $querypet="SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id_pelanggan]'";
                //menjalankan query
                $pet= mysqli_query($db_connection,$querypet);
                //extrak hasil query
                $data1=mysqli_fetch_assoc($pet);

                //query 1 tabel
                // $querymed="SELECT * FROM medicals WHERE id_pelanggan='$_GET[id_pelanggan]'";

                //query 2 tabel
                $querymed="SELECT * FROM perawatan AS m, pegawai AS d WHERE m.id_pelanggan='$_GET[id_pelanggan]' AND m.id_pegawai=d.id_pegawai ";
                $medicals= mysqli_query($db_connection,$querymed);

            ?>
            <table style="padding-bottom: 10px;">
            <tr>
                    <td>Id/Name</td>
                    <td>: <?=$data1['id_pelanggan']?> / <?=$data1['nama_pelanggan']?> </td>
                </tr>
                <tr>
                    <td>Shoes</td>
                    <td>: <img src="upload/pelanggan/<?= $data['photo_sepatu']; ?>" class="profile"> </td>
                </tr>
                <tr>
                    <td>Data</td>
                    <td>: <?=$data1['address_pelanggan']?> / <?=$data1['phone_pelanggan']?> </td>
                </tr>
            </table>
            <p><a href="add_perawatan.php?id_pelanggan=<?=$data1['id_pelanggan']?>" class="btn-end">Add new records </a></p>
            <br>
            <table class="table-content">
                <tr>
                    <th>No</th>
                    <!-- <th>Date</th> -->
                    <th>Pegawai</th>
                    <!-- <th>Symptom</th> -->
                    <th>Diagnose</th>
                    <th>Treatment</th>
                    <th>Cost ($)</th>
                </tr>

                <!-- will loop if the data not empty -->
                <?php
                if(mysqli_num_rows ($medicals) > 0) {
                    $i=1;
                    foreach ($medicals as $data2) :
                ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=date('D, d M Y H:i:s',strtotime($data2['mr_date']))?></td>
                    <td><?=$data2['nama_pegawai']?></td>
                    <!-- <td><?=$data2['symptom']?></td> -->
                    <td><?=$data2['diagnose']?></td>
                    <td><?=$data2['treatment']?></td>
                    <td><?=$data2['cost']?></td>
                </tr>
                <?php
                    endforeach;
                    } else {
                ?>
                <tr><td colspan="7" align='center'>No records!</td></tr>
                <?php } ?>
            </table>
            <br>
            <p><a href="read_pelanggan.php" class="btn-end">Back to pet list</a></p>
        </div>
    </div>
    
</body>
</html>