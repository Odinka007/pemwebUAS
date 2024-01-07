<?php
function kirimBarang($pengirim_nama, $pengirim_hp, $penerima_nama, $penerima_hp, $penerima_alamat)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zatzet";

    $koneksi = mysqli_connect($servername, $username, $password, $dbname);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $query = "INSERT INTO kirimbarang (namaPengirim, noPengirim, namaPenerima, noPenerima, alamatLengkap) VALUES ('$pengirim_nama', '$pengirim_hp', '$penerima_nama', '$penerima_hp', '$penerima_alamat')";

    if (mysqli_query($koneksi, $query)) {
        mysqli_close($koneksi);
        return "Data berhasil disimpan.";
    } else {
        mysqli_close($koneksi);
        return "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pengirim_nama = isset($_POST['pengirim-nama']) ? $_POST['pengirim-nama'] : "";
    $pengirim_hp = isset($_POST['pengirim-hp']) ? $_POST['pengirim-hp'] : "";
    $penerima_nama = isset($_POST['penerima-nama']) ? $_POST['penerima-nama'] : "";
    $penerima_hp = isset($_POST['penerima-hp']) ? $_POST['penerima-hp'] : "";
    $penerima_alamat = isset($_POST['penerima-alamat']) ? $_POST['penerima-alamat'] : "";

    $result = kirimBarang($pengirim_nama, $pengirim_hp, $penerima_nama, $penerima_hp, $penerima_alamat);

    echo $result;
}

function getDataKirimBarang()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zatzet";

    $koneksi = mysqli_connect($servername, $username, $password, $dbname);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $query = "SELECT idKirim, namaPengirim, noPengirim, namaPenerima, noPenerima, alamatLengkap FROM kirimbarang ORDER BY idKirim DESC LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($koneksi);

        return $row;
    } else {
        mysqli_close($koneksi);
        return null;
    }
}

$dataKirimBarang = getDataKirimBarang();

if ($dataKirimBarang) {
    $idKirim = $dataKirimBarang["idKirim"];
    $pengirim_nama = $dataKirimBarang["namaPengirim"];
    $pengirim_hp = $dataKirimBarang["noPengirim"];
    $penerima_nama = $dataKirimBarang["namaPenerima"];
    $penerima_hp = $dataKirimBarang["noPenerima"];
    $penerima_alamat = $dataKirimBarang["alamatLengkap"];
}

