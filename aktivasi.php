<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <title>Aktivasi</title>
</head>
<body style="font-family: quicksand;">

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h4 class="text-center">
                    <?php 
                    include 'koneksi.php';
                    $token = $_GET['t'];
                    $query = $koneksi->query("SELECT * FROM users WHERE token='$token' AND aktif='0'");
                    $cek = mysqli_num_rows($query);
                    if ($cek > 0) {
                        mysqli_query($koneksi, "UPDATE users SET aktif='1' WHERE token='$token' AND aktif='0'");
                        echo "<div class='alert alert-success'>Akun anda sudah aktif, silahkan <a href='login.php'>Login</a></div>";
                    } else {
                        echo "<div class='alert alert-danger'>Invalid Token!</div>";
                    }
                    ?>
                </h4>
            </div>
        </div>
    </div>
</body>
</html>