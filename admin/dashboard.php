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
</head>
<body>
    
    <h1>Daftar Lagu</h1>

    <a href="tambah.php">Tambah data lagu</a>
    <br><br>

<form action="" method="post">

    <input type="text" name="keyword" size="40" autofocus placeholder ="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>

</form>

<br>
<table border="1" cellpadding= "10" cellspacing="0">

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

</body>
</html>