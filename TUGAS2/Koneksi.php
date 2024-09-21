<?php 
//Membuat Class dengan nama 'Database'
//Membuat Class Database yang digunakan untuk melakukan koneksi dengan database di Mysql
class Database{

	//Mendefinisikan Atribut (Properti) Propertiyang digunakan untuk menyimpan informasi koneksi database
	private $host = "localhost";	//Properti yang berisi alamat server database, bersifat private
	private $username = "root";		//Properti yang berisi username untuk login ke database, bersifat private
	private $password = "";			//Properti  yang berisi password login ke database, bersifat private
	private $database = "db_surat";	//Properti yang berisi nama database yang digunakan, bersifat private
	protected $koneksi ;	//Properti yang berisi koneksi yang akan diakses oleh class ini dan class turunannya

	//Construct
	public function __construct() {
		//Membuat koneksi ke dalam database dengan menggunakan fungsi 'mysqli_connect()'
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		//Melakukan pengecekkan koneksi, jika koneksi gagal maka akan menampilkan pesan kesalahan
		if (mysqli_connect_errno()) {
			echo "Koneksi ke Database Gagal !!! : " . mysqli_connect_error();
		}
	}

	//Metode untuk menampilkan selurun data permohonan izin yang terdapat di dalam tabel 'permohonan_izin'
	public function tampilDataPermohonan() {
		//Query SQL untuk mengambil semua data yang ada pada tabel 'permohonan_izin'
		$data_permohonan = mysqli_query($this->koneksi,"SELECT * FROM permohonan_izin");
		$hasil_data = []; // Inisialisasi array untuk menampung hasil query
		//Loop melalui hasil query dan menyimpannya ke datam array $hasil_data
		while($row = mysqli_fetch_array($data_permohonan)) {	
			$hasil_data[] = $row;	//Melakukan penyimpanan dari setiap baris data hasil dari query ke dalam array
		}
		return $hasil_data;	//Mengembalikan array yang berisi hasil dari query
	}

	//Metode untuk menampilkan seluruh data yang terdapat di dalam tabel 'surat_tugas'
	public function tampilDataSuratTugas() {
		//Query SQL untuk mengambil semua data yang ada pada tabel 'surat_tugas'
		$data_surat_tugas = mysqli_query($this->koneksi,"SELECT * FROM surat_tugas");
		$hasil_data = []; // Inisialisasi array untuk menampung hasil query
		while($row = mysqli_fetch_array($data_surat_tugas)) {
			$hasil_data[] = $row;	//Melakukan penyimpanan dari setiap baris data hasil dari query ke dalam array
		}
		return $hasil_data; //Mengembalikan array yang berisi hasil dari query
	}
} 
?> 