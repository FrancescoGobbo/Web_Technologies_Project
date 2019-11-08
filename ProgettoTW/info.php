<?php
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<title>DAILY WINE - Without thoughts on glasses</title>
<!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - Chi siamo, perchè iscriversi e quali vantaggi avete"/>
<meta name="keywords" content="info chi siamo, info, chi siamo, iscrizione, vantaggi cantine, vantaggi, cantine, Daily Wine, Dayly, Wine, vini, vino, territorio, italia, accedi, registrati"/>
<meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
<!-- link: per risorse estrene con href o rel
base: posizione di base per i collegamenti -->

<!-- foglio di stile css -->
<link href="CSS/stile.css" rel="stylesheet" type="text/css" media="handheld, screen"/>
<link href="CSS/stile_1.css" rel="stylesheet" type="text/css" media="handheld, screen and (min-width: 1367px) and (max-width:1920px), only screen and (min-device-width: 1367px) and (max-device-width: 1920px)" />
<link href="CSS/mobile.css" rel="stylesheet" type="text/css" media="handheld, screen and (max-width: 720px), only screen and (max-device-width: 720px)"/>
<link href="CSS/tablet.css" rel="stylesheet" media="handheld, screen (max-width:1024px), only screen and (min-device-width: 721px) and (max-device-width: 1024px)" />
<link href="CSS/stampa.css" rel="stylesheet" type="text/css" media="print"/>  
</head>

<body>
<div class="nav-toggle">
	<div class="nav-toggle-bar"></div>
</div>
<div id="header">
    <a href="index.php" tabindex="1"><img id="logo" src="IMAGE/logo.png" alt="calice di vino rosso"/></a>
	<h1><span xml:lang="en">DAILY WINE</span></h1>
    <h3><span xml:lang="en">Without thoughts on glasses</span></h3>
    <?php
      //controllo se è utente oppure cantina
        if(isset($_SESSION['tipo']) && $_SESSION['tipo']== 'Utente')
            echo "<h2>".$_SESSION['nome']." - <a href='PHP/logout.php' tabindex='2'>Logout</a></h2>";
        else if(isset($_SESSION['tipo']) && $_SESSION['tipo']== 'Cantina')
                echo "<h2><a href='PHP/logout.php' tabindex='2'>Logout</a></h2>";
            else
                echo " <h2><a href='accedi.php' tabindex='11'>Accedi</a> / <a href='regute.php' tabindex='12'>Registrati</a></h2>";
    ?>
</div>
<div id="menu">
	<nav class="nav">
		<ul>
            <li><a href="index.php" tabindex="3">Home</a></li>
            <li><a href="eventi.php" tabindex="4">Eventi</a></li>
            <li><a href="topvini.php" tabindex="5">TOP 5 Vini</a></li>
            <li><a href="topcantine.php" tabindex="6">TOP 5 Cantine</a></li>
			<li><a href="cosa.php" tabindex="7">Caratteristiche</a></li>
            <li><a tabindex="8">Chi Siamo</a></li>
			<li><a href="contatti.php" tabindex="9">Contatti</a></li>
             <?php
                if(isset($_SESSION['tipo']) && $_SESSION['tipo']== 'Cantina')
                    echo "<li><a href='panCantina.php' tabindex='10'>Pannello</a></li>";
    ?>
		</ul>
	</nav>
    <script type="text/javascript" src="../JS/nav.js"></script>
</div>
<div id="text">
    <div id="trovo">
        <p>
            Ti trovi in: Home >> Chi Siamo
        </p>
    </div>
    <h2>Chi siamo?</h2>
    <p>
        Siamo tre studenti universitari con la passione per i vini e volevamo fare qualcosa che rendesse possibile la ricerca in modo più agevole delle cantine, perchè a volte sono nascoste o poco rintracciabili e questo succede non solo nel territorio veneto al quale apparteniamo. Lo scopo dunque è dare spazio a tutte le cantine, da quelle più piccole e meno note a quelle più grandi e già rinomate, di essere conosciute e che facciano sapere quali sono i tipi di vino che producono e vendono. Possono andare dal rosso al bianco frizzante, ancora dal bianco dolce al rosato, così che qualsiasi cittadino dell’italia in qualunque posto si trovi possa sapere con esattezza dove sia la cantina più vicina a lui che vende un determinato tipo di vino oppure anche senza ricercare un preciso vino ma una categoria, perché pensiamo sia un privilegio degustare vini di ottima qualità che il nostro Paese ci dona. 
    </p>
	<h2>Perchè iscriversi?</h2>
    <p>
        In questo caso parliamo agli utenti che visitano il sito. Iscriversi permette di poter dare delle recensioni alle cantine in cui sono stati che sono molto importanti per chi come loro svolgono un lavoro rivolto ad un vasto pubblico. Il sito è comunque visualizzabile nella sua interezza per chiunque voglia soltanto conoscere quello che facciamo e dare un'occhiata a quali possono essere gli eventi che si svolgono nelle varie cantine.
    </p>
    <h2>Vantaggi per le Cantine</h2>
    <p>
        Iscriversi al nostro sito è facile basteranno pochi passi e questo permette alle Cantine, in questo caso, di farsi notare e conoscere di più. Ad ogni iscritto mettiamo a disposizione un proprio spazio dove poter inserire nuove informazioni sulla propria scheda e in caso modificare quelle che in principio dovrete dare per una corretta iscrizione al sito, quali i contatti, un proprio sito web, una descrizione, un orario di apertura e chiusura. Si potrà inoltre pruomuovere eventi nella propria cantina e farli conoscere a chiunque visiti il sito inserendo le informazioni principali in un apposito form, il tutto verrà poi pubblicato nella nostra pagina dedicata a tutti gli eventi, questo per farsi un'idea di cosa parla l'evento. Ovviamente sarà possibile anche visualizzare le recensioni dei clienti e, qual si voglia, rispondere. Nel qual caso l’azienda non riesca a modificare la propria scheda potrà informare noi Amministratori via e-mail e darci l’autorizzazione ad apportare le modifiche specificate. 
    </p>
    <img id="vini" src="IMAGE/wine.jpg" alt="cantina con botti di vino in legno"/>
    <h3> <a href="info.php" tabindex="13"> &laquo;Torna su </a></h3>
</div>
    
<div id="fine">
	<img id="left" src="IMAGE/valid-xhtml10.png" alt="immagine validità w3c html"/>
	<img id="right" src="IMAGE/vcss-blue.gif" alt="immagine validità w3c css"/>
    <h6>DAILY WINE</h6>
    <p>Per contattarci inviate una mail a: info@<span xml:lang="en">dailywine</span>.it. </p>
    <p><span xml:lang="en">Daily Wine - All rights reserved</span></p>
</div>
</body>
</html>
