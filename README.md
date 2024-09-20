
# TUGAS 2 PRAKTIKUM WEB 2 📝✨

**OOP (Object-Oriented Programming)** adalah paradigma pemrograman yang berfokus pada objek-objek yang memiliki data (properti) dan perilaku (metode). Pada OOP, konsep dasar seperti class dan object digunakan untuk memodelkan masalah yang ada di dunia nya ke dalam suatu kode pemrograman. Dalam OOP ada prinsip-prinsip dasar diantaranya yaitu:

1. **Encapsulation**  
   Menyembunyikan detail internal dan hanya menampilkan interface yang diperlukan.

2. **Inheritance**  
   Konsep pewarisan dimana kelas anak dapat mewarisi property dan metode dari kelas induk.

3. **Polymorphism**  
   Kemampuan menggunakan metode yang sama dengan cara atau perilaku yang berbeda.

4. **Abstraction**  
   Proses menyembunyikan detail implementasi dan hanya menampilkan fungsionalitas penting.

CRUD adalah singkatan dari Create, Read, Update, Delete, yang mewakili empat operasi dasar dalam proses pengelolaan data yang ada di dalam database. Implementasi CRUD biasanya digunakan dalam aplikasi berbasis web untuk menambahkan (Create), menampilkan (Read), memperbarui (Update), dan menghapus (Delete) data dari sistem database. Ketika OOP dan CRUD diimplementasikan secara bersama memungkinkan kita untuk membangun aplikasi web yang modular, terstruktur, dan lebih mudah ketika melakukan maintance, di mana operasi CRUD diatur dalam kelas dan metode yang berhubungan dengan data dan perilaku objek.<hr>

Sistem informasi tentang persuratan berbasis web diperlukan untuk mempermudah sistem pesuratan. Berdasarkan studi kasus surat_tugas dan permohonan_izin dilakukan pembuatan tampilan berbasis OOP dengan mengambil data dari database MYSQL.

