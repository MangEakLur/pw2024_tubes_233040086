<?php
require '../functions/functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
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

    <form action="" method= "post" enctype="multipart/from-data">
        <ul>
            <li>
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" required>
            </li>
            <li>
                <label for="title">Artist : </label>
                <input type="text" name="artist" id="artist">
            </li>
            <li>
                <label for="title">Album : </label>
                <input type="text" name="album" id="album">
            </li>
            <li>
                <label for="title">Genre : </label>
                <input type="text" name="genre" id="genre">
            </li>
            <li>
                <label for="title">File : </label>
                <input type="file" name="file" id="file">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Lagu!</button>
            </li>
        </ul>

    </form>


</body>
</html>