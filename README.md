# Babil Bahçesi Yönetim Sistemi

![image](https://github.com/imane9607/Babil-bah-esi-y-netim-sistemi/assets/168463900/01032cf9-9705-47b4-a10f-8c99a08ee2a6)

Babil Bahçesi Yönetim Sistemi, botanik bahçeleri yönetmek için kullanılan web tabanlı bir uygulamadır. Bu uygulama, bitki koleksiyonlarını, sergileri, etkinlikleri, personel ve ziyaretçi kayıtlarını yönetmeyi sağlar. Ayrıca bitki bakımı, sulama, gübreleme gibi işlemleri planlama ve takip etme özellikleri de içerir.

## Özellikler

1. **Giriş ve Oturum Yönetimi**: Şifre ile giriş ve oturum yönetimi.
2. **Bilgi Girişi ve Kaydetme**: Veritabanına bilgi girişleri.
3. **Bilgi Listeleme**: Girilen bilgilerin listelenmesi.
4. **Bilgi Silme**: Girilen bilgilerin silinmesi.
5. **Bilgi Düzenleme**: Girilen bilgilerin düzenlenmesi.

## Kullanılan Teknolojiler

- PHP
- MySQL
- HTML
- Bootstrap
- JavaScript

## Kurulum

### Gereksinimler

- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx Web Sunucusu
- **XAMPP**

### Adımlar

1. **XAMPP'yi İndirin ve Yükleyin:** 
   - XAMPP'yi [https://www.apachefriends.org/](https://www.apachefriends.org/) adresinden indirin ve sisteminize yükleyin.
![image](https://github.com/imane9607/Babil-bah-esi-y-netim-sistemi/assets/168463900/e480d3e6-5758-4428-9c70-e5998332736f)

2. **Depoyu Klonlayın**
   ```sh
   git clone https://github.com/imane9607/Babil-bah-esi-y-netim-sistemi.git
   cd Babil-bah-esi-y-netim-sistemi
   ```

3. **XAMPP'yi Başlatın**
   - XAMPP Kontrol Paneli'ni açın ve Apache ve MySQL hizmetlerini başlatın.

4. **Veritabanını Oluşturun**
   - Tarayıcınızı açın ve `http://localhost/phpmyadmin` adresine gidin.
   - Yeni bir veritabanı oluşturun ve adını `babylon_garden` olarak ayarlayın.
   - `babylon_garden.sql` dosyasını phpMyAdmin'in "İçe Aktar" bölümünden yükleyin.

5. **Veritabanı Ayarlarını Yapın**
   - `config/db.php` dosyasını açın ve veritabanı bağlantı bilgilerinizi güncelleyin.

   ```php
   <?php
   $servername = "localhost";
   $username = "root"; // XAMPP'nin varsayılan kullanıcı adı
   $password = ""; // XAMPP'nin varsayılan şifresi (genellikle boş)
   $dbname = "babylon_garden";

   // Veritabanına bağlan
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Bağlantıyı kontrol et
   if ($conn->connect_error) {
       die("Bağlantı hatası: " . $conn->connect_error);
   }
   ?>
   ```

6. **Config Dosyasını Güncelleyin**
   - `config.php` dosyasını açın ve gerekli ayarları yapın.

   ```php
   <?php
   define('OPENWEATHERMAP_API_KEY', 'api_anahtarınız');
   ?>
   ```

7. **Uygulamayı Çalıştırın**
   - Tarayıcınızı açın ve adres çubuğuna `http://localhost/Babil-bah-esi-y-netim-sistemi/login.php` yazarak uygulamaya erişin.
   - Kullanıcı adı `admin` ve şifre `123456` ile giriş yapabilirsiniz.

## Kullanım

- Oturum Açma:
  - `http://localhost/Babil-bah-esi-y-netim-sistemi/login.php` adresine gidin.
  - Kullanıcı adı ve şifre ile giriş yapın (admin / 123456).

- Yönetim Paneli:
  - Giriş yaptıktan sonra, gösterge paneline yönlendirileceksiniz.
  - Panelde bitkiler, etkinlikler, raporlar, personel ve ziyaretçiler gibi kategorilerdeki toplam sayıları görebilirsiniz.
  - Her kategori için detaylı listelemelere ulaşabilir, yeni kayıtlar ekleyebilir, mevcut kayıtları düzenleyebilir ve silebilirsiniz.

- Videolu Anlatım:
  - [YouTube Video Rehberi](https://youtu.be/rKPQWK8492w)

## Proje Yapısı

```plaintext
├── config/
│   └── db.php
├── css/
│   └── style.css
├── includes/
│   ├── header.php
│   └── footer.php
├── plants/
│   ├── create.php
│   ├── list.php
│   ├── edit.php
│   └── delete.php
├── events/
│   ├── create.php
│   ├── list.php
│   ├── edit.php
│   └── delete.php
├── staff/
│   ├── create.php
│   ├── list.php
│   ├── edit.php
│   └── delete.php
├── visitors/
│   ├── create.php
│   ├── list.php
│   ├── edit.php
│   └── delete.php
├── care_plans/
│   ├── create.php
│   ├── list.php
│   ├── edit.php
│   └── delete.php
├── reports/
│   ├── list.php
│   ├── edit.php
│   └── delete.php
├── login.php
├── dashboard.php
├── logout.php
├── profile.php
babylon_garden.sql
```

## Lisans

Bu proje MIT Lisansı ile lisanslanmıştır.
