<?php
session_start();
if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
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
</ul>

<h1> Logowanie</h1>
 
<form method="POST" action="zaloguj.php">

  Login: <br/> <input type="text" name="user" value ="<?php if (isset($_COOKIE['Nick'])){
        echo $_COOKIE['Nick'];                          //sprawdzanie czy nick został wpisany
        } ?>" required ><br>
  Hasło: <br/> <input type="Password" name="pass" required> <br/>
  <input type="submit" value="Login"/> <br><br>

</form>
<?php
  if(isset($_SESSION['blad'])) {
    unset($_SESSION['zle']);
    echo $_SESSION['blad'];
  }
?>

  <br>
  <h1> Rejestracja</h1><br>
<form method="POST" action="register.php">

  Login:<br/> <input type="text" name="login" required> <br/>
  Hasło: <br/> <input type="password" id='pass1' name="pass1" required name=up> <br/>
  Powtórz hasło: <br/> <input type="password" id='pass2' required="pass1"> <br/> 
   <!--Login:<input type="password" placeholder="Password" id="password" required>
  Hasło:<input type="password" placeholder="Confirm Password" id="confirm_password" required>
  -->
  
  <input type="submit" value="Register"/><br>
</form>


<?php
  if(isset($_SESSION['zle'])){
     echo $_SESSION['zle'];
     unset($_SESSION['blad']);
     unset($_SESSION['zle']);
     unset($_SESSION['userIstnieje']);
  } 
  if(isset($_SESSION['utworzone'])){
     unset($_SESSION['blad']);
     unset($_SESSION['zle']);
     unset($_SESSION['userIstnieje']);
     echo $_SESSION['utworzone']."<br>";
     echo $_SESSION['utworzone2'];
  }
  if(isset($_SESSION['istnieje'])){
    unset($_SESSION['zle']);
    unset($_SESSION['blad']);
    unset($_SESSION['utworzenie']);
    unset($_SESSION['utworzenie2']);
    echo $_SESSION['istnieje']."<br>";
  }
/*  if(isset($_SESSION['blad'])){
    unset($_SESSION['istnieje']);
    unset($_SESSION['utworzenie']);
    unset($_SESSION['utworzenie2']);
    echo $_SESSION['blad'];
    //session_unset();
  }*/
  if(isset($_SESSION['userIstnieje'])){
  echo $_SESSION['userIstnieje'];
  }
?>
<br>

<script>
        function validate(){

            var a = document.getElementById("pass1").value;
            var b = document.getElementById("pass2").value;
            if (a!=b) {
               alert("Hasła nie są takie same.");
               return false;
            }
        }
     </script>
</body>
</html>