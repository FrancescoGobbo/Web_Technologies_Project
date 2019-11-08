<?php
     session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<title>DAILY WINE - Without thoughts on glasses</title>
<!-- meta: validazione e lettura da parte dei motori di ricerca -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Daily Wine - Scopri anche tu le migliori Cantine vinicole del 2017"/>
<meta name="keywords" content="Daily Wine, Dayly, Wine, migliori cantine vinicole, cantine vinicole, migliori, 2017, scopri, top 5 cantine, top, cantine, regioni, italia, vino, vini, 5, vini e cantine, accedi, registrati"/>
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
        if($_SESSION['tipo']== 'Utente')
            echo "<h2>".$_SESSION['nome']." - <a href='PHP/logout.php' tabindex='2'>Logout</a></h2>";
        else if($_SESSION['tipo']== 'Cantina')
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
            <li><a tabindex="6">TOP 5 Cantine</a></li>
			<li><a href="cosa.php" tabindex="7">Caratteristiche</a></li>
            <li><a href="info.php" tabindex="8">Chi Siamo</a></li>
			<li><a href="contatti.php" tabindex="9">Contatti</a></li>
        <?php
            if($_SESSION['tipo']== 'Cantina')
                echo "<li><a href='panCantina.php' tabindex='10'>Pannello</a></li>";
        ?>
		</ul>
	</nav>
    <script type="text/javascript" src="../JS/nav.js"></script>
