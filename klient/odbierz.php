<?php 
session_start();
$user = $_SESSION['user1'];
//echo $user;
$max_rozmiar = 1000;


$target = "/public_html/lab7/klient/"."$user";

if (is_uploaded_file($_FILES['plik']['tmp_name']))
 { if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
	else{
	echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>'; 
	move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$_FILES['plik']['name']);
		if (move_uploaded_file($_FILES["plik"]["tmp_name"], $target)) {
      			echo "<P>FILE UPLOADED TO: $target</P>";
   		} 
   	}
} else {
	echo 'Błąd przy przesyłaniu danych!';
}
?>

