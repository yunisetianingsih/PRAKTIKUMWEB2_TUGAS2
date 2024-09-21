<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Persuratan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('Background.jpg'); 
            background-size: cover; 
            background-position: center center; 
            background-repeat: no-repeat;
            min-height: 100vh; 
            color: white;
        }
        .navbar {
            background-color: rgba(20, 20, 20, 0.9); 
        }
        .navbar-nav .nav-link {
            color: white;
            transition: color 0.3s, border-bottom 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #F0BE0F; 
            border-bottom: 2px solid #FFD700; 
        }
        h1 {
            margin-top: 290px;
            font-size: 3rem;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 1.0);
        }
        p {
            font-size: 1.5rem;
            text-align: center;
            margin-top: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Sistem Persuratan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Permohonan_Izin.php">Data Permohonan Izin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Surat_tugas.php">Data Surat Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Permohonan_Izin_TI.php">Data Permohonan Izin TI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Surat_tugas_pelatihan.php">Data Surat Tugas Pelatihan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <h1>Selamat Datang di Sistem Informasi Persuratan Kampus</h1>
        <p>Kelola permohonan izin, dan surat tugas dengan mudah</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
