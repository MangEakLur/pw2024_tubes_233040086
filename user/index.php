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
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #ffffff;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding-top: 20px;
        }
        h1.text-center {
            text-align: center;
            color: #1DB954;
            margin-top: 20px;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: #282828;
            color: #ffffff;
        }
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #1DB954;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #1ed760;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #282828;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #181818;
        }
        tr:hover {
            background-color: #333333;
        }
        img {
            width: 90px;
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