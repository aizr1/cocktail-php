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
        <li><a href="suche.php">SUCHEN</a></li>
        <li><a href="register.php">ANMELDEN</a></li>
        <li><a href="login.php">LOGIN</a></li>
    </ul>
</nav>


<!-- PHP SECTION --->
<div>
    <h4>Registrieren</h4>
    <p>wanna cocktail?</p>
    <form action="register.php" method="get">
        <label>mail: <br>
            <input type="text" name="mail" size="20" maxlength="30"><br>
        </label>
        <label>username: <br>
            <input type="text" name="username" size="20" maxlength="30"><br>
        </label>
        <label>passwort: <br>
            <input type="password" name="passwort" size="20" maxlength="30"><br><br>
        </label>
        <input type="submit" value="rein da"><br>
    </form>

</div>
<footer>
    <p>
        footertxt
    </p>
    <h1><?php echo date("D, d.m.Y, H:i")." Uhr"; ?></h1>
</footer>
</body>
</html>
