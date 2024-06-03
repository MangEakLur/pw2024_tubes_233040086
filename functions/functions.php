<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040086");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

function tambah($data){
    //ambil data dari tiap elemen dalam form
    global $conn;

    $title = htmlspecialchars($data["title"]);
    $artist = htmlspecialchars($data["artist"]);
    $album = htmlspecialchars($data["album"]);
    $gambar = htmlspecialchars($data["gambar"]);
    
    $file = htmlspecialchars($data["file"]);

    // query insert data
    $query = "INSERT INTO music (title, artist, album, gambar, file)
                VALUES
                ('$title', '$artist', '$album', '$gambar', '$file')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM music WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $artist = htmlspecialchars($data["artist"]);
    $album = htmlspecialchars($data["album"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $file = htmlspecialchars($data["file"]);

    // query insert data
    $query = "UPDATE music SET 
                    title = '$title',
                    artist = '$artist',
                    album = '$album',
                    gambar = '$gambar',
                    file = '$file'
                    WHERE id = $id
                    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM music
                WHERE
                title LIKE '%$keyword%' OR
                artist LIKE '%$keyword%' OR
                album LIKE '%$keyword%' OR
                gambar LIKE '%$keyword%'
            ";
        return query($query);
}

?>