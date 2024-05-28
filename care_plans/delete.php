<?php
include('../config/db.php');

// URL'de id parametresinin ayarlı olup olmadığını kontrol et
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL enjeksiyonunu önlemek için id'nin bir tam sayı olmasını sağla
    $id = intval($id);

    // SQL silme ifadesini hazırla
    $sql = "DELETE FROM care_plans WHERE id=$id";

    // SQL sorgusunu çalıştır ve silme işleminin başarılı olup olmadığını kontrol et
    if ($conn->query($sql) === TRUE) {
        // Liste sayfasına yönlendir veya bir başarı mesajı göster
        header('Location: list.php');
        exit();
    } else {
        // Silme başarısız olursa bir hata mesajı göster
        echo "Kayıt silinirken hata oluştu: " . $conn->error;
    }
} else {
    // id parametresi eksikse bir hata mesajı göster
    echo "Hata: id parametresi eksik";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>