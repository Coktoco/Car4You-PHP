<?php
	include 'autoryzacja.php';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	mysqli_query($conn, 'SET NAMES utf8');

	if(isset($_GET['usun']))
		mysqli_query($conn,"DELETE FROM wypozyczaja WHERE ID_pojazd='".$_GET['usun']."';");
	
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Usuwanie</title>
			<meta charset="utf-8">
		</head>
		<body>
			<?php
				$result = mysqli_query($conn, "SELECT Wypozyczaja.ID_klient, Klienci.imie, Klienci.nazwisko, '=' AS WYPOŻYCZA, Pojazdy.marka, Samochod.model, Tir.model, Lodz.model, Wypozyczaja.ID_pojazd FROM Wypozyczaja
				LEFT JOIN Klienci ON Wypozyczaja.ID_klient = Klienci.ID_klient
				LEFT JOIN Pojazdy ON Wypozyczaja.ID_pojazd = Pojazdy.ID_pojazd
				LEFT JOIN Samochod ON Wypozyczaja.ID_pojazd = Samochod.ID_pojazd
				LEFT JOIN Tir ON Wypozyczaja.ID_pojazd = Tir.ID_pojazd
				LEFT JOIN Lodz ON Wypozyczaja.ID_pojazd = Lodz.ID_pojazd");
				
				echo '<table border=1>';
				while($row = mysqli_fetch_array($result)) {
					echo "<tr";
					if((isset($_GET['gracz_id'])) && ($_GET['gracz_id']==$row['gracz_id'])) echo ' style="background-color:yellow"';
					echo ">";
					echo "<td>".$row['imie']."</td>";
					echo "<td>".$row['nazwisko']."</td>";
					echo "<td>".$row['marka']."</td>";
					echo "<td>".$row['model']."</td>";
					echo "<td>";
					if((isset($_GET['ID_pojazd'])))
						echo '<a href="prezentacja-usun.php?usun='.$row['ID_pojazd'].'">potwierdź</a>';
					else
						echo '<a href="prezentacja-usun.php?ID_pojazd='.$row['ID_pojazd'].'">usuń</a>';
					echo "</td>";
					echo "</tr>";
				}
				echo '</table>';
			?>
		
			
		</body>
	</html>