<?php
session_start();
 	$user=$_POST['user']; // login z formularza
	$pass=$_POST['pass']; // hasło z formularza
	$_SESSION['user1'] =  $user;
	$link = mysqli_connect('lukasz-zdunowski.com.pl', '25509958_lab7' ,'zaq12wsx', '25509958_lab7'); // połączenie z BD – wpisać swoje parametry !!!
	if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
	mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
	$ip = $_SERVER['REMOTE_ADDR'];
	$dateee = date("F j, Y, g:i a"); 
	setcookie('Nick', $user,time()+60*60);

	$blokada = mysqli_query($link, "SELECT proby FROM logi WHERE login='$user'");

	while ($row = $blokada->fetch_assoc()) {
    $liczbaProb = $row['proby']."<br>";
	}

	
		$result = mysqli_query($link, "SELECT * FROM uzytkownik WHERE login='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
		$rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
			if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
			{
			mysqli_close($link); // zamknięcie połączenia z BD
			echo "Błąd logowania - spróbuj ponowanie!"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
			}
				else{ // Jeśli $rekord (login) istnieje
					if($rekord['haslo']==$pass) // czy hasło zgadza się z BD
					{
					//echo "Logowanie Ok. User: {$rekord['user']}. Hasło: {$rekord['pass']}";
					//$updateIP = mysqli_query($link, "UPDATE uzytkownik SET adres ='$ip' WHERE login='$user' "); 

					$updateTime = mysqli_query($link, "UPDATE logi SET data ='$dateee' WHERE login='$user' ");
					$zerowanieProb = mysqli_query($link, "UPDATE logi SET proby=0 WHERE login='$user' ");
					header('Location: logged.php');
					$_SESSION['user'] = '$user';
					$_SESSION['logged'] = true;
					
					if(!is_dir($user)){
						mkdir($user, 0777);

					}


					}
				else
					{
						if($liczbaProb<4){
							$_SESSION['blad'] = '<span style="color:red">The username or password you entered is incorrect, please try again.</span>';
							
							$bladLogowania = mysqli_query($link, "UPDATE logi SET proby=proby+1 WHERE login='$user' ");
							
							unset($_SESSION['utworzenie']);
					   		unset($_SESSION['utworzenie2']);	
							header('Location: logowanie.php');
							}
						elseif($liczbaProb>=4){
								
							$_SESSION['time_of_block'] = time();
							$updateT = mysqli_query($link, "UPDATE logi SET data ='$dateee' WHERE login='$user' ");
							$updateTime1 = mysqli_query($link, "SELECT data  FROM logi  WHERE login='$user' ");
							while ($row = $updateTime1->fetch_assoc()) {
							    $updateTime2 = $row['data']."<br>";
							}
							$_SESSION['TimeNieudanaProba'] = $updateTime2;
							unset($_SESSION['blad']);
							$_SESSION['blokadaLogowania'] = 'Nieudane próby logowania - konto zostało zablokowane na minute';

							header('Location: asd.php');
							//$_SESSION['blok'] = 
						}

					}
				}	
	
?>