<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Etkinliği Düzenle - Babil Bahçeleri Yönetim Sistemi</title>
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

    .btn-primary {
      background-color: #4CAF50;
      border-color: #007bff;
      color: #fff;
    }

    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
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
  <?php
    include('../config/db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $description = $_POST['description'];

            $sql = "UPDATE events SET name='$name', date='$date', description='$description' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Etkinlik başarıyla güncellendi";
                // Etkinlik güncellendikten sonra yönlendir
                header('Location: list.php');
                exit;
            } else {
                echo "Hata: " . $conn->error;
            }
        } else {
            $sql = "SELECT * FROM events WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Etkinlik bulunamadı.";
                exit; // Çıkış yap ve formun görüntülenmesini durdur
            }
        }
    }
  ?>
  <?php if (isset($row)) : ?>
  <h2>Etkinliği Düzenle</h2>
  <form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
    <div class="form-group">
      <label for="name">Adı:</label>
      <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="date">Tarihi:</label>
      <input type="date" name="date" id="date" value="<?php echo $row['date']; ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="description">Açıklama:</label>
      <textarea name="description" id="description" rows="4" class="form-control" required><?php echo $row['description']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
  </form>
  <?php else : ?>
  <h2>Etkinlik bulunamadı.</h2>
  <?php endif; ?>
</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

</body>
</html>
