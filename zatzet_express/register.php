<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "zatzet";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

$sql = "INSERT INTO zatzet (username, email, password) VALUES ('$username', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    $pesan = "Registrasi berhasil!";
} else {
    $pesan = "Registrasi gagal: " . $conn->error;
}

$conn->close();
?>
