<?php
include('Koneksi.php');
// Inheritance
//Membuat class turunan dari class database untuk mengelola permohonan izin khusus untuk unit kerja teknik informatika (TI)
class PermohonanIzinTI extends Database {
	//Construct
	public function __construct() {
		parent::__construct();	//Memamnggil construct dari class induk (class database')
	}

	//Metode untuk menampilkan data permohonan izin dari unit kerja Teknik Informatika
	public function tampilDataPermohonan() {
		 // Polimorfisme: Mengambil hanya data dengan unit_kerja 'Teknik Informatika'
		// Query SQL untuk mengambil semua data dari tabel permohonan_izin dengan kondisi tertentu yaitu data yang memiliki unit kerja 'Teknik Informatika'
		$SQL = "SELECT * FROM permohonan_izin WHERE unit_kerja = 'Teknik Informatika'";
		$data_permohonan = mysqli_query($this->koneksi, $SQL); // Menjalankan query dan menyimpan hasilnya
		$hasil_data = []; 	 // Inisialisasi array untuk menyimpan hasil data
		//Loop melalui hasil query dan menyimpannya ke datam array $hasil_data
		while ($row = mysqli_fetch_array($data_permohonan)) {
			$hasil_data[] = $row; 	// Menyimpan setiap baris ke dalam array hasil_data
		}

		return $hasil_data;	// Mengembalikan array hasil yang berisi data permohonan izin

	}

}
// Membuat objek dari kelas PermohonanIzinTI untuk mengakses data permohonan izin dosen Teknik Informatika
$permohonanIzinTI= new PermohonanIzinTI();
// Mengambil data permohonan izin dari metode tampilDataPermohonan()
$data = $permohonanIzinTI->tampilDataPermohonan(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Permohonan Izin TI</title>	<!-- Judul halaman yang akan ditampilkan di tab browser -->
	<!--link botstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="mt-5">
		<h1 class="text-center">Data Permohonan Izin Unit Kerja TI</h1>
		<div class="px-5 mt-5">
			<table border="1" class="table table-striped table-bordered table-hover" >	<!-- Tabel untuk menampilkan data permohonan izin untuk unit kerja Teknik Informatika-->
				<thead class="bg-dark text-white text-center">
					<tr class=" table-dark">
						<th>NO</th>	<!-- Kolom untuk nomor urut -->
						<th>ID Izin</th>	<!-- Kolom untuk ID izin -->
						<th>Nama Dosen</th>	<!-- Kolom untuk nama dosen -->
						<th>NIP</th>	<!-- Kolom untuk NIP dosen -->
						<th>Pangkat Jabatan</th> <!-- Kolom untuk pangkat jabatan  -->
						<th>Jabatan</th>	<!-- Kolom untuk jabatan -->
						<th>Unit Kerja</th><!-- Kolom untuk unit kerja -->
						<th>ID Dosen</th><!-- Kolom untuk ID dosen -->
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;	// Inisialisasi nomor urut untuk menampilkan daftar
					// Loop melalui setiap baris data permohonan yang diambil dari database
					foreach($data as $row) {
					?>
						<tr>
							<td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
							<td><?php echo $row['izin_id']; ?></td><!-- Menampilkan ID izin -->
							<td><?php echo $row['nama_dsn']; ?></td><!-- Menampilkan nama dosen-->
							<td><?php echo $row['nip']; ?></td><!-- Menampilkan NIP-->
							<td><?php echo $row['pangkat_jabatan']; ?></td><!-- Menampilkan pangkat jabatan-->
							<td><?php echo $row['jabatan']; ?></td><!-- Menampilkan jabatan-->
							<td><?php echo $row['unit_kerja']; ?></td><!-- Menampilkan unit kerja-->
							<td><?php echo $row['dosen_id']; ?></td><!-- Menampilkan ID dosen-->
						</tr>
					<?php 
					}
					?>
				</tbody>
			</table>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</div>
</body>
</html>