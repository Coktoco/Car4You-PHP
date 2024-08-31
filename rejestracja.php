<?php
    include 'autoryzacja.php';
	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	mysqli_query($conn, 'SET NAMES utf8');

    mysqli_query($conn, "INSERT INTO klienci
        (imie, nazwisko, telefon, email, haslo) VALUES ('".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['telefon']."','".$_POST['email']."','".$_POST['haslo']."');");
            
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Car4You - Wypożyczalnia Pojazdów </title>
  <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="bootstrap-5.2.3-dist/js/bootstrap.js">
  <link rel="stylesheet" href="excp-styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="bg-img">
    <main class="vertical-center justify-content-center">
            <div class="bg-white rounded col-lg-6 col-xl-5 col-11 col-sm-8 col-md-7 shadow mb-5">
                <div>
                    <h2 class="pt-3">Rejestracja powiodła się!</h2>

                    <!-- Pixel Sort -->
                    <div 
                        class="bgc-v h1px my-3" >
                    </div>
                    <!-- Pixel Sort -->

                    <?php
                        echo "<h3>", "Witaj, " .$_POST['imie']." ".$_POST['nazwisko']."</h3>";
                    ?>

                    <!-- Pixel Sort -->
                    <div 
                        class="bgc-g h1px mt-3 mb-2" >
                    </div>
                    <!-- Pixel Sort -->

                    <div>
                        <label class=" text-muted mt-1 mb-2 " for="Register"> Wciśnij ten przycisk, aby się zalogować</label>
                    </div>
                    <a type="submit" class="btn btn-primary shadow text-white mb-3" href="login-form.html">Zaloguj się</a>

                </div>
            </div>
        </main>

        <footer class="bgc-v">
  
            <div class="margin-body">
                <div class="row text-center align-items-center justify-content-center">
                    <div class="col-lg-12 align-items-center text-center py-1 ">
                        <p class="fs-4 fw-lighter text-muted mb-0 ">©Car4You </p>
                        <div class="d-flex justify-content-center">
                            <!-- Pixel Sort -->
                            <div 
                                class="bg-dark h1px my-1 col-xl-2 col-lg-3 col-md-3 col-sm-4 col-5" >
                            </div>
                            <!-- Pixel Sort -->
                        </div>
                        <a class="fs-4 fw-lighter text-muted mb-0 text-nowrap " href="index.html">Powrót na stronę główną </a>
                    </div>
                </div>
            </div>
                
        </footer>            

</body>
