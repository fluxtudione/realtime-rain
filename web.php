<?php
$host = 'localhost'; // Ganti dengan host database Anda
$user = 'root';      // Ganti dengan username database Anda
$pass = '';          // Ganti dengan password database Anda

// Fungsi untuk menghubungkan ke database
function connectToDatabase($dbName) {
    global $host, $user, $pass;
    $conn = new mysqli($host, $user, $pass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
// Ambil daftar tabel
if (isset($_GET['get_tables'])) {
    $db = $_GET['db'];
    $conn = connectToDatabase($db);
    $result = $conn->query("SHOW TABLES");
    $tables = [];
    while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }
    echo json_encode($tables);
    $conn->close();
    exit;
}

// Ambil data berdasarkan rentang waktu
if (isset($_POST['fetch_data'])) {
    $db = $_POST['db'];
    $table = $_POST['table'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $conn = connectToDatabase($db);

    // Query untuk data berdasarkan timestamp range
    $query = $conn->prepare("SELECT * FROM `$table` WHERE `time_received` BETWEEN ? AND ?");
    $query->bind_param("ss", $start, $end);
    $query->execute();
    $result = $query->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
    $conn->close();
    exit;
}

?>