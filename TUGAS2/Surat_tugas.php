<?php 	
//Mengimpor file 'koneksi.php' yang berisikan definisi sebuah class 'Database' dan koneksi ke dalam database
include('koneksi.php');
//Instansiasi Objek
$database_tugas= new Database(); //Membuat objek dari class Database
// Mengambil data surat tugas dari database menggunakan metode 'tampilDataSuratTugas'
$data_surat= $database_tugas->tampilDataSuratTugas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Surat Tugas</title><!-- Judul halaman yang akan ditampilkan di tab browser -->
	<!--link bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="mt-5">
	<h1 class="text-center">Data Surat Tugas</h1><!-- Judul utama halaman -->
	<div class="px-5 mt-5">
		<table border="1" class="table table-striped table-bordered table-hover" ><!-- Tabel untuk menampilkan data surat tugas -->
			<thead class="bg-dark text-white text-center">	
				<tr class=" table-dark">
					<th>NO</th>	<!-- Kolom untuk nomor urut -->
					<th>ID Surat Tugas</th> <!-- Kolom untuk ID surat tugas -->
					<th>Nomor Surat</th>	<!-- Kolom untuk nomor surat -->
					<th>Nama Dosen</th><!-- Kolom untuk nama dosen -->
					<th>Tanggal Surat Tugas</th> <!-- Kolom untuk tanggal surat tugas -->
					<th>Tujuan</th><!-- Kolom untuk tujuan -->
					<th>Transportasi</th><!-- Kolom untuk transportasi yang digunakan -->
					<th>Keperluan</th><!-- Kolom untuk keperluan surat tugas -->
					<th>ID Dosen</th><!-- Kolom untuk ID dosen -->
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;// Inisialisasi nomor urut untuk menampilkan daftar
				foreach($data_surat as $row){	// Loop melalui setiap baris data surat tugas yang diambil dari database
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row['surat_tugas_id']; ?></td>
						<td><?php echo $row['nomor']; ?></td>
						<td><?php echo $row['nama_dsn']; ?></td>
						<td><?php echo $row['tgl_surat_tugas']; ?></td>
						<td><?php echo $row['tujuan']; ?></td>
						<td><?php echo $row['transportasi']; ?></td>
						<td><?php echo $row['keperluan']; ?></td>
						<td><?php echo $row['dosen_id']; ?></td>
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