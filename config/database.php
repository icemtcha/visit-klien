<?php
$conn = mysqli_connect("localhost", "root", "", "jadwal_klien");

if (!$conn) {
    die("Koneksi gagal");
}
