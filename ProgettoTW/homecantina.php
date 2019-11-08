<?php
    require_once 'PHP/DB_conessione.php';
    use DBAccess; 
    $db = new DBAccess();
    $open = $db->opendDBConnection();
    session_start();
    if(isset($_GET['cantina']))
                    $_SESSION['cantina'] = stripslashes($_GET['cantina']);
    if(isset($_SESSION['cantina']))
    {
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmls="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

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
    
    <script type="text/javascript" src="../JS/convalidaViniERecensioni.js"></script>
</head>

<body>
    <div id="header">
        <a href="index.php"tabindex="1"><img id="tornaindietro" src="IMAGE/tornaindietro.png" alt="torna indietro"/></a>
        <?php

                echo "<h1>".$_SESSION['cantina']."</h1>";
        ?>
    </div>
<?php
    if(!isset($_POST['conferma']))
    {
    ?>
<div id="text">
    <h1>Pagina Cantina</h1>
    <div class="dati">
        <h4>Dati della cantina</h4>
    <?php 
        
        $arrayVal = $db->getDatiCantina($_SESSION['cantina']);

        echo "<h6>Regione:</h6>";
        echo "<p id=\"datcant\">".$arrayVal['Regione']."</p>";
        echo "<h6>Provincia:</h6>";
        echo "<p id=\"datcant\">".$arrayVal['Provincia']."</p>";
        echo "<h6>Città:</h6>";
        echo "<p id=\"datcant\">".$arrayVal['Citta']."</p>";
        echo "<h6>Indirizzo:</h6>";
        echo "<p id=\"datcant\">".$arrayVal['Indirizzo']."</p>";
        echo "<h6>Telefono:</h6>";
        echo "<p id=\"datcant\">".$arrayVal['Telefono']."</p>";
      ?>
      </div>
      <?php
        echo "<div class=\"votazione\">";
        echo "<h4>Voto Medio</h4>";
        echo "<h5>".$arrayVal['Voto_medio']."/5</h5>";
        echo "</div>";
        echo "<div>";
        echo "<h4 id=\"desc\">Descrizione</h4>";
        echo "<p id=\"descrizione\">".$arrayVal['Descrizione']."</p>";
        echo "</div>";
    ?>
    <!-- Verrà inserito l'elenco puntato soltanto se nel data base c'è qualcosa -->
    <div class="prodhome">
        <h4>La nostra Produzione</h4>
        <!--QUI sotto stamperemo l'elenco puntato mostrato solo dopo il click del bottone Fatto, oppure subito dopo aver aggiunto il vino. -->
        <ul>
            <?php
                $sql = "SELECT v.Nome as NomeVino, v.Tipo as TipoVino
                        FROM vino v , cantina c , selezione s 
                        WHERE s.NomeC = c.Nome AND s.NomeV = v.Nome AND c.Nome =\"".$_SESSION['cantina']."\"";
                        $query = $db->getQuery($sql);

                        if($query && $db->numRows($query)>0)
                        while($vini = $db->getArray($query))
                                echo "<li>".$vini['NomeVino']."-".$vini['TipoVino']."</li>";
                        else
                                echo "<li>Non ci sono vini per questa cantina</li>";
            ?>
        </ul>
    </div>
    
    
    <div class="RECUT">
        <h4>Recensioni</h4>
    </div>
        <?php
            $query = $db->getRecensioni($_SESSION['cantina']);

                if($query && $db->numRows($query) > 0)
                {
                    while($rece = $db->getArray($query))
                    {
                    	echo "<div class=\"rec2\" id=\"rec2\">";
                        echo "<h4 class=\"nome\">".$rece['Val_generale']."</h4>";
                        echo "<div class=\"inf4\">";
                        echo "<h5>Utente:</h5><p id=\"idut\"> ".$rece['Utente']."</p>";
                        echo "</div>";
                        echo "<div class=\"inf5\">";
                        echo "<h5>Voto:</h5><p id=\"vot\"> ".$rece['Voto']."/5</p>";
                        echo "</div>";
                        echo "<div class=\"desc2\">";
                        echo "<h5 id=\"rech5\">Recensione:</h5>";
                        echo "<p id=\"recensione\"> ".$rece['descr']."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
        ?>

    <?php 
        if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'Utente')
        {
            
    ?>
        <div class="rec2" id="rec2">
                <h4 class="nome">Inserisci una Recensione</h4>
                <form action="homecantina.php" class="NewRec" method="post"> 
                <!-- parte dell'utente non loggato -->
                <div>
                    <label for="valutazione">Valutazione generale:</label>
                    <input id="valutazione" type="text" placeholder="Inserisci valutazione" name="valutazione" tabindex="1"><br />
                    <span class="errore" id="erEmail"></span><br />
                    
                    <label for="voto">Voto:</label>
                    <select id="voto" type="text" name="voto" placeholder="voto da 1 a 5" tabindex="2">
                        <option value="0">0</option>
                        <option value="0.5">0.5</option>
                        <option value="1">1</option>
                        <option value="1.5">1.5</option>
                        <option value="2">2</option>
                        <option value="2.5">2.5</option>
                        <option value="3">3</option>
                        <option value="3.5">3.5</option>
                        <option value="4">4</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5</option>
                    </select><br>
                    
                    <label for="recensione">Recensione:</label>
                    <textarea name="recensione" id="recensionecantina" rows="8" cols="400" placeholder="inserisci la tua recensione" tabindex="3"></textarea><br/>
                    <span class="errore" id="erEmail"></span><br />
                    
                    <button class="conferma" name="conferma" value="Conferma" type="submit" tabindex="4" onClick="return function validazioneFormRecensioni()">CONFERMA</button>
                    
                    <button class="annulla" name="annulla" value="Annulla" type="reset" tabindex="5">ANNULLA</button>
                </div>
            </form>
        </div>
    <?php
        }
    } else
            {
                $voto = $_POST['voto'];
                $valGen = $_POST['valutazione'];
                $recen = $_POST['recensione'];


                $sql = "INSERT INTO  recensione(`IDR`, `Voto`, `Descrizione`, `Nome_ute`, `Nome_cant`, `Val_generale`) VALUES (NULL,'".$voto."','".$recen."','".$_SESSION['email']."','".$_SESSION['cantina']."','".$valGen."')";

                $query = $db->getQuery($sql);
                if($query)
                {
                    $sql = "SELECT SUM(Voto)/COUNT(Voto) as VotoMedio FROM `recensione` WHERE Nome_cant = '".$_SESSION['cantina']."'";
                    $query = $db->getQuery($sql);
                    $voto = $db->getArray($query);

                    $aggiornamento = "UPDATE cantina SET `Voto_medio` = '".round(floor($voto['VotoMedio']), 1)."' WHERE Nome = '".$_SESSION['cantina']."'";
                        $query = $db->getQuery($aggiornamento);
                    if(!$query)
                         echo "Non va la seconda query: ".$db->getErrore();
                }
                else
                    echo "Non va la prima query: ".$db->getErrore();

                
                $db->closedDBConnection();
                header('Location: '.$_SERVER['PHP_SELF']); 

            }
    ?>
</div>

<div id="fine">
    <img id="left" src="IMAGE/valid-xhtml10.png" alt="immagine validità w3c html">
    <img id="right" src="IMAGE/vcss-blue.gif" alt="immagine validità w3c css">
    <h7>DAILY WINE</h7>
    <p>Per contattarci inviate una mail a: info@<span xml:lang="en">dailywine</span>.it. </p>
    <p><span xml:lang="en">Daily Wine - All rights reserved</span></p>
</div>
<?php
    }
    else
    {
        header('Location: index.php'); 
    }
    ?>
</body>
</html>