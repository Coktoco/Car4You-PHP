<?php
	include 'autoryzacja.php';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	mysqli_query($conn, 'SET NAMES utf8');

    if((isset($_POST['imie'])) && (isset($_POST['nazwisko']))) {
	    mysqli_query($conn, "UPDATE klienci SET imie='".$_POST['imie']."', nazwisko='".$_POST['nazwisko']."', telefon='".$_POST['telefon']."', email='".$_POST['email']."', haslo='".$_POST['haslo']."' WHERE ID_klient='".$_GET['ID_klient']."';");
	}
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

                <?php
                $result = mysqli_query($conn, "SELECT imie, nazwisko, email, telefon, haslo, ID_klient FROM klienci WHERE ID_klient='".$_GET['ID_klient']."';")
                or die("Błąd w zapytaniu do tabeli gracze");
                 
                echo '<form action="logowanie.php" method="post" class="p-lg-4 p-sm-3 p-2">';
                    while($row = mysqli_fetch_array($result)) {
                    echo '<div class="pb-2">';
                    echo '<h3>Zmiana Danych</h3>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="imie">Imię</label>';
                    echo '<input type="text" class="form-control" name="imie" id="imie" placeholder="Podaj Imię" required class="margin-top" value="'.$row['imie'].'">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="nazwisko">Nazwisko</label>';
                    echo '<input type="text" class="form-control" name="nazwisko" id="nazwisko" placeholder="Podaj Nazwisko" required class="margin-top" value="'.$row['nazwisko'].'">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="telefon">Numer Telefonu</label>';
                    echo '<input type="number" class="form-control" name="telefon" id="telefon" placeholder="Podaj Numer" required class="margin-top" value="'.$row['telefon'].'">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="email">Email</label>';
                    echo '<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Podaj Email" required class="margin-top" value="'.$row['email'].'" >';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="haslo">Hasło</label>';
                    echo '<input type="text" class="form-control" name="haslo" id="haslo" placeholder="Podaj Hasło" required class="margin-top" value="'.$row['haslo'].'">';
                    echo '</div>';
                    echo '<input type="hidden" class="form-control" name="ID_klient" id="ID_klient" required class="margin-top" value="'.$row['ID_klient'].'">';
                    echo '<button type="submit" class="btn btn-primary shadow">Zapisz</button>';
                    echo '';
                    echo '<!-- Pixel Sort -->';
                    echo '<div';
                    echo 'class="bgc-g h1px justify-content-center mt-3" >';
                    echo '</div>';
                    echo '<!-- Pixel Sort -->';
                    echo '';
                    echo '</form>';
                }
                ?>

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