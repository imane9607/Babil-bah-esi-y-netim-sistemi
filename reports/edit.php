<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Babil Bahçeleri Yönetim Sistemi - Rapor Düzenle">
  <meta name="keywords" content="Babil Bahçeleri, yönetim, sistem, raporlar, rapor düzenle">
  <meta name="author" content="Imane Keradi">
  <title>Rapor Düzenle - Babil Bahçeleri Yönetim Sistemi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #e8f5e9;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
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
      margin-top: 20px;
      display: block;
      width: 100%;
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
      margin-top: auto;
    }

    .container {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      flex: 1;
    }

    .page-title {
      text-align: center;
      font-size: 36px;
      margin-bottom: 20px;
      color: #4caf50;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
      font-weight: bold;
      color: #4caf50;
    }
  </style>
</head>
<body>

<!-- Form Gönderme ve Veri Alma için PHP Kodu -->
<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $report_name = $_POST['report_name'];
        $report_date = $_POST['report_date'];

        $sql = "UPDATE reports SET report_name='$report_name', report_date='$report_date' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Rapor başarıyla güncellendi</div>";
        } else {
            echo "<div class='alert alert-danger'>Hata: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    $sql = "SELECT * FROM reports WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="../dashboard.php">Babil Bahçesi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Gezinmeyi Değiştir">
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
        <a class="nav-link active" href="../reports/list.php">Raporlar</a>
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

<div class="container mt-5">
  <h2 class="page-title">Rapor Düzenle</h2>
  <div class="form-container">
    <form method="POST" action="">
      <div class="form-group">
        <label for="report_name">Rapor Adı</label>
        <input type="text" class="form-control" id="report_name" name="report_name" value="<?php echo htmlspecialchars($row['report_name']); ?>" required>
      </div>
      <div class="form-group">
        <label for="report_date">Rapor Tarihi</label>
        <input type="date" class="form-control" id="report_date" name="report_date" value="<?php echo htmlspecialchars($row['report_date']); ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Güncelle</button>
    </form>
  </div>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
