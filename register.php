<?php
//ustawienia i strona rejestracji
session_start();
include "db_connect.php";
$errorLogin='';
$errorPassword1='';
$errorPassword2='';
$errorTerms='';
$login='';
$password1='';
$password2='';
$terms='';

if(isset($_POST['register'])){
    $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $sql = "SELECT * FROM users WHERE login='$login'";
    $result = $mysqli->query($sql);
    
    
    if(isset($_POST['terms'])){
    $terms = $_POST['terms'];}
    
    if(! $login){
        $errorLogin='Uzupełnij pole login';
    } elseif($login && strlen($login)<3){
        $errorLogin='Login musi zawierać minimum 3 znaki';
    }elseif($login &&($result->num_rows)>0){
        $errorLogin='Już jest konto z takim loginem';
    }
    
    if(! $password1){
        $errorPassword1='Uzupełnij pole hasło';
       
    } elseif($password1 && strlen($password1)<4){
        $errorPassword1='hasło musi zawierać minimum 4 znaki';
    }
    if(! $password2){
        $errorPassword2='Uzupełnij pole powtórz hasło';
    } elseif($password1 && $password2 && ($password1 != $password2)){
        $errorPassword1='Pola hasło i powtórz hasło muszą być takie same';
    }
 
   
    if($terms !='on'){
        $errorTerms='Zaakceptuj regulamin';
    }
    
    $passwordHash = password_hash($password1,PASSWORD_DEFAULT);
    if(($errorLogin=='')&&($errorPassword1=='')&&($errorPassword2=='')&&(isset($_POST['terms']))){
        if($mysqli->query("INSERT INTO users VALUES (NULL, '$login','$passwordHash')")){
            $_SESSION['registerOK'] = true;
            header('Location: register_ok.php');
        }
    }
    $result->close();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Zakładanie konta</title>
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

            
                <h2 class="text-uppercaser">Rejestracja</h2>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="login" class="form-control-label">Login</label>
                        <?php 
                        if($errorLogin != null){
                            echo '<p style="color:red;">'. $errorLogin . '</p>';
                            
                        }
                        ?>
                        <input type="text" id="login" name="login" class="form-control" value="<?php echo $login; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password1" class="form-control-label">Hasło</label>
                         <?php 
                        if($errorPassword1 != null){
                            echo '<p style="color:red;">'. $errorPassword1 . '</p>';
                            
                        }
                        ?>
                        <input type="password" id="password1" name="password1" class="form-control" value="<?php echo $password1; ?>">
                        <label for="password2" class="form-control-label">Powtórz Hasło</label>
                         <?php 
                        if($errorPassword2 != null){
                            echo '<p style="color:red;">'. $errorPassword2 . '</p>';
                            
                        }
                        ?>
                        <input type="password" id="password2" name="password2" class="form-control" value="<?php echo $password2; ?>">
                         <?php 
                        if($errorTerms != null){
                            echo '<p style="color:red;">'. $errorTerms . '</p>';
                            
                        }
                        ?>
                        <input type="checkbox" class="form-check-input" id="terms" name="terms" <?php echo (isset($_POST['terms'])? 'checked="checked"':'' ) ?> >
                        <label class="form-check-label" for="terms">Akceptuję regulamin</label>
                    </div>
                    <input type="submit" class="btn btn-success" id="register" name="register" value="Załóż konto">
                </form>

                
            </div>
        </div>
   






    <!-- Prawa autorskie -->
    <section class="text-center text-white bg-dark copyright">
        <div class="container">
            &copy; Copyright 2018 Jerzy Olender

        </div>
    </section>

   
</body>

</html>
