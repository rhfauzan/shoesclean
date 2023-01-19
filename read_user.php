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
			<div class="menu">
				<ul>
					<!-- <li><a href="index.php">Home </a></li>
					<li><a href="read_pet.php">Data Pets </a></li>
					<li><a href="read_doctors.php">Data Doctors </a></li>
					<li><a href="read_user.php">Data Users </a></li> -->
                    
				</ul>
			</div>
		</div>

        <div class="container-content">
            <h3 style="padding-bottom: 10px; padding-left:10px;">Users List</h3>
            <p><a href="add_user.php" class="btn-end">Add New User</a></p>
            <br>
            <table class="table-content" >
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>UserName</th>
                    <!-- <th>Password</th> -->
                    <th>UserType</th>
                    <th>FullName</th>
                    <th colspan="3">Action</th>
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
                        <img src="upload/user/<?php echo $data['userphoto']; ?>" width="50" height="50" ><br>
                        <a href="change_photo.php?id=<?=$data['userid']?>"> Change Photo</a>
                    </td>
                    <!-- <td><?php echo $data['password']; ?></td> -->
                    <td><?php echo $data['usertype']; ?></td>
                    <td><?php echo $data['fullname']; ?></td>
                    <td><p><a href="edit_user.php?id=<?=$data['userid']?>" class="btn-end">Edit User</a></p></td>
                    <td><p><a href="delete_user.php?id=<?=$data['userid']?>"onclick= "return confirm('Are you sure?')" class="btn-del">Delete User</a></p></td>
                    <td><p><a href="reset_pw.php?id=<?=$data['userid'];?>&type=<?=$data['usertype'];?>" onclick="return confirm('Are you sure reset the password?')" class="btn-end">Reset Password</a></p></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <br>
                <p><a href="index.php" class="btn-end">Back Home</a></p>
        </div>
    </div>
    

</body>

</html>