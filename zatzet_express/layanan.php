<?php
function registerUser() {

    $registrasiBerhasil = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "zatzet";

        $conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO zatzet ('username', 'email', 'password') VALUES ('$username', '$email', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            $registrasiBerhasil = true;
            $pesan = "Anda sudah registrasi!";
            echo "<script>window.location.href = 'beranda.php';</script>";
            exit();
        } else {
            $pesan = "Terjadi kesalahan: " . mysqli_error($conn);
        }
        mysqli_close($conn);

        echo "<p>" . $pesan . "</p>";
    }
    return $registrasiBerhasil;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="layanan.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <link rel="icon" href="image/zatzet logos.png" class="rounded-circle">
    <title>zatzet</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark shadow" style="background-color: #1D1C26">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="image/zatzet nav.png" alt="zatzet" width="100%">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="nav" href="index.php">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="nav" href="layanan.php">LAYANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light active" id="login" href="#registerModal" data-bs-toggle="modal" data-bs-target="#registerModal" onclick="switchToRegisterForm()">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-end">
                    <img class="my-auto" src="image/zatzet nav.png" width="30%">
                </div>
                <div class="col-md-4 mt-5 ml-3">
                    <h3 style="color: orange;">Tentang <span style="color: #289DC2;">ZAT ZET</span></h3>
                    <p style="font-family: sans-serif;">ZAT ZET adalah agen pengiriman online yang akan membantu kamu menyiapkan dan mengirimkan barang kiriman kamu. Mulai dari pickup barang lalu menigirimkannya ke vendor pengiriman pilihan anda atau dapat juga kami pilihkan vendor terbaik kami (dari segi harga dan performance).</p>
                </div>
                <div class="col-md-12 text-center">
                    <h4 style="color: orange;">Mengapa harus menggunakan layanan <span style="color: #289DC2;">ZAT ZET</span> ?</h4>
                    <p><i>Berikut ini adalah beberapa alasan, mengapa kamu harus menggunakan layanan ZAT ZET</i></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 d-none d-sm-block pb-5"></div>
                <div class="col-12 col-sm-8" style="padding-top: 0px;">
                    <div class="row justify-content-center text-center pb-5">
                        <div class="col-md-4 mb-5 shadow p-3">
                            <img src="image/zatzet freeongkos.png" class="im pt-4 mb-2" width="50%">
                            <p class="text-muted">
                                Tanpa biaya tambahan, kami urus semua pengiriman anda!
                            </p>
                        </div>
                        <div class="col-md-4 mb-5 ml-2 shadow p-3">
                            <img src="image/resi.png" class="im pt-4 mb-2" width="70%">
                            <p class="text-muted">
                                Dapat nomor resi di hari yang sama!
                            </p>
                        </div>
                        <div class="col-md-4 mb-5 shadow p-3">
                            <img src="image/zatzat free pickup.png" class="im pt-4 mb-2" width="40%">
                            <p class="text-muted">
                                Pickup GRATIS! Dengan minimal 5 kg atau 5 resi per pickup.
                            </p>
                        </div>
                        <div class="col-md-4 mb-5 ml-2 shadow p-3">
                            <img src="image/zatzet realtime.png" class="im pt-4 mb-2" width="20%">
                            <p class="text-muted">
                                Cek update status pengiriman secara real-time melalui Smartphone kamu.
                            </p>
                        </div>
                        <div class="col-md-4 mb-5 ml-2 shadow p-3">
                            <img src="image/zazet cargo.png" class="im pt-4 mb-2" width="80%">
                            <p class="text-muted">
                                Harga spesial untuk pengiriman dalam jumlah besar (kargo).
                            </p>
                        </div>
                        <div class=" col-md-8 shadow p-3">
                            <h2 style="color:orange;">Pilih Opsi Pengiriman</h2>
                            <p style="display: inline;"><p style="display:inline; color: #289DC2;">ZatZet Reguler</p> Sampai dalam 4-7 hari</p>
                            <p style="display: inline;"><p style="display:inline; color: #289DC2;">ZatZet Prima</p> Lebih cepat! sampai dalam 2-4 hari</p>
                            <p style="display: inline;"><p style="display:inline; color: #289DC2;">ZatZet Super</p> Super cepat! sampai dalam 1 hari!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm">
                            <div class="mb-3">
                                <label for="usernameOrEmail" class="form-label">Username / Email:</label>
                                <input type="text" class="form-control" id="usernameOrEmail" name="usernameOrEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: orange; border: none;">Login</button>
                        </form>
                        <p class="text-center mt-3" id="alreadyRegisteredText"><a id="showLoginForm" href="#" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Daftar </a>untuk masuk</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (registerUser()) {
                            echo "<script>showSuccessNotification();</script>";
                        }
                        ?>
                        <form id="registerForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Konfirmasi Password:</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: orange; border: none;">Register</button>
                        </form>
                        <p class="text-center mt-3" id="alreadyRegisteredText">Sudah punya akun? <a id="showLoginForm" href="#" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Login</a></p>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    
    <footer class="text-white" style="background-color: #1D1C26;">
        <div class="text-center p-2">
            <span><img src="image/zatzet typograph.png" alt="zatzet" width="70px">&copy; <span style="font-family: Arial, Helvetica, sans-serif; font-size: small;">2024 - Mahasiswa Anonim</span></span>
        </div>
    </footer>
</body>
</html>