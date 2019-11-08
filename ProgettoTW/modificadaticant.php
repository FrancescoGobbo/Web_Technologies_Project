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
    <meta name="description" content="Daily Wine - Pannello Cantina, pagina personale dei dati e descrizione con possibilità di modifica"/>
    <meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, cantina, segui, italia, regione, provincia, città, telefono, indirizzo, voto, modifica dati, modifica, pannello cantina, pannello, pagina personale, home, descrizione, dati"/>
    <meta name="author" content="Pigatto Andrea, Gobbo Francesco e Scialabba Daniele"/>
    <!-- link: per risorse estrene con href o rel
    base: posizione di base per i collegamenti -->

    <!-- foglio di stile css -->
    <link href="CSS/stilecant.css" rel="stylesheet" type="text/css" media="handheld, screen"/>
    <link href="CSS/stile_1.css" rel="stylesheet" type="text/css" media="handheld, screen and (min-width: 1367px) and (max-width:1920px), only screen and (min-device-width: 1367px) and (max-device-width: 1920px)" />
    <link href="CSS/mobilecant.css" rel="stylesheet" type="text/css" media="handheld, screen and (max-width: 720px), only screen and (max-device-width: 720px)"/>
    <link href="CSS/tabletcant.css" rel="stylesheet" media="handheld, screen (max-width:1024px), only screen and (min-device-width: 721px) and (max-device-width: 1024px)" />
    <link href="CSS/stampa.css" rel="stylesheet" type="text/css" media="print"/>   
    
    <script  src="../JS/attDis.js" type="text/javascript"></script>
</head>

<body>
<div id="header">
	<noscript>ATTIVARE JAVASCRIPT</noscript>
    <a href="panCantina.php" tabindex="1"><img id="tornaindietro" src="IMAGE/tornaindietro.png" alt="torna indietro"/></a>
	<?php
		$nomeCant = $db->getNomeCantina($_SESSION['email']);
		echo"<h1>".$nomeCant."</h1>";
	?>
