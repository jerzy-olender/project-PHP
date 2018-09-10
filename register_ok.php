<?php
//strona powitalna po dodaniu nowego użytkownika
session_start();
if (!isset($_SESSION['registerOK'])){
    header('Location: index.php');
    exit();
}
else{
    unset($_SESSION['registerOK']);
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Rejestracja OK</title>
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link href="style/jquery.bxslider.css" rel="stylesheet" />
        <!-- owl slider-->

        <!-- Animate CSS-->
        <link href="style/animate.css" rel="stylesheet" />
        <link rel="stylesheet" href="style/custom.css">



    </head>

    <body>


        <div class="container">
            <div class="col-12">

                <div class="">
                    <h2 class="text-uppercaser">Nowy użytkownik został zarejestrowany</h2>

                    <a href="index.php">Logowanie - można już zalogować się na swoje konto</a>

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
