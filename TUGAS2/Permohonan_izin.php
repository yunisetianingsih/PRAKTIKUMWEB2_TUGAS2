<?php 	
//Mengimpor file 'koneksi.php' yang berisikan definisi sebuah class 'Database' dan koneksi ke dalam database
include('Koneksi.php');
//Instansiasi Objek
$database_permohonan = new Database();	//Membuat objek dari class Database

$hasil_data_permohonan = $database_permohonan->tampilDataPermohonan();	//Memanggil metode 'tampilDataPermohonan()' untuk mengambil data permohonan izin dari database
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Permohonan Izin</title>
	<!--Menambahkan link bootstrap untuk tampilan-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="mt-5">
		<h1 class="text-center">Data Permohonan Izin</h1> 
		<div class="px-5 mt-5">
			<table border="1" class="table table-striped table-bordered table-hover" >	<!--Tabel untuk menampilkan semua data permohonan izin-->
				<thead class="bg-dark text-white text-center">
					<tr class=" table-dark">
						<th>NO</th>	<!--Kolom nomer urut-->
						<th>ID Izin</th> <!--Kolom id izin-->
						<th>Nama Dosen</th><!--Kolom nama dosen -->
						<th>NIP</th><!-- Kolom NIP-->
						<th>Pangkat Jabatan</th> <!--Kolom Pangkat Jabatan-->
						<th>Jabatan</th> <!--Kolom Jabatan-->
						<th>Unit Kerja</th> <!--Kolom Unit Kerja-->
						<th>ID Dosen</th>	<!--Kolom id dosen-->
					</tr>
				</thead>
				</tbody>
					<?php 
					//Inisialisasi nomor urut
					$no = 1;
					// Loop melalui setiap baris data permohonan yang diambil dari database
					foreach($hasil_data_permohonan as $row){
					?>
						<tr>
							<td><?php echo $no++; ?></td>	<!-- Menampilkan nomor urut -->
							<td><?php echo $row['izin_id']; ?></td> <!-- Menampilkan ID izin -->
							<td><?php echo $row['nama_dsn']; ?></td> <!-- Menampilkan nama dosen -->
							<td><?php echo $row['nip']; ?></td> <!-- Menampilkan NIP -->
							<td><?php echo $row['pangkat_jabatan']; ?></td> <!-- Menampilkan pangkat jabatan -->
							<td><?php echo $row['jabatan']; ?></td> <!-- Menampilkan jabatan -->
							<td><?php echo $row['unit_kerja']; ?></td> <!-- Menampilkan unit kerja -->
							<td><?php echo $row['dosen_id']; ?></td> <!-- Menampilkan ID dosen -->
						</tr>
					<?php 
					}
					?>
				</tbody>
			</table>
		</div>
		<!--Menambahkan link javascript boostrap-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</div>
</body>
</html>