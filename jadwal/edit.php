<?php
include "../config/database.php";

$klien = mysqli_query($conn, "SELECT * FROM tbl_klien");

$id = intval($_GET['id']);
$agenda = mysqli_query($conn, "SELECT * FROM tbl_agenda WHERE id=$id");
$d = mysqli_fetch_assoc($agenda);


if (isset($_POST['update'])) {
    $kode_klien = $_POST['kode_klien'];
    $tanggal    = $_POST['tanggal'];
    $kegiatan   = $_POST['kegiatan'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($conn, "
        UPDATE tbl_agenda
        SET tanggal='$tanggal', kegiatan='$kegiatan', kode_klien='$kode_klien', keterangan='$keterangan'
        WHERE id=$id
    ");

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
    <title>Edit Jadwal Visit</title>
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
        h2 { margin-top: 0; color: #6f42c1; }
        label { font-size: 14px; }
        select, input, textarea, button { width: 100%; padding: 10px; margin-top: 6px; font-size: 14px; }
        select, input, textarea { border: 1px solid #ccc; border-radius: 4px; }
        textarea { resize: vertical; }
        button { background: #6f42c1; color: #fff; border: none; border-radius: 4px; cursor: pointer; margin-top: 15px; }
        button:hover { background: #59339d; }
        a { display: inline-block; margin-top: 15px; color: #6f42c1; text-decoration: none; font-size: 14px; }

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
    <h2>Edit Jadwal Visit</h2>

    <form method="POST">
        <label>Pilih Klien</label>
        <select name="kode_klien" required>
            <option value="">-- Pilih Klien --</option>
            <?php while ($k = mysqli_fetch_assoc($klien)) { ?>
                <option value="<?= $k['kode_klien']; ?>" <?= $k['kode_klien']==$d['kode_klien']?'selected':''; ?>>
                    <?= $k['kode_klien']; ?> - <?= $k['nama_klien']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $d['tanggal']; ?>" required>

        <label>Kegiatan</label>
        <input type="text" name="kegiatan" value="<?= $d['kegiatan']; ?>" required>

        <label>Keterangan</label>
        <textarea name="keterangan"><?= $d['keterangan']; ?></textarea>

        <button name="update">Update</button>
    </form>

    <a href="index.php" class="btn">Kembali</a>
</div>

</body>
</html>
