<?php
require '../functions/functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak

    if( tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                // document.location.href = 'dashboard.php';
            </script>
        ";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data lagu</title>
</head>
<body>
    <h1>Tambah data lagu</h1>

    <form action="" method= "post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" required>
            </li>
            <li>
                <label for="artist">Artist : </label>
                <input type="text" name="artist" id="artist" required>
            </li>
            <li>
                <label for="album">Album : </label>
                <input type="text" name="album" id="album" required>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <label for="audio">File : </label>
                <input type="file" name="musik" id="audio" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Lagu!</button>
            </li>
        </ul>

    </form>


</body>
</html>