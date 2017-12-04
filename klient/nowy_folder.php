<?php
session_start();
$user = $_SESSION['user1'];
$folder = $_POST['nazwa_folderu'];

if (!file_exists('/public_html/lab7/klient/'.$user.'/'.$folder)) {
    mkdir('/public_html/lab7/klient/'.$user.'/'.$folder, 0777, true);
    chdir($user);
    mkdir($folder, 0777);
    //echo "<b>Folder o nazwie: <i>$folder</i> został utworzony!</b>";
    echo("<script>alert(<b>Folder o nazwie: <i>$folder</i> został utworzony!</b>)</script>");
  	echo("<script>alert(Za chwilę nastąpi przekierowanie...)</script>");
    // echo "Za chwilę nastąpi przekierowanie...";
  	sleep(2);
	echo("<script>window.location = '../klient/logged.php';</script>");
    //sleep(5);
	//header('Location: ../logowanie.php');
}else{
	//echo "Folder o takiej nazwie już istnieje.";
	//header('Location: ../logged.php');
	echo("<script>alert('Folder o takiej nazwie już istnieje.')</script>");
	//sleep(5);
 	echo("<script>window.location = '../klient/logged.php';</script>");
}
?>