<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bitki Listesi - Babil Bahçeleri ve Bitki Yönetim Sistemi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    .table {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .table th {
      background-color: #388e3c;
      color: #fff;
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

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-danger:hover {
      background-color: #c82333;
      border-color: #bd2130;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
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
  <script>
    function confirmDelete() {
      return confirm('Bu bitkiyi silmek istediğinize emin misiniz?');
    }
  </script>
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
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center mb-4"><i class="fas fa-leaf mr-2"></i>Bitki Listesi</h2>

      <div class="mb-3">
        <a href="create.php" class="btn btn-success float-right"><i class="fas fa-plus mr-2"></i>Yeni Bitki Ekle</a>
      </div>

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Adı</th>
            <th>Türü</th>
            <th>İşlemler</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include('../config/db.php');

            if (isset($_GET['delete_id'])) {
              $delete_id = $_GET['delete_id'];

              // Öncelikle care_plans tablosundaki ilgili kayıtları silin
              $delete_care_plans_sql = "DELETE FROM care_plans WHERE plant_id=?";
              if ($stmt = $conn->prepare($delete_care_plans_sql)) {
                $stmt->bind_param("i", $delete_id);
                $stmt->execute();
                $stmt->close();
              }

              // Şimdi tesisi silin
              $delete_plant_sql = "DELETE FROM plants WHERE id=?";
              if ($stmt = $conn->prepare($delete_plant_sql)) {
                $stmt->bind_param("i", $delete_id);
                $stmt->execute();
                $stmt->close();
              }
            }

            $sql = "SELECT id, name, species FROM plants";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["name"]) . "</td>
                        <td>" . htmlspecialchars($row["species"]) . "</td>
                        <td>
                          <a href='edit.php?id=" . htmlspecialchars($row["id"]) . "' class='btn btn-primary btn-sm' aria-label='Düzenle'><i class='fas fa-edit'></i></a>
                          <a href='list.php?delete_id=" . htmlspecialchars($row["id"]) . "' class='btn btn-danger btn-sm' onclick='return confirmDelete();' aria-label='Sil'><i class='fas fa-trash-alt'></i></a>
                        </td>
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='3' class='text-center'>Bitki bulunamadı.</td></tr>";
            }

            $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>
</body>
</html>
