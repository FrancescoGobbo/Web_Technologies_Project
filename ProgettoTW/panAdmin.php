<?php 
    session_start();
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Amministratore")
    {
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<title>DAILY WINE - Without thoughts on glasses</title>
<!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - Pannello di controllo Amministratore"/>
<meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, pannello di controllo amministratore, amministratore, admin, pannello amministratore, pannello, recensioni, eventi, cantine, mail, logout, sito "/>
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

<body id="panAdmin">
<div id="textAdmin">
    <h2>Pannello Amministratore</h2>
    <form action="ricercaadmin.php" method="get" class="form1">
        <div class="riga1">
        	<label id="recAdmin">Recensioni</label>
            <button name="pulsante" class="recensioni" value="Recensioni" type="submit" tabindex="1"></button>
            
            <label id="eventi">Eventi</label>
            <button name="pulsante" class="eventi" value="Eventi" type="submit" tabindex="2"></button>
            
            <label id="cant">Cantine</label>
            <button name="pulsante" value="Cantine" class="cantine" type="submit" tabindex="3"></button>
             
        </div>    
    </form>
    <div class="riga2">
    	<form action="mail.php" method="get" class="form2">
            <div>
            <label id="mail">Mail</label>
            <button class="e-mail" value="Mail" type="submit" tabindex="4"></button>
            </div>
        </form>
        <form action="PHP/logout.php" class="form2">
        	<div>
        	<label id="log">Logout</label>
            <button class="logout" value="Logout" type="submit" tabindex="5"></button>
            </div>
        </form>
    </div>
</div>
<?php
    }
    else
    {
        echo "<div class ='errore'><p>Accesso vietato , non sei un amministratore</p></div>";
        header( "refresh:4;url=index.php" );
        //echo $messaggio;
    }
?>
</body>
</html>
