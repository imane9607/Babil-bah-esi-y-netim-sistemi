# Babil Bahçesi Yönetim Sistemi
![image](https://github.com/imane9607/Babil-bah-esi-y-netim-sistemi/assets/168463900/4b3594f1-6cfe-4641-9470-ded28f4401ba)

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

### Adımlar

1. **Depoyu Klonlayın**
   ```sh
   git clone https://github.com/kullanici_adi/babil-bahcesi.git
   cd babil-bahcesi
   ```

2. **Veritabanını Oluşturun**
   - MySQL veritabanında `babylon_garden.sql` dosyasını çalıştırarak gerekli tabloları oluşturun.
     ```sh
     mysql -u kullanıcı_adı -p babylon_garden < babylon_garden.sql
     ```

3. **Veritabanı Ayarlarını Yapın**
   - `config/db.php` dosyasını açın ve veritabanı bağlantı bilgilerinizi güncelleyin.
     ```php
     <?php
     $servername = "localhost";
     $username = "veritabani_kullanici_adi";
     $password = "veritabani_sifresi";
     $dbname = "babylon_garden";

     // Veritabanına bağlan
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Bağlantıyı kontrol et
     if ($conn->connect_error) {
         die("Bağlantı hatası: " . $conn->connect_error);
     }
     ?>
     ```

4. **Config Dosyasını Güncelleyin**
   - `config.php` dosyasını açın ve gerekli ayarları yapın.
     ```php
     <?php
     define('OPENWEATHERMAP_API_KEY', 'api_anahtarınız');
     ?>
     ```

5. **Uygulamayı Çalıştırın**
   - Web sunucunuza `babil-bahcesi` klasörünü taşıyın ve `login.php` dosyasına tarayıcınızdan erişin.
   - Giriş yapın:
     - Kullanıcı Adı: `admin`
     - Şifre: `123456`

## Kullanım

### Oturum Açma (Live demo)

- `https://babilbahcesi.site/login.php` adresine gidin.
- Kullanıcı adı ve şifre ile giriş yapın (admin / 123456).

### Yönetim Paneli

- Giriş yaptıktan sonra, gösterge paneline yönlendirileceksiniz.
- Panelde bitkiler, etkinlikler, raporlar, personel ve ziyaretçiler gibi kategorilerdeki toplam sayıları görebilirsiniz.
- Her kategori için detaylı listelemelere ulaşabilir, yeni kayıtlar ekleyebilir, mevcut kayıtları düzenleyebilir ve silebilirsiniz.

### Videolu Anlatım

- [YouTube Video Rehberi](https://youtu.be/ornek_video_linki)

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

Bu proje MIT Lisansı ile lisanslanmıştır. Daha fazla bilgi için `LICENSE` dosyasını inceleyin.

## Katkıda Bulunma

Katkıda bulunmak isterseniz, lütfen bir pull request gönderin. Her türlü katkı ve geri bildirim memnuniyetle karşılanır.

---

Bu proje, botanik bahçesi yönetim sistemleri için kapsamlı bir çözüm sunar ve gelecekteki geliştirmeler ve özelleştirmeler için geniş bir temel sağlar.
