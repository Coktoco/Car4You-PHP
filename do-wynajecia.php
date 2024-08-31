<?php
	include 'autoryzacja.php';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	mysqli_query($conn, 'SET NAMES utf8');

    $pobrana = 0;

    if((isset($_GET['ID_pojazd'])) && ($_GET['ID_klient']) && ($_GET['ID_pojazd'] != $pobrana)){
		mysqli_query($conn,"INSERT INTO wypozyczaja (ID_klient, ID_pojazd) VALUES ('".$_GET['ID_klient']."','".$_GET['ID_pojazd']."')");
        $pobrana = $_GET['ID_pojazd'];
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
<nav class="bg-gradient">
    <div class=" navbar navbar-expand-lg navbar-light margin-body py-2 justify-content-sm-between justify-content-between">
        <div class="navbar-brand" >
            <img class="shadow bg-light rounded" src="Img\Logo-Projekt.png" width="100" height="50" alt="">
        </div>
        

        <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <form class="row my-2 my-lg-0">
                
                <?php
                echo '<form method="POST">';

                echo '<a class="btn btn-primary my-2 mx-lg-0 my-m-0 mr-lg-3 shadow col-sm-12 col-lg text-nowrap" href="index.html" >Wyloguj się</a>';

                echo '</form>';
                ?>
                
            </form>
        </div>
    </div>
  </nav>

    <main class="vertical-center justify-content-center flex-column">
            <div class="bg-light rounded col-lg-6 col-xl-5 col-11 col-sm-8 col-md-7 shadow mb-md-3 mb-3 py-2 mt-4">
                <h3 class="pt-1">Nasze aktualnie dostępne pojazdy</h3>
            </div>
            <div class="bg-white rounded col-lg-6 col-xl-5 col-11 col-sm-8 col-md-7 shadow mb-md-3 mb-2">
                <div class="pt-2 row pl-3 justify-content-between ">
                    <h3>Samochody</h3>
                    <?php
                        echo '<form action="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'" method="post" class="mr-3">';
                        echo '<fieldset class="d-flex align-items-center">';
                        echo '<input class="mr-2" type="text" name="model" id="model" placeholder="Wpisz model">';
                        echo '<input type="submit" class="btn btn-primary margin-top" value="Szukaj"></input>';
                        echo '</fieldset>';
                        echo '</form>';
                    ?>
                </div>
            
                    <?php

                    $zmienna = 0;

                    if(isset($_POST['model'])){
                            if(!($_POST['model'] == '')){

                            $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, samochod.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN samochod ON pojazdy.ID_pojazd = samochod.ID_pojazd WHERE samochod.model = '".$_POST['model']."';")
                            or die("Błąd w zapytaniu do tabeli");
                            }
                            else
                                $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, samochod.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN samochod ON pojazdy.ID_pojazd = samochod.ID_pojazd LEFT JOIN tir ON pojazdy.ID_pojazd = tir.ID_pojazd LEFT JOIN lodz ON pojazdy.ID_pojazd = lodz.ID_pojazd;")
                                or die("Błąd w zapytaniu do tabeli");
                        }
                        else {
                            $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, samochod.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN samochod ON pojazdy.ID_pojazd = samochod.ID_pojazd LEFT JOIN tir ON pojazdy.ID_pojazd = tir.ID_pojazd LEFT JOIN lodz ON pojazdy.ID_pojazd = lodz.ID_pojazd;")
                                or die("Błąd w zapytaniu do tabeli");
                        }
                    
                    
                        echo '<form action="logowanie.php" method="post" class="p-lg-4 p-sm-3 p-2">';
                                echo '<table class="table table-bordered w-100">';
                                while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        if((is_null($row['ID_klient'])) && (!is_null($row['model']))){
                                                echo "<td>".$row['marka']."</td>";
                                                echo "<td>".$row['model']."</td>";
                                                echo "<td>";
                                                if((isset($_GET['ID_pojazd']) && ($_GET['ID_pojazd']==$row['ID_pojazd']))){
                                                    echo '<a href="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'&ID_pojazd='.$row['ID_pojazd'].'">Potwierdź</a>';
                                                }
                                                else
                                                    echo '<a href="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'&ID_pojazd='.$row['ID_pojazd'].'">Wynajmij</a>';
                                                echo "</td>";
                                                $zmienna = 1;
                                        }
                                        echo "</tr>";
                                    }
                                    if($zmienna == 0)
                                        echo '<h4>Brak dostępnych samochodów</h4>';
                                    echo '</table>';
                        echo '</form>';

                    ?>

            </div>
                            
            <div class="bg-white rounded col-lg-6 col-xl-5 col-11 col-sm-8 col-md-7 shadow mb-md-3 mb-2">
            <div class="pt-2 row pl-3 justify-content-between ">
                    <h3>Tiry</h3>
                    <?php
                        echo '<form action="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'" method="post" class="mr-3">';
                        echo '<fieldset class="d-flex align-items-center">';
                        echo '<input class="mr-2" type="text" name="model2" id="model2" placeholder="Wpisz model">';
                        echo '<input type="submit" class="btn btn-primary margin-top" value="Szukaj"></input>';
                        echo '</fieldset>';
                        echo '</form>';
                    ?>
                </div>
            
                    <?php

                    $zmienna = 0;

                    if(isset($_POST['model2'])){
                            if(!($_POST['model2'] == '')){

                            $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, tir.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN tir ON pojazdy.ID_pojazd = tir.ID_pojazd WHERE tir.model = '".$_POST['model2']."';")
                            or die("Błąd w zapytaniu do tabeli");
                            }
                            else
                                $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, tir.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN samochod ON pojazdy.ID_pojazd = samochod.ID_pojazd LEFT JOIN tir ON pojazdy.ID_pojazd = tir.ID_pojazd LEFT JOIN lodz ON pojazdy.ID_pojazd = lodz.ID_pojazd;")
                                or die("Błąd w zapytaniu do tabeli");
                        }
                        else {
                            $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, tir.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN samochod ON pojazdy.ID_pojazd = samochod.ID_pojazd LEFT JOIN tir ON pojazdy.ID_pojazd = tir.ID_pojazd LEFT JOIN lodz ON pojazdy.ID_pojazd = lodz.ID_pojazd;")
                                or die("Błąd w zapytaniu do tabeli");
                        }
                    
                        echo '<form action="logowanie.php" method="post" class="p-lg-4 p-sm-3 p-2">';
                                echo '<table class="table table-bordered">';
                                while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        if((is_null($row['ID_klient'])) && (!is_null($row['model']))){
                                            echo "<td>".$row['marka']."</td>";
                                            echo "<td>".$row['model']."</td>";
                                            echo "<td>";
                                            if((isset($_GET['ID_pojazd']) && ($_GET['ID_pojazd']==$row['ID_pojazd'])))
                                                echo '<a href="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'&ID_pojazd='.$row['ID_pojazd'].'">Potwierdź</a>';
					                        else
						                        echo '<a href="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'&ID_pojazd='.$row['ID_pojazd'].'">Wynajmij</a>';
					                        echo "</td>";
                                            $zmienna = 1;
                                        }
                                        echo "</tr>";
                                    }
                                    if($zmienna == 0)
                                        echo '<h4>Brak dostępnych tirów</h4>';
                                    echo '</table>';
                        echo '</form>';
                    ?>

            </div>

            <div class="bg-white rounded col-lg-6 col-xl-5 col-11 col-sm-8 col-md-7 shadow mb-md-3">
            <div class="pt-2 row pl-3 justify-content-between ">
            <h3>Łodzie</h3>
                    <?php
                        echo '<form action="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'" method="post" class="mr-3">';
                        echo '<fieldset class="d-flex align-items-center">';
                        echo '<input class="mr-2" type="text" name="model3" id="model3" placeholder="Wpisz model">';
                        echo '<input type="submit" class="btn btn-primary margin-top" value="Szukaj"></input>';
                        echo '</fieldset>';
                        echo '</form>';
                    ?>
                </div>
            
                    <?php

                    $zmienna = 0;

                    if(isset($_POST['model3'])){
                            if(!($_POST['model3'] == '')){

                            $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, lodz.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN lodz ON pojazdy.ID_pojazd = lodz.ID_pojazd WHERE lodz.model = '".$_POST['model3']."';")
                            or die("Błąd w zapytaniu do tabeli");
                            }
                            else
                                $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, lodz.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN samochod ON pojazdy.ID_pojazd = samochod.ID_pojazd LEFT JOIN tir ON pojazdy.ID_pojazd = tir.ID_pojazd LEFT JOIN lodz ON pojazdy.ID_pojazd = lodz.ID_pojazd;")
                                or die("Błąd w zapytaniu do tabeli");
                        }
                        else {
                            $result = mysqli_query($conn, "SELECT pojazdy.ID_pojazd, pojazdy.marka, lodz.model, wypozyczaja.ID_klient FROM pojazdy LEFT JOIN wypozyczaja ON pojazdy.ID_pojazd = wypozyczaja.ID_pojazd LEFT JOIN samochod ON pojazdy.ID_pojazd = samochod.ID_pojazd LEFT JOIN tir ON pojazdy.ID_pojazd = tir.ID_pojazd LEFT JOIN lodz ON pojazdy.ID_pojazd = lodz.ID_pojazd;")
                                or die("Błąd w zapytaniu do tabeli");
                        }

                        echo '<form action="logowanie.php" method="post" class="p-lg-4 p-sm-3 p-2">';
                                echo '<table class="table table-bordered">';
                                while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        if((is_null($row['ID_klient'])) && (!is_null($row['model']))){
                                            echo "<td>".$row['marka']."</td>";
                                            echo "<td>".$row['model']."</td>";
                                            echo "<td>";
                                            if((isset($_GET['ID_pojazd']) && ($_GET['ID_pojazd']==$row['ID_pojazd'])))
                                                echo '<a href="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'&ID_pojazd='.$row['ID_pojazd'].'">Potwierdź</a>';
					                        else
						                        echo '<a href="do-wynajecia.php?ID_klient='.$_GET['ID_klient'].'&ID_pojazd='.$row['ID_pojazd'].'">Wynajmij</a>';
					                        echo "</td>";
                                            $zmienna = 1;
                                        }
                                        echo "</tr>";
                                    }
                                    if($zmienna == 0)
                                        echo '<h4>Brak dostępnych łodzi</h4>';
                                    echo '</table>';
                        echo '</form>';
                    ?>

            </div>
            <div class="bg-light rounded col-lg-6 col-xl-5 col-11 col-sm-8 col-md-7 shadow mb-md-5 mb-3 py-2 px-4 mt-2">
                    <?php
                        $result = mysqli_query($conn, "SELECT email, haslo FROM klienci WHERE ID_klient='".$_GET['ID_klient']."';");

                        $row = mysqli_fetch_array($result);
                        
                        echo '<form action="logowanie.php" method="post" class="row p-lg-4 p-sm-3 p-2 align-items-center">';
                            echo '<button type="submit" class="btn btn-primary shadow"  >Zakończ</button>';
                            echo '<div class="d-flex col">';
                            echo '<input type="hidden" name="email" id="email" value="'.$row['email'].'"><br>';
                            echo '<input type="hidden" name="haslo" id="haslo" value="'.$row['haslo'].'"><br>';
                            echo '</div>';
                        echo '</form>';
                        
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