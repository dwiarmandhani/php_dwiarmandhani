<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_baris = $_POST['jumlah_baris'];
    $jumlah_kolom = $_POST['jumlah_kolom'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Input Nilai</h2>
        <form action="soal1c.php" method="POST">
            <?php
            for ($i = 1; $i <= $jumlah_baris; $i++) {
                for ($j = 1; $j <= $jumlah_kolom; $j++) {
                    echo '<div class="form-group">';
                    echo '<label for="form_' . $i . '_' . $j . '">Form ' . $i . '.' . $j . '</label>';
                    echo '<input type="text" class="form-control" id="form_' . $i . '_' . $j . '" name="form[' . $i . '][' . $j . ']">';
                    echo '</div>';
                }
            }
            ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>