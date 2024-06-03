<?php
require '../functions/functions.php';

// ambil data di url
$id = $_GET["id"];
// query data music berdasarkan id
$msc = query("SELECT * FROM music WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah data berhasil di ubah atau tidak
    if( ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'dashboard.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'dashboard.php';
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
    <title>Ubah data lagu</title>
</head>
<body>
    <h1>Ubah data lagu</h1>

    <form action="" method= "post">
        <input type ="hidden" name = "id" value="<?= $msc["id"];?>">
        <ul>
            <li>
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" required value="<?= $msc["title"]; ?>">
            </li>
            <li>
                <label for="title">Artist : </label>
                <input type="text" name="artist" id="artist" value="<?= $msc["artist"]; ?>">
            </li>
            <li>
                <label for="title">Album : </label>
                <input type="text" name="album" id="album" value="<?= $msc["album"]; ?>">
            </li>
            <li>
                <label for="title">Gambar : </label>
                <input type="text" name="gambar" id="gambar" value="<?= $msc["gambar"]; ?>">
            </li>
            <li>
                <label for="title">File : </label>
                <input type="text" name="file" id="file" value="<?= $msc["file"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Lagu!</button>
            </li>
        </ul>

    </form>


</body>
</html>