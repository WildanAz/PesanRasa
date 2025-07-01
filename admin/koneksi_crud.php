<?php
$coon = mysqli_connect("localhost","root","","pesanrasa");
if (!$coon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>