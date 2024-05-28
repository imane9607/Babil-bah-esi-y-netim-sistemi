<?php
include('config/db.php');
include('config.php');
session_start();

// Set internal character encoding to UTF-8
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
header('Content-Type: text/html; charset=UTF-8');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

function fetchCount($conn, $tableName) {
    $sql = "SELECT COUNT(*) AS total FROM $tableName";
    $result = $conn->query($sql);
    if ($result) {
        return $result->fetch_assoc()['total'];
    } else {
        die("Toplam sayısı getirirken hata: " . $conn->error);
    }
}

// Set connection character set to UTF-8
$conn->set_charset("utf8");

$totalPlants = fetchCount($conn, 'plants');
$totalEvents = fetchCount($conn, 'events');
$totalReports = fetchCount($conn, 'reports');
$totalStaff = fetchCount($conn, 'staff');
$totalVisitors = fetchCount($conn, 'visitors');

function fetchRecentData($conn, $tableName, $columns, $orderBy, $limit) {
    $sql = "SELECT $columns FROM $tableName ORDER BY $orderBy DESC LIMIT $limit";
    $result = $conn->query($sql);
    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        die("Son verileri getirirken hata: " . $conn->error);
    }
}

$recentVisitors = fetchRecentData($conn, 'visitors', 'name', 'visit_date', 10);
$recentCareDetails = fetchRecentData($conn, 'care_plans', 'care_details, date', 'date', 10);

$city = "Görükle";
$apiUrl = "http://api.openweathermap.org/data/2.5/forecast?q={$city}&units=metric&appid=" . OPENWEATHERMAP_API_KEY;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

if ($response === FALSE) {
    die('Hava durumu verilerini getirirken hata oluştu');
}

$weatherData = json_decode($response, true);
if ($weatherData === NULL || isset($weatherData['cod']) && $weatherData['cod'] != 200) {
    die('Hava durumu verilerini çözümlerken hata: ' . ($weatherData['message'] ?? 'Bilinmeyen hata'));
}
$weeklyWeather = array();
foreach ($weatherData['list'] as $dayWeather) {
    $date = date('l', strtotime($dayWeather['dt_txt']));
    if (!isset($weeklyWeather[$date])) {
        $weeklyWeather[$date] = array(
            'weather' => $dayWeather['weather'][0]['description'],
            'temperature' => $dayWeather['main']['temp'] . '°C',
        );
    }
    if (count($weeklyWeather) >= 7) break;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Babil Bahçesi Gösterge Paneli</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1w2y+h8p/L+67iYPu+2+j65//9v+rwF/0LLW1" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .card {
        background-color: #f8f8f8;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 250px;
        text-align: center;
        transition: transform 0.3s, background-color 0.3s, color 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        background-color: #b3ffc2;
        color: #1b5e20;
    }
    .card-header {
        background-color: #4caf50;
        color: #4caf50;
        padding: 10px;
        border-radius: 8px 8px 0 0;
    }
    .card-title {
        margin-bottom: 0;
        font-weight: bold;
        background-color: #4caf50;
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 4px;
    }
    .card-body {
        padding-top: 15px;
    }
    .card-text {
        color: #555555;
    }
    .card-subtitle {
        color: #ffc107;
    }
    .view-more-btn {
        background-color: #4caf50;
        color: #ffffff;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }
    .view-more-btn:hover {
        background-color: #45a049;
    }
  </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<div class="container">
  <h2>Gösterge Paneli</h2>
  <p>Hoş geldiniz, <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?>!</p>

  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="fas fa-seedling"></i> Bitkiler</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Toplam Bitki: <?php echo $totalPlants; ?></p>
          <a href="../care_plans/list.php" class="view-more-btn">Daha Fazla Gör</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="fas fa-calendar-alt"></i> Etkinlikler</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Toplam Etkinlik: <?php echo $totalEvents; ?></p>
          <a href="../events/list.php" class="view-more-btn">Daha Fazla Gör</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="fas fa-file-alt"></i> Raporlar</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Toplam Rapor: <?php echo $totalReports; ?></p>
          <a href="../reports/list.php" class="view-more-btn">Daha Fazla Gör</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="fas fa-users"></i> Personel</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Toplam Personel: <?php echo $totalStaff; ?></p>
          <a href="../staff/list.php" class="view-more-btn">Daha Fazla Gör</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="fas fa-user-friends"></i> Ziyaretçiler</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Toplam Ziyaretçi: <?php echo $totalVisitors; ?></p>
          <h6 class="card-subtitle mb-2">Son Ziyaretçiler:</h6>
          <ul class="list-unstyled">
            <?php foreach ($recentVisitors as $visitor) : ?>
              <li><?php echo htmlspecialchars($visitor['name'], ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="../visitors/list.php" class="view-more-btn">Daha Fazla Gör</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="fas fa-calendar-check"></i> Yaklaşan Bakım Planları</h4>
        </div>
        <div class="card-body">
          <h6 class="card-subtitle mb-2">Bakım Detayları:</h6>
          <?php foreach ($recentCareDetails as $careDetail) : ?>
            <p class="card-text"><?php echo htmlspecialchars($careDetail['date'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($careDetail['care_details'], ENT_QUOTES, 'UTF-8'); ?></p>
          <?php endforeach; ?>
          <a href="../care_plans/list.php" class="view-more-btn">Daha Fazla Gör</a>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="fas fa-cloud-sun"></i> Haftalık Hava Durumu</h4>
        </div>
        <div class="card-body">
          <h5 class="card-subtitle mb-2"><?php echo htmlspecialchars($weatherData['city']['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
          <?php foreach ($weeklyWeather as $day => $details) : ?>
            <p class="card-text"><?php echo htmlspecialchars($day, ENT_QUOTES, 'UTF-8') . ': ' . htmlspecialchars($details['temperature'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($details['weather'], ENT_QUOTES, 'UTF-8'); ?></p>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

</body>
</html>
