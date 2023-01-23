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
    
    <p>No. Faktur               : <?=$data1['id_pelanggan']?></p>
    <p>Tanggal                  : <?=$data1['tanggal']?></p> <br>
    
    <p>Nama Pelanggan           : <?=$data1['nama_pelanggan']?></p>
    <p>Merk Sepatu              : <?=$data1['merk_sepatu']?></p>
    <p>Type Sepatu              : <?=$data1['type_sepatu']?></p> 
    <p>Alamat                   : <?=$data1['alamat_pelanggan']?></p>
    <p>No. Handphone            : <?=$data1['phone_pelanggan']?></p> <br>
    <p>Metode Pembayaran        : <?=$data1['metode_pembayaran']?></p>

    <table border="1">
        <tr>
            <!-- <th>No</th> -->
            <th>Kode Paket</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <!-- <th>Total</th> -->
        </tr>
        <?php
        $i=1; $total=0;
            $total=$total+$data['harga_paket']
    ?>
    <tr>
        <td><?=$i++?></td>
        <!-- <td align="center"><?=$data['id_paket']?></td> -->
        <td><?=$data['nama_paket']?></td>
        <td><?="Rp. " . number_format($data['harga_paket'], 0, ".", ".");?> </td>
        <!-- <td align="right"><?="Rp. " . number_format($data['harga_paket'], 0, ".", ".");?></td> -->
    </tr>
    <tr><th colspan="6" align="right">Total : Rp. <?=number_format($total, 0, ".", ".");?></th></tr>
    </table> 
    <p><a href="print.php?id_pelanggan=<?=$data[id]?>">print</a></p>
    <script>
        window.print();
    </script>
</body>

</html>