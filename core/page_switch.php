<?php
    
    $currentPage = $_GET['page'];

    switch ($currentPage) {
        case 'accesso':
            include 'pages/accesso.php';
            break;
        case 'logout':
            include 'pages/logout.php';
            break;
        case 'dashboard':
            include 'pages/dashboard.php';
            break;
        case 'progetti':
            include 'pages/progetti.php';
            break;
        case 'note':
            include 'pages/note.php';
            break;
        case 'clienti-aggiungi':
            include 'pages/clienti-aggiungi.php';
            break;
        case 'clienti-lista':
            include 'pages/clienti-lista.php';
            break;
        case 'clienti-scheda':
            include 'pages/clienti-scheda.php';
            break;
        case 'preventivi-lista':
            include 'pages/preventivi-lista.php';
            break;
        case 'preventivi-nuovo':
            include 'pages/preventivi-nuovo.php';
            break;
        case 'preventivi-vedi':
            include 'pages/preventivi-vedi.php';
            break;
        case 'fatture-uscita-nuova':
            include 'pages/fatture-uscita-nuova.php';
            break;
        case 'prodotti-lista':
            include 'pages/prodotti-lista.php';
            break;
        case 'bilancio':
            include 'pages/bilancio.php';
            break;
        case 'tools-adsl':
            include 'pages/tools-adsl.php';
            break;
        case 'tools-domini-whois':
            include 'pages/tools-domini-whois.php';
            break;
        case 'tools-servers':
            include 'pages/tools-servers.php';
            break;
        case 'impostazioni-generali':
            include 'pages/impostazioni-generali.php';
            break;
        case 'impostazioni-aggiornamenti':
            include 'pages/impostazioni-aggiornamenti.php';
            break;
        default:
            include 'pages/404.php';
            break;
    }

?>