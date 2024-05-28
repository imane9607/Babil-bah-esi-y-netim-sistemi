<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Etkinlik Listesi - Babil Bahçeleri Yönetim Sistemi</title>
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

    .table {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .table th {
      background-color: #388e3c;
      color: #fff;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
      color: #fff;
      float: right;
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
  <h2>Etkinlik Listesi</h2>
  <div class="mb-3">
    <a href="create.php" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Yeni Etkinlik Oluştur</a>
  </div>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Adı</th>
        <th>Tarihi</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include('../config/db.php');

        $sql = "SELECT id, name, date FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["date"]; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
          <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bu etkinliği silmek istediğinize emin misiniz?');"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
      <?php
          }
        } else {
      ?>
      <tr><td colspan="3">Etkinlik bulunamadı.</td></tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

</body>
</html>
