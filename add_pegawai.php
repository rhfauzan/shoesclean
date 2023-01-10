<!DOCTYPE html>

<html>
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
			<!-- <div class="menu">
				<ul>
					<li><a href="index.php">Home </a></li>
					<li><a href="read_shoes.php">Data Shoes </a></li>
					<li><a href="read_pegawai.php">Data Pegawai </a></li>
					<li><a href="read_user_210032.php">Data Users </a></li>
				</ul>
			</div> -->
		</div>

        <div class="container-content">
            <h3> Form Add Pegawai </h3>
            <form method="post" action="create_pegawai.php">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="nama_pegawai" required></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender_pegawai" value="Male" required> Male 
                            <input type="radio" name="gender_pegawai" value="Female" required> Female 
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea name="alamat_pegawai" required></textarea></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="number" name="phone_pegawai" required></td>
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
			<p class="button"><a href="read_pegawai.php" class="btn-end" >Back</a></p>  
        </div>
    </div>  
</body>
</html>