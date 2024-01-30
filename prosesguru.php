<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
    // ambil data dari formulir
    if($_POST['aksi']=='add'){
    $nama = $_POST['nama_guru'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $notel = $_POST['no_telepon'];
    $email = $_POST['email'];
    // buat query
    $sql = "INSERT INTO data_guru (nama_guru, alamat, jenis_kelamin, no_telepon, email) 
    VALUE ('$nama', '$alamat', '$jk', '$notel','$email')";
    $query = mysqli_query($db, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} else if($_POST['aksi']=='edit'){
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama_guru'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $notel = $_POST['no_telepon'];
    $email = $_POST['email'];
    $sql = "UPDATE data_guru SET nama_guru='$nama', alamat='$alamat', jenis_kelamin='$jk', 
    no_telepon='$notel', email='$email' WHERE id_guru='$id_guru'";
    $query = mysqli_query($db, $sql);
    //apakah query hapus berhasil?
    if ($query){
        header('Location: index.php?status=sukses');
    }else{
        header('Location: index.php?status=gagal');
    }
}
}
if(isset($_GET['hapus'])){
    //ambil query dari Query string
    $id_guru = $_GET['hapus'];

    //buat query hapus
    $sql = "DELETE FROM data_guru WHERE id_guru='$id_guru';";
    $query = mysqli_query($db, $sql);

    //apakah query hapus berhasil?
    if($query){
        header('Location: index.php?status=sukses');
    }else {
        header('Location: index.php?status=gagal');
    }
}
?>