1. **Data pada database MYSQL**  
   Data base dengan nama ‘db_surat’ yang terdiri atas 2 tabel yaitu permohonan_izin dan surat_tugas.

   ***Database Mysql 'db_surat'<br>***
   ![Screenshot 2024-09-20 204608](https://github.com/user-attachments/assets/c2a8984e-4e89-44be-88e6-ee25ac45f2e5)

    ***Database Mysql tabel 'permohonan_izin'<br>***
   ![Screenshot 2024-09-20 204705](https://github.com/user-attachments/assets/93bf42a4-8ee7-4e42-94c5-89ddd09acf2f)

    ***Database Mysql tabel 'surat_tugas'<br>***
   ![Screenshot 2024-09-20 204719](https://github.com/user-attachments/assets/eee8a5e0-d279-44da-bff9-ff31fdea71ae)


3. **Membuat kelas ‘Database’ dan menghubungkan ke Database Mysql**  
   Untuk dapat menghubungkan ke Database dan melakukan pengambilan data saya membuat sebuah class dengan nama ‘Database’ yang berisi koneksi ke Database MYSQL. Dalam class data berisi properti dan metode.

   - **Membuat class**  
     Class nama_kelas {}

     Contoh membuat class ‘Database’:  
     ```php
     class Database {}
     ```

   - **Properti**  
     ```php
     private $host = "localhost";  
     private $username = "root"; 
     private $password = ""; 
     private $database = "db_surat";
     protected $koneksi;
     ```
     Properti tersebut digunakan untuk menyimpan informasi alamat server, username, password, nama database, dan koneksi. Yang digunakan untuk membuat koneksi ke Database MYSQL.

   - **Fungsi (Metode) sebagai tautan ke database**  
     Untuk membuat koneksi ke database menggunakan fungsi `__construct()`.
     ```php
     public function __construct() {
         $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
         if (mysqli_connect_errno()) {
             echo "Koneksi ke Database Gagal !!! : " . mysqli_connect_error();
         }
     }
     ```
     Metode construct di atas merupakan sebuah metode yang secara otomatis dipanggil saat objek dari kelas Database dibuat. Dalam hal ini fungsi tersebut digunakan untuk membuat koneksi ke database. Fungsi `mysqli_connect()` digunakan untuk membuat koneksi ke database MySQL dengan menggunakan parameter yang terdiri dari property yang ada pada class ‘Database’ (host, username, password, database). Jika koneksi berhasil akan disimpan pada property `$koneksi`.

   - **Membuat Metode**  
     Dalam class Database terdapat 2 metode yang aksesibilitasnya public karena bisa diwariskan ke kelas turunannya, nantinya kelas turunan tersebut dapat menggunakan metode public ini sebagaimana adanya atau melakukan override (menimpa) metode tersebut dengan metode yang lebih spesifik. Metode yang ada di kelas Database:

     1. **tampilDataPermohonan**  
        Metode ini digunakan untuk mengambil semua data dari tabel permohonan_izin yang ada pada db_surat (Database) yang ada di Mysql setelah berhasil terkoneksi, dan kemudian menampilkannya. Berikut merupakan sintaks yang digunakan untuk membuat metode tampilDataPermohonan:
        
        ```php
        public function tampilDataPermohonan() {
            $data_permohonan = mysqli_query($this->koneksi, "SELECT * FROM permohonan_izin");
            $hasil_data = [];
            while($row = mysqli_fetch_array($data_permohonan)) {    
                $hasil_data[] = $row;
            }
            return $hasil_data;
        }
        ```

     3. **tampilDataSurat**  
        Metode ini digunakan untuk mengambil semua data dari tabel surat_tugas yang ada pada db_surat (Database) setelah berhasil terkoneksi dan kemudian menampilkannya. Berikut merupakan sintaksnya:
        
        ```php
        public function tampilDataSuratTugas() {
            $data_surat_tugas = mysqli_query($this->koneksi, "SELECT * FROM surat_tugas");
            $hasil_data = [];
            while($row = mysqli_fetch_array($data_surat_tugas)) {
                $hasil_data[] = $row;
            }
            return $hasil_data;
        }
        ```

   - **Menerapkan Enkapulasi**  
     Berdasarkan logika studi kasus, saya menerapkan enkapulasi dalam class Database yaitu pada property dan metodenya.

        - Penerapan enkapulasi pada atribut(property) menjadi private:
          ```php
          private $host = "localhost";  
          private $username = "root"; 
          private $password = ""; 
          private $database = "db_surat";
          ```
          Penerapan enkapulasi pada studi kasus ini terjadi pada kelas database, dimana semua property seperti bersifat private yang artinya hanya dapat diakses dari dalam class ‘Database’ itu sendiri. Enkapulasi pada property ini diharapkan dapat melindungi data sensitif karena 4 properti tersebut merupakan data yang sensitif dan harus dilindungi untuk mencegah kebocoran data.

        - Penerapan enkapulasi pada atribut (property) menjadi protected:
          ```php
          protected $koneksi;
          ```
          Atribut(property) $koneksi bersifat protected yang berarti dapat diakses oleh kelas itu sendiri dan kelas lain yang mewarisi dari Database (kelas turunannya). Dengan adanya enkapulasi ini kelas turunan dapat melakukan koneksi ke dalam database. Dengan menggunakan atribut(property) private dan protected mencegah adanya akses dari luar ke data penting yang mungkin membahayakan keamanan data.

4. **Melakukan Inheritance (Pewarisan)**  
   Berdasarkan studi kasus permohonan_izin dan surat_tugas, class ‘Database’ merupakan kelas induk yang atribut(property) dan metodenya akan diwariskan kepada kelas turunannya. Pada studi kasus ini ada 2 kelas turunan dari class Database yaitu class PermohonanIzinTI dan class SuratTugasPelatihan.

   - **Kelas turunan SuratTugasPelatihan**  
     Kelas ini merupakan kelas turunan dari kelas database yang mengambil data dari Database Mysql. Kelas ini nantinya akan melakukan pengelolaan data surat tugas untuk keperluan Pelatihan.
     
     ```php
     <?php
     include('koneksi.php');
     class SuratTugasPelatihan extends Database {
         public function tampilDataSuratTugas() {
             $SQL = "SELECT * FROM surat_tugas WHERE keperluan = 'Pelatihan'";
             $data = mysqli_query($this->koneksi, $SQL); 
             $hasil_data = []; 
             while ($row = mysqli_fetch_array($data)) {
                 $hasil_data[] = $row;
             }
             return $hasil_data;
         }
     }
     ```

     Untuk membuat sebuah class turunan baru dapat menggunakan sintaks `class nama_kelas_turunan extends nama_kelas_induk {}`. Dalam kelas turunan ini tidak ada penambahan property baru. Pada kelas turunan SuratTugasPelatihan terdapat satu metode tampilDataSuratTugas yang akan menampilkan data surat tugas untuk kondisi keperluannya merupakan Pelatihan.

   - **Kelas turunan PermohonanIzinTI**  
     Kelas ini merupakan kelas turunan yang akan mewarisi atribut(property) dan metode dari kelas induk ‘Database’ dan juga koneksinya untuk mengakses Database di Mysql. Kelas ini akan melakukan pengelolaan data permohonan izin dari para tenaga kerja yang berada di unit kerja Teknik Informatika saja.
     ```php
     class PermohonanIzinTI extends Database {
         public function __construct() {
             parent::__construct();
         }

         public function tampilDataPermohonan() {
             $SQL = "SELECT * FROM permohonan_izin WHERE unit_kerja = 'Teknik Informatika'";
             $data_permohonan = mysqli_query($this->koneksi, $SQL); 
             $hasil_data = [];
             while ($row = mysqli_fetch_array($data_permohonan)) {
                 $hasil_data[] = $row;
             }
             return $hasil_data;
         }
     }
     ```


DOKUMENTASI OUTPUT<hr>
- ***Halaman Index yang  berisi navbar 4 menu <br>***
  ![Screenshot 2024-09-21 001838](https://github.com/user-attachments/assets/9764f045-2396-44e8-a4f9-904a9722380a)
  
- ***Output Metode tampilDataPermohonan() di class Database<br>***
  ![Screenshot 2024-09-21 001857](https://github.com/user-attachments/assets/605a433d-e508-4471-920e-72e1d12fdaec)

- ***Output Metode tampilDataSuratTugas() di class Database<br>***
  ![Screenshot 2024-09-21 001940](https://github.com/user-attachments/assets/1bc492ac-f9c3-49e6-90b4-40b9ffd0e947)
  
- ***Output Metode tampilDataPermohonan() di class turunan TampilPermohonanTI<br>***
  ![Screenshot 2024-09-21 002037](https://github.com/user-attachments/assets/131d1850-d586-4ccf-999a-27f3749687b2)
  
- ***Output Metode tampilDataSuratTugas() di class turunan TampilSuratPelatihan<br>***
  ![Screenshot 2024-09-21 002050](https://github.com/user-attachments/assets/62653159-1079-4fb8-88b6-ad04bb6141f8)

