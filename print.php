<!DOCTYPE html>
<html>

<head>
    <title>Shclean.co</title>
</head>

<body>
    <h1>Bukti Transaksi</h1>
<?php
                    include "connection.php";                                             // call connection

                    $queryid="SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'";        // make query SELECT FROM WHERE
            
                    $id=mysqli_query($db_connection, $queryid);                                   // Run Query
            
                    $data1=mysqli_fetch_assoc($id);
            
                 $queryjual="SELECT p.nama_pelanggan, p.merk_sepatu, p.type_sepatu, p.photo_sepatu, pk.id_paket, pk.nama_paket, pk.harga_paket, p.alamat_pelanggan, p.phone_pelanggan, pg.nama_pegawai, p.konfirmasi FROM paket AS pk
                 INNER JOIN pelanggan AS p ON pk.id_paket=p.id_paket INNER JOIN pegawai AS pg ON p.id_pegawai=pg.id_pegawai GRoUP BY p.id_pelanggan";
                 $jual =mysqli_query($db_connection,$queryjual);
                 $data=mysqli_fetch_assoc($jual);
                ?>

                <?php
                    include "connection.php";                                             // call connection

                    $queryid="SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'";        // make query SELECT FROM WHERE
            
                    $id=mysqli_query($db_connection, $queryid);                                   // Run Query
            
                    $data1=mysqli_fetch_assoc($id);
            
                 $queryjual="SELECT p.nama_pelanggan, p.merk_sepatu, p.type_sepatu, p.photo_sepatu, pk.id_paket, pk.nama_paket, pk.harga_paket, p.alamat_pelanggan, p.phone_pelanggan, pg.nama_pegawai, p.konfirmasi FROM paket AS pk
                 INNER JOIN pelanggan AS p ON pk.id_paket=p.id_paket INNER JOIN pegawai AS pg ON p.id_pegawai=pg.id_pegawai GRoUP BY p.id_pelanggan";
                 $jual =mysqli_query($db_connection,$queryjual);
                 $data=mysqli_fetch_assoc($jual);
                ?>
                <h3 style="text-align:center; margin-top:10px; font-size:30px; color:black; font-family:'Consolas';">
                Faktur Pembelian</h3>
                <hr style="border:1px dashed grey;">
                <table align=right style="width:fit-content;">
                    <tr>
                        <td>No. Faktur </td>
                        <td>: <?=$data1['id_pelanggan']?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: <?=$data1['tanggal']?></td>
                    </tr>
                </table>
                <br><br><br>
                <hr style="border:1px dashed grey;">
                <table style="width:fit-content;">
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>: <?=$data1['nama_pelanggan']?></td>
                    </tr>
                    <tr>
                        <td>Merk Sepatu</td>
                        <td>: <?=$data1['merk_sepatu']?></td>
                    </tr>
                    <tr>
                        <td>Type Sepatu</td>
                        <td>: <?=$data1['type_sepatu']?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?=$data1['alamat_pelanggan']?></td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>: <?=$data1['phone_pelanggan']?></td>
                    </tr>
                    <tr>
                        <td>Metode Pembayaran</td>
                        <td>: <?=$data1['metode_pembayaran']?></td>
                    </tr>
                </table>
            
                <br>

                <table border=1 style="width:100%;">
                    <tr align=left>
                        <th>Kode Paket</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th align=right>Harga</th>
                    </tr>
                    <?php
                    $i=1; $total=0;
                        $total=$total+$data['harga_paket']
                ?>
                <tr>
                    <td><?=$data['id_paket']?></td>
                    <td><?=$data['nama_paket']?></td>
                    <td align=right><?="Rp. " . number_format($data['harga_paket'], 0, ".", ".");?> </td>
                    <!-- <td align="right"><?="Rp. " . number_format($data['harga_paket'], 0, ".", ".");?></td> -->
                </tr>
                <tr>
                    <th colspan="3" align="right">Total :</th>
                    <th align="right">Rp. <?=number_format($total, 0, ".", ".");?></th>
                </tr>
                </table> 
            

        <script>
            window.print();
            setTimeout(window.close, 10);
        </script>

        <!-- <a class="btn green" href="katalog.php">Selesai</a> -->
</body>
</html>