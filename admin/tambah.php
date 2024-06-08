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
        <h1 class="text-center">Tambah data lagu</h1>
    </div>

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