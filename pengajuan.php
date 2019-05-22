<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Pengajuan</title>
</head>
<body>

<h1 class="text-center">DAFTAR PENGAJUAN</h1><br><br>

    <form>
<table class="table table-striped ">
<tr>
<th>Kode Surat</th>
<th>Jenis Surat</th>
<th>Judul</th>
<th>Tempat Tujuan</th>
<th>Aksi</th>
</tr>

<?php  
include 'koneksi.php';
$no_urut = 0;
$query="SELECT * FROM tujuan WHERE stat = 'pengajuan'";
$hasil = mysqli_query($koneksi,$query);
$nomor=1;


    //buat looping u/semua data/record
    while($data=mysqli_fetch_object($hasil)){
        //tampilkan data/record
        echo "<tr>
    <td>".$data->id_transaksi."</td>
    <td>".$data->jenis_surat."</td>
    <td>".$data->judul."</td>
    <td>".$data->tempat_tujuan."</td>
    <td><a class='btn btn-success' href='info_pengajuan.php?q=$data->id_transaksi'>Info</a></td>
    <tr>";
        //penambahan nomor
        $nomor++;

}
?>
</form>
</body>
</html>
