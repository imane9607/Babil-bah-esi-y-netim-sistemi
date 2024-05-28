<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personel Düzenle - Babil Bahçeleri Yönetim Sistemi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

    .container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
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
  <h2>Personel Düzenle</h2>
  <?php
    include('../config/db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $role = $_POST['role'];
            $email = $_POST['email'];

            $sql = "UPDATE staff SET name='$name', role='$role', email='$email' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Personel başarıyla güncellendi.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Hata: ' . $sql . '<br>' . $conn->error . '</div>';
            }
        }

        $sql = "SELECT * FROM staff WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
  ?>
  <form method="POST" action="">
    <div class="form-group">
      <label for="name">Adı</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
    </div>
    <div class="form-group">
      <label for="role">Rolü</label>
      <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['role']; ?>" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Güncelle</button>
  </form>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

</body>
</html>
