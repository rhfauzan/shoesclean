<!DOCTYPE html>

<html>
<head>
    <title>Shoes Cleaning Service</title>
</head>
<body>
    <h1>Shoes Cleaning Service</h1>
    <h3> Form Edit Pegawai </h3>
    <?php
        include "connection.php";
        //make query dari id
        $query="SELECT * FROM pegawai WHERE id_pegawai='$_GET[id]'";
        //menjalankan query
        $doctor= mysqli_query($db_connection,$query);
        //extrak hasil query
        $data=mysqli_fetch_assoc($doctor);
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
                <td>Photo</td>
                <td><img src="upload/pegawai/<?= $data['photo_pegawai']; ?>" width="30%"></td>
            </tr>

            <tr>
                <td></td>
                <td> <input type="file" name="new_photo_210032" required></td>
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
    <p><a href="read_pegawai.php">Cancel</a></p>  
</body>
</html>