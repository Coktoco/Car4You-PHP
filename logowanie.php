<?php
    include 'autoryzacja.php';
	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	mysqli_query($conn, 'SET NAMES utf8');

  if((isset($_POST['imie'])) && (isset($_POST['nazwisko']))) {
    mysqli_query($conn, "UPDATE klienci SET imie='".$_POST['imie']."', nazwisko='".$_POST['nazwisko']."', telefon='".$_POST['telefon']."', email='".$_POST['email']."', haslo='".$_POST['haslo']."' WHERE ID_klient='".$_POST['ID_klient']."';");
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
    <div class=" navbar navbar-expand-lg navbar-light margin-body py-2 justify-content-sm-between justify-content-end">
        <div class="navbar-brand" >
            <img class="shadow bg-light rounded" src="Img\Logo-Projekt.png" width="100" height="50" alt="">
        </div>
        

        <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div>
            <?php

                if(isset($_POST['email'])&&($_POST['haslo'])){

                  $result = mysqli_query($conn, "SELECT imie, nazwisko FROM klienci WHERE klienci.email='".$_POST['email']."' AND klienci.haslo='".$_POST['haslo']."'");

                  if($arr = mysqli_fetch_array($result))
                  {
                      echo "<h2 class=\"text-white\">", "Witaj, " .$arr['imie']." ".$arr['nazwisko']."</h2>";
                  }
                  else {
                      header('Location:login-form-error.html');
                  }
                }
            ?>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <form class="row my-2 my-lg-0">
                
                <?php
                echo '<form>';

                  $result1 = mysqli_query($conn, "SELECT imie, nazwisko, ID_klient FROM klienci WHERE klienci.email='".$_POST['email']."' AND klienci.haslo='".$_POST['haslo']."'");

                  $row = mysqli_fetch_array($result1);

                  echo '<a class="btn my-2 mx-lg-0 my-m-0 mr-lg-3 shadow col-sm-12 col-lg text-nowrap text-white" href="do-wynajecia.php?ID_klient='.$row['ID_klient'].'" >Nasza oferta</a>';

                  echo '<a class="btn my-2 mx-lg-0 my-m-0 mr-lg-3 shadow col-sm-12 col-lg text-nowrap text-white" href="wynajem.php?ID_klient='.$row['ID_klient'].'" >Twój wynajem</a>';

                  echo '<a class="btn my-2 mx-lg-0 my-m-0 mr-lg-3 shadow col-sm-12 col-lg text-nowrap text-white" href="data-changin.php?ID_klient='.$row['ID_klient'].'" >Zmień dane</a>';

                  echo '<a class="btn btn-primary my-2 mx-lg-0 my-m-0 mr-lg-3 shadow col-sm-12 col-lg text-nowrap" href="index.html" >Wyloguj się</a>';

                echo '</form>';
                ?>
                <!-- <a class="btn my-2 mx-lg-0 my-m-0 mr-lg-3 shadow col-sm-12 col-lg text-nowrap text-white" href="data-changin.php" >Zmień dane</a> -->

            </form>
        </div>
    </div>
  </nav>

  <main class="margin-body">
    <div class="col justify-content-center">
        <div class="row bg-light mt-2 mb-1 mt-lg-3 shadow rounded justify-content-center">
          <div class="col-12">
            <h2 class="text-center py-2 display-4 ">Nasze najnowsze nabytki</h2>
          </div>
          <div id="carouselExampleIndicators" class="carousel slide justify-content-center" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner pb-3 px-2">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="Img\rubicon.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="Img\sessa-marine.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="Img\Scania-R450.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>


        <div class="row bg-light mb-1 shadow rounded justify-content-center">
          <h2 class="pt-3 px-3 px-md-0">Car4You czyli najlepsza sieć wynajmu w kraju od 1980 roku</h2>
          <div class="d-flex justify-content-center">
            <div class="margin-body pt-3 w-100">
              <div class="col justify-content-center align-items-center bg-white rounded">
                <div class="container-fluid shadow-lg">
                  <div class=" row ms-4 pt-3 "> 
                    <h2 class="fs-1 pl-4 ">Dlaczego Car4You </h2>
                  </div>
                  <!-- Pixel Sort -->
                  <div 
                    class="row bgc-g h1px justify-content-center" >
                  </div>
                  <!-- Pixel Sort -->
                    <div class="row m-lg-5 pb-5">
                      <div class="d-flex col-lg-6  align-items-center">
                      <p class="fs-4">Bo jest to najlepsza firma zajmująca sie wynajmowaniem pojazdów dla firm jak i klientów indywidualnych, posiadająca najszerszy wybór pojazdów na całym rynku.  A blanditiis libero veniam dicta provident fugit reiciendis rem odit voluptatum A pomiedzy tym wszystkim opis o tym, czym sie zajmuje etc. in adipisci error sapiente architecto tempore, consectetur ex minus quas quasi mollitia deserunt numquam vero soluta, esse debitis. Quod, accusantium soluta?</p>
                      </div>
                      <div class=" d-flex col-lg-6 justify-content-center align-items-center">
                          <div class="">
                            <div class="d-flex justify-content-end position-absolute ms-1 mt-1">
                              <button type="button" class="btn" data-toggle="modal" data-target="#ModalImg" > <img class="img-fluid pb-1" src="Img\Magnifier-dark.png" alt="" height="20px" width="20px" ></button>
                            </div>
                            <img class="img-fluid w-100"  src="Img\Giving-Keys.png" alt="JA">
                        </div>
                      </div> 
                    </div>
                    <!-- Pixel Sort -->
                    <div 
                      class="row bgc-g h1px justify-content-center" >
                    </div>
                    <!-- Pixel Sort -->
                  <div class="row m-lg-5 pb-4 pb-md-3">
                    <p class="fs-3"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row d-flex bg-light mb-1 shadow rounded justify-content-center align-items-center pt-3">
          <p class=" ">Nie zwlekaj, wynajmuj juź dziś!</p>
        </div>
        </div>
    </div>

  </main>

  <footer class="bgc-v">
  
    <div class="margin-body">
        <div class="row text-center align-items-center justify-content-center">
            <div class="col-lg-12 align-items-center text-center py-3 ">
                <p class="fs-4 fw-lighter text-muted mb-0 ">©Car4You </p>
            </div>
        </div>
    </div>
        
</footer>  


</body>