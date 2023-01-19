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
					<li><a href="read_pelanggan.php">Data Pelanggan </a></li>
					<li><a href="read_pegawai.php">Data Pegawai </a></li> -->
					<!-- <li><a href="read_user_210032.php">Data Users </a></li> -->
				</ul>
			</div>
		</div>

        <div class="container-content">
            <h3>Form Add Paket</h3>
            <form method="post" action="Create_paket.php">
                <table>
                <tr>
                        <td class="add-td">Nama Paket</td>
                        <td><input type="text" name="nama_paket" required></td>
                    </tr>
                    <tr>
                        <td class="add-td">Deskripsi Paket</td>
                        <td><textarea name="deskripsi_paket" required></textarea></td>
                    </tr>
                    <tr>
                        <td class="add-td">Harga Paket</td>
                        <td><input type="number" name="harga_paket" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="save" value="SAVE">
                            <input type="reset" name="reset" value="RESET">
                        </td>
                    </tr>
                </table>
            </form>
            <br>
            <p><a href="index.php" class="btn-end">Back</a></p>
        </div>
    </div>
</body>
</html>