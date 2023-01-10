<!DOCTYPE html>
<html>
<head>
    <title>Selfandy's Pet Clinic</title>
</head>
<body>
    <h1>Selfandy Pet Clinic</h1><hr>
    <h3>Change Pet Photo</h3>
    <?php 
      //call connection php mysql
      include "connection.php";

      //make query SELECT FROM WHERE
      $query="SELECT * FROM pelanggan WHERE id_pelanggan ='$_GET[id]'";

      //run query
      $pet=mysqli_query($db_connection,$query);

      //extract data from query result
      $data=mysqli_fetch_assoc($pet);
    ?>
    <form method="post" action="pupload_sepatu.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td></td>
                <td><img src="upload/pelanggan/<?=$data['photo_sepatu']; ?>" width="100" height="100"></td>
            </tr>
            <tr>
                <td>New Photo</td>
                <td>: <input type="file" name="new_photo" required /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;
                   <input type="submit" name="upload" value="UPLOAD" />
                   <input type="hidden" name="photo_sepatu" value="<?=$data['photo_sepatu']?>" />
                   <input type="hidden" name="id_pelanggan" value="<?=$data['id_pelanggan']?>" />
                </td>
            </tr>
        </table>
    </form>
    <p><a href="read_pelanggan.php">CANCEL</a></p>
</body>
</html>