<?php
include('../config/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $species = $_POST['species'];
        $watering_schedule = $_POST['watering_schedule'];
        $care_instructions = $_POST['care_instructions'];

        $sql = "UPDATE plants SET name=?, species=?, watering_schedule=?, care_instructions=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $species, $watering_schedule, $care_instructions, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Bitki başarıyla güncellendi!'); window.location.href='list.php';</script>";
        } else {
            echo "Hata: " . $stmt->error;
        }

        $stmt->close();
    }

    $sql = "SELECT * FROM plants WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitkiyi Düzenle - Babil Bahçeleri ve Bitki Yönetim Sistemi</title>
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

        .footer {
            background-color: #4caf50;
            padding: 10px;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            margin-top: 30px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-right: 5px;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4CAF50;">
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
    <h2 class="text-center mb-4"><i class="fas fa-leaf mr-2"></i>Bitkiyi Düzenle</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Bitki Adı:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="species">Türü:</label>
            <input type="text" class="form-control" id="species" name="species" value="<?php echo htmlspecialchars($row['species'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="watering_schedule">Sulama Programı:</label>
            <input type="text" class="form-control" id="watering_schedule" name="watering_schedule" value="<?php echo htmlspecialchars($row['watering_schedule'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label for="care_instructions">Bakım Talimatları:</label>
            <textarea class="form-control" id="care_instructions" name="care_instructions" required><?php echo htmlspecialchars($row['care_instructions'] ?? ''); ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Güncelle</button>
    </form>
</div>

<div class="footer">
    <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>
</body>
</html>

<?php $conn->close(); ?>
