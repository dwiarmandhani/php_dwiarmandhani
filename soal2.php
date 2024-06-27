<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nama'])) {
        $_SESSION['nama'] = $_POST['nama'];
        header('Location: soal2.php?step=2');
        exit();
    } elseif (isset($_POST['umur'])) {
        $_SESSION['umur'] = $_POST['umur'];
        header('Location: soal2.php?step=3');
        exit();
    } elseif (isset($_POST['hobi'])) {
        $_SESSION['hobi'] = $_POST['hobi'];
        header('Location: soal2.php?step=4');
        exit();
    }
}

$step = isset($_GET['step']) ? $_GET['step'] : 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Berurutan</title>
</head>
<body>
    <?php if ($step == 1): ?>
        <form method="post" action="soal2.php">
            <label>Nama anda:</label>
            <input type="text" name="nama" required>
            <button type="submit">Submit</button>
        </form>
    <?php elseif ($step == 2): ?>
        <form method="post" action="soal2.php">
            <label>Umur anda:</label>
            <input type="number" name="umur" required>
            <button type="submit">Submit</button>
        </form>
    <?php elseif ($step == 3): ?>
        <form method="post" action="soal2.php">
            <label>Hobi anda:</label>
            <input type="text" name="hobi" required>
            <button type="submit">Submit</button>
        </form>
    <?php elseif ($step == 4): ?>
        <h3>Data yang Anda masukkan:</h3>
        <p>Nama: <?php echo htmlspecialchars($_SESSION['nama']); ?></p>
        <p>Umur: <?php echo htmlspecialchars($_SESSION['umur']); ?> tahun</p>
        <p>Hobi: <?php echo htmlspecialchars($_SESSION['hobi']); ?></p>
    <?php endif; ?>
</body>
</html>
