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
        <table class="table-content" >
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>UserName</th>
                    <!-- <th>Password</th> -->
                    <th>UserType</th>
                    <th>FullName</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    //call connection
                    include "connection.php";
                    //make a sql query
                    $query = "SELECT * FROM user";
                    //run query
                    $pets = mysqli_query($db_connection, $query);

                    $i=1;
                    foreach ($pets as $data) :
                    ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td>
                        <img src="upload/user/<?php echo $data['userphoto']; ?>" width="50" height="50" style="border-radius: 50%;"><br>
                        
                    </td>
                    <!-- <td><?php echo $data['password']; ?></td> -->
                    <td><?php echo $data['usertype']; ?></td>
                    <td><?php echo $data['fullname']; ?></td>
                    <td><p><a href="edit_user.php?id=<?=$data['userid']?>" class="btn-end">Edit User</a></p></td>
                    <td><p><a href="delete_user.php?id=<?=$data['userid']?>"onclick= "return confirm('Are you sure?')" class="btn-del">Delete User</a></p></td>
                    <!-- <td><p><a href="reset_pw.php?id=<?= $data['userid'];?>&type=<?=$data['usertype'];?>" onclick="return confirm('Are you sure reset the password?')" class="btn-end">Reset Password</a></p></td> -->
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