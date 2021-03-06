<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Login</title>
</head>
<body style="font-family: quicksand;">

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center"><b>LOGIN</b></h4>
                        <hr>
                        <?php
                        session_start();
                        if (!empty($_SESSION['login'])) {
                            header('Location:index.php');
                        }

                        include 'koneksi.php';
                        if (isset($_POST['submit'])) {
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            $query = $koneksi->query("SELECT * FROM users WHERE email='$email' AND password='$password' AND aktif='1'");
                            $row = mysqli_fetch_array($query);
                            $cek = mysqli_num_rows($query);

                            if ($cek > 0) {
                                $_SESSION['login'] = $row['username'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['nama'] = $row['nama'];
                                header('Location:index.php');
                            } else {
                                echo "<div class='alert alert-danger'>Username dan Password dalah</div>";
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">E-Mail</label>
                                <input type="email" name="email" placeholder="Masukkan E-Mail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4 mb-4">Login</button>
                            <div class="text-center">Tidak punya akun ? <a href="register.php">Register</a></div>
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