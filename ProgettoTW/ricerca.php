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
    <!-- Script --> 
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
                <li><a href="info.php" tabindex="8">Chi Siamo</a></li>
                <li><a href="contatti.php" tabindex="9">Contatti</a></li>
    <?php
                if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Cantina')
                    echo "<li><a href='panCantina.php' tabindex='10'>Pannello</a></li>";
    ?>
            </ul>
        </nav>
        <script type="text/javascript" src="../JS/nav.js"></script>
    </div>
    <div id="text">
        <div id="trovo">
            <p>
                Ti trovi in: Home >> Ricerca
            </p>
        </div>
        <h2>Ricerca</h2>
        <?php
        if(!isset($_POST['ricerca'])) 
        {
        ?>
            <form action="ricerca.php" method="post">
                <div class="search">
                    <div class="regione">
                        <label class="genere" for="regione">Regione:</label>
                            <select name="regioni" tabindex="13">
                            <?php
                                 $sql = "SELECT DISTINCT Regione
                                                FROM cantina
                                                ORDER BY Regione ASC";
                                        $query = $db->getQuery($sql);
                                        
                                        if($db->numRows($query)>0)
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
                    <div class="provincia">
                        <label class="genere" for="provincia">Provincia:</label>
                        <input type="text" name="provincia" placeholder="inserisci una provincia valida" tabindex="14"/>
                    </div>
                    <div class="lente">
                            <button name="ricerca" class="ricercalente" value="ricerca" type="submit" tabindex="15"></button> <br/>
                    </div>
                </div>
            </form>
             <?php
                if(isset($_GET['regione']))//Questo perchè quando faccio il refresh della pagina , perdo i dati di GET['regione'].
                    $_SESSION['regione'] = $_GET['regione'];

                        if($_SESSION['regione']!="Italia")
                        {
                            $sql = "SELECT c.Nome as Nome, c.Provincia as Provincia, c.Citta as Citta, c.Voto_medio as Voto 
                                    FROM cantina c 
                                    WHERE c.Regione = '".$_SESSION['regione']."'";
                        }
                        else
                            $sql = "SELECT c.Nome as Nome, c.Provincia as Provincia, c.Citta as Citta, c.Voto_medio as Voto 
                                    FROM cantina c ";
                    
                    $query = $db->getQuery($sql);
                    if($query && $db->numRows($query)>0)
                        while($search = $db->getArray($query))
                        {
                            echo "<div class=\"cantina\">";
                            echo "<dl>";
                            echo "<dt class=\"nomecant\"><a href=\"homecantina.php?cantina=".$db->escape($search['Nome'])."\">".$search['Nome']."</a></dt>";
                            echo "<dd class=\"localita\">Località: ".$search['Citta']." - ".$search['Provincia']."</dd>";
                            echo "<dd class=\"votomed\">Voto medio: ".$search['Voto']."/5</dd>";
                            echo "</dl>";
                            echo "</div>";
                        }
            ?>
        
    	<div id="push"></div>
        <h3> <a href="ricerca.php" tabindex="16">&laquo;Torna su </a></h3>
    <?php
        }
        else
        {
            ?>
            <form action="ricerca.php" method="post">
                <div class="search">
                    <div class="regione">
                        <label class="genere" for="regione">Regione:</label>
                            <select name="regioni" tabindex="13">
                            <?php
                                 $sql = "SELECT DISTINCT Regione
                                                FROM cantina
                                                ORDER BY Regione ASC";
                                        $query = $db->getQuery($sql);
                                        
                                        if($db->numRows($query)>0)
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
                    <div class="provincia">
                        <label class="genere" for="provincia">Provincia:</label>
                        <input type="text" name="provincia" placeholder="inserisci una provincia valida" tabindex="14"/>
                    </div>
                    <div class="lente">
                            <button name="ricerca" class="ricercalente" value="ricerca" type="submit" tabindex="15"></button> <br/>
                    </div>
                </div>
            </form>
        <?php
            $regioneNuova = $_POST['regioni'];
            $provincia = ucfirst($_POST['provincia']);

            $query = $db->getRicerca($regioneNuova,$provincia);
            if($query && $db->numRows($query)>0)
                while($ricerca = $db->getArray($query))
                {
                    echo "<div class=\"cantina\">";
                    echo "<dl>";
                    echo "<dt class=\"nomecant\"><a href=\"homecantina.php?cantina=".$db->escape($ricerca['Nome'])."\">".$ricerca['Nome']."</a></dt>";
                    echo "<dd class=\"localita\">Località: ".$ricerca['Citta']."-".$ricerca['Provincia']."</dd>";
                    echo "<dd class=\"votomed\">Voto medio: ".$ricerca['Voto']."/5</dd>";
                    echo "</dl>";
                    echo "</div>";
                }

            $db->closedDBConnection();
			?>
        
    <div id="push"></div>
    <h3> <a href="ricerca.php" tabindex="16">&laquo;Torna su </a></h3>
    <?php
        }
    ?>
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