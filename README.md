# HakCipta	

Hak Cipta atau copyright adalah hak eksklusif yang diberikan kepada pencipta atau pemegang hak cipta untuk mengatur penggunaan hasil penuangan gagasan atau informasi tertentu. Sama halnya dengan merek dan paten, hak cipta termasuk juga ke dalam hak kekayaan intelektual atau HaKI. Hanya saja Hak cipta tidak seperti hak paten yang memiliki hak monopoli sehingga bisa mencegah orang lain melakukan sesuatu terhadap penemuannya.

## Requirements (Kebutuhan)
- [PHP](https://php.net/) versi 5.6 atau lebih baru.
- [XAMPP](https://www.apachefriends.org/download.html) 7.2.28 atau lebih baru.
- [Codeigniter](https://codeigniter.com/en/download) versi 3.1.11
- [Visual Studio Code](https://code.visualstudio.com/download) ( an option for your text editor )

## Prepare (Persiapan)
1. Jalankan Webserver anda, dalam kasus ini yaitu XAMPP
2. Download atau Fork repository ini ke dalam htdocs anda, beri nama folder project dengan nama **HukumWebFramework**
3. Tuliskan link berikut pada browser anda http://localhost/tumbasapp/ 
4. Buat database baru bernama **HukumWebFramework**, dan import file `hakcipta_app.sql` ke dalam database tersebut
5. Pastikan kode pada file `application/config/database.php` telah sama seperti baris kode berikut :
``` php
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'hakcipta_app',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
```

## Implementations

1. Jalankan tumbasapp sebagai customer pada link http://localhost/HukumWebFramework/ dan link berikut sebagai admin http://localhost/HukumWebFramework/admin/
2. Web saat ini per 2020/03/18 masih memerlukan kerja sama tim untuk melakukan pengembangan.
