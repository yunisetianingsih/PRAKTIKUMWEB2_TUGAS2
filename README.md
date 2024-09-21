
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

Sistem informasi tentang persuratan berbasis web diperlukan untuk mempermudah sistem pesuratan. Berdasarkan studi kasus yang didapatkan yaitu surat_tugas dan permohonan_izin, dilakukan pembuatan tampilan berbasis OOP dengan mengambil data dari database MYSQL.<br>

1. **Data pada database MYSQL**  
   Data base dengan nama ‘db_surat’ yang terdiri atas 2 tabel yaitu permohonan_izin dan surat_tugas.

   ***Database Mysql 'db_surat'<br>***
   ![Screenshot 2024-09-20 204608](https://github.com/user-attachments/assets/dfce77ff-8686-4842-aa5a-ebe3b2def044)

    ***Database Mysql tabel 'permohonan_izin'<br>***
   ![Screenshot 2024-09-20 204705](https://github.com/user-attachments/assets/93bf42a4-8ee7-4e42-94c5-89ddd09acf2f)

    ***Database Mysql tabel 'surat_tugas'<br>***
   ![Screenshot 2024-09-20 204719](https://github.com/user-attachments/assets/eee8a5e0-d279-44da-bff9-ff31fdea71ae)


2. **Membuat kelas ‘Database’ dan menghubungkan koneksi ke Database Mysql**  <br>
   Untuk dapat menghubungkan ke Database Mysql dan melakukan pengambilan data saya membuat sebuah class dengan nama ‘Database’ yang berisi koneksi ke Database MYSQL. Dalam class data berisi properti dan metode.<br>

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
     Properti tersebut digunakan untuk menyimpan informasi alamat server, username, password, nama database, dan koneksi yang digunakan untuk membuat koneksi ke Database MYSQL.<br>

   - **Metode (Fungsi) yang digunakan sebagai tautan ke database**  
     Untuk membuat koneksi ke database menggunakan fungsi `__construct()`.
     ```php
     public function __construct() {
         $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
         if (mysqli_connect_errno()) {
             echo "Koneksi ke Database Gagal !!! : " . mysqli_connect_error();
         }
     }
     ```
     Metode construct di atas merupakan sebuah metode yang secara otomatis dipanggil dan yang pertama kali dieksekusi. Dalam hal ini fungsi tersebut digunakan untuk membuat koneksi ke database. Fungsi `mysqli_connect()` digunakan untuk membuat koneksi ke database MySQL dengan menggunakan parameter yang terdiri dari property yang ada pada class ‘Database’ (host, username, password, database). Jika koneksi berhasil akan disimpan pada property `$koneksi`.

   - **Membuat Metode (Fungsi) Tambahan**  
     Dalam class Database terdapat 2 metode yang aksesibilitasnya bersifat public karena bisa diwariskan ke kelas turunannya, nantinya kelas turunan tersebut dapat menggunakan metode public ini sebagaimana adanya atau melakukan override (menimpa) metode tersebut dengan metode yang lebih spesifik. Metode yang ada di kelas Database yaitu:

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

     3. **tampilDataSuratTugas**  
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
     Berdasarkan logika studi kasus yang didapatkan , saya menerapkan enkapulasi dalam class Database yaitu pada bagian property dan metodenya.

        - Penerapan enkapulasi pada atribut(property) menjadi private:
          ```php
          private $host = "localhost";  
          private $username = "root"; 
          private $password = ""; 
          private $database = "db_surat";
          ```
          Penerapan enkapulasi pada studi kasus ini terjadi pada kelas database, dimana semua property bersifat private yang artinya hanya dapat diakses dari dalam class ‘Database’ itu sendiri. Enkapulasi pada property ini diharapkan dapat melindungi data sensitif karena 4 properti tersebut merupakan data yang sensitif dan harus dilindungi untuk mencegah kebocoran data karena adanya pengaksesan di kelas lain.

        - Penerapan enkapulasi pada atribut (property) menjadi protected:
          ```php
          protected $koneksi;
          ```
          Atribut(property) $koneksi bersifat protected yang berarti dapat diakses oleh kelas itu sendiri dan kelas lain yang mewarisi dari Database (kelas turunannya). Dengan adanya enkapulasi ini kelas turunan dapat melakukan koneksi ke dalam database. Dengan menggunakan atribut(property) private dan protected mencegah adanya akses dari luar ke data penting yang mungkin membahayakan keamanan data.

3. **Melakukan Inheritance (Pewarisan)**  
   Berdasarkan studi kasus permohonan_izin dan surat_tugas, class ‘Database’ merupakan kelas induk yang atribut(property) dan metodenya akan diwariskan kepada kelas turunannya. Pada studi kasus ini saya membuat 2 kelas turunan dari class 'Database' yaitu class 'PermohonanIzinTI' dan class 'SuratTugasPelatihan'.

   - **Kelas turunan SuratTugasPelatihan**  
     Kelas ini merupakan kelas turunan dari kelas 'Database' yang mengambil data dari Database Mysql. Kelas ini nantinya akan melakukan pengelolaan data surat tugas untuk keperluan Pelatihan.
     
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

     Untuk membuat sebuah kelas turunan baru dapat menggunakan sintaks `class nama_kelas_turunan extends nama_kelas_induk {}`. Dalam kelas turunan ini saya membuatnya tidak ada penambahan property baru hanya ada penambahan metode. Pada kelas turunan SuratTugasPelatihan terdapat satu metode `tampilDataSuratTugas()` yang akan menampilkan data surat tugas untuk kondisi keperluannya merupakan 'Pelatihan', metode ini melakukan override dari metode yang ada di kelas induk.

   - **Kelas turunan PermohonanIzinTI**  
     Kelas ini merupakan kelas turunan yang akan mewarisi atribut (property) dan metode dari kelas induk ‘Database’ dan juga koneksinya untuk mengakses Database di Mysql. Kelas ini akan melakukan pengelolaan data permohonan izin dari para tenaga kerja yang berada di unit kerja Teknik Informatika saja.
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
     Dalam kelas turunan ini tidak menambahkan property baru, tetapi hanya menggunakan kembali property yang telah di definisikan di kelas induk (‘Database’). Dengan memanfaatkan prinsip pewarisan dari kelas 'Database', kelas ini dapat mengelola koneksi database dan melakukan query dengan cara yang lebih terstruktur.
     
4. **Melakukan Polymorphism**<br>
   Berdasarkan class induk (‘Database’) dan kelas turunan (‘PermohonanIzinIT’ dan ‘SuratTugasPelatihan’) menerapkan 2 peran polimorfisme .<br>
      -	**Kelas Induk (‘Database’)** <br>
        Mempunyai 2 metode yang berbeda yaitu :<br>
        - Metode tampilDataPermohonan()<br>
         Merupakan metode yang digunakan untuk menampilkan seluruh data permohonan izin dari database<br>
       	
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
           - Metode tampilDataSuratTugas()<br>
       	Merupakan metode yang digunakan untuk menampilkan seluruh data surat tugas dari database<br>

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
      -	**Kelas PermohonanIzinTI**<br>
          Menggunakan metode yang sama dengan meng-override metode `tampilDataPermohonan()` di kelas induk, tapi implemntasinya berbeda pada kelas ini,perannya hanya melakukan pengelolaan data dari tabel permohonan_izin dengan filter unit_kerja = ‘Teknik Informatika’.<br>

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
       	
      - **Kelas SuratTugasPelatihan**<br>
         Menggunakan metode yang sama dengan meng-override metode `tampilDataSuratTugas()` di kelas induk, tapi implementasinya berbeda pada kelas ini,perannya hanya melakukan pengelolaan data dari tabel surat_tugas  dengan filter keperluan= ‘Pelatihan’.<br>
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