</div>
<div id="text">
    <div id="trovo">
        <p>
            Ti trovi in: Home >> TOP 5 Cantine
        </p>
    </div>
    <h2>Top cantine per le migliori regioni produttrici italiane</h2>
    <dl>
		<dt>Le 5 Regioni Italiane migliori produttrici di vino e la loro cantina migliore:</dt>
		<dd> 
            <img id="regn" src="IMAGE/leragnaie.jpg" alt="Cantina Le Ragnaie, Montalcino, Siena"/>
            <h4>1) Toscana</h4>
            <p>Le Ragnaie (Montalcino, Siena)</p>
            <p>I vigneti vengono coltivati in tre diverse microzone di Montalcino, consentendo di ottenere vini tra loro diversi e testimoni del loro territori. I nostri vigneti sono piantati esclusivamente a Sangiovese e lavorati seguendo i dettami della Agricoltura Biologica.</p>
            <p>Non usiano fertilizzanti ad esclusione di un sovescio ricavato in autunno a base di leguminose, trifoglio e altre erbe che aiutano a rigenerare i terreni appesantiti dalle lavorazioni estive arricchendoli di sostanza organica e penetrandoli in profondità con le radici delle varie specie seminate.</p>
            <p>La nostra cantina è situata presso il centro aziendale delle Ragnaie, in ambienti essenziali e razionali che ci consentono di lavorare nella massima sicurezza e pulizia.</p>
            <p>Dopo la vendemmia le uve sono selezionate su un tavolo di cernita vibrante dove vengono scelti i grappoli migliori, consentendoci di vinificare solo uve di qualità. I mosti vengono fatti fermentare e macerare in tini di cemento dove, con l’aiuto di rimontaggi manuali, rimangono dai 25 ai 90 giorni. Dopo la pressatura i vini riposano nella nostra bottaia in grandi botti di rovere di Slavonia.
            Il periodo di permanenza in rovere varia dai 12mesi per l’IGT Troncone, 24 mesi per il Rosso di Montalcino e 36 mesi per i Brunelli.
            Dopo l’imbottigliamento i vini riposano in un ambiente a temperatura e umidità controllata fino alla messa in commercio.</p>
            <p>Sito: <a href="https://leragnaie.com/it/" tabindex="13">Le Ragnaie</a></p>
		</dd>
        <dd>
            <img id="cadgal" src="IMAGE/cadgal.jpg" alt="Cantina Ca’ D’Gal, Santo Stefano Belbo, Cuneo"/>
            <h4>2) Piemonte</h4>
            <p>Ca’ D’Gal (Santo Stefano Belbo, Cuneo)</p>
            <p>La storia di Ca’ d’ Gal inizia proprio da questi tre fondamentali elementi: uomini che amano e rispettano la loro terra, vigne che da quella terra attingono nutrimento ideale, vini che grazie alle uve di quelle stesse vigne sanno esprimere la profondità e l’unicità di un connubio esemplare.</p>
            <p>Tra queste colline, contraddistinte da un paesaggio vitivinicolo unico e nelle quali trova il suo terroir d’elezione il Moscato d’Asti, abbiamo ricercato e scelto nel corso del tempo i nostri migliori vigneti.</p>
            <p>Vigneti anche di oltre 50 anni d’età, su terreni bianchi e leggeri, ricchi di sabbia e dalle esposizioni ideali, che uniscono a produzioni meno abbondanti, la struttura e la longevità di una qualità costante nel tempo.</p>
            <p>Il progressivo lavoro di rigorosa selezione della produzione aziendale che abbiamo messo in atto dal 1997, ci ha permesso poi di esprimerne al meglio tutte le potenzialità, soprattutto in termini di ricchezza delle componenti olfattive e gustative, riscontrabili in primo luogo nei nostri moscati.</p>
            <p>Sito: <a href="http://www.cadgal.it/" tabindex="14">Ca’ D’Gal</a></p>
        </dd>
        <dd>
            <img id="quintarelli" src="IMAGE/quint.jpg" alt="Cantina Quintarelli, Negrar, Verona"/>
            <h4>3) Veneto</h4>
            <p>Quintarelli (Negrar, Verona)</p>
            <p>L'azienda nasce all'inizio del secolo con Silvio Quintarelli, che, insieme ai suoi fratelli coltiva a mezzadria i vigneti di località Figàri, nel comune di Marano di Valpolicella.</p>
            <p>L'esposizione dei vigneti è a Ovest ed il terreno è di tipo calcareo basaltico. Il sistema di allevamento dei vigneti è, nei vecchi impianti, a Pergola Veronese e, nei nuovi, a Guyot.</p>
            <p>Dal 1985, infatti, vengono usate regolarmente varietà di uva come il Nebbiolo, la Croatina, il Cabernet Franc e Sauvignon, con dei risultati eccellenti. Nasce un vino, l'Alzero, frutto dell'esperienza e della consapevolezza nella tecnica dell'appassimento delle uve, peculiarità della tradizione di tutta la Valpolicella. Due caratteristiche accompagnano i vini prodotti dall'azienda: una naturale predisposizione al lunghissimo affinamento, che porta a migliorare il prodotto anche oltre i vent'anni, ed una sorprendente vivacità, che si esprimono per lungo tempo dopo l'apertura della bottiglia.</p>
            <p>Sito: <a href="https://www.tripadvisor.it/Attraction_Review-g661295-d12258378-Reviews-Azienda_Agricola_Giuseppe_Quintarelli-Negrar_Province_of_Verona_Veneto.html" tabindex="15">Quintarelli</a></p>
        </dd>
        <dd>
            <img id="stoppa" src="IMAGE/lastoppa.jpg" alt="Cantina La Stoppa, Rivergaro, Piacenza"/>
            <h4>4) Emilia-Romagna</h4>
            <p>La Stoppa (Rivergaro, Piacenza)</p>
            <p>LA STOPPA è un'azienda antica che con i suoi vigneti si arrampica solitaria sui declivi della val Trebbiola, non lontano dal fiume Trebbia, in provincia di Piacenza.</p>
            <p>Più di cento anni fa, il suo precedente proprietario, avvocato Ageno, vi piantò viti francesi e produsse vini dai nomi significativi ed un po' curiosi perché italianizzati: Bordò, Bordò bianco e Pinò.</p>
            <p>Nel 1973 La Stoppa fu acquistata dalla famiglia Pantaleoni, che in poco tempo razionalizzò gli impianti e rinnovò la cantina. Oggi l'azienda è condotta da Elena Pantaleoni, che insieme a Giulio Armani ha voluto che i maggiori investimenti fossero destinati alla vigna, gestita secondo il metodo biologico e certificato dall'Ente Suolo e Salute.</p>
            <p>Le basse rese naturali, dovute all'età media delle viti e al terreno povero, e la qualità intrinseca dei grappoli permettono di ricavare vini assai caratterizzati, nati in vigna e non traditi da un eccessivo lavoro in cantina. Oggi alla Stoppa si producono poche etichette, alcune legate alle uve autoctone, la Malvasia di Candia Aromatica, la Barbera e la Bonarda, altre a vitigni storicamente presenti come il Cabernet Sauvignon, il Merlot e il Semillon.</p>
            <p>Sito: <a href="http://www.lastoppa.it/" tabindex="16">La Stoppa</a></p>
        </dd>
		<dd> 
            <img id="ferr" src="IMAGE/ferr.jpg" alt="Cantina Ferrari, Trento" />
            <h4>5) Trentino-Alto-Adige</h4>
            <p>Ferrari (Trento)</p>
            <p>Giulio Ferrari è considerato un pioniere, in quanto ha intuito per primo la straordinaria vocazione della sua terra, lui che per primo diffonde lo Chardonnay in Italia.</p>
            <p>Decide di comincire a produrre poche selezionatissime bottiglie, con un culto ossessivo per la qualità a partire dal 1902. Nel 1952 non avendo figli cerca il suo successore e fra i tanti pretendenti sceglie Bruno Lunelli, titolare di un’enoteca a Trento. Grazie alla passione e al talento imprenditoriale, Bruno Lunelli riesce a incrementare la produzione senza mai scendere a compromessi con la qualità. </p>
            <p>Bruno Lunelli trasmette la passione ai suoi figli: sotto la guida di Franco, Gino e Mauro, Ferrari diventa leader in Italia e il brindisi italiano per eccellenza.</p>
            <p>Il Trentino è una terra straordinariamente vocata per dar vita a bollicine di grande eleganza e complessità: l’alternarsi di giornate calde e notti fresche impreziosisce i grappoli, conferendo loro un arcobaleno di aromi e profumi. Ferrari nasce nei vigneti di montagna, nelle zone più vocate del Trentino, e si perfeziona in cantina secondo il disciplinare Trentodoc.</p>
            <p>Sito: <a href="http://www.ferraritrento.it/" tabindex="17">Ferrari</a></p>
		</dd>
    </dl>
    <h3> <a href=" topcantine.php" tabindex="18"> &laquo;Torna su </a></h3>
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
