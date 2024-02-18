<?php
session_start();
require('config/fungsi.php');
$fung = new Fungsi;
if(!isset($_SESSION['data'])){
    echo "<script>";
    echo 'alert("Harus Login Dulu!"); ' ;
    echo 'window.location.href = "index.php?page=login";';
    echo '</script>';
}
require('layouts/dashboard/header.php');

if($_GET['page'] == 'admin'){
    include('auth/user.php');
} elseif($_GET['page'] == 'petugas'){
    include('auth/user.php');
} elseif($_GET['page'] == 'user'){
    // echo "user";
    include('auth/user.php');

//Kategori
}elseif($_GET['page'] == 'Kategoribuku'){
    // echo "ok";
    include('auth/kategoribuku.php');
}elseif($_GET['page'] == 'viewKategori'){
 $fung->viewKategori($query);
}elseif ($_GET['page'] == 'postKategori'){
    $NamaKategori = $_POST ['NamaKategori'];
    $fung->tambahKategori($NamaKategori);
}elseif($_GET['page'] == 'editKategori'){
    $KategoriID = $_POST ['KategoriID'];
    $fung->editKategori($KategoriID);
}elseif($_GET['page'] == 'updateKategori'){
    $KategoriID = $_POST ['KategoriID'];
    $NamaKategori = $_POST ['NamaKategori'];
    $fung->updateKategori($KategoriID, $NamaKategori);
}elseif($_GET['page'] == 'hapusKategori'){
    $fung->hapusKategori($_GET['KategoriID']);
}
//databuku
elseif ($_GET['page'] == 'databuku') {
    include('auth/databuku.php');
} elseif ($_GET['page'] == 'viewbuku') {
    $fung->viewDatabuku($query);
}elseif ($_GET['page'] == 'postdatabuku') {
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $Kategori = $_POST['Kategori'];
    $fung->tambahBuku($Judul, $Penulis, $Penerbit, $TahunTerbit, $Kategori);
}elseif($_GET['page'] == 'editdatabuku'){
    $BukuID = $_POST ['BukuID'];
    $Judul = $_POST ['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $fung->editBuku($BukuID);
}elseif($_GET['page'] == 'updatedatabuku'){
    $BukuID = $_POST ['BukuID'];
    $Judul = $_POST ['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    $fung->updatedatabuku($BukuID, $Judul, $Penulis, $Penerbit, $TahunTerbit);
}elseif($_GET['page'] == 'hapusBuku'){
    $fung->hapusBuku($_GET['BukuID']);
} elseif($_GET['page'] == 'ajukanpinjam') {
    $fung->ajukanpinjam($_POST['UserID'],$_POST['BukuID'], $_POST['TanggalPeminjaman']);
}elseif($_GET['page'] == 'postUlasan'){
    $UserID = $_POST['UserID'];
    $BukuID = $_POST['BukuID'];
    $Ulasan = $_POST['Ulasan'];
    $Ratting = $_POST['Ratting'];
    $fung->postUlasan($UserID, $BukuID, $Ulasan, $Ratting);
    var_dump($fung);

} 

//Ulasan
elseif($_GET['page'] == 'ulasan'){
    include('auth/ulasanbuku.php');
}elseif($_GET['page'] == 'viewUlasanBuku'){
 $fung->viewUlasan($query);
}
//peminjaman
elseif ($_GET['page'] == 'Peminjam'){
    include('auth/peminjaman.php');
} elseif($_GET['page'] == 'konfirmasiPinjaman') {
    $PeminjamanID = $_POST ['PeminjamanID'];
    $TanggalPengembalian = $_POST ['TanggalPengembalian'];
    $UserID = $_POST ['UserID'];
    $BukuID = $_POST ['BukuID'];
    $fung->konfirmasiPinjaman($PeminjamanID, $TanggalPengembalian, $UserID, $BukuID);
} elseif($_GET['page'] == 'konfirmasiPengembalian') {
    $PeminjamanID = $_POST ['PeminjamanID'];
    $fung->konfirmasiPengembalian($PeminjamanID);
} elseif($_GET['page'] == 'hapusPeminjam') {
    $fung->hapusPeminjam($_GET['PeminjamanID']);
} 

//printlaporan
elseif ($_GET['page'] == 'printlaporan'){
    include('auth/printlaporan.php');
}elseif($_GET['page'] == 'koleksi') {
    require('auth/koleksi.php');
} elseif($_GET['page'] == 'printlaporan') {
    require('auth/printpdf.php');
} elseif($_GET['page'] == 'ulasanbuku') {
    require('auth/ulasan.php');
} elseif($_GET['page'] == 'hapusUlasan') {
    $fung->hapusUlasan($_GET['UlasanID']);
}

require('layouts/dashboard/footer.php');

