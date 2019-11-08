<?php
    require_once 'PHP/DB_conessione.php';
    use DBAccess;      
    $db = new DBAccess();
    $open = $db->opendDBConnection();
    
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
    <meta name="description" content="Daily Wine - Pannello Cantina, pagina dedicata alla visualizzazione delle recensioni da parte degli utenti"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, cantina, segui, italia, recensioni, utente, voto, recensione, pannello cantina, pannello, pagina dedicata"/>
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
    	<h1>RECENSIONI</h1>
    </div>
    <?php
        if(!isset($_POST['elimina']))
        {
     ?>
            <div id="text">
                <h1>Recensioni Cantina</h1>
                <form action="eliminarecensione.php" method="post">
                <div>
        <?php
                if(isset($_GET['cantina']))
                        $_SESSION['cantina'] = $_GET['cantina'];
                    
                    $query = $db->getRecensioni($_SESSION['cantina']);

                    if($query && $db->numRows($query) > 0)
                    {
                        while($rece = $db->getArray($query))
                        {
                            echo "<input name=\"selezione[]\" type=\"checkbox\" tabindex=\"2\" value=\"".$rece['IDR']."\"/>";
                            echo "<div class=\"rec\" id=\"rec\">";
                                echo "<h4 class=\"nome\">".$rece['Val_generale']."</h4>";
                                echo "<div class=\"inf1\">";
                                    echo "<h5>Utente:</h5><p id=\"idut\">".$rece['Utente']."</p>";
                                echo "</div>";
                                echo "<div class=\"inf2\">";
                                    echo "<h5>Voto:</h5><p id=\"vot\">".$rece['Voto']."/5</p>";
                                echo "</div>";
                                echo "<div class=\"desc2\">";
                                    echo "<p id=\"desc1\">Recensione:</p>";
                                    echo "<p id=\"sotto\">".$rece['descr']."</p>";
                                echo "</div>";
                            echo "</div>";
                        }
                         ?>
                   </div>
                   <div>
                   <?php
                        echo "<button id=\"elimina\" value=\"elimina\" name=\"elimina\" type=\"submit\">Elimina</button>";
                    ?>
                   </div>
                   <?php
                    }
                    else
                        echo "<h2>Eliminati tutte le recensioni della cantina: ".$_SESSION['cantina']."</h2>";
        ?>
                </form>
        <?php
        }
        else
        {
            foreach ($_POST['selezione'] as $key => $id)
            {
                $sqlEliminare = "DELETE FROM recensione WHERE IDR ='".$id."'";
                $query = $db->getQuery($sqlEliminare);
            }
            $sql = "SELECT SUM(Voto)/COUNT(Voto) as VotoMedio FROM `recensione` WHERE Nome_cant = '".$_SESSION['cantina']."'";
            $query = $db->getQuery($sql);
            $voto = $db->getArray($query);

            $aggiornamento = "UPDATE cantina SET `Voto_medio` = '".round(floor($voto['VotoMedio']), 1)."' WHERE Nome = '".$_SESSION['cantina']."'";
            $query = $db->getQuery($aggiornamento);
            
            $db->closedDBConnection();

            header('Location: '.$_SERVER['PHP_SELF']);
        }
        ?>

    </div>
<?php
    }else
    {
        echo"<span class ='errore'><p>Accesso vietato , non sei un amministratore</p></span>";
        header("refresh:3;url=index.php");
    }
?>
    </body>
</html>