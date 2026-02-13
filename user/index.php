<?php
include "../config/database.php";

if (isset($_GET['hapus'])) {
    $kode = $_GET['hapus'];
    $del = mysqli_query($conn, "DELETE FROM tbl_klien WHERE kode_klien='$kode'");
    if ($del) {
        echo "<script>alert('Klien berhasil dihapus');window.location='index.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$data = mysqli_query($conn, "SELECT * FROM tbl_klien");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Klien</title>
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
        <h2>Data Klien</h2>

        <a href="add.php" class="btn">+ Tambah Klien</a>
        <a href="download_pdf.php" class="btn">Download PDF</a>

        <table>
            <tr>
                <th style="width: 20%; text-align:center;">Kode Klien</th>
                <th style="width: 60%; text-align:center;">Nama Klien</th>
                <th style="width: 20%; text-align:center;">Aksi</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td style="text-align:center;"><?= $row['kode_klien']; ?></td>
                    <td style="text-align:center;"><?= $row['nama_klien']; ?></td>
                    <td style="text-align:center;">
                        <a href="edit.php?kode=<?= $row['kode_klien']; ?>" class="action-btn edit">Edit</a>
                        <a href="index.php?hapus=<?= $row['kode_klien']; ?>" onclick="return confirm('Yakin mau dihapus?')" class="action-btn delete">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br><br>
        <a href="/jadwal-klien/index.php" class="btn">Kembali</a>
    </div>


</body>

</html>