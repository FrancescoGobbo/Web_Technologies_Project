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
			<h1>EVENTI</h1>
		</div>
	<?php
		if(!isset($_POST['elimina']))
        {
     ?>
			<div id="text">
			    <h1>Eventi Cantina</h1>
			    <form action="eliminaevento.php" method="post">
					<div>
			    <?php
			    	if(isset($_GET['cantina']))
	                    $_SESSION['cantina'] = $_GET['cantina'];

			    	$sql = "SELECT ID , Nome_evento, Data, Link, Cantina, Provincia, DescrizioneEvento
			    			FROM eventi e , cantina c
			    			WHERE e.Cantina = c.Nome AND c.Nome = '".$_SESSION['cantina']."'";

			    	$query = $db->getQuery($sql);

			    	if($query && $db->numRows($query) > 0)
			    	{
			    		
			    		while($eventi = $db->getArray($query))
			    		{
				        	echo "<input name=\"selezione[]\" tabindex=\"2\" type=\"checkbox\" value=\"".$eventi['ID']."\"/>";
				        	echo "<div class=\"event\" id=\"event\">";          
				            echo "<h4 class=\"nome\">".$eventi["Nome_evento"]."</h4>";
				            echo "<div class=\"inf1\">";
				            echo "<h5>Data:</h5><p id=\"dataevento\">".$eventi['Data']."</p>";
				            echo "</div>";
				            echo "<div class=\"inf2\">";
				            echo "<h5>Cantina:</h5><p id=\"link1\"><a href=\"modcantinaadmin.php?cantina=".$eventi['Cantina']."\">".$eventi["Cantina"]."</a></p>";
				            echo "</div>";
				            
				            if($eventi['Link'] != "")
				            {
				            	echo "<div class=\"inf3\">";
				            	echo "<h5 class=\"id3\">Per saperne di più:</h5><p id=\"link2\"><a href=".$eventi['Link'].">Link all'evento</a></p>";
				            	echo "</div>";
				          	}
				            echo "<div class=\"desc\">";
				            echo "<p id=\"desc1\">Descrizione:</p>";
				 			echo "<p id=\"sotto\">".$eventi['DescrizioneEvento']."</p>";
				            echo "</div>";
				        	echo "</div>";
				        }
                   ?>
                   </div>
                   <div>
                   <?php
				        echo "<button id=\"elimina\" value=\"elimina\" tabindex=\"3\" name=\"elimina\" type=\"submit\">Elimina</button>";
				   ?>
                   </div>
                   <?php
                     }
				     else
				     	echo "<h2>Eliminati tutti gli eventi della cantina: ".$_SESSION['cantina'];
				     ?>
				        
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
            $db->closedDBConnection();
            header('Location: '.$_SERVER['PHP_SELF']);
		}
		?>
		</div>
	<?php

	}
	else
	{
	    echo "<span class ='errore'><p>Accesso vietato , non sei un amministratore</p></span>";
	    header("refresh:3;url=index.php");
	}
	?>
	</body>
</html>