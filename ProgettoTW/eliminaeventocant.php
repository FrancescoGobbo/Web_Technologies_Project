<?php
    session_start();
    require_once 'PHP/DB_conessione.php';
    use DBAccess;
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Cantina")
    {   
        $db = new DBAccess();
        $open = $db->opendDBConnection();
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

    <head>
        <title>DAILY WINE - Without thoughts on glasses</title>
    <!-- meta: validazione e lettura da parte dei motori di ricerca -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Daily Wine - Scheda generale della Cantina con i dati, descrizione e possibilità di inserire una recensione"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, cantina, segui, italia, regione, provincia, città, indirizzo, telefono, voto, recensione, descrizione, pagina dedicata, informazioni"/>
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
        <a href="panCantina.php" tabindex="1"><img id="tornaindietro" src="IMAGE/tornaindietro.png" alt="torna indietro"/></a>
    	<h1>EVENTI</h1>
    </div>
    <div id="text">
        <h1>Eventi Cantina</h1>
        <h3 id="newevento"><a href="newevento.php" tabindex="2">>> CREA NUOVO EVENTO</a></h3>
        
        <?php
            if(!isset($_POST['elimina']))
            {
         ?>
            <form action="eliminaeventocant.php" method="post">
                <div>
                <?php
                    
                    $nomeCant = $db->getNomeCantina($_SESSION['email']);

                    $sql = "SELECT ID , Nome_evento, Data, Link, Cantina, Provincia, DescrizioneEvento
                            FROM eventi e , cantina c
                            WHERE e.Cantina = c.Nome AND c.Nome = '".$nomeCant."'";

                    $query = $db->getQuery($sql);

                    if($query && $db->numRows($query) > 0)
                    {
                        while($eventi = $db->getArray($query))
                        {
                            echo "<input class=\"checkevento\" name=\"selezione[]\" type=\"checkbox\" tabindex=\"3\" value=\"".$eventi['ID']."\"/>";
                            echo "<div class=\"event\">";            
                            echo "<h4 class=\"nome\">".$eventi["Nome_evento"]."</h4>";
                            echo "<div class=\"inf1\">";
                            echo "<h5>Data:</h5>";
                            echo "<p class=\"inputeve\">".$eventi['Data']."</p>";
                            echo "</div>";
                            echo "<div class=\"inf2\">";
                            echo "<h5>Cantina:</h5>";
                            echo "<p class=\"link1\">".$eventi["Cantina"]."</p>";
                            echo "</div>";
                            if($eventi['link'] != "")
                            {
                                echo "<div class=\"inf3\">";
                                echo "<h5 class=\"id3\">Per saperne di più:</h5>";
                                echo "<p class=\"link1\"><a href=\"".$eventi['Link']."\">Link all'evento</a></p>";
                                echo "</div>";
                            }
                            echo "<div class=\"desc\">";
                            echo "<p class=\"desc1\">Descrizione:</p>";
                            echo "<p class=\"area\">".$eventi['DescrizioneEvento']."</p>";
                            echo "</div>";
                            echo "</div>";
                		?>
                        </div>
                        <div>
                        <?php
                        }
                        echo "<button class=\"elimina\" value=\"elimina\" tabindex=\"4\" name=\"elimina\" type=\"submit\">Elimina</button>";
                        ?>
                   		</div>
                        <div>
                   <?php
                    }
                    else
                            echo "<h2>Cancellato tutti gli eventi</h2>";
                ?>
                </div>
            </form>
        <?php
            }
            else
            {
              foreach ($_POST['selezione'] as $key => $id)
                {
                    $sqlEliminare = "DELETE FROM eventi WHERE ID ='".$id."'";
                    $query = $db->getQuery($sqlEliminare);
                }
                echo $db->getErrore();
                $db->closedDBConnection();
                header('Location: '.$_SERVER['PHP_SELF']);
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
<?php
    }
    else
    {
        echo "<span class ='errore'><p>Accesso vietato , non sei una cantina</p></span>";
        header("refresh:3;url=index.php");
    }
?>
</body>
</html>