<html>

<head>
    <title>Ladda upp filer</title>
</head>

<body>

    <?php

    // Start the session
    session_start();

    $anvandarnamn = $_POST["användarnamn"];
    $_SESSION["användarnamn"] = $anvandarnamn;
    $losenord = $_POST["lösenord"];

    if ($anvandarnamn != NULL && $losenord != NULL) {
        echo "Välkomen $anvandarnamn till webbsidan! Din inloggning lyckades.";
        echo "<br>";
        echo " <form action='laddaupp.php' method='post'>   <input type='file' name='filAttLaddaUpp'>  <br>  <input type='submit' value='Ladda upp fil'> </form> ";
    } else {
        echo "Tyvärr, det gick inte att logga in.";
    }


    ?>

</body>

</html>