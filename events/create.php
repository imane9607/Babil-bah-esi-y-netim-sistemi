<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Etkinlik Oluştur - Babil Bahçeleri Yönetim Sistemi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    .navbar {
      background-color: #4CAF50;
    }

    .navbar-dark .navbar-nav .nav-link {
      color: white !important;
    }

    .nav-link:hover {
      background-color: #45a049;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 5px;
    }

    textarea {
      resize: vertical;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
      color: #fff;
    }

    .btn-success:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }

    .footer {
      background-color: #4caf50;
      padding: 10px;
      color: #fff;
      text-align: center;
      border-radius: 10px;
      margin-top: 30px;
    }
  </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="../dashboard.php">Babil Bahçesi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Gezinmeyi Değiştir">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="../dashboard.php">Gösterge Paneli</a></li>
      <li class="nav-item"><a class="nav-link" href="../plants/list.php">Bitkiler</a></li>
      <li class="nav-item"><a class="nav-link" href="../events/list.php">Etkinlikler</a></li>
      <li class="nav-item"><a class="nav-link" href="../staff/list.php">Personel</a></li>
      <li class="nav-item"><a class="nav-link" href="../visitors/list.php">Ziyaretçiler</a></li>
      <li class="nav-item"><a class="nav-link" href="../care_plans/list.php">Bakım Planları</a></li>
      <li class="nav-item"><a class="nav-link" href="../reports/list.php">Raporlar</a></li>
      <li class="nav-item"><a class="nav-link" href="../profile.php">Profil</a></li>
      <li class="nav-item"><a class="nav-link" href="../logout.php">Çıkış Yap</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <h2>Etkinlik Oluştur</h2>
  <form method="POST" action="create.php">
    <div class="form-group">
      <label for="name">Adı:</label>
      <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="date">Tarihi:</label>
      <input type="date" name="date" id="date" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="description">Açıklama:</label>
      <textarea name="description" id="description" rows="4" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Oluştur</button>
  </form>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

</body>
</html>
