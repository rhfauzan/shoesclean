<?php
session_start();
if(!isset($_SESSION['login'])){
    echo "<script>alert('please login first ! '); window.location.replace('form_login.php');</script>";
}
if($_SESSION['usertype'] != 'Admin') {
    echo "<script>alert('Access forbidden !');window.location.replace('index.php');</script>";
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
        <div class="container-card">
        <h2 class="title-back"><a href="index.php">Back</a></h2>
            <?php
            include "connection.php";
            //make query dari id
            $query="SELECT * FROM pegawai WHERE id_pegawai='$_GET[id]'";
            //menjalankan query
            $pegawai= mysqli_query($db_connection,$query);
            //extrak hasil query
            $data=mysqli_fetch_assoc($pegawai);
        ?>
        <form method="post" action="update_pegawai.php">
            <table>
            <tr>
                    <td>Name</td>
                    <td><input type="text" name="nama_pegawai"value="<?=$data['nama_pegawai']?>" required></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender_pegawai" value="Male"<?=($data['gender_pegawai']=='Male')?'checked':'';?> required> Male 
                        <input type="radio" name="gender_pegawai" value="Female"<?=($data['gender_pegawai']=='Female')?'checked':'';?> required> Female 
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea name="alamat_pegawai" required><?=$data['alamat_pegawai']?></textarea></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone_pegawai"value="<?=$data['phone_pegawai']?>" required></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="save" value="SAVE">
                        <input type="reset" name="reset" value="RESET">
                        <input type="hidden" name="photo_pegawai" value="<?= $data['photo_pegawai']; ?>" />
                        <input type="hidden" name="id_pegawai" value="<?=$data['id_pegawai']?>">
                    </td>
                </tr>
            </table>
        </form> 
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