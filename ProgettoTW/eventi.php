<?php

    session_start();
    
    require_once ('PHP/DB_conessione.php');
    use DBAccess;
    $db = new DBAccess();
    $open = $db->opendDBConnection();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<title>DAILY WINE - Without thoughts on glasses</title>
    <!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - Segui anche tu gli Eventi della Cantina vinicola più vicina a te"/>
<meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, eventi, cantina, segui, accedi, registrati, italia, regioni, valle d'aosta, piemonte, liguria, lombardia, veneto, trentino alto-adige, fiuli-venezia-giulia, emilia-romagna, toscana, lazio, molise, umbria, puglia, basilicata, calabria, sicilia, sardegna, marche, abruzzo, campania "/>
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
                    echo "<h2><a href='accedi.php' tabindex='11'>Accedi</a> / <a href='regute.php' tabindex='12'>Registrati</a></h2>";
        ?>
</div>
<div id="menu">
	<nav class="nav">
		<ul>
            <li><a href="index.php" tabindex="3">Home</a></li>
            <li><a tabindex="4">Eventi</a></li>
            <li><a href="topvini.php" tabindex="5">TOP 5 Vini</a></li>
            <li><a href="topcantine.php" tabindex="6">TOP 5 Cantine</a></li>
			<li><a href="cosa.php" tabindex="7">Caratteristiche</a></li>
            <li><a href="info.php" tabindex="8">Chi Siamo</a></li>
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
            Ti trovi in: Home >> Eventi
        </p>
    </div>
    <h2>Eventi!</h2>
    <?php
        if(!isset($_POST['ricerca'])) 
        {
        ?>
            <form id="evento" method="post" action="">
                <div class="Eve">
                    <div class="reg">
                        <label class="labita" for="regione">Regione:</label>
                            <select name="regioni" tabindex="13">
                                <?php
                                    $sql = "SELECT DISTINCT Regione
                                            FROM cantina
                                            ORDER BY Regione ASC";
                                            $query = $db->getQuery($sql);
                                                
                                            if($query && $db->numRows($query)>0)
                                            {
                                                while($prov = $db->getArray($query))
                                                {
                                                    echo "<option value='".$prov['Regione']."'>".$prov['Regione']."</option>";  
                                                }
                                            }
                                            else
                                                echo "<option value=\"nessuna\"s>Nessuna Regione</option>";
                                    ?>
                            </select>
                    </div>
                    <div class="prov">
                        	<label class="labita" for="provincia">Provincia:</label>
                            <input id="provincia" type="text" name="provincia" placeholder="Inserisci provincia"  tabindex="14"/>
                    </div>
                    
                    <div class="ric">
                            <button name="ricerca" class="ricerca" value="ricerca" type="submit" tabindex="15"></button><br/>
                    </div>
                </div>
            </form>
    <?php
        }
        else
        {  
        ?>
            <form id="evento" method="post" action="">
                <div class="Eve">
                    <div class="reg">
                        <label class="labita" for="regione">Regione:</label>
                            <select name="regioni" tabindex="13">
                                <?php
                                    $sql = "SELECT DISTINCT Regione
                                            FROM cantina
                                            ORDER BY Regione ASC";
                                            $query = $db->getQuery($sql);
                                                
                                            if($query && $db->numRows($query)>0)
                                            {
                                                while($prov = $db->getArray($query))
                                                {
                                                    echo "<option value='".$prov['Regione']."'>".$prov['Regione']."</option>";  
                                                }
                                            }
                                            else
                                                echo "<option value=\"nessuna\"s>Nessuna Regione</option>";
                                    ?>
                            </select>
                    </div>
                    <div class="prov">
                            <label class="labita" for="provincia">Provincia:</label>
                            <input id="provincia" type="text" name="provincia" placeholder="inserisci provincia"  tabindex="14"/>
                    </div>
                    
                    <div class="ric">
                            <button name="ricerca" class="ricerca" value="ricerca" type="submit" tabindex="15"></button><br/>
                    </div>
                </div>
            </form>
        <?php

            $regioneNuova = $_POST['regioni'];
            $provincia = ucfirst($_POST['provincia']);

            $query = $db->getRicercaEvento($regioneNuova,$provincia);
            
            if($query && $db->numRows($query)>0)
                while($ricerca = $db->getArray($query))
                {
                    echo "<div class=\"event\">";
                    echo "<h4 class=\"nome\">".$ricerca['Nome']."</h4>";
                    echo "<div class=\"inf1\">";
                    echo "<h5>Data:</h5><p id=\"dataevento\">".$ricerca['Data']."</p>";
                    echo "</div>";
                    echo "<div class=\"inf2\">";
                    echo "<h5>Cantina:</h5><p id=\"link1\"><a href=\"homecantina.php?cantina=".$db->escape($ricerca['Cantina'])."\">".$ricerca['Cantina']."</a></p>";
                    echo "</div>";
                    if($ricerca['Link']!= "")
                    {
                        echo "<div class=\"inf3\">";
                        echo "<h5 class=\"id3\">Per saperne di più:</h5><p class=\"link2\"><a href=\"".$ricerca['Link']."\">Link all'evento</a></p>";
                        echo "</div>";
                    }
                    echo "<div class=\"desc\">";
                    echo "<p class=\"desc1\"> Descrizione:</p><p>".$ricerca['DescrizioneEvento']."</p>";
                    echo "</div>";
                    echo "</div>";
                }
            else
            {
                if($provincia == "")
                    echo "<h6>Non ci sono eventi in programma nella regione: ".$regioneNuova."</h6>";
                else
                    echo "<h6>Non ci sono eventi in programma nella regione ".$regioneNuova." nella provincia di ".$provincia."</h6>";

                $db->closedDBConnection();
            }
        }
        ?>
        <h3> <a href="eventi.php" tabindex="16"> &laquo;Torna su </a></h3>
        <div id="push"></div>
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
