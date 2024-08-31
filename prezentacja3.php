<?php
    include 'autoryzacja.php';
	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
    echo 'Połączenie udane <br>';
	
	mysqli_query($conn, 'SET NAMES utf8');

?>

<body>






</body>