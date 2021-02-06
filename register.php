<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Register</title>
</head>
<body style="font-family: quicksand;">

    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header">
                        Registrasi Data
                    </div>

                    <?php
                    include 'koneksi.php';

                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $nama_lengkap = $_POST['nama_lengkap'];
                        $email = $_POST['email'];
                        $telepon = $_POST['telepon'];

                        $token = hash('sha256', md5(date('Y-m-d')));

                        $query_cek = $koneksi->query("SELECT * FROM users WHERE email='$email'");
                        $result = mysqli_num_rows($query_cek);
                        if ($result > 0) {
                            echo "<div class='alert alert-warning'>E-Mail sudah terdaftar!</div>";
                        } else {
                            $insert = $koneksi->query("INSERT INTO users (username, password, nama, email, handphone, token, aktif) VALUES ('$username', '$password', '$nama_lengkap', '$email', '$telepon', '$token', '0')");
                            include 'mail.php';

                            if ($insert) {
                                echo "<div class='alert alert-success'>Registrasi Anda berhasil, silahkan cek E-Mail Anda untuk aktifasi! <a href=www.gmail.com><b>Klik disini!<b></a></div>";
                            }
                        }
                    }
                    ?>

                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">E-Mail</label>
                                <input type="email" name="email" placeholder="Masukkan E-Mail" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="number" name="telepon" placeholder="Masukkan Telepon" class="form-control">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>