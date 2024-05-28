<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Babil Bahçe Yönetim Sistemi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #e8f5e9;
        }

        .header {
            background-color: #4caf50;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            color: #fff;
        }

        .header h1 {
            font-size: 32px;
            margin: 0;
        }

        .navbar-toggler-icon {
            background-color: white;
            border-radius: 2px;
        }

        .navbar-toggler {
            border-color: transparent;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .nav-link:hover {
            background-color: #45a049;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    include 'config/db.php';
    ?>

    <div class="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-leaf mr-2"></i> Babil Bahçe Yönetim Sistemi</h1>
            <div class="user-profile">
                <span>Hoş geldiniz, admin!</span>
            </div>
        </div>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4CAF50;">
        <a class="navbar-brand" href="../dashboard.php">Babil'e Hoş Geldiniz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navigasyonu Geçiş">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard.php">Gösterge Paneli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../plants/list.php">Bitkiler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../events/list.php">Etkinlikler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../staff/list.php">Personel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../visitors/list.php">Ziyaretçiler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../care_plans/list.php">Bakım Planları</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../reports/list.php">Raporlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../profile.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Çıkış Yap</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
