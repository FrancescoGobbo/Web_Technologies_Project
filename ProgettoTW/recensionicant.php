 <?php

    require_once 'PHP/DB_conessione.php';
    use DBAccess;      
    $db = new DBAccess();
    session_start();
    $open = $db->opendDBConnection();
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
    <meta name="description" content="Daily Wine - Pannello Cantina, pagina dedicata alla visualizzazione delle recensioni da parte degli utenti"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, cantina, segui, italia, recensioni, utente, voto, recensione, pannello cantina, pannello, pagina dedicata"/>
    <meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
    <!-- link: per risorse estrene con href o rel
    base: posizione di base per i collegamenti -->

    <!-- foglio di stile css -->
    <link href="CSS/stilecant.css" rel="stylesheet" type="text/css" media="handheld, screen"/>
    <link href="CSS/stile_1.css" rel="stylesheet" type="text/css" media="handheld, screen and (min-width: 1367px) and (max-width:1920px), only screen and (min-device-width: 1367px) and (max-device-width: 1920px)" />
    <link href="CSS/mobilecant.css" rel="stylesheet" type="text/css" media="handheld, screen and (max-width: 720px), only screen and (max-device-width: 720px)"/>
    <link href="CSS/tabletcant.css" rel="stylesheet" media="handheld, screen (max-width:1024px), only screen and (min-device-width: 721px) and (max-device-width: 1024px)" />
    <link href="CSS/stampa.css" rel="stylesheet" type="text/css" media="print"/>  
    </head>

    <body>
    <div id="header">
        <a href="panCantina.php" tabindex="1"><img id="tornaindietro" src="IMAGE/tornaindietro.png" alt="calice di vino rosso"/></a>
    	<h1>RECENSIONI</h1>
    </div>
    <div id="text">
        <h1>Recensioni Cantina</h1>
    <?php

            $nomeCant = $db->getNomeCantina($_SESSION['email']);
            $sql = "SELECT Voto, r.Descrizione as descr, Val_generale, u.Nome as Utente
                    FROM utente u,cantina c,recensione r 
                    WHERE c.Nome = r.Nome_cant AND u.Mail = r.Nome_ute AND r.Nome_cant = '".$nomeCant."'";
            
            $query = $db->getQuery($sql);
            if($query && $db->numRows($query)>0)
                    while($rec = $db->getArray($query))
                    {
                        echo "<div class=\"rec\" id=\"rec\">";
                        echo "<h4 class=\"nome\">".$rec['Val_generale']."</h4>";
                        echo "<div class=\"inf4\">";
                        echo "<h5>Utente:</h5><p id=\"idut\">".$rec['Utente']."</p>";
                        echo "</div>";
                        echo "<div class=\"inf5\">";
                        echo "<h5>Voto:</h5><p id=\"vot\">".$rec['Voto']."/5</p>";
                        echo "</div>";
                        echo "<div class=\"descrec\">";
                        echo "<h5 id=\"rech5\">Recensione:</h5>";
                        echo "<p id=\"recensione\">".$rec['descr']."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
            else 
                echo "<h2>Non ci sono recensioni</h2>";

            $db->closedDBConnection();
    ?>
    </div>
    <div id="fine">
    	<img id="left" src="IMAGE/valid-xhtml10.png" alt="immagine validità w3c html"/>
    	<img id="right" src="IMAGE/vcss-blue.gif" alt="immagine validità w3c css"/>
        <h6>DAILY WINE</h6>
        <p>Per contattarci inviate una mail a: info@<span xml:lang="en">dailywine</span>.it. </p>
        <p><span xml:lang="en">Daily Wine - All rights reserved</span></p>
    </div>
<?
    }
    else
    {
        echo"<div class='errore'><p>Accesso vietato, non sei una cantina</p></div>";
        header("refresh:3;url=index.php");
    }
?>
</body>
</html>