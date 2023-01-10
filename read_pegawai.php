<!DOCTYPE html>
<?php
// session_start();
// if(!isset($_SESSION['login'])){
//     echo "<script>alert('please login first ! '); window.location.replace('form_login_210032.php');</script>";
// }
?>
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
			<div class="menu">
				<ul>
					<!-- <li><a href="index.php">Home </a></li>
					<li><a href="read_shoes.php">Data shoes </a></li>
					<li><a href="read_pegawai.php">Data pegawai </a></li>
					<li><a href="read_user_210032.php">Data Users </a></li> -->
                    <?php
                    // include "connection.php";
                    // $query = "SELECT * FROM users_210066 WHERE userid_210066= '$_SESSION[userid]'";
                    // $user = mysqli_query($db_connection, $query); 
                    // $data = mysqli_fetch_assoc($user);
                    ?>
                    <!-- <li>
                        <a href="change_photo_210032.php">
                        <img src="uploads/users/<?= $data['photo_210066']; ?>" class="profile">
                        </a>
                    </li> -->
				</ul>
			</div>
		</div>

        <div class="container-content">
            <h3 style="padding-bottom: 10px; padding-left: 10px;">Pegawai List</h3>
            
            <p><a href="add_pegawai.php" class="btn-end">Add New Pegawai</a></p>
            <br>
            <table class="table-content">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Photo</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    //call connection
                    include "connection.php";
                    //make a sql query
                    $query = "SELECT * FROM pegawai";
                    //run query
                    $doctors = mysqli_query($db_connection, $query);

                    $i=1;
                    foreach ($doctors as $data) :
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['nama_pegawai']; ?></td>
                    <td><?php echo $data['gender_pegawai']; ?></td>
                    <td><?=  $data['alamat_pegawai']; ?></td>
                    <td><?=  $data['phone_pegawai']; ?></td>
                    <td><button class="action-btn"><img src="upload/pegawai/<?=$data['photo_pegawai']; ?>" widht="50" height="50"><br>
                    <a href="photo_pegawai.php?id=<?=$data['id_pegawai']?>">Change photo</a>
                </td>
                    <td><p><a href="edit_pegawai.php?id=<?=$data['id_pegawai']?>" class="btn-end">Edit pegawai</a></p></td>
                    <td><p><a href="delete_pegawai.php?id=<?=$data['id_pegawai']?>"onclick= "return confirm('Are you sure?')" class="btn-del">Delete pegawai</a></p></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <br>
            <p><a href="index.php" class="btn-end">Back</a></p>
        </div>

    </div>
    

</body>

</html>