if (isset($_POST['simpan'])) {
    $pengirim_nama = $_POST['pengirim_nama'];
    $pengirim_hp = $_POST['pengirim_hp'];
    $penerima_nama = $_POST['penerima_nama'];
    $penerima_hp = $_POST['penerima_hp'];
    $penerima_alamat = $_POST['penerima_alamat'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zatzet";

    $koneksi = mysqli_connect($servername, $username, $password, $dbname);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $query = "UPDATE kirimbarang SET namaPengirim='$pengirim_nama', noPengirim='$pengirim_hp', namaPenerima='$penerima_nama', noPenerima='$penerima_hp', alamatLengkap='$penerima_alamat' WHERE idKirim='$idKirim'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}

function hapusDataKirimBarang($idKirim)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zatzet";

    $koneksi = mysqli_connect($servername, $username, $password, $dbname);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $query = "DELETE FROM kirimbarang WHERE idKirim='$idKirim'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan saat menghapus data: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['hapus'])) {
        $idKirim = $_POST['id_kirim'];
        hapusDataKirimBarang($idKirim);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="layanan.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <link rel="icon" href="image/zatzet logos.png" class="rounded-circle">
    <title>zatzet</title>
    <script>
        function showSuccessNotification() {
            alert("Anda berhasil mendaftar!");
        }
    </script>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" style="background-color: #1D1C26">
        <div class="container">
            <a class="navbar-brand" href="beranda.php">
                <img src="image/zatzet nav.png" alt="zatzet" width="100%">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="nav" href="beranda.php">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="nav" href="layanan2.php">LAYANAN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron-fluid mt-5">
        <div class="d-flex justify-content-end">
            <div class="my-auto" style="margin:0% 5%;">
                <h1>Pengiriman yang dipercaya<br>lebih dari <br><p class="list-inline-item" style="color: #289DC2;">100,000</p> bisnis</h1>
                <p class="fw-bold" style="font-family:tommy_thin;">Nikmati pengiriman cepat dan tanpa repot dengan ZatZet.<br> Daftar dan dapatkan layanan terbaik untuk kamu.</p>
                <a href="layanan.html" class="btn btn-orange">Lihat Layanan</a>
            </div>
            <img class="my-auto" src="image/truck fast.svg" style="width: 50%;" alt="">
        </div>

        <div class="beranda d-flex justify-content-between">
            <div class="text-center">
                <h3 class="angka">500,000+</h3>
                <p>Orang sudah menggunakan jasa kami</p>
            </div>
            <div class="garis"></div>
            <div class="text-center">
                <h3 class="angka">1,000,000+</h3>
                <p>Pengiriman setiap hari</p>
            </div>
            <div class="garis"></div>
            <div class="text-center">
                <h3 class="angka">99%</h3>
                <p>Mencakup wilayah Indonesia</p>
            </div>
        </div>

        <div class="container mb-5 shadow">
            <h3 class="text-center" style="color: orange;">Kirim barangmu sekarang!</h3>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Informasi Pengirim</h4>
                        <div class="form-group">
                            <label for="pengirim-nama">Nama Pengirim:</label>
                            <input type="text" class="form-control" id="pengirim-nama" name="pengirim-nama">
                        </div>
                        <div class="form-group">
                            <label for="pengirim-hp">Nomor HP:</label>
                            <input type="text" class="form-control" id="pengirim-hp" name="pengirim-hp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Informasi Penerima</h4>
                        <div class="form-group">
                            <label for="penerima-nama">Nama Penerima:</label>
                            <input type="text" class="form-control" id="penerima-nama" name="penerima-nama">
                        </div>
                        <div class="form-group">
                            <label for="penerima-hp">Nomor HP:</label>
                            <input type="text" class="form-control" id="penerima-hp" name="penerima-hp">
                        </div>
                        <div class="form-group">
                            <label for="penerima-alamat">Alamat Lengkap:</label>
                            <textarea class="form-control" id="penerima-alamat" name="penerima-alamat"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-orange">Kirim</button>
                </div>
            </form>
        </div>

        <div class="container shadow mb-5">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Barang yang Kamu Kirim</h4>
                    <?php if (!isset($_POST['ubah'])) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Informasi Pengirim</th>
                                    <th>Informasi Penerima</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Nama Pengirim: <?php echo isset($pengirim_nama) ? $pengirim_nama : ''; ?><br>
                                        Nomor HP Pengirim: <?php echo isset($pengirim_hp) ? $pengirim_hp : ''; ?>
                                    </td>
                                    <td>
                                        Nama Penerima: <?php echo isset($penerima_nama) ? $penerima_nama : ''; ?><br>
                                        Nomor HP Penerima: <?php echo isset($penerima_hp) ? $penerima_hp : ''; ?><br>
                                        Alamat Penerima: <?php echo isset($penerima_alamat) ? $penerima_alamat : ''; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <form method="post">
                            <div class="text-center" style="margin: 0px; padding:0px;">
                                <button type="submit" name="ubah" class="btn btn-orange">Ubah</button>
                            </div>
                        </form>
                        <form method="post">
                            <input type="hidden" name="id_kirim" value="<?php echo $idKirim; ?>">
                            <div style="margin: 0px;" class="text-center">
                                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Informasi Pengirim</th>
                                        <th>Informasi Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Nama Pengirim: <input type="text" name="pengirim_nama" value="<?php echo isset($pengirim_nama) ? $pengirim_nama : ''; ?>"><br>
                                            Nomor HP Pengirim: <input type="text" name="pengirim_hp" value="<?php echo isset($pengirim_hp) ? $pengirim_hp : ''; ?>">
                                        </td>
                                        <td>
                                            Nama Penerima: <input type="text" name="penerima_nama" value="<?php echo isset($penerima_nama) ? $penerima_nama : ''; ?>"><br>
                                            Nomor HP Penerima: <input type="text" name="penerima_hp" value="<?php echo isset($penerima_hp) ? $penerima_hp : ''; ?>"><br>
                                            Alamat Penerima: <input type="text" name="penerima_alamat" value="<?php echo isset($penerima_alamat) ? $penerima_alamat : ''; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button type="submit" name="simpan" class="btn btn-orange">Simpan</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script>
            var pengirimNama = "<?php echo isset($pengirim_nama) ? $pengirim_nama : ''; ?>";
            var pengirimHP = "<?php echo isset($pengirim_hp) ? $pengirim_hp : ''; ?>";
            var penerimaNama = "<?php echo isset($penerima_nama) ? $penerima_nama : ''; ?>";
            var penerimaHP = "<?php echo isset($penerima_hp) ? $penerima_hp : ''; ?>";
            var penerimaAlamat = "<?php echo isset($penerima_alamat) ? $penerima_alamat : ''; ?>";

            document.getElementById("display-pengirim-nama").textContent = pengirimNama;
            document.getElementById("display-pengirim-hp").textContent = pengirimHP;
            document.getElementById("display-penerima-nama").textContent = penerimaNama;
            document.getElementById("display-penerima-hp").textContent = penerimaHP;
            document.getElementById("display-penerima-alamat").textContent = penerimaAlamat;
        </script>
    
    <footer class="text-white" style="background-color: #1D1C26;">
        <div class="text-center p-2">
            <span><img src="image/zatzet typograph.png" alt="zatzet" width="70px">&copy; <span style="font-family: Arial, Helvetica, sans-serif; font-size: small;">2024 - Mahasiswa Anonim</span></span>
        </div>
    </footer>
</body>
</html>