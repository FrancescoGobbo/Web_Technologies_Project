<?php 
    session_start();
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Cantina")
    { 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

    <head>
<title>DAILY WINE - Without thoughts on glasses</title>
    <!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - Pannello di controllo per la tua Cantina vinicola"/>
<meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, pannello di controllo, pannello cantina, cantina, pannello, home, homepage, recensioni, newevento, eventi, logout, torna al sito"/>
<meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
<!-- link: per risorse estrene con href o rel
base: posizione di base per i collegamenti -->

<!-- foglio di stile css -->
<link href="CSS/pannello.css" rel="stylesheet" type="text/css" media="handheld, screen"/>
<link href="CSS/stile_1.css" rel="stylesheet" type="text/css" media="handheld, screen and (min-width: 1367px) and (max-width:1920px), only screen and (min-device-width: 1367px) and (max-device-width: 1920px)" />
<link href="CSS/mobile.css" rel="stylesheet" type="text/css" media="handheld, screen and (max-width: 720px), only screen and (max-device-width: 720px)"/>
<link href="CSS/tablet.css" rel="stylesheet" media="handheld, screen (max-width:1024px), only screen and (min-device-width: 721px) and (max-device-width: 1024px)" />
<link href="CSS/stampa.css" rel="stylesheet" type="text/css" media="print"/> 
</head>

<body id="panCant">
<div id="textCant">
    <h2>Pannello Cantina</h2>
    <div class="rigacant1">
        <form action="recensionicant.php" class="form1">
        <div>
            <button class="recensioniCant" type="submit" name="recensioni" value="value" tabindex="1"></button> <br />
            <label id="recCant" for="Recensioni">Recensioni</label>
        </div>
        </form>
        
        <form action="eliminaeventocant.php" class="form1">
        <div>
            <button class="new" type="submit" name="evento" value="evento" tabindex="2"></button> <br />
            <label id="new" for="evento">Evento</label>
            </div>
        </form>
    </div>
    <div class="rigacant2">
        <form action="modificadaticant.php" class="form1">
        <div>
            <button class="home" type="submit" name="homepage" value="homepage" tabindex="3"></button> <br />
            <label id="home" for="HomePage">HomePage</label>
            </div>
        </form>
        
        <form action="index.php" class="form1">
        <div>
            <button class="sito" type="submit" name="torna al sito" value="torna al sito" tabindex="4" ></button> <br />
            <label id="sito" for="tornaalsito">TornaAlSito</label>
           </div>
        </form>
    </div>
    <div class="riga3">
        <form action="PHP/logout.php" class="form1">
        <div>
            <button class="logCant" type="submit" name="logout" value="logout" tabindex="5"></button> <br />
            <label id="logCant" for="Logout">Logout</label>
        </div>
        </form>
    </div>
<?php 
    }
    else
    {
        echo"<div class='errore'><p>Accesso vietato, non sei una cantina</p></div>";
        header("refresh:3;url=index.php");
    }
?>
</div>
</body>
</html>