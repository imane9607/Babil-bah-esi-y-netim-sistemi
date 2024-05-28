<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bakım Planı Listesi - Babil Bahçeleri Yönetim Sistemi</title>
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

    .btn-create {
      float: right;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #f2f2f2;
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

<!-- Üst Menü -->
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

<div class="container mt-5">
  <h2>Bakım Planı Listesi</h2>
  <div class="btn-create">
    <a href="create.php" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Yeni Bakım Planı Oluştur</a>
  </div>
  <table>
    <tr>
      <th>Bitki Adı</th>
      <th>Bakım Detayları</th>
      <th>İşlemler</th>
    </tr>
    <?php
    // Veritabanı yapılandırmasını dahil et
    include('../config/db.php');

    // Veritabanından bakım planlarını al
    $sql = "SELECT care_plans.id, plants.name AS plant_name, care_plans.care_details
            FROM care_plans
            JOIN plants ON care_plans.plant_id = plants.id";
    $result = $conn->query($sql);

    // Sonuçların olup olmadığını kontrol et
    if ($result->num_rows > 0) {
      // Her satırın verilerini çıktı olarak göster
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['plant_name']}</td>
                <td>{$row['care_details']}</td>
                <td>
                  <a href='edit.php?id={$row['id']}' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>
                  <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm delete-button'><i class='fas fa-trash-alt'></i></a>
                </td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='3'>Bakım planı bulunamadı</td></tr>";
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>
  </table>
</div>

<!-- Alt Bilgi -->
<div class="footer">
  <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi.</p>
</div>

<script>
  // Silme butonlarına tıklama olayını dinle
  document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      const confirmation = confirm('Bu bakım planını silmek istediğinizden emin misiniz?');
      if (confirmation) {
        window.location.href = this.href;
      }
    });
  });
</script>

</body>
</html>