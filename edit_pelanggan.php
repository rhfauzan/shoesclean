<?php 
//     session_start();
//     if(!isset($_SESSION['login'])) {
// 	    echo "<script>alert('Please Login First !');window.location.replace('form_login_210066.php');</script>";
// }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Doctor</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-img" style="background-image: url(img/pets.jpg);">

    <!-- <div class="container">
        <div class="navbar">
            <ul>
                <li><a href="index.php">home</a></li>
                <li><a href="change_password_210066.php">change password</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div> -->
        <?php
        include "connection.php";
        //make query dari id
        $query="SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'";
        //menjalankan query
        $pet= mysqli_query($db_connection,$query);
        //extrak hasil query
        $data=mysqli_fetch_assoc($pet);
    ?>
        <div class="add">
            <h3>Edit Pet Form</h3>
            <form clacc="add-form" method="post" action="update_pelanggan.php">
                <table>
                    <tr>
                        <td class="add-td">Nama</td>
                        <td><input type="text" name="nama_pelanggan" value="<?=$data['nama_pelanggan']?>" required>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td class="add-td">Type</td>
                        <td>
                            <select name="jenis_sepatu" value="<?=$data['jenis_sepatu']?>" required>
                                <option value="">Choose</option>
                                <option value="sneakers" <?=($data['jenis_sepatu']=='sneakers')?'selected':'';?>>sneakers</option>
                                <option value="wedges" <?=($data['jenis_sepatu']=='wedges')?'selected':'';?>>wedges</option>
                                <option value="loafres" <?=($data['jenis_sepatu']=='loafres')?'selected':'';?>>loafres
                                </option>
                                <option value="boots" <?=($data['jenis_sepatu']=='boots')?'selected':'';?>>boots
                                </option>
                                <option value="slip on" <?=($data['jenis_sepatu']=='slip on')?'selected':'';?>>slip on
                                </option>
                            </select>
                        </td>
                    </tr> -->
                    <tr>
                        <td class="add-td">Address</td>
                        <td><textarea name="alamat_pelanggan" required><?=$data['alamat_pelanggan']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="add-td">Phone</td>
                        <td><input type="text" name="phone_pelanggan" value="<?=$data['phone_pelanggan']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="action-btn" type="submit" name="save">Save</button>
                            <button class="action-btn" type="reset" name="reset">Reset</button>
                            <button class="action-btn" type="cancel" name="cancel"><a
                                    href="read_pelanggan.php">Cancel</a></button>
                            <input type="hidden" name="id_pelanggan" value="<?=$data['id_pelanggan']?>">
                        </td>
                    </tr>
                </table>
            </form>
</body>

</html>