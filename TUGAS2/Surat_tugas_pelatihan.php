<?php
// Mengimpor file koneksi.php yang berisi definisi kelas Database dan pengaturan koneksi ke database
include('Koneksi.php');
//Inheritance
// KMembuat class turunan dari class Database
class SuratTugasPelatihan extends Database {
	// Metode untuk mengambil data surat tugas dengan keperluan 'Pelatihan'
    public function tampilDataSuratTugas() {
        // Polimorfisme: Mengambil hanya data dengan keperluan 'Pelatihan'
		// SQL query untuk mendapatkan data surat tugas dengan keperluan 'Pelatihan '
        $SQL = "SELECT * FROM surat_tugas WHERE keperluan = 'Pelatihan'";
        $data = mysqli_query($this->koneksi, $SQL); // Menjalankan query dan menyimpan hasilnya
		$hasil_data = []; // Inisialisasi array hasil_data
		//Loop melalui hasil query dan menyimpannya ke datam array $hasil_data
        while ($row = mysqli_fetch_array($data)) {
            $hasil_data[] = $row; // Menambahkan baris data ke dalam array hasil_data
        }
        return $hasil_data; // Mengembalikan array hasil data
    }
}
//Instansiasi Objek
// Membuat objek dari kelas SuratTugasPelatihan
$Surat_tugas = new SuratTugasPelatihan();
// Mengambil data surat tugas pelatihan dari metode tampilDataSurat()
$data_surat_pelatihan = $Surat_tugas->tampilDataSuratTugas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Surat Tugas Pelatihan</title><!-- Judul halaman yang akan ditampilkan di tab browser -->
	<!--link bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="mt-5">
	<h1 class="text-center">Data Surat Tugas Pelatihan</h1>
		<div class="px-5 mt-5">
			<table border="1" class="table table-striped table-bordered table-hover" ><!-- Tabel untuk menampilkan data surat tugas pelatihan -->
				<thead class="bg-dark text-white text-center">	
					<tr class=" table-dark">
						<th>NO</th><!-- Kolom untuk nomor urut -->
						<th>ID Surat Tugas</th><!--Kolom untuk ID Surat Tugas-->
						<th>Nomor Surat</th><!--Kolom untuk Nomor Surat-->
						<th>Nama Dosen</th><!--Kolom untuk Nama Dosen-->
						<th>Tanggal Surat Tugas</th><!--Kolom untuk Tanggal Surat Tugas-->
						<th>Tujuan</th><!--Kolom untuk Tujuan-->
						<th>Transportasi</th><!--Kolom Untuk Transportasi-->
						<th>Keperluan</th><!--Kolom Untuk Keperluan-->
						<th>ID Dosen</th><!--Kolom untuk ID Dosen-->
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					// Loop melalui setiap baris data surat tugas pelatihan yang diambil dari database
					foreach($data_surat_pelatihan as $row){
						?>
						<tr>
							<td><?php echo $no++; ?></td><!-- Menampilkan nomor urut -->
							<td><?php echo $row['surat_tugas_id']; ?></td><!-- Menampilkan ID surat tugas -->
							<td><?php echo $row['nomor']; ?></td> <!-- Menampilkan nomor surat -->
							<td><?php echo $row['nama_dsn']; ?></td><!-- Menampilkan nama dosen -->
							<td><?php echo $row['tgl_surat_tugas']; ?></td> <!-- Menampilkan tanggal surat tugas -->
							<td><?php echo $row['tujuan']; ?></td> <!-- Menampilkan tujuan surat tugas -->
							<td><?php echo $row['transportasi']; ?></td> </td> <!-- Menampilkan transportasi yang digunakan -->
							<td><?php echo $row['keperluan']; ?></td> <!-- Menampilkan keperluan surat tugas -->
							<td><?php echo $row['dosen_id']; ?></td><!-- Menampilkan ID dosen -->
                    </tr>
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