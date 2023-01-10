<!DOCTYPE html>

<head>
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
            <h3>Form Medicals</h3>
            <?php
                include "connection.php";
                //make query dari id
                $querypet="SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[Id_pelanggan]'";
                //menjalankan query
                $pet= mysqli_query($db_connection,$querypet);
                //extrak hasil query
                $data1=mysqli_fetch_assoc($pet);

                $querydoc="SELECT * FROM pegawai";
                $doctors= mysqli_query($db_connection,$querydoc);

            ?>
            <table>
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
            </table>  <hr>  
            <form method="post" action="create_perawatan.php">
                <table>
                    <tr>
                        <td>Doctor</td>
                        <td>
                            <select name="id_pegawai" required>
                                <option value="">Choose</option>
                                <?php foreach($doctors as $data2) : ?>
                                <option value="<?=$data2['id_pegawai']?>"><?=$data2['nama_pegawai']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Diagnose</td>
                        <td><textarea name="diagnose" required></textarea></td>
                    </tr>

                    <tr>
                        <td>Treatment</td>
                        <td><textarea name="treatment" required></textarea></td>
                    </tr>
                    
                    <tr>
                        <td>Cost ($)</td>
                        <td><input type="number" name="cost" required></input></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="save" value="SAVE">
                            <input type="reset" name="reset" value="RESET">
                            <input type="hidden" name="id_pelanggan" value="<?=$data1['id_pelanggan']?>">
                        </td>
                    </tr>
                </table>
            </form>
            <br>
            <p><a href="perawatan.php?pet_id=<?=$data1['id_pelanggan']?>" class="btn-end">Back</a></p>
        </div>
    </div>
    
    
</body>
</html>