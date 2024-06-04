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
    
    $gambar = uploadGambar();
    if(!$gambar){
        return false;
    }
    
    $musik = uploadMusik();
    if(!$musik){
        return false;
    }

    // query insert data
    $query = "INSERT INTO music (title, artist, album, gambar, file)
                VALUES
                ('$title', '$artist', '$album', '$gambar', '$musik')
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    //cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar'] ['error'] === 4){
        $gambar = $gambarLama;
    }else {
        $gambar = uploadGambar();
    }
    
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

function uploadGambar() {
    $namaFile = $_FILES ['gambar']['name'];
    $ukuranFile = $_FILES ['gambar']['size'];
    $error = $_FILES ['gambar']['error'];
    $tmpName = $_FILES ['gambar']['tmp_name'];

//cek apakah tidak ada gambar yang diupload
if ($error === 4 ) {
    echo "<script>
            alert ('Pilih gambar terlebih dahulu!');
            </script>";
            return false;
}

// Cek apakah yang diupload adalah gambar
$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));

if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
            alert('Yang anda upload bukan gambar!');
        </script>";
    return false;
}

// Cek jika ukurannya terlalu besar
if( $ukuranFile > 1000000) {
    echo "<script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
    return false;
}

// Generate nama gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;

// Lolos pengecekan, gambar siap diupload
move_uploaded_file($tmpName, "../img/" . $namaFileBaru);

return $namaFileBaru;
}


function uploadMusik() {
    $namaFile = $_FILES['musik']['name'];
    $ukuranFile = $_FILES['musik']['size'];
    $error = $_FILES['musik']['error'];
    $tmpName = $_FILES['musik']['tmp_name'];

//cek apakah tidak ada musik yang diupload
if ($error === 4 ) {
    echo "<script>
            alert ('Pilih musik terlebih dahulu!');
            </script>";
            return false;
}

// Cek apakah yang diupload adalah musik
$ekstensiMusikValid = ['mp3', 'mpeg', 'wav'];
$ekstensiMusik = explode('.', $namaFile);
$ekstensiMusik = strtolower(end($ekstensiMusik ));

if(!in_array($ekstensiMusik, $ekstensiMusikValid)) {
    echo "<script>
            alert('Yang anda upload bukan !');
        </script>";
    return false;
}

// Cek jika ukurannya terlalu besar
if( $ukuranFile > 100000000) {
    echo "<script>
            alert('Ukuran file terlalu besar!');
        </script>";
    return false;
}

// Generate nama file baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiMusik;

// Lolos pengecekan, musik siap diupload
move_uploaded_file($tmpName, "../audio/" . $namaFileBaru);

return $namaFileBaru;
}

?>