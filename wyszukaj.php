<?php
    include 'autoryzacja.php';
	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
    echo 'Połączenie udane<br>';
	
	mysqli_query($conn, 'SET NAMES utf8');
		
?>
		
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Formularz</title>
    </head>
	
<style>
label {
    display: inline-block;
    width: 90px;
    }
form {
  width: 350px;
  padding: 7px;
  border: 1px solid #CCC;
  border-radius: 7px;
}

.centering{ 
    display: flex;
    align-items: center;
    justify-content: center;
}

.col {
    display: flex;
    flex-direction: column;
}

    /* Margins */

.margin-top{
    margin-top: 4px;
}

.margin-down{
    margin-bottom:  4px;
}
    /* COLORS */

.color {
    background:rgb(229, 230, 255);
}

    /* FONT Settings */
.font-style {
    font-family: 'Anton', sans-serif;
    font-weight: bold;
}

</style>	

<body class="centering">
		
<?php	
	
	if(isset($_POST['imie'])&&($_POST['nazwisko'])){

	$result = mysqli_query($conn, "SELECT gracze.imie, gracze.nazwisko, druzyny.nazwa FROM gracze JOIN druzyny ON gracze.druzyna_id=druzyny.druzyna_id WHERE gracze.imie='".$_POST['imie']."' AND gracze.nazwisko='".$_POST['nazwisko']."'")
	or die("Błąd w zapytaniu do tabeli gracze");
	
	while($arr = mysqli_fetch_array($result))
	{
		echo "<h3>".$arr['imie']." ".$arr['nazwisko']."=>".$arr['nazwa']."</h3>";
	}
	
	}
?>
	
	
   <form action="" method="post" class="color">
        <fieldset>
            <legend> <b>Dane Gracza !</b></legend>
            <ul>
                    <li> 
                        <legend class="margin-down font-style margin-top">Dane osobowe</legend>
                    </li>
                        <label for="username">Imię:</label>
                            <input type="text" name="imie" id="username" placeholder="Wpisz Imię">
                        <label for="lastname">Nazwisko:</label>
                            <input type="text" name="nazwisko" id="lastname" placeholder="Wpisz Nazwisko"required class="margin-top"> 
						         
                <input type="submit" class="margin-top" value="Szukaj"></input>
            </ul>
        </fieldset>
    </form> 
	
</body>

</html>