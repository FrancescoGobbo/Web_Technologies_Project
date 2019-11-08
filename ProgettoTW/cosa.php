<?php
     session_start();
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<title>DAILY WINE - Without thoughts on glasses</title>
<!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - Cosa trattiamo, lo scopo e cosa trovi sul nostro sito"/>
<meta name="keywords" content="cosa trattiamo, Daily Wine, Dayly, Wine, cosa, trattiamo, vini, vino, cantine, caratteristiche, vino bianco, vino rosso, vino rosato, vino spumante, tipologie, tipi, uva, botte, colore, accedi, registrati, italia "/>
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
    <a href="index.php" tabindex="1"><img id="logo" src="IMAGE/logo.png" alt="calice di vino rosso"/></a>
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
			<li><a tabindex="7">Caratteristiche</a></li>
            <li><a href="info.php" tabindex="8">Chi Siamo</a></li>
			<li><a href="contatti.php" tabindex="9">Contatti</a></li>
        <?php
            if(isset($_SESSION['tipo']) && $_SESSION['tipo']== 'Cantina')
                echo "<li><a href='panCantina.php' tabindex='10'>Pannello</a></li>";
        ?>
		</ul>
	</nav>
    <script type="text/javascript" src="../JS/nav.js"></script>
</div>
<div id="text">
    <div id="trovo">
        <p>
            Ti trovi in: Home >> Caratteristiche
        </p>
    </div>
    <h2>Cosa Trattiamo?</h2>
    <p>
        In questo sito vogliamo dare largo spazio a tutte le cantine situate nel nostro Paese promuovendo quello che è il loro lavoro, ovvero la produzione di vino con l'opportunità di farlo conoscere ed assaggiare a tutti.  
    </p>
    <h2>Caratteristiche</h2>
    <p>
        In Italia si producono in media sui 51 milioni di ettolitri l'anno e di questi più della metà viene destinata ad esportazione sia in Europa che in America. Il vino prodotto deriva da 770.000 aziende produttrici e solo 1.200 di esse sono anche esportatrici. 
        Con gli anni si è avuta una crescita della qualità dei vini e quindi non più una produzione di quantità, in particolare quelli italiani che videnzia la progressiva trasformazione del prodotto da commodity a prodotto ad alto valore aggiunto. tendenza dovuta anche al fatto che il vino, un tempo considerato "alimento", è poi divenuto "bene voluttuario" ed oggi è visto come prodotto di "grande fascino" servito in molti ristoranti anche rinomati.
    </p>
    <h2>Varie sono le tipologie che possiamo trovare</h2>
    <p>
        Il Vino Bianco, che viene prodotto con la tecnica della spremitura soffice dell'acino d'uva bianca. Si presenta all'aspetto di colore giallo in varie tonalità; è generalmente caratterizzato da profumi floreali e fruttati va consumato ad una temperatura di servizio compresa fra 8 °C e 14 °C; al gusto prevalgono le sensazioni di freschezza e acidità. Gli accoppiamenti ottimali sono con le pietanze a base di pesce, molluschi, verdure e carni bianche.
    </p>
    <p>
        Il Vino Rosato, che si produce utilizzando uve rosse spremute in modo soffice come per il vino bianco ed un veloce contatto con le bucce. Si presenta all'aspetto di colore rosa tenue; è generalmente caratterizzato da profumi fruttati, e va consumato ad una temperatura di servizio compresa fra 10 °C e 14 °C; al gusto prevalgono le sensazioni di leggera acidità, di aromaticità e di lieve corposità. Gli accoppiamenti ottimali sono con pietanze gustose a base di pesce, paste asciutte con sughi delicati, salumi leggeri.
    </p>
    <p>
        Il Vino Rosso, che si presenta all'aspetto di colore rosso in varie tonalità e viene prodotto dal mosto fatto macerare sulle bucce. È generalmente caratterizzato da un'ampia varietà di profumi (fiori, frutta, confettura, erbe, spezie) e da una più o meno elevata sensazione di morbidezza, corposità e tannicità; va consumato ad una temperatura di servizio compresa fra 14 °C e 20 °C. Gli accoppiamenti ottimali sono con le carni rosse, la cacciagione e i formaggi.
    </p>
    <p>
        Il Vino Spumante, che presenta una moderata effervescenza dovuta alla presenza di anidride carbonica con una sovrappressione compresa, a temperatura ambiente, maggiore di 2,5 bar. Per la produzione degli spumanti metodo classico si usano vitigni neutri. I principali sono lo Chardonnay, il Pinot nero e il Pinot bianco, oltre al Pinot Meunier (ma solo in Champagne), il Pinot grigio e il Riesling. Una elevata escursione termica tra giorno e notte, una buona esposizione luminosa, terreni ben drenati e calcarei sono condizioni ottimali per ottenere uve adatte alla spumantizzazione, con buona acidità ed ottimi profumi.
    </p>
    <img id="cosa" src="IMAGE/viniebotte.jpg" alt="calici vino, uva e botte"/>
    <h3> <a href="cosa.php" tabindex="13"> &laquo;Torna su </a></h3>
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
