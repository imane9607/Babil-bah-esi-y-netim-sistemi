<?php
include('config/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: dashboard.php");
    } else {
        $error = "Geçersiz kullanıcı adı veya şifre";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e8f5e9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 300px;
            margin-top: 50px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            text-align: center;
            background-color: #4caf50; 
            color: white; 
        }

        .card-body {
            padding: 10px;
        }

        .error {
            color: red;
        }

        .github-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .footer {
            background-color: #4caf50;
            padding: 10px;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            margin-top: 30px;
        }

        .btn-custom {
            background-color: #4caf50; /* Same green color as footer */
            color: white; /* White text color */
        }
    </style>
    <title>Giriş</title>
</head>
<body>
    
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h2>Giriş Yap</h2>
            </div>
            <div class="card-body">
                <?php if (isset($error)) { ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php } ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Kullanıcı Adı:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-custom btn-block">Giriş Yap</button>
                </form>
            </div>
        </div>
    </div>

    <div class="github-btn">
        <a href="https://github.com/imane9607/Babil-bah-esi-y-netim-sistemi.git" class="btn btn-dark" target="_blank">
            <i class="fa fa-github"></i> Github Repository
        </a>
    </div>
    
    <footer class="footer">
        <p>&copy; 2024 Babil Bahçeleri Yönetim Sistemi By Imane Keradi</p>
    </footer>
    
</body>
</html>
