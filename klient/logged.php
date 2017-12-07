<?php
session_start();
if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
}else{
  header('Location: logged.php');
  exit();
}
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
Twoje pliki:
<br>
<?php
$userr = $_SESSION['user1'];
chdir($userr);

foreach(glob("*.*") as $entry){
    //echo basename($entry)."<br>";
    if ($entry != "." && $entry != "..") {
        echo "<a href='./$user/$entry' download>".$entry."</a><br>";
      }
}
?>
<br>
Twoje Foldery:
<br>




</div>



<?php

$userr = $_SESSION['user1'];
//chdir($userr);

foreach(glob("*") as $entry){
    //echo basename($entry)."<br>";
    if ($entry != "." && $entry != "..") {
        echo "<a href='./$user/$entry'>".$entry."</a><br>";
      }
}
$dir = $user.'/';

$bareName = pathinfo($dir, PATHINFO_FILENAME);
echo $bareName;



?>

<br>
<form method="POST" action="nowy_folder.php">
      <input type="text" name="nazwa_folderu" size="10" maxlength="10" required>
      <input type="submit" value="Stórz nowy folder!">
 </form>
<br><br>


Wybierz folder lub przenieś go w miejsce poniżej.
<br>
<br>
<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data"> 
  <!--<input  type="file" name="plik"/><br><br>-->
  <input type="file" name="plik"/><br><br>
  <input type="submit" value="Wyślij plik"/> 
</form>
<br><br>


</body>
</html>
<!--
<form action=odbierz.php method="POST" enctype="multipart/form-data" id="yourregularuploadformId">
<script type="text/javascript">

 
  function drag_drop(event) { location.href = 'odbierz.php'; 
}
</script>
<div id="drop_zone" ondrop="drag_drop(event)" ondragover="return false">Drop Here</div>
 <input type="file" name="plik" multiple="multiple">
   <input type="submit" value="Wyślij plik"/> 
</form>


<form>
  <script type="text/javascript">
   
    fs.readFile('asd/', (err, data) => {
  if (err) throw err;
     console.log(data);
  });
*/
  </script>
</form>
-->

<?php
/*$user = $_SESSION['user1'];
$dir = $user.'/';
$handle = opendir($dir);
    while ($entry = readdir($handle)) {
          if ($entry != "." && $entry != "..") {
        // if(file_exists($entry)){
            //echo "<a href='download.php?file=".$entry."'>".$entry."</a>\n";
            echo "<a href='./$user/$entry' download>".$entry."</a><br>";
          //  echo $entry;
            echo '<br>';
    // }if($entry = "*.*"){
     // echo 'folder'.$entry;
     }
  }
    closedir($handle);*/


  //  foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $f) {
   // echo "$f \r\n".'<br>';   
//}


/*
if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            echo "$entry\n";
        }
    }
    closedir($handle);
}
echo '<br>';
$files = scandir($dir);
$files = array_diff(scandir($dir), array('.', '..'));
echo $files;
*/

/*$userr = $_SESSION['user1'];

$dirr = "..";

// Define a function to output files in a directory
function outputFiles($dirr){
    // Check directory exists or not
    if(file_exists($dirr) && is_dir($dirr)){
        // Search the files in this directory
        $files = glob($dirr ."/*");
        if(count($files) > 0){
            // Loop through retuned array
            foreach($files as $file){
                if(is_file("$file")){
                    // Display only filename
                    echo basename($file) . "<br>";
                } else if(is_dir("$file")){
                    // Recursively call the function if directories found
                    outputFiles("$file");
                }
            }
        } else{
            echo "ERROR: No such file found in the directory.";
        }
    } else {
        echo "ERROR: The directory does not exist.";
    }
}
// Call the function
//outputFiles("mydir");
}*/
?>
