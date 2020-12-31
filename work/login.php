<?php
    require_once "../googleoAuth/config.php";
    session_start();
    if (isset($_SESSION['login'])) {
        header("Location: index.php");
        exit;
    }
    $auth_url = $g_client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

<div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card mx-auto" style="width: 24rem;">
                    <div class="card-body m-3">
                        <h2 class="text-center">Login</h2>
                        <form action="" method="post">
                            <div class="row form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="row form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="pass" id="pass">
                            </div>
                            <div class="row">
                                <p>Belum punya akun? <a href="signup.php">Daftar</a></p>
                            </div>
                            <button type="submit" name="masuk" class="btn btn-primary btn-block">Masuk</button>
                            <!-- <button type="button" href='$auth_url' class="btn btn-danger btn-block" >Login dengan Google</button> -->
                            <a href='<?php echo $auth_url?>' class="btn btn-danger btn-block">Login Through Google </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <footer class="fixed-bottom">
      
      <p class="mt-3 text-center">Copyright &copy; 2020 <a href="https://www.linkedin.com/in/afdhal-yusra-590088113">Afdhal Yusra</a>. All rights reserved</p>
    </footer> -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
