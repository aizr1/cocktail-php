<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/norm.css" charset="utf-8">
    <title><?php echo "PHP WORKS"; ?></title>
  </head>
  <body>




  <!--  HEADER -->


  <nav id="nav">
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="all.php">ALLE DRINKS</a></li>
        <li><a href="suche.php">SUCHE</a></li>
        <li><a href="register.php"></a>LOGIN</li>
      </ul>
  </nav>


<!-- PHP SECTION --->
  <div class="phpoutput">
      
      <h4>Login</h4>
    
    
    
      
    
    
      <?php echo "Whats your number?"; ?>
      <?php echo "gibt mir nen random cocktail hier"; ?>
  </div>

<!-- TODO SECTION -->

  <div style="background-color: hotpink; padding: 5%; margin-top: 5%;">
    <h1>GIVE ME COCKTAILS</h1>
    <h4>Was muss hier alles erscheinen?</h4>

    <ul>
      <li>Zufälliger Cocktail</li>
      <li>Datum > <?php echo date("D, d.m.Y, Hi")." Uhr"; ?></li>
      <li>Login und Passwortfeld findet sich im &lt;nav&gt;-Tag.</li>
      <li>Beim Registrieren soll überprüft werden, ob ein Nutzername oder eine Mailadresse schon vorhanden ist.</li>
    </ul>

    <h4>Für nicht eingeloggte Benutzer soll sichtbar sein:</h4>
    <ul>
      <li>Anzeige aller Cocktails</li>
      <li>Anzeige einzelner Cocktails (Übersicht machen > Führt zu Einzelanzeige)</li>
      <li>Einfaches Suchfeld (String aus dem Suchfeld soll weitergegeben werden per URL an suche.php wo die eigentliche Suchanfrage stattfindet)</li>
      <li>"Trockener Alkoliker oder nicht"-Abfrage.</li>
      <li>ALK, NON-ALK, OTHER</li>
      <li>Zutaten können erklärenden Text beinhalten</li>
    </ul>

    <h4>Das hier sollten nur eingeloggte Benutzer sehen können.</h4>
      <ul>
        <li>FavoritenCocktails pro User</li>
        <li>Zutaten die der User hat / Anzeige der Cocktails die er machen kann mit diesen Zutaten</li>
        <li>Hochrechnung eines Beliebigen Cocktails auf entsprechende Portionsgrößen. (Javascript vllt einfacher? Erlaubt?)</li>
      </ul>

    </div>
    <footer>
      <p>
        Das hier ist der Footer. Hier steht z.b. das Datum...
      </p>
      <h1><?php echo date("D, d.m.Y, H:i")." Uhr"; ?></h1>
    </footer>
  </body>
</html>
