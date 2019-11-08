<?php
    //connessione database
    require_once 'PHP/DB_conessione.php';
    use DBAccess;      
    $db = new DBAccess();
    $open = $db->opendDBConnection();
    session_start();
?>

<!DOCTYPE html PUBLIC "- // W3C //DTD XHTML 1.0 Strict // IT" "Http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<title>DAILY WINE - Without thoughts on glasses</title>
<!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - In qualsiasi momento scrivici una e-mail per ricevere ulteriori informazioni"/>
<meta name="keywords" content="Daily Wine, Dayly, Wine, vini, vino, contatti, contattaci, accedi, registrati, cantine, newsletter, nome, telefono, email, messaggio, oggetto "/>
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
    <a href=" index.php" tabindex="1"><img id="logo" src="IMAGE/logo.png" alt="calice di vino rosso"/></a>
	<h1><span xml:lang="en">DAILY WINE</span></h1>
    <h3><span xml:lang="en">Without thoughts on glasses</span></h3>
    <?php
      //controllo se è utente oppure cantina
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
			<li><a tabindex="9">Contatti</a></li>
             <?php
                if(isset($_SESSION['tipo']) && $_SESSION['tipo']== 'Cantina')
                    echo "<li><a href='panCantina.php' tabindex='10'>Pannello</a></li>";
    ?>
		</ul>
	</nav>
    <script type="text/javascript" src="../JS/nav.js"></script>
</div>
<div id="textconta">
    <?php
    	if(!isset($_POST['contact']))
        {
    ?>
    <div id="trovo">
        <p>
            Ti trovi in: Home >> Contatti
        </p>
    </div>
    <h6>Contattaci</h6>
        <script src="../JS/convalidaContatti.js"></script>
    <form id="contatto" method="post" action="">
            <div class="mydata">
                <label for="nome">Nome</label><br />
                <input id="nomeM" type="text" name="nome" value="" placeholder="inserisci nome" tabindex="13"/><br/>
                <span class="errore" id="erNome"></span><br />
                
                <label for="email">Email</label><br />
                <input id="emailM" type="email" name="mail" value="" placeholder="inserisci indirizzo e-mail" tabindex="14"/><br />
                <span class="errore" id="erEmail"></span><br />
                
                <label for="tel">Telefono</label><br />
                <input id="telM" type="text" name="tel" placeholder="inserisci numero telefono" tabindex="15"/><br />
                <span class="errore" id="erTel"></span><br />
                
                <label for="ogg">Oggetto</label><br />
                <input id="oggM" type="text" name="ogg" value="" placeholder="inserisci oggetto messaggio" tabindex="16"/><br />
                <span class="errore" id="erOgg"></span><br />
                
                <label for="mex">Messaggio</label><br />
                <textarea id="mexM" name="mex" rows="17" cols="400" placeholder="inserisci messaggio" tabindex="17"></textarea><br />
                <span class="errore" id="erMess"></span><br />
            </div>
        <div class="invio">
            <button class="contatti" name="contact" value="invia messaggio" type="submit" onClick="return validazioneFormContatti()" tabindex="18">Invia messaggio</button>
        </div>
    </form>
    <?php
        }
        else
        {
            if(!$open)
               die("Connessione fallita"); //popup di avviso
            else
            {
                $nome = $_POST['nome'];
                $mail = $_POST['mail'];
                $telefono = $_POST['tel'];
                $oggetto = addslashes($_POST['ogg']);
                $mex = addslashes($_POST['mex']);

                $sql = "INSERT INTO messaggio (`ID`,`Nome`,`Email`,`Telefono`,`Oggetto`,`Messaggio`) VALUES (NULL,'".$nome."','".$mail."','".$telefono."','".$oggetto."','".$mex."')";

                $query = $db->getQuery($sql);

                if($query)
                {
    ?>
                    <div id="trovo">
                        <p>
                            Ti trovi in: Home >> Contatti
                        </p>
                    </div>
    <?php
                    echo "<div class='buono'><p id='grazie'>Grazie,</p>";
                    echo "<p id='grazie'>Il suo messaggio è stato inviato con successo.</p>";
                    echo "<p id='grazie'>Sarà ricontattato al più presto.</p>";
                    echo "<h1>Buona continuazione su</h1>";
                    echo "<h1>Daily Wine!</h1></div>";
                }
            }
            $db->closedDBConnection();
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