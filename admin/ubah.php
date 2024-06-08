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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }

        h1 {
            text-align: text-center;
        }

        .tag-line {
            width: 100%;
            height: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="tag-line">
        <h1 class="text-center">Ubah data lagu</h1>
    </div>

    <form action="" method= "post" enctype="multipart/form-data">
        <input type ="hidden" name = "id" value="<?= $msc["id"];?>">
        <input type ="hidden" name = "gambarLama" value="<?= $msc["gambar"];?>">
        <input type ="hidden" name = "audioLama" value="<?= $msc["file"];?>">
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
                <label for="gambar">Gambar : </label> <br>
                <img src="../img/<?= $msc['gambar'];?>" width="80"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="audio">File : </label>
                <audio src="../audio/<?= $msc['file'];?>"></audio> <br>
                <input type="file" name="audio" id="audio">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Lagu!</button>
            </li>
        </ul>

    </form>


</body>
</html>