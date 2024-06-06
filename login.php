<?php 
session_start();
require './functions/functions.php';

if(isset($_POST["login"])) {
  login($_POST);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN | Haii!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: aqua;
        }

        .container {
            animation: fadeOut 300ms ease-in-out;
        }

        @keyframes fadeOut {
            from {opacity : 0;}
            to {opacity: 1;}
        }
    </style>
  </head>
  <body>
    <section>
        <div class="container mt-5 pt-5">
        <div class="col-12 col-sm-8 col-md-6 m-auto">
        <h2><marquee behavior="alternate" scrollamount="" direction="right" class="bg bg-light rounded fw-bold" >SIGN - IN | LOGIN</marquee></h2>
        <div class="card border-0 shadow">
            <div class="card-body">
              <form action="" method="POST">
                <input type="text" name="username" id="username" class="form-control my-3 py2" placeholder="Username" required>
                <input type="password" name="password" id="password" class="form-control my-3 py2" placeholder="Password" required>
                <div class="text-center mt-3">
                <a href="registrasi.php" class="nav-link m-4">Belum Punya Akun?</a>
                <button class="btn btn-light fw-bold" name="login" id="login" type="submit">LOGIN</button>
                </div>
              </form>
              </div>
        </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>