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
                    <td><img src="upload/pegawai/<?=$data['photo_pegawai']; ?>" widht="50" height="50" style="border-radius: 50%;"><br>
                    <a href="photo_pegawai.php?id=<?=$data['id_pegawai']?>">Change photo</a>
                </td>
                    <td><p><a href="edit_pegawai.php?id=<?=$data['id_pegawai']?>" class="btn-end">Edit pegawai</a></p></td>
                    <td><p><a href="delete_pegawai.php?id=<?=$data['id_pegawai']?>"onclick= "return confirm('Are you sure?')" class="btn-del">Delete pegawai</a></p></td>
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