</div>
<div id="text">

    <h1>Pagina Cantina</h1>
    <?php 
        if(!isset($_POST['fatto']) && !isset($_POST['aggiungi']))
        {
    ?>
        <div>
            <button id="dat" class="mod" type="submit" name="modifica" value="Modifica Dati" tabindex="2" onclick="attivaDisDati()">Modifica</button>
        </div>
        <form action = "modificadaticant.php" class="dati" method="post">
        	<div>
            <h4>Dati della cantina</h4>
            <?php 

                
                $arrayVal = $db->getDatiCantina($nomeCant);
                        

                echo "<label for= \"regione\">Regione:</label>";
                echo "<input id=\"regione\" class=\"inputcant\"  type=\"text\" name=\"regione\" value=\"".$arrayVal['Regione']."\" disabled=\"disabled\" tabindex=\"3\"/><br/>";
                        
                echo "<label for=\"provincia\">Provincia: </label>";
                echo "<input id=\"provincia\" class=\"inputcant\" type=\"text\" name=\"provincia\" value=\"".$arrayVal['Provincia']."\" disabled=\"disabled\" tabindex=\"4\"/><br/>";
                            
                echo "<label for=\"citta\">Città:</label>";
                echo "<input id=\"citta\" class=\"inputcant\" type=\"text\" name=\"citta\" value=\"".$arrayVal['Citta']."\" disabled=\"disabled\" tabindex=\"5\"/><br/>";
                            
                echo "<label for=\"indirizzo\">Indirizzo:</label>";
                echo "<input id=\"indirizzo\" class=\"inputcant\" type=\"text\" name=\"indirizzo\" value=\"".$arrayVal['Indirizzo']."\" disabled=\"disabled\" tabindex=\"6\"/><br/>";
                            
               	echo "<label for=\"telefono\">Telefono:</label>";
               	echo "<input id=\"telefono\" class=\"inputcant\" type=\"text\" name=\"telefono\" value=\"".$arrayVal['Telefono']."\" disabled=\"disabled\" tabindex=\"7\"/><br/><br/><br/>";
                        
                echo  "<label class=\"labeldesc\" for=\"descrizione\">DESCRIZIONE</label><br/>";
                echo "<textarea id=\"descrizione\" name=\"descrizione\" rows=\"20\" cols=\"400\" disabled=\"disabled\" tabindex=\"8\">".$arrayVal['Descrizione']."</textarea><br/>";
                        
                echo "<button id=\"f_dat\" class=\"ok\" type=\"submit\" name=\"fatto\" value=\"Fatto\" disabled=\"disabled\" tabindex=\"9\">Fatto</button><br/>";
           ?>  	
               </div>
			</form>
			<?php
                echo "<div class=\"votazione\">";
                echo "<h4>Voto Medio</h4>";
                echo "<h5>".$arrayVal['Voto_medio']."/5</h5>";
                echo "</div>";
            ?>
    <div class="prod">
        <h4>La nostra Produzione</h4>
        <!--QUI sotto stamperemo l'elenco puntato mostrato solo dopo il click del bottone Fatto, oppure subito dopo aver aggiunto il vino. -->
        <ul>
            <?php
            			
                        $sql = "SELECT v.Nome as NomeVino, v.Tipo as TipoVino
                                FROM vino v , cantina c , selezione s 
                                WHERE s.NomeC = c.Nome AND s.NomeV = v.Nome AND c.Nome =\"".$nomeCant."\"";
                        
                        $query = $db->getQuery($sql);

                        if($query && $db->numRows($query)>0)
                            while($vini = $db->getArray($query))
                                echo "<li>".$vini['NomeVino']." - ".$vini['TipoVino']."</li>";
                        else
                                echo "<li>Non ci sono vini per questa cantina</li>";
                    ?>
        </ul>
    </div>
    <div class="vino">
        <script  src="../JS/convalidaViniERecensioni.js" type="text/javascript"></script>
	    	<form action="modificadaticant.php" class="tipovino" method="post">
            <div>
	            <h2 class="vini">Fai sapere che vini produci</h2>
	            <label for="nomevino">Nome del Vino:</label>
	            <input type="text" name="nomevino" id="nomevino" placeholder="inserisci nome vino" tabindex="10"/><br/>
                <span class="errore" id="erNome"></span><br />

	            <label for="tipovino">Tipo di Vino:</label>
	            <input type="text" name="tipovino" id="tipovino" placeholder="inserisci tipo vino" tabindex="11"/><br/>
                <span class="errore" id="erTipo"></span><br />

	            <button class="aggiungi" type="submit" name="aggiungi" value="Aggiungi" tabindex="12" onClick="return validazioneFormVini()">Aggiungi</button>
	            <!-- <button class="ok" type="submit" name="fatto" value="Fatto" tabindex="14">Fatto</button><br/> -->
            </div>
	        </form>
    </div>

    <?php
    	}
    	else if(isset($_POST['fatto']))
        {
    		$regione = addslashes(ucfirst($_POST['regione']));
            $provincia = ucfirst($_POST['provincia']);
            $citta = ucfirst($_POST['citta']);
            $indirizzo = addslashes(ucfirst($_POST['indirizzo']));
            $telefono = $_POST['telefono'];
            $descrizione = addslashes($_POST['descrizione']);
            $nomeCant = $db->getNomeCantina($_SESSION['email']);


            $sql="UPDATE cantina SET Regione = '".$regione."', Provincia ='".$provincia."', Citta ='".$citta."', Indirizzo='".$indirizzo."', Telefono='".$telefono."', Descrizione='".$descrizione."'
                        WHERE Nome = '".$nomeCant."'";
                
            $query = $db->getQuery($sql);
                
    		}
    		else /*if(isset($_POST['aggiungi'])*/
    		{

    			$nomeVino = addslashes(ucfirst($_POST['nomevino']));
    			$tipoVino = addslashes(ucfirst($_POST['tipovino']));
    		//aggiungo vino
                $sql = "SELECT * FROM vino WHERE Nome = \"".$nomeVino."\" AND Tipo = \"".$tipoVino."\"";
                $query = $db->getQuery($sql);

                if($db->numRows($query) == 1)
                {
                    $sqlSelezione = "INSERT INTO selezione (nomeC, nomeV) VALUES (\"".$nomeCant."\", \"".$nomeVino."\")";
                    $querySelezione = $db->getQuery($sqlSelezione);
                }else
                {
        			$sqlVino = "INSERT INTO vino (Nome , Tipo) VALUES (\"".$nomeVino."\",\"".$tipoVino."\")";
        			$queryVino = $db->getQuery($sqlVino);
        			if($queryVino)
        			{
        				$sqlSelezione = "INSERT INTO selezione (nomeC, nomeV) VALUES (\"".$nomeCant."\", \"".$nomeVino."\")";
        				$querySelezione = $db->getQuery($sqlSelezione);
        			}
                }
    		}
    		$db->closedDBConnection();
    		header('Location: '.$_SERVER['PHP_SELF']);
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
    }else
    {
        echo"<span class ='errore'><p>Accesso vietato , non sei una cantina</p></span>";
        header("refresh:3;url=index.php");
    }
?>

</body>
</html>