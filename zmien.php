<?php
	include 'autoryzacja.php';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	mysqli_query($conn, 'SET NAMES utf8');
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Michał Rybicki</title>
			<meta charset="utf-8">
		</head>
		<body>
			<?php
				$result = mysqli_query($conn, "SELECT imie, nazwisko, email, telefon, haslo, ID_klient FROM klienci WHERE ID_klient='".$_GET['ID_klient']."';")
				or die("Błąd w zapytaniu do tabeli gracze");
				
				echo '<form action="prezentacja-zmien.php" method="POST">';
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo '<input type="text" name="imie" value="'.$row['imie'].'"><br>';
					echo '<input type="text" name="nazwisko" value="'.$row['nazwisko'].'"><br>';
					echo '<input type="text" name="numer" value="'.$row['telefon'].'"><br>';
					echo '<input type="text" name="numer" value="'.$row['haslo'].'"><br>';
					echo '<input type="hidden" name="gracz_id" value="'.$row['ID_klient'].'"><br>';
					
					echo '<input type="submit" value="Zmień"><br>';
				}
				echo '</form>';
			?>
		</body>
	</html>