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
	        <a href="panAdmin.php" tabindex="1"><img id="tornaindietro" src="IMAGE/tornaindietro.jpg" alt="torna indietro al pannello amministratore"/></a>

	    <?php
	        
	        if(isset($_GET['pulsante']))//Questo perchè quando faccio il refresh della pagina , perdo i dati di GET['pulsante'].
	            $_SESSION['pulsante'] = $_GET['pulsante'];
	        
            if($_SESSION['pulsante'] == 'Cantine')
	            echo "<h1>RICERCA CANTINA</h1>";
	        else if($_SESSION['pulsante'] == 'Recensioni')
	                   echo "<h1>RICERCA RECENSIONI</h1>";
	           else 
                   echo "<h1>RICERCA EVENTI</h1>";
	        ?>
	    </div>
        <div id="text">
	<?php
	        
	    if(!isset($_POST['ricerca']))
	    {
	?>
	    
	        <form action="ricercaadmin.php" method="post">
	            <div class="Ricerca">
	                    <div class="provincia">
	                        <label class="genere">Provincia:</label>
	                            <select name="Provincia" tabindex="2">
	                        <?php
	                                $sql = "SELECT DISTINCT Provincia
	                                        FROM cantina
	                                        ORDER BY Provincia ASC";
	                                $query = $db->getQuery($sql);
	                                
	                                if($db->numRows($query)>0)
	                                {
	                                    while($prov = $db->getArray($query))
	                                    {
	                                        echo "<option value='".$prov['Provincia']."'>".$prov['Provincia']."</option>";  
	                                    }
	                                }
	                                else
	                                    echo "<option value=\"nessuna\"s>Nessuna Provincia</option>";
	                        ?>
	                        </select>
	                    </div>
	                 <div class="lente">
	                    <button name="ricerca" class="ricercalente1" value="ricerca" type="submit" tabindex="3"></button><br />
	                </div>
	            </div>
	        </form>
	<?php
	    }
	        else
	        {
	        ?>
              <form action="ricercaadmin.php" method="post">
                  <div class="Ricerca">
	                    <div class="provincia">
	                        <label class="genere">Provincia:</label>
	                        <select name="Provincia" tabindex="2">
	                        <?php
	                                $sql = "SELECT DISTINCT Provincia
	                                        FROM cantina
	                                        ORDER BY Provincia ASC";
	                                $query = $db->getQuery($sql);
	                                
	                                if($db->numRows($query)>0)
	                                {
	                                    while($prov = $db->getArray($query))
	                                    {
	                                        echo "<option value='".$prov['Provincia']."'>".$prov['Provincia']."</option>";  
	                                    }
	                                }
	                                else
	                                    echo "<option value=\"nessuna\">Nessuna Provincia</option>";
	                        ?>
	                        </select>
	                    </div>
                         <div class="lente">
                            <button name="ricerca" class="ricercalente1" value="ricerca" type="submit" tabindex="3"></button><br />
                        </div>
                    </div>
                </form>

              
                  <?php 
                  		echo"<div class='cantina'>";
                        echo "<span>Lista delle cantine in: ".$_POST['Provincia']."</span>"; 
                      echo "<ul>";
                      if($_POST['Provincia']=="Nessuna Provincia")//NESSUNA CANTINA REGISTRATA
                          echo "Non ci sono Cantine";
                      else if($_SESSION['pulsante'] == "Cantine")//CANTINA
                      {
                          $sql = "SELECT DISTINCT Nome as NomeC FROM cantina WHERE Provincia = '".$_POST['Provincia']."'";
                          $query = $db->getQuery($sql);
                          $cont = 4;
                          if($query && $db->numRows($query)>0)
                              while($nomeC = $db->getArray($query))
                              {
                                  echo "<span class=\"nomcant\"><li><a href=\"modcantinaadmin.php?cantina=".$nomeC['NomeC']."\" tabindex=\"".$cont."\">".$nomeC['NomeC']."</a></li></span>";
                                  $cont=$cont+1;
                              }
                          else
                                  echo "<h2> Non ci sono non ci sono cantine pee questa provincia</h2>";
                      }
                      else if($_SESSION['pulsante'] == 'Recensioni')//RECENSIONI
                      {
                          $sql = "SELECT DISTINCT r.Nome_cant as NomeR FROM cantina c,recensione r WHERE c.Nome = r.Nome_cant and c.Provincia = '".$_POST['Provincia']."'";
                          $query = $db->getQuery($sql);
                          $cont = 4;
                          if($query && $db->numRows($query)>0)
                              while($nomeC = $db->getArray($query))
                              {
                                  echo "<span class=\"nomcant\"><li><a href=\"eliminarecensione.php?cantina=".$nomeC['NomeR']."\" tabindex=\"".$cont."\">".$nomeC['NomeR']."</a></li></span>";
                              }
                          else
                              echo "<h2> Non ci sono recensioni per le cantine di questa provincia</h2>";
                      }
                      else//EVENTI
                      {
                          $sql = "SELECT DISTINCT e.Cantina as NomeE FROM cantina c, eventi e WHERE e.Cantina = c.Nome and c.Provincia = '".$_POST['Provincia']."'";
                          $query = $db->getQuery($sql);
                          $cont = 4;
                          if($query && $db->numRows($query)>0)
                              while($nomeC = $db->getArray($query))
                              {
                                  echo "<span class=\"nomcant\"><li><a href=\"eliminaevento.php?cantina=".$nomeC['NomeE']."\" tabindex=\"".$cont."\">".$nomeC['NomeE']."</a></li></span>";
                              }
                          else
                              echo "<h2> Non ci sono eventi per le cantine in questa provincia</h2>";
                      }
                      $db->closedDBConnection();
                      echo "</ul>";
                      echo "</div>";
                  }
                  ?>
            <div id="push"></div>
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