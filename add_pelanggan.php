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
            <h3>Form Add Pelanggan</h3>
            <form method="post" action="Create_pelanggan.php">
                <table>
                <tr>
                        <td class="add-td">Nama</td>
                        <td><input type="text" name="nama_pelanggan" required></td>
                    </tr>
                    <!-- <tr>
                        <td class="add-td">Type</td>
                        <td>
                            <select name="jenis_sepatu" required>
                                <option value="">Choose</option>
                                <option value="sneakers">sneakers</option>
                                <option value="wedges">wedges</option>
                                <option value="loafres">loafres</option>
                                <option value="boots">boots</option>
                                <option value="slip on">slip on</option>
                            </select>
                        </td>
                    </tr> -->
                    <tr>
                    <td class="add-td">Photo Sepatus</td>
                        <td><input type="file" name="photo_sepatu" required></td>
                    </tr>
                    <tr>
                        <td class="add-td">Address</td>
                        <td><textarea name="alamat_pelanggan" required></textarea></td>
                    </tr>
                    <tr>
                        <td class="add-td">Phone</td>
                        <td><input type="text" name="phone_pelanggan" required></td>
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
            <p><a href="read_pelanggan.php" class="btn-end">Back</a></p>
        </div>
    </div>
</body>
</html>