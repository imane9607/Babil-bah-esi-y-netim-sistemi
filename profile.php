<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Babil Bahçeleri Yönetim Sistemi - Profil">
  <meta name="keywords" content="Babil Bahçeleri, yönetim, sistem, profil">
  <meta name="author" content="Imane Keradi">
  <title>Profil - Babil Bahçeleri Yönetim Sistemi</title>
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

    .profile-info {
      text-align: center;
      color: #4caf50;
      font-size: 18px;
    }

    .update-form {
      margin-top: 20px;
    }

    .update-form .form-group {
      margin-bottom: 15px;
    }

    .btn-primary {
      background-color: #4caf50;
      border: none;
    }

    .btn-primary:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<?php
include('config/db.php');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<div class='alert alert-danger'>Kullanıcı bilgileri bulunamadı.</div>";
    $row = [];
}

// Update user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = htmlspecialchars($_POST['username']);
    $new_password = htmlspecialchars($_POST['password']);

    $update_sql = "UPDATE users SET username='$new_username'";
    if (!empty($new_password)) {
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $update_sql .= ", password='$new_password_hashed'";
    }
    $update_sql .= " WHERE username='$username'";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['username'] = $new_username;
        header("Location: profile.php");
    } else {
        echo "<div class='alert alert-danger'>Güncelleme başarısız oldu: " . $conn->error . "</div>";
    }
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
        <a class="nav-link" href="/Babylon-garden/plants/list.php">Bitkiler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Babylon-garden/events/list.php">Etkinlikler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Babylon-garden/staff/list.php">Personel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Babylon-garden/visitors/list.php">Ziyaretçiler</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Babylon-garden/care_plans/list.php">Bakım Planları</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Babylon-garden/reports/list.php">Raporlar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/Babylon-garden/profile.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Babylon-garden/logout.php">Çıkış Yap</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="page-title">Profil</h2>
  <div class="form-container">
    <div class="profile-info">
      <p><strong>Kullanıcı Adı:</strong> <?php echo htmlspecialchars($row['username'] ?? ''); ?></p>
    </div>
    <form method="post" class="update-form">
      <div class="form-group">
        <label for="username">Kullanıcı Adı</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($row['username'] ?? ''); ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Yeni Şifre (isteğe bağlı)</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Güncelle</button>
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
