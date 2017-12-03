<?php 
session_start();
$user = $_SESSION['user1'];
/*//echo $user;
$max_rozmiar = 10000;


$target = "/public_html/lab7/klient/"."$user";

if (is_uploaded_file($_FILES['plik']['tmp_name']))
 { if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
	else{
	echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>'; 
	move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['$target'].$_FILES['plik']['name']);
		if (move_uploaded_file($_FILES["plik"]["tmp_name"], $target)) {
   		} 
   	echo("<script>alert(Za chwilę nastąpi przekierowanie...)</script>");
	echo("<script>window.location = '../klient/logged.php';</script>");
   	}
} else {
	echo 'Błąd przy przesyłaniu danych!';
}*/

$max_rozmiar = 1000;
if (is_uploaded_file($_FILES['plik']['tmp_name']))
{
if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
else
{
$upload_dir = '/$user/';
echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
if (isset($_FILES['plik']['type'])) {echo 'Typ: '.$_FILES['plik']['type'].'<br/>'; }

$name = basename($_FILES['plik']['name']);	
move_uploaded_file($_FILES['plik']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."$upload_dir/$name");

echo("<script>alert(Za chwilę nastąpi przekierowanie...)</script>");
echo("<script>window.location = '../klient/logged.php';</script>");
}
}
else {echo 'Błąd przy przesyłaniu danych!';}
?>

