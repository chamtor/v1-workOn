<?php
session_start();
/*if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
}else{
  header('Location: logged.php');
  exit();
}*/
?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
    <meta http-equiv="refresh" content="1000" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Zdunowski</title>

</head>
<body>
<ul>
<li><a href="http://www.lukasz-zdunowski.com.pl">Home</a></li>
  <li><a href="http://www.lukasz-zdunowski.com.pl/lab7/klient/logowanie.php">Log In / Register</a></li>
  <li style="float:right"><a href="http://www.lukasz-zdunowski.com.pl/lab7/klient/logout.php">Log out</a></li>
</ul>

<?php 

if(isset($_SESSION['user1'])){
  echo "<p>Welcome: "." ".$_SESSION['user1']."!";
}
?>
<br><br>

<?php
if(isset($_SESSION['TimeNieudanaProba'])){
echo "Ostatnia nieudana próba logowanie nastąpiła:"." ".$_SESSION['TimeNieudanaProba'];
//echo $_SESSION['TimeNieudanaProba'];
} 
?> 
<br><br>


<p><a href="http://www.lukasz-zdunowski.com.pl/public_html/lab7/klient/qwe">Twoje pliki.</a></p>


<?php
$user = $_SESSION['user1'];

$dir = $user.'/';

if ($handle = opendir($dir)) {
    while (false !== ($entry = readdir($handle))) {
          if ($entry != "." && $entry != "..") {
            echo "<a href='download.php?file=".$entry."'>".$entry."</a>\n";
        }
      //echo "<a href='download.php?file=".$entry."'>".$entry."</a>\n";    
    }
    closedir($handle);
}
?>
<form method="post" action="nowy_folder.php">
      <input type="text" name="nazwa_folderu" size="10" maxlength="10" required>
      <input type="submit" value="Stórz nowy folder!">
 </form>
<br><br>

<?php
foreach (glob($user.'/'."*.*") as $filename) {
    echo "$filename size" . filesize($filename) . "\n";
}
?>


<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data"> 
  <input type="file" name="plik"/> 
  <input type="submit" value="Wyślij plik"/> 
</form>
<br><br>

<form action=odbierz.php method="POST" enctype="multipart/form-data" id="yourregularuploadformId">

<script type="text/javascript">

 
  function drag_drop(event) { location.href = 'odbierz.php'; 
}
/*function drag_drop(event){
    event.prevenDefault();
    alert(event.dataTransfer.files[0]);
  }*/

</script>
<div id="drop_zone" ondrop="drag_drop(event)" ondragover="return false">Drop Here</div>
 <input type="file" name="plik" multiple="multiple">
   <input type="submit" value="Wyślij plik"/> 

</form>
<br>
</table>
</body>
</html>