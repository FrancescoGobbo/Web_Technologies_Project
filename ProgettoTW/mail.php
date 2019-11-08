<?php
    session_start();
    require_once 'PHP/DB_conessione.php';
    use DBAccess;   
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Amministratore")
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
    <meta name="description" content="Daily Wine - Segui anche tu gli Eventi della Cantina vinicola più vicina a te"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, eventi, cantina, segui, accedi, registrati, italia, regioni, valle d'aosta, piemonte, liguria, lombardia, veneto, trentino alto-adige, fiuli-venezia-giulia, emilia-romagna, toscana, lazio, molise, umbria, puglia, basilicata, calabria, sicilia, sardegna, marche, abruzzo, campania "/>
    <meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
    <!-- link: per risorse estrene con href o rel
    base: posizione di base per i collegamenti -->

    <!-- foglio di stile css -->
    <link href="CSS/adminmodifica.css" rel="stylesheet" type="text/css" media="handheld, screen"/>
    <link href="CSS/stile_1.css" rel="stylesheet" type="text/css" media="handheld, screen and (min-width: 1367px) and (max-width:1920px), only screen and (min-device-width: 1367px) and (max-device-width: 1920px)" />
    <link href="CSS/mobileamm.css" rel="stylesheet" type="text/css" media="handheld, screen and (max-width: 720px), only screen and (max-device-width: 720px)"/>
    <link href="CSS/tabletamm.css" rel="stylesheet" media="handheld, screen (max-width:1024px), only screen and (min-device-width: 721px) and (max-device-width: 1024px)" />
    <link href="CSS/stampa.css" rel="stylesheet" type="text/css" media="print"/>  
    </head>

    <body>
        <div id="header">
            <a href="panAdmin.php" tabindex="1"><img id="tornaindietro" src="IMAGE/tornaindietro.jpg" alt="torna indietro"/></a>
        	<h1>MESSAGGI</h1>
        </div>


            <div id="text">
            <form action="mail.php" method="post">
                <?php
                    if(!isset($_POST['elimina']))
                    {
                        $sql = "SELECT * FROM messaggio ORDER BY ID ASC";
                        $query = $db->getQuery($sql);

                        if($db->numRows($query) == 0)
                            echo "<h2> Non ci sono messaggi</h2>";
                        else
                        {
                            while($mail = $db->getArray($query))
                            {
                                echo "<div class='messaggio'>";
                                    echo "<input id='seleziona' name='selezione[]' type='checkbox' value='".$mail['ID']."' tabindex='2'/>";
                                    echo "<dl>";
                                        echo "<dt>Nome: </dt>";
                                        echo "<dd>".$mail['Nome']."</dd>";
                                        echo "<dt>E-mail:</dt>";
                                        echo "<dd>".$mail['Email']."</dd>";
                                        echo "<dt>Telefono: </dt>";
                                        echo "<dd>".$mail['Telefono']."</dd>";
                                        echo "<dt>".$mail['Oggetto']."</dt>";
                                        echo "<dd  id='txt'>".$mail['Messaggio']."</dd>";
                                    echo "</dl>";
                                echo "</div>";
                            }
                            echo"<div>";
                            echo"<button value='Elimina' name='elimina' id='elimina' type='submit' accesskey='e' tabindex='3'>Elimina</button>";
                            echo"</div>";
                        }
                    }else
                    {
                        
                        foreach ($_POST['selezione'] as $key => $id)
                        {
                            $sqlEliminare = "DELETE FROM messaggio WHERE ID ='".$id."'";
                            $query = $db->getQuery($sqlEliminare);
                        }
                        //Chiusura connessione col database.
                        $db->closedDBConnection();
                        header('Location: '.$_SERVER['PHP_SELF']);
                        
                    }
                ?>
            
                </form>
            </div>
    <?php
        }
        else
        {
            echo "<span class ='errore'><p>Accesso vietato , non sei un amministratore</p></span>";
            header("refresh:4;url=index.php");
        }
    ?>

    </body>
</html>