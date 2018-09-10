<?php
//strona głowna programu
session_start();

if (!isset($_SESSION['logged'])){
    header('Location: index.php');
    exit();
}

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Artykuły</title>
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link href="style/jquery.bxslider.css" rel="stylesheet" />

        <!-- Animate CSS-->
        <link href="style/animate.css" rel="stylesheet" />
        <link rel="stylesheet" href="style/custom.css">



    </head>

    <body>

        <!-- menu górne -->
        <nav class="navbar navbar-light navbar-expand-lg bg-light fixed-top" data-spy="affix" data-offset-top="0">
            <div class="container">
                <?php echo 'Witaj '. $_SESSION['login']; ?>
                <a href="logout.php">Wyloguj się</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent">
				<span class="navbar-toggler-icon"></span>
			</button>
                <div class="collapse navbar-collapse mynavbar" id="navContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="animals.php" class="nav-link">Zwierzęta<span class="sr-only">(current)</span></a>
                        </li>
                        <!--<li class="nav-item">
                        <a href="buildings.php" class="nav-link">Budynki</a>
                    </li>
                    <li class="nav-item">
                        <a href="people.php" class="nav-link">Ludzie</a>
                    </li>-->
                    </ul>

                </div>

            </div>
        </nav>


        <!-- wyswietlanie obrazków -->
        <section class="portfolio top-separator" id="portfolio">
            <div class="portfolio-header">
                <h2 class="text-center text-uppercase">Artykuły ze zwierzętami</h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="container">
                            <div class="row">
                                <?php include('db_connect.php');
                           
                             
                        $_SESSION['tablica'] = 'animals';
                        $myTable = 'animals';
					$result = $mysqli->query("SELECT * FROM animals ORDER BY id");
					while ( $article = mysqli_fetch_array($result) ) {
                        echo '<div class="col-sm-6 col-lg-4 py-3">';
                        echo '<div class="card" alt="Card image cap">';
                        echo '<img class="card-img-top rounded img-fluid portfolio-img" src="' . $article['image'] .  '"alt="zwierzęta">';
                        echo '<h4 class="text-uppercase page-label text-danger text-center">' . $article['title'] . '</h4>';

                        echo '<p class="card-text px-1">' . $article['text'] . '</p>';
                        echo '<div class="row">';

                            echo '<div class="col-12">';
                                echo '<div class="text-right">';
                                echo '<a href="update.php?id=' . $article['id'] .'"class="btn">. .<i class="fas fa-pencil-alt"></i></a>';
                                echo '<a href="delete.php?id=' . $article['id'] .'"class="btn"><i class="fas fa-trash-alt"></i></a>';
                               echo '</div>';
                            echo '</div>';

                        echo '</div>';
                    echo '</div>'; 
                echo  '</div>';
                 
                  }
                    
                  
                /* dodawanie nowego artykulu */
					include('add.php');
                            
                 ?>


                            </div>
                        </div>
                    </div>
                    <!-- formularz dodawania artykułu -->
                    <div class="col-12 col-lg-4">
                        <div class="container">
                            <div class="write-to-us-left">
                                <h2 class="text-uppercase write-to-us-header">Wstaw nowy artykuł</h2>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <label for="title" class="form-control-label">Tytuł</label>

                                    <input type="text" id="title" name="title" class="form-control" value="<?php if (isset($_SESSION['title']))
                                echo $_SESSION['title']; ?>">
                                    <label for="image" class="form-control-label">Obrazek</label>
                                    <input type="text" id="image" name="image" class="form-control" value="<?php if (isset($_SESSION['image']))
                                echo $_SESSION['image']; ?>">

                                    <label for="text" class="form-control-label">Wiadomość</label>

                                    <textarea id="text" name="text" cols="30" rows="5" class="form-control"><?php if (isset($_SESSION['text']))
                                echo $_SESSION['text']; ?></textarea>
                                    <div class="row">
                                        <input type="submit" class="btn btn-success col-6" id="add" name="add" value="Wstaw nowy artykuł">

                                        <input type="submit" class="btn btn-success col-6" id="update" name="update" value="Aktualizuj artykuł <?php if (isset($_SESSION['id'])) echo $_SESSION['id']; ?>">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Stopka -->
        <footer class="text-white site-footer top-separator" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="maps-wrapper embed-responsive embed-responsive-4by3 ">
                            <iframe class="embed-responsive-item" width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJOQH6EOn7H0cRVYySaiqYmyQ&key=AIzaSyAr62X2q2tqnPj3pusGSX207f9FHPOgzSM" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-3 footer-first-col">
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa fa-phone text-warning" aria-hidden="true"></i>602-358-647
                            </li>
                            <li>
                                <i class="fa fa-phone text-warning" aria-hidden="true"></i>85-876-49-18
                            </li>
                            <li>
                                <i class="fa fa-clock-o text-warning" aria-hidden="true"></i>Pn.-Pt. 7:00-18:00
                            </li>

                            <li>
                                <i class="fa fa-envelope text-warning" aria-hidden="true"></i>olender.jerzy@gmail.com
                            </li>

                        </ul>
                    </div>


                </div>
            </div>
        </footer>

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
