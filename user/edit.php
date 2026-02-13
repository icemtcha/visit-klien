<?php
include "../config/database.php";

// Ambil data klien berdasarkan kode
$kode = $_GET['kode'] ?? '';
$klien = mysqli_query($conn, "SELECT * FROM tbl_klien WHERE kode_klien='$kode'");
$d = mysqli_fetch_assoc($klien);

// Update data jika tombol Update diklik
if (isset($_POST['update'])) {
    $nama_klien = $_POST['nama_klien'];

    $update = mysqli_query($conn, "UPDATE tbl_klien SET nama_klien='$nama_klien' WHERE kode_klien='$kode'");
    if ($update) {
        echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Klien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f0f9;
            padding: 30px;
        }

        .card {
            max-width: 500px;
            background: #fff;
            padding: 25px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        h2 {
            margin-top: 0;
            color: #6f42c1;
        }

        label {
            font-size: 14px;
        }

        input,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            font-size: 14px;
        }

        input {
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #6f42c1;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background: #59339d;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #6f42c1;
            text-decoration: none;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 14px;
            background: #6f42c1;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn:hover {
            background: #59339d;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Edit Klien</h2>

        <form method="POST">
            <label>Kode Klien</label>
            <input type="text" value="<?= $d['kode_klien']; ?>" disabled>

            <label>Nama Klien</label>
            <input type="text" name="nama_klien" value="<?= $d['nama_klien']; ?>" required>

            <button name="update">Update</button>
        </form>
        <br>
        <a href="index.php" class="btn">Kembali</a>
    </div>

</body>

</html>