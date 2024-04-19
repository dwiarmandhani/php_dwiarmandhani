<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Jumlah Baris dan Kolom</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Input Jumlah Baris dan Kolom</h2>
        <form action="soal1b.php" method="POST">
            <div class="form-group">
                <label for="jumlah_baris">Inputkan Jumlah Baris:</label>
                <input type="number" class="form-control" id="jumlah_baris" name="jumlah_baris">
            </div>
            <div class="form-group">
                <label for="jumlah_kolom">Inputkan Jumlah Kolom:</label>
                <input type="number" class="form-control" id="jumlah_kolom" name="jumlah_kolom">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>