<?php
	include 'autoryzacja.php';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	mysqli_query($conn, 'SET NAMES utf8');
	
	// if((isset($_POST['imie'])) && (isset($_POST['nazwisko']))) {
	// 	mysqli_query($conn, "UPDATE gracze SET imie='".$_POST['imie']."', nazwisko='".$_POST['nazwisko']."', numer='".$_POST['numer']."' WHERE gracz_id='".$_POST['gracz_id']."';");
	// }

?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Zmiana</title>
			<meta charset="utf-8">
		</head>
		<body>
			<?php
				$result = mysqli_query($conn, "SELECT imie, nazwisko, email, telefon, haslo, ID_klient FROM klienci;")
				or die("Błąd w zapytaniu do tabeli gracze");
				
				echo '<table border=1>';
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>".$row['imie']."</td>";
					echo "<td>".$row['nazwisko']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['telefon']."</td>";
					echo "<td>".$row['haslo']."</td>";
					echo '<td><a href="zmien.php?ID_klient='.$row['ID_klient'].'">zmień</a></td>';
					echo "</tr>";
				}
				echo '</table>';
			?>
		
			
		</body>
	</html>