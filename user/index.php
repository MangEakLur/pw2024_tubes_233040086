<?php
require '../functions/functions.php';
$music = query("SELECT * FROM music");

//tombol cari ditekan
if (isset($_POST["cari"]) ) {
    $music = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h1.text-center {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
        }
        audio {
            width: 100%;
        }
    </style>
</head>
<body>
    
    <h1 class="text-center">Daftar Lagu</h1>

<form action="" method="post">

    <input type="text" name="keyword" size="40" autofocus placeholder ="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>

</form>

<br>
<div class="contaier">
<table class="table table-success table-striped">

<tr>
    <th>No.</th>
    <th>Title</th>
    <th>Artist</th>
    <th>Album</th>
    <th>Gambar</th>
    <th>File</th>
</tr>


<?php $i = 1; ?>
<?php foreach( $music as $row ) : ?>
<tr>
    <td><?= $i; ?></td>
    <td><?= $row["title"]; ?></td>
    <td><?= $row["artist"]; ?></td>
    <td><?= $row["album"]; ?></td>
    <td><img src="../img/<?php echo $row["gambar"]; ?>" width="100"></td>
    <td><audio controls>
    <source src="../audio/<?php echo $row["file"]; ?>" type="audio/mpeg">
    </audio></td>
</tr>
<?php $i++ ?>
<?php endforeach; ?>

</table>
</div>
</body>
</html>