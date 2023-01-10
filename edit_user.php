<!DOCTYPE html>
<html>
<head>
    <title>Selfandy's Pet Clinic</title>
</head>
<body>
    <h1> Selfandy's Pet Clinic</h1>
    <h3> Form Edit user </h3>
    <?php
        include "connection.php";
        //make query dari id
        $query="SELECT * FROM user WHERE userid='$_GET[id]'";
        //menjalankan query
        $user= mysqli_query($db_connection,$query);
        //extrak hasil query
        $data=mysqli_fetch_assoc($user);
    ?>
    <form method="post" action="update_user.php">
        <table>
            <tr>
                <td>UserName</td>
                <td><input type="text" name="username"value="<?=$data['username']?>" required></td>
            </tr>
            
            <tr>
                <td>UserType</td>
                <td>
                    <input type="radio" name="usertype" value="Staff"<?=($data['usertype']=='Staff')?'checked':'';?> required> Staff |
                    <input type="radio" name="usertype" value="Manager"<?=($data['usertype']=='Manager')?'checked':'';?> required> Manager 
                </td>
            </tr>
            <tr>
                <td>FullName</td>
                <td><input type="text" name="fullname"value="<?=$data['fullname']?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="save" value="SAVE">
                    <input type="reset" name="reset" value="RESET">
                    <input type="hidden" name="userid" value="<?=$data['userid']?>">
                </td>
            </tr>
        </table>
    </form>  
    <p><a href="read_user.php">Cancel</a></p>  
</body>
</html>