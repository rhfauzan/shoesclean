<!DOCTYPE html>
<?php
// session_start();
// if(!isset($_SESSION['login'])){
//     echo "<script>alert('please login first ! '); window.location.replace('form_login_210032.php');</script>";
// }
?>
<html lang="en">
<head>

    <title>Shoes Cleaning Service</title>
    <link rel="stylesheet" href="style1.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@400;700;900&display=swap');
    
    *{
        margin: 0;
        padding: 0;
    }
    html{
        scroll-behavior: smooth;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgb(187,210,197);
        background: linear-gradient(90deg, rgba(187,210,197,1) 0%, rgba(83,105,118,1) 100%);
        font-family: 'Poppins', sans-serif;
        
    }
    a:visited{
        text-decoration: none;
        color: white;
    }

    .container {
        
        margin: 3rem;
        padding: 1rem;
        width: 100%;
        heigth : 100%;
        /* background-color: white; */
        position: relative;
        overflow: hidden;
        
    }

    .container .header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 2.5rem;
        font-weight: 900;
        
    }

    .container-content{
        
        background-color: #f5f5f5;
        margin-top: 120px;
        border-radius: 20px
        
    }

    .wrapper-header{
        display: flex;
    }

    .container-content .header-content{
        font-size: 2.5rem;
        /* padding: 1rem; */
    }

    .container-content .usertype{
        position: absolute;
        font-size: 1.5rem;
        /* padding-left: 1rem; */
        font-weight: 400;
        /* left: 7.5%;
        top: 20%; */
    }

    .container-content .photo{
        border-radius: 50%;
        padding: 1rem;
        width: 90px;
        height: 90px;
    }
    

    .container-content .content{
        transform: translateX(20px);
        background-color: #D5D5D5 ;
        border-radius: 20px;
        display: flex;
        width: 51vw ;
        heigth: 100%;
        scroll-snap-type: x mandatory;
        overflow: auto;
        overflow-x: scroll;
        column-gap: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        object-fit: cover;
    }
    
    .content::-webkit-scrollbar{
        display: none;
    }
    .card{
        background-color: rgba(83,105,118,1);
        display: flex;
        text-decoration: none;
        color: white;
        scroll-snap-align: center;
        flex: none;
        heigth: 455px;
        width: 256px;
        padding: 10px 30px;
        border-radius: 20px;
    }

    .card .img-content{
        display: flex;
        left: 30px:
        justify-content: center;
        /* align-items: center: */
        width: 20%;
        heigth: 20%;
    }

    .btn-end:visited{
       color: black;
       position: relative;
    }
    .img-homepage{
        display: cover;
        position: absolute;
        width: 20%;
        heigth: 20%;
        /* transform: translateX(1200px); */
        top:10%;
        right: 13%;
    }

    
</style>

<body>
    <div class="container">
        <div class="header">
            <h1>Shoes Cleaning Service</h1>
        </div>

        <div class="container-content">
            <div class="wrapper-header">
                <?php
                include "connection.php";
                $query = "SELECT * FROM user WHERE userid= '$_SESSION[userid]'";
                $user = mysqli_query($db_connection, $query); 
                $data = mysqli_fetch_assoc($user);
                ?>
                <a href="change_photo_210032.php">
                    <img src="upload/user/<?= $data['photo']; ?>" class="photo">
                </a>
                    <div class="header-content">
                        <h3>Welcome to the Shoes Clean <?=$_SESSION['fullname'];?></h3>
                        <h3 class="usertype">you are login as <?=$_SESSION['usertype'];?></h3>
                    </div>            
            </div>
            
            
            <br>
            <div id="content" class="content">
                <div class="card">
                    <a href="read_pelanggan.php" style="text-decoration:none; color=white;">
                    <img src="img/sport-shoes.png" class="img-content">
                    <h2>List Pelanggan</h2>
                    <p>Daftar data sepatu yang dicuci</p>
                    </a>
                </div>

                <div class="card">
                    <a href="read_pegawai.php" style="text-decoration:none">
                    <img src="img/user.png" class="img-content">
                    <h2>Pegawai List</h2>
                    <p>Daftar data Pegawai</p>
                    </a>
                </div>

                <?php if($_SESSION['usertype']=='Manager') { ?>
                <div class="card">
                    <a href="read_user.php" style="text-decoration:none">
                    <img src="assets/user.png" class="img-content">
                    <h2>Users List</h2>
                    <p>Daftar data pengguna</p>
                    </a>
                </div>
                <?php }?>
                
            </div>
            <img src="Veterinary-bro.svg" class="img-homepage">
            
        <br>
        
        <p><a href="logout.php" class="btn-end">Logout</a></p>
        </div>
    </div>
    <!-- <script>
        var item = document.getElementById("content");

        window.addEventListener("wheel", function (e) {
        if (e.deltaY > 0) item.scrollLeft += 100;
        else item.scrollLeft -= 100;
        behavior: 'smooth'
        });
    </script> -->

    <!-- <ul>
        <li></li>
        <li><a href="read_doctors_210032.php">Doctors List</a></li>
        <li><a href="read_user_210032.php">User List</a></li>
    </ul> -->

    
</body>
</html>