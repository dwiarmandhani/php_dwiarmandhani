<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Hasil Input</h2>
        <ul class="list-group">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                foreach ($_POST['form'] as $key => $value) {
                    foreach ($value as $subkey => $subvalue) {
                        echo '<li class="list-group-item">Form ' . $key . '.' . $subkey . ': ' . $subvalue . '</li>';
                    }
                }
            }
            ?>
        </ul>
    </div>
</body>

</html>