<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Penjadwalan Visit Klien</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .card {
            background: #fff;
            width: 420px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .menu a {
            text-decoration: none;
            padding: 14px;
            background: #667eea;
            color: #fff;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .menu a:hover {
            background: #5563d6;
            transform: translateY(-2px);
        }

        footer {
            margin-top: 25px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>

<body>

    <div class="card">
        <h1>Penjadwalan Visit Klien</h1>
        <p>Manajemen data klien & jadwal agenda</p>

        <div class="menu">
            <a href="user/index.php">Data Klien</a>
            <a href="jadwal/index.php">Jadwal Visit</a>
        </div>

        <footer>
            &copy; <?= date('Y') ?> elmyolis
        </footer>
    </div>

</body>

</html>
