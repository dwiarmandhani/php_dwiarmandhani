<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : '';

// var_dump($nama, $alamat);
// die;

$sql = "SELECT p.id, p.nama, p.alamat, GROUP_CONCAT(h.hobi SEPARATOR ', ') as hobi
        FROM person p
        LEFT JOIN hobi h ON p.id = h.person_id
        WHERE p.nama LIKE ? AND p.alamat LIKE ?
        GROUP BY p.id, p.nama, p.alamat";

$stmt = $conn->prepare($sql);
$like_nama = "%$nama%";
$like_alamat = "%$alamat%";
$stmt->bind_param("ss", $like_nama, $like_alamat);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Orang dan Hobi</title>
</head>

<body>
    <h1>Daftar Orang dan Hobi</h1>

    <form method="GET" action="soal3a.php">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($nama ?? ''); ?>">
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo htmlspecialchars($alamat ?? ''); ?>">
        <button type="submit">Search</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Hobi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($row['hobi'] ?? ''); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    $stmt->close();
    $conn->close();
    ?>
</body>

</html>