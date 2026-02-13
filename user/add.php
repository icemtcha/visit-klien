<?php
include "../config/database.php";

$query = mysqli_query(
    $conn,
    "SELECT kode_klien FROM tbl_klien ORDER BY kode_klien DESC LIMIT 1"
);

$data = mysqli_fetch_assoc($query);

if ($data) {
    $lastKode = (int) substr($data['kode_klien'], 1);
    $newKode  = "K" . ($lastKode + 1);
} else {
    $newKode = "K101";
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_klien'];

    mysqli_query(
        $conn,
        "INSERT INTO tbl_klien (kode_klien, nama_klien)
         VALUES ('$newKode', '$nama')"
    );

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Klien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f0f9;
            padding: 30px;
        }

        .card {
            max-width: 400px;
            background: #fff;
            padding: 25px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        h2 {
            margin-top: 0;
            color: #6f42c1;
        }

        input,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
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
        <h2>Tambah Klien</h2>

        <form method="POST">
            <label>Kode Klien</label>
            <input type="text" value="<?= $newKode ?>" readonly>

            <label>Nama Klien</label>
            <input type="text" name="nama_klien" required>

            <button name="simpan">Simpan</button>
        </form>
        <br>
        <a href="index.php" class="btn">Kembali</a>
    </div>

</body>

</html>