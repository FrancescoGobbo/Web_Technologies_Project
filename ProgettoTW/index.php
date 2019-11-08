<?php
     session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

    <head>
        <title>DAILY WINE - Without thoughts on glasses</title>
    <!-- meta: validazione e lettura da parte dei motori di ricerca -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Daily Wine - In qualsiasi momento una cantina vinicola vicina a te"/>
        <meta name="keywords" content="cantina, vino, daily, wine, italia, regioni, valle d'aosta, piemonte, liguria, lombardia, veneto, trentino alto-adige, fiuli-venezia-giulia, emilia-romagna, toscana, lazio, molise, umbria, puglia, basilicata, calabria, sicilia, sardegna, marche, abruzzo, campania, cantina vinicola, accedi, registrati, entra a far parte, più informazioni, gestisci la tua cantina, informazioni, gestisci, parte"/>
        <meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
    <!-- link: per risorse estrene con href o rel base: posizione di base per i collegamenti -->
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
        <img id="logo" src="IMAGE/logo.png" alt="calice di vino rosso"/>
        <h1><span xml:lang="en">DAILY WINE</span></h1>
        <h3><span xml:lang="en">Without thoughts on glasses</span></h3>
    <?php
      //controllo se è utente oppure cantina
        if(isset($_SESSION['tipo']) && $_SESSION['tipo']== 'Utente')
            echo "<h2>".$_SESSION['nome']." - <a href='PHP/logout.php' tabindex='8'>Logout</a></h2>";
        else if(isset($_SESSION['tipo']) && $_SESSION['tipo']== 'Cantina')
                echo "<h2><a href='PHP/logout.php' tabindex='8'>Logout</a></h2>";
            else
                echo " <h2><a href='accedi.php' tabindex='8'>Accedi</a> / <a href='regute.php' tabindex='9'>Registrati</a></h2>";
    ?>
    </div>
    
    <div id="menu">
        <nav class="nav">
            <ul>
                <li><a tabindex="1">Home</a></li>
                <li><a href="eventi.php" tabindex="2">Eventi</a></li>
                <li><a href="topvini.php" tabindex="3">TOP 5 Vini</a></li>
                <li><a href="topcantine.php" tabindex="4">TOP 5 Cantine</a></li>
                <li><a href="cosa.php" tabindex="5">Caratteristiche</a></li>
                <li><a href="info.php" tabindex="6">Chi Siamo</a></li>
                <li><a href="contatti.php" tabindex="7">Contatti</a></li>
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
                    Ti trovi in: Home
                </p>
            </div>
            <h6>Ricerca anche tu la Cantina vinicola più vicino a te!!</h6>
            <div class="link">
                <ul>
                    <li class="tutta" id="italia"><a href="ricerca.php?regione=Italia" tabindex="11">Tutta Italia</a></li>
                    <li id="vaosta"><a href="ricerca.php?regione=Valle d\'Aosta" tabindex="12">Valle d'Aosta</a></li>
                    <li id="npiemonte"><a href="ricerca.php?regione=Piemonte" tabindex="13">Piemonte</a></li>
                    <li id="nliguria"><a href="ricerca.php?regione=Liguria" tabindex="14">Liguria</a></li>
                    <li id="nlombardia"><a href="ricerca.php?regione=Lombardia" tabindex="15">Lombardia</a></li>
                    <li id="trento"><a href="ricerca.php?regione=Trentino Alto Adige" tabindex="16"><abbr title="Trentino Alto Adige">Trentino-Alto A.</abbr></a></li>
                    <li id="nveneto"><a href="ricerca.php?regione=veneto" tabindex="17">Veneto</a></li>
                    <li id="friuliv"><a href="ricerca.php?regione=Friuli Venezia Giulia" tabindex="18"><abbr title="Friuli Venezia Giulia">Friuli-Venezia G.</abbr></a></li>
                    <li id="ntoscana"><a href="ricerca.php?regione=Toscana" tabindex="19">Toscana</a></li>
                    <li id="nemilia"><a href="ricerca.php?regione=Emilia Romagna" tabindex="20">Emilia-Romagna</a></li>
                    <li id="cumbria"><a href="ricerca.php?regione=Umbria" tabindex="21">Umbria</a></li>
                    <li id="clazio"><a href="ricerca.php?regione=Lazio" tabindex="22">Lazio</a></li>
                    <li id="cmarche"><a href="ricerca.php?regione=Marche" tabindex="23">Marche</a></li>
                    <li id="cabruzzo"><a href="ricerca.php?regione=Abruzzo" tabindex="24">Abruzzo</a></li>
                    <li id="cmolise"><a href="ricerca.php?regione=Molise" tabindex="25">Molise</a></li>
                    <li id="scampania"><a href="ricerca.php?regione=Campania" tabindex="26">Campania</a></li>
                    <li id="spuglia"><a href="ricerca.php?regione=Puglia" tabindex="27">Puglia</a></li>
                    <li id="sbasilicata"><a href="ricerca.php?regione=Basilicata" tabindex="28">Basilicata</a></li>
                    <li id="scalabria"><a href="ricerca.php?regione=Calabria" tabindex="29">Calabria</a></li>
                    <li id="isardegna"><a href="ricerca.php?regione=Sardegna" tabindex="30">Sardegna</a></li>
                    <li id="isicilia"><a href="ricerca.php?regione=Sicilia" tabindex="31">Sicilia</a></li>
                </ul>
            </div>
            <div>
                <div id="mappa">
                    <a href="ricerca.php?regione=Valle d\'Aosta">
                        <img src="imgregioni/aosta.gif" id="aosta" class="regioneitalia" alt="Valle d'Aosta" />
                    </a>
                    <a href="ricerca.php?regione=Trentino Alto Adige">
                        <img src="imgregioni/trentino.gif" id="trentino" class="regioneitalia" alt="Trentino Alto Aldige" />
                    </a>
                    <a href="ricerca.php?regione=Friuli Venezia Giulia">
                        <img src="imgregioni/friuli.gif" id="friuli" class="regioneitalia" alt="Friuli Venezia Giulia" />
                    </a>
                    <a href="ricerca.php?regione=Sardegna">
                        <img src="imgregioni/sardegna.gif" id="sardegna" class="regioneitalia" alt="Sardegna" />
                    </a>
                    <a href="ricerca.php?regione=Sicilia">
                        <img src="imgregioni/sicilia.gif" id="sicilia" class="regioneitalia" alt="Sicilia" />
                    </a>
                    <a href="ricerca.php?regione=Calabria">
                        <img src="imgregioni/calabria.gif" id="calabria" class="regioneitalia" alt="Calabria" />
                    </a>
                    <a href="ricerca.php?regione=Veneto">
                        <img src="imgregioni/veneto.gif" id="veneto" class="regioneitalia" alt="Veneto" />
                    </a>
                    <a href="ricerca.php?regione=Lombardia">
                        <img src="imgregioni/lombardia.gif" id="lombardia" class="regioneitalia" alt="Lombardia" />
                    </a>
                    <a href="ricerca.php?regione=Basilicata">
                        <img src="imgregioni/basilicata.gif" id="basilicata" class="regioneitalia" alt="Basilicata" />
                    </a>
                    <a href="ricerca.php?regione=Campania">
                        <img src="imgregioni/campania.gif" id="campania" class="regioneitalia" alt="Campania" />
                    </a>
                    <a href="ricerca.php?regione=Puglia">
                        <img src="imgregioni/puglia.gif" id="puglia" class="regioneitalia" alt="Puglia" />
                    </a>
                    <a href="ricerca.php?regione=Lazio">
                        <img src="imgregioni/lazio.gif" id="lazio" class="regioneitalia" alt="Lazio" />
                    </a>
                    <a href="ricerca.php?regione=Molise">
                        <img src="imgregioni/molise.gif" id="molise" class="regioneitalia" alt="Molise" />
                    </a>
                    <a href="ricerca.php?regione=Abruzzo">
                        <img src="imgregioni/abruzzo.gif" id="abruzzo" class="regioneitalia" alt="Abruzzo" />
                    </a>
                    <a href="ricerca.php?regione=Marche">
                        <img src="imgregioni/marche.gif" id="marche" class="regioneitalia" alt="Marche" />
                    </a>
                    <a href="ricerca.php?regione=Umbria">
                        <img src="imgregioni/umbria.gif" id="umbria" class="regioneitalia" alt="Umbria" />
                    </a>
                    <a href="ricerca.php?regione=Toscana">
                        <img src="imgregioni/toscana.gif" id="toscana" class="regioneitalia" alt="Toscana" />
                    </a>
                    <a href="ricerca.php?regione=Emilia Romagna">
                        <img src="imgregioni/romagna.gif" id="romagna" class="regioneitalia" alt="Emilia Romagna" />
                    </a>
                    <a href="ricerca.php?regione=Piemonte">
                        <img src="imgregioni/piemonte.gif" id="piemonte" class="regioneitalia" alt="Piemonte" />
                    </a>
                    <a href="ricerca.php?regione=Liguria">
                        <img src="imgregioni/liguria.gif" id="liguria" class="regioneitalia" alt="Liguria" />
                    </a>	
                </div>
            </div>
            <div class="top">
                <h6>Scopri quali sono stati i migliori vini e le cantine che gli hanno prodotti con un semplice click!!</h6>
                <button class="tvini" type="button" onclick="location.href=' topvini.php'" tabindex="32">VINI</button>
                <button class="tcant" type="button" onclick="location.href=' topcantine.php'" tabindex="33">CANTINE</button>
            </div>
            <form action="regcant.php">
                <div class="cant">
                    <h6>Hai una cantina vinicola e vorresti entrare a far parte di <span xml:lang="en">Daily Wine?</span></h6>
                    <input type="submit" class="info" value="Sì, registrati"/>
                    <h5>Lavori già con noi? <a href="accedi.php" tabindex="33">Gestisci la tua cantina vinicola</a></h5>
                </div>
            </form>
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