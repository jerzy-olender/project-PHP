<?php
//strona logowania
session_start();
if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)){
    header('Location: animals.php');
    exit();
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Logowanie</title>
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link href="style/jquery.bxslider.css" rel="stylesheet" />
        <!-- owl slider-->

        <!-- Animate CSS-->
        <link href="style/animate.css" rel="stylesheet" />
        <link rel="stylesheet" href="style/custom.css">



    </head>

    <body>


        <div class="container">
            <div class="col-4">

                <div class="">
                    <h2 class="text-uppercaser">Logowanie</h2>
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="login" class="form-control-label">Login</label>
                            <input type="text" id="login" name="login" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Hasło</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success" id="add" name="add" value="Zaloguj się">
                    </form>
                    <a href="register.php">Rejestracja - załóż darmowe konto</a>
                    <?php
                            if(isset($_SESSION['error'])) echo $_SESSION['error'];
                            ?>
                </div>
            </div>
        </div>





        <!-- Prawa autorskie -->
        <section class="text-center text-white bg-dark copyright">
            <div class="container">
                &copy; Copyright 2018 Jerzy Olender

            </div>
        </section>

        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script>
            localStorage.clear();
        </script>

    </body>

    </html>