<?php
    include 'autoryzacja.php';
	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
    echo 'Połączenie udane <br>';
	
	mysqli_query($conn, 'SET NAMES utf8');
	
	
	mysqli_query($conn, "INSERT INTO gracze
	(imie, nazwisko, druzyna_id, numer) VALUES ('".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['druzyna_id']."','".$_POST['numer']."');");
	
?>
	
    <table border="1">
        <tr>
            <th>Imie</th>
            <th>Nazwisko</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM gracze;")
        or die("Błąd w zapytaniu do tabeli gracze");
        while($arr = mysqli_fetch_array($result)){
            echo "<tr";
			if(($_POST['nazwisko']==$arr['nazwisko']) && ($_POST['imie']==$arr['imie'])) echo ' style="background-color:yellow"';
			echo '>';
            echo "<td>".$arr['imie']."</td>";
            echo "<td>".$arr['nazwisko']."</td>";
			echo "<td>".$arr['numer']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
