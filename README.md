# Singuji SMAPA ( Sistem Informasi Ujian SMA Negeri 4 Jember )

## Requirement
- XAMPP
- Visual Studio Code
- Mozilla Firefox / Google Chrome
- Code Igniter + REST API

## Changelog

### 28/04/2020
- Mengubah isi dari base_url pada _config.php_
- Menambahkan library _session_ kedalam _autoload.php_
- Menghapus controller _overview.php_ dan menggantinya dengan controller _admin.php_
- Menambahkan folder guru kedalam controller, dan menambahkan controller baru, _guru.php_
- Menghapus file _header.php_ dan _footer.php_ dari dalam folder admin
- Membuat direktori template dalam folder views, menambahkan file _header.php_ dan _footer.php_ kedalam folder template.
- Mengubah struktur html file _header.php_ dan _footer.php_, menyesuaikan dengan pembagian elemen html dan fungsinya.
- Membuat file _sideNavbar.php_ dan _topNavbar.php_ dalam folder _view/template_

### 30/04/2020
- Menambahkan file _home.php_ dalam folder view/admin.
- Menambahkan komentar di setiap file baru dan yang telah dimodifikasi untuk memudahkan development.
- Menambahkan folder guru dalam folder views sebagai wadah file view guru.
- Menambahkan file _home.php_ dalam folder view/guru.
- Menambahkan route baru untuk guru dalam _routes.php_
- Menambahkan view yang akan ditampilkan oleh fungsi _index_ dalam controller _admin_.
- Menambahkan baris komentar pada controller _admin_ untuk mempermudah development.
- Menambahkan view yang akan ditampilkanoleh fungsi _index_ dalam controller _guru_.
- Menambahkan baris komentar pada controller _guru_ untuk mempermudah development.
