<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$sql = "SELECT h.hobi, COUNT(p.id) AS jumlah_person
        FROM hobi h
        JOIN person p ON h.person_id = p.id";
if (!empty($search)) {
    $sql .= " WHERE h.hobi LIKE '%$search%'";
}

$sql .= " GROUP BY h.hobi
          ORDER BY jumlah_person DESC";

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hobi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Laporan Hobi</h2>
    <form action="soal2a.php" method="POST">
        <label for="search">Search by Hobi:</label>
        <input type="text" id="search" name="search" value="">
        <input type="submit" value="Search">
    </form>
    <table>
        <tr>
            <th>Hobi</th>
            <th>Jumlah Person</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["hobi"] . "</td><td>" . $row["jumlah_person"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
$conn->close();
?>