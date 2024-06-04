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
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    
    <h1 class="text-center">Daftar Lagu</h1>

    <a href="tambah.php" class="bg bg-info rounded text-decoration-none text-dark p-2">Tambah data lagu</a>
    <br><br>

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
    <th>Aksi</th>
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
    <td>
        <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
    </td>
</tr>
<?php $i++ ?>
<?php endforeach; ?>

</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>