<?php
     session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<title>DAILY WINE - Without thoughts on glasses</title>
<!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - Scopri anche tu i migliori Vini del 2017"/>
<meta name="keywords" content="Daily Wine, Dayly, Wine, i migliori vini del 2017, vini, vino, cantine, top 5 vini, top, 5, vini e cantine, italia, regioni, oreno, terlano, ferrari, barolo, accedi, registrati, annata, descrizione, colore, temperatura di servizio, descrizione, "/>
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
            <li><a tabindex="5">TOP 5 Vini</a></li>
            <li><a href="topcantine.php" tabindex="6">TOP 5 Cantine</a></li>
			<li><a href="cosa.php" tabindex="7">Caratteristiche</a></li>
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
            Ti trovi in: Home >> TOP 5 Vini
        </p>
    </div>
    <h2>Top vini 2017</h2>
    <dl>
		<dt>I 5 Migliori Vini Italiani del 2017:</dt>
		<dd> 
            <img id="oreno" src="IMAGE/oreno2015.png" alt="Oreno 2015 - Tenuta Sette Ponti vino rosso"/>
            <h4>1) Oreno 2015 - Tenuta Sette Ponti - Toscana</h4>
            <p>ANNATA: 2015</p>
            <p>COLORE: rosso rubino con riflessi violacei</p>
            <p>GRADAZIONE ALCOLICA: 14,5% vol</p>
            <p>TEMPERATURA DI SERVIZIO: 18°C</p>
            <p>DESCRIZIONE:</p>
            L’Oreno, che porta il nome del torrente che attraversa la Tenuta e della località dove si trova la Fattoria, è il vino culto dell’azienda. Frutto di un blend tra la struttura del merlot e la classe del cabernet sauvignon, unite all’eleganza del sangiovese, esprime al meglio le potenzialità del territorio e la stessa idea di vino della famiglia Moretti. Di colore rubino cupo con decise sfumature violacee. Esprime al naso incredibili sensazioni di pienezza e complessità con note di piccoli frutti rossi maturi che rincorrono sensazioni di cioccolato e lampi balsamici. E' un vino avvolgente, ricchissimo di struttura ma decisamente dinamico, impreziosito dalle nuance di rovere nuovo e di interminabile lunghezza.
		</dd>
        <dd>
            <img id="terlano" src="IMAGE/terlano1.png" alt="Terlaner Rarity 1991 - Cantina Terlano vino bianco"/>
            <h4>2) Terlaner Rarity 1991 – Cantina Terlano - Alto Adige</h4>
            <p>ANNATA: 1991</p>
            <p>COLORE: giallo paglierino lucente</p>
            <p>GRADAZIONE ALCOLICA: 13,0% vol.</p>
            <p>TEMPERATURA DI SERVIZIO: 12-14°C</p>
            <p>DESCRIZIONE:</p>
            Si chiama Terlaner 1991 Rarity, la nuova “rarità” della altoatesina Cantina Terlano, grande bianco che dopo aver maturato per 12 mesi in botti grandi di rovere, è nei successivi 24 anni di affinamento sui lieviti in piccoli contenitori di acciaio che il vino a 13 gradi in una cantina profonda 13 metri, ha trovato il suo perfetto equilibrio. Nel gennaio 2016 è stato infine imbottigliato. a base di Pinot bianco (per la maggior parte), Chardonnay e una piccola aggiunta di Sauvignon.
        </dd>
        <dd>
            <img id="ferrari" src="IMAGE/ferrari1.png" alt="Giulio Ferrari bianco frizzante"/>
            <h4>3) Giulio Ferrari Riserva del Fondatore Trentodoc 2006 – Ferrari F.lli Lunelli - Trentino</h4>
            <p>ANNATA: 2006</p>
            <p>COLORE: giallo brillante con riflessi dorati</p>
            <p>GRADAZIONE ALCOLICA: 12,5% vol</p>
            <p>TEMPERATURA DI SERVIZIO: 12-14 °C</p>
            <p>DESCRIZIONE:</p>
            Ottenuto con selezionatissime uve Chardonnay raccolte a mano a metà settembre. Decennale, sui lieviti selezionati in proprie colture. Vigneti di proprietà della famiglia Lunelli alle pendici dei monti che incorniciano Trento, fino a 600 metri di quota, esposti a sud-ovest. Giallo brillante con riflessi dorati. Il perlage è finissimo e persistente. Bouquet di rara intensità e fragranza, nel quale il fruttato varietale è in perfetta armonia con i sentori di miele, abbinati a note di cioccolato bianco, spezie e agrumi. Elegante e armonico, di corpo vellutato e composito: le fragranze di miele di acacia e fieno maturo ben si accostano alle note floreali. L’impatto è nobile e di notevole persistenza.
        </dd>
        <dd>
            <img id="barolo" src="IMAGE/barolo1.png" alt="Barolo Ravera 2013 vino rosso"/>
            <h4>4) Barolo Ravera 2013 – Elvio Cogno - Piemonte</h4>
            <p>ANNATA: 2013</p>
            <p>COLORE: è rosso granato intenso, vivace, brillante, con lievi riflessi aranciati</p>
            <p>GRADAZIONE ALCOLICA: 14,5% vol</p>
            <p>TEMPERATURA DI SERVIZIO: 18-20 °C</p>
            <p>DESCRIZIONE:</p>
            Il Barolo Ravera di Elvio Cogno nasce in vigneti situati nel terroir della Ravera, nel comune di Novello. E' prodotto esclusivamente con uve Nebbiolo, raccolte a mano durante il mese di Ottobre. La fermentazione avviene in vasche di acciaio inox a temperatura controllata per 30 giorni. Successivamente il vino affina in barriques per 24 mesi, e per ulteriori 6 mesi in bottiglia. Il Ravera è caratterizzato da un colore rosso granato intenso. Al naso si apre con un elegante bouquet di rosa canina, arricchito da piacevoli note speziate di menta, caffè e liquirizia. Al palato risulta pieno, rotondo, di grande struttura e con un ottimo equilibrio. Perfetto per accompagnare carni rosse, umidi e arrosti, è ideale in abbinamento a selvaggina e formaggi stagionati.
        </dd>
		<dd> 
            <img id="brunello" src="IMAGE/brunellomontalcino.png" alt="Brunello di Montalcino Tenuta Nuova 2012 – Casanova di Neri"/>
            <h4>5) Brunello di Montalcino Tenuta Nuova 2012 – Casanova di Neri - Toscana</h4>
            <p>ANNATA: 2012</p>
            <p>COLORE: rosso rubino intenso con riflessi granati</p>
            <p>GRADAZIONE ALCOLICA: 14,5% vol</p>
            <p>TEMPERATURA DI SERVIZIO: 16-17°C</p>
            <p>DESCRIZIONE:</p>
            Nasce da vigneti con caratteristiche uniche che producono uve di sangiovese che danno un vino di grande riconoscibilità e che unisce struttura, potenza e finezza. Avvolgente e complesso nei profumi, profondo nello spessore ma che riesce ad esprimersi in saporita godibilità. Selezione manuale delle uve prima e dopo la sgrappolatura. Segue fermentazione spontanea senza l’uso di lieviti aggiunti e macerazione coadiuvata da frequenti follature. Il tutto avviene in tini troncoconici in acciaio a temperatura controllata per 23 giorni. Il Tenuta Nuova 2012 apre al naso con note balsamiche seguite da frutta rossa giovane, segue al palato con un tannino scalpitante che lascia presagire un grande potenziale di invecchiamento , ma che già adesso si lascia godere. Il finale è di grande persistenza , setoso, che cresce con il passare dei minuti.
		</dd>
    </dl>
    <h3> <a href=" topvini.php" tabindex="13"> &laquo;Torna su </a></h3>
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
