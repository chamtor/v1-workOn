<?php
session_start();
//header("Location: logowanie.php");
$dbhost="lukasz-zdunowski.com.pl"; 
$dbuser="25509958_lab7"; 
$dbname="25509958_lab7";
$dbpassword="zaq12wsx";  

$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db($polaczenie, $dbname);

$login = $_POST['login'];
$pass = $_POST['pass1'];

$sql = "SELECT * FROM uzytkownik WHERE login='$login'" ;
$rezultat = mysqli_query($polaczenie, $sql) or die(mysqli_error($polaczenie));

$ip = $_SERVER['REMOTE_ADDR'];
$date2 = date("F j, Y, g:i a",time());

$rekord = mysqli_fetch_array($rezultat);

if($rekord['login'] == $login){
	$_SESSION['zle'] = '<span style="color:red">Użytkownik o takim loginie już istnieje.</span>';
	
	header('Location: logowanie.php');

}else{
	$doBazy =  mysqli_query($polaczenie, "INSERT INTO uzytkownik (login,haslo,dataRejestracji) VALUES('$login','$pass','$date2') ") or die(mysqli_error($polaczenie));
	$doBazy2 =  mysqli_query($polaczenie, "INSERT INTO logi (login, proby) VALUES('$login', '0') ") or die(mysqli_error($polaczenie));

	$_SESSION['utworzone'] = "Konto zostało utworzone!";
	$_SESSION['utworzone2'] = "Teraz możesz się zalogować!";
	unset($_SESSION['blad']);
	unset($_SESSION['zle']);
	unset($_SESSION['userIstnieje']);
	header('Location: logowanie.php');	
}
?>																																																																																																																																																					