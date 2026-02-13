<?php
include "../config/database.php";

if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    if ($id > 0) {
        $del = mysqli_query($conn, "DELETE FROM tbl_agenda WHERE id=$id");
        if ($del) {
            echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

$data = mysqli_query($conn, "
    SELECT a.*, k.nama_klien
    FROM tbl_agenda a
    JOIN tbl_klien k ON a.kode_klien = k.kode_klien
    ORDER BY a.tanggal DESC
");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Jadwal Visit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f0f9;
            padding: 30px;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        h2 {
            margin-top: 0;
            color: #6f42c1;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #6f42c1;
            color: #fff;
            padding: 10px;
            font-size: 14px;
        }

        td {
            padding: 9px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        tr:hover {
            background: #f2ecfb;
        }

        .action-btn {
            margin-right: 5px;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
        }

        .delete {
            background: #dc3545;
        }

        .delete:hover {
            background: #c82333;
        }

        .edit {
            background: #28a745;
        }

        .edit:hover {
            background: #218838;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Data Jadwal Visit</h2>

        <a href="add.php" class="btn">+ Tambah Jadwal</a>
        <a href="download_pdf.php" class="btn">Download PDF</a>

        <table>
            <tr>
                <th style="width:12%; text-align:center;">Tanggal</th>
                <th style="width:12%; text-align:center;">Kode Klien</th>
                <th style="width:20%; text-align:center;">Nama Klien</th>
                <th style="width:20%; text-align:center;">Kegiatan</th>
                <th style="width:24%; text-align:center;">Keterangan</th>
                <th style="width:12%; text-align:center;">Aksi</th>
            </tr>

            <?php while ($d = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td style="text-align:center;"><?= htmlspecialchars($d['tanggal']); ?></td>
                    <td style="text-align:center;"><?= htmlspecialchars($d['kode_klien']); ?></td>
                    <td style="text-align:center;"><?= htmlspecialchars($d['kegiatan']); ?></td>
                    <td style="text-align:center;"><?= htmlspecialchars($d['nama_klien']); ?></td>
                    <td style="text-align:center;"><?= htmlspecialchars($d['keterangan']); ?></td>
                    <td style="text-align:center;">
                        <a href="edit.php?id=<?= $d['id']; ?>" class="action-btn edit">Edit</a>
                        <a href="index.php?hapus=<?= $d['id']; ?>" onclick="return confirm('Yakin mau dihapus?')" class="action-btn delete">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>
    <br>
    <a href="/jadwal-klien/index.php" class="btn">Kembali</a>

</body>

</html>