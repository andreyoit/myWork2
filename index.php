<?php 
session_start();
include 'core/config.php';
include 'core/db.php';
$_POST['error'] = '';
$md5pwd = md5($_POST['password']);

$checkPWD = $DB_CON->query("SELECT * FROM utenti WHERE password = '{$md5pwd}' LIMIT 1");
$pwd = $checkPWD->fetchAll();

if ($pwd) {
     $_SESSION['login'] = 'true';
     $_SESSION['user'] = $pwd['utente'];
     $_GET['page'] = 'dashboard';
} else {
     $_POST['error'] = 'true';
}

if($_SESSION['login'] == 'true') {
    //Including Core files
    include 'core/config.php';
    include 'core/db.php';
    include 'core/functions.php';
    //Drawing Page
    print '<html lang="en">';
        include 'inc/head.tmpl';
        include 'inc/scripts.tmpl';
        print '<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">';
            include 'inc/header.tmpl';
            print '<div class="clearfix"> </div>';
            print '<div class="page-container">';
                include 'inc/sidebar.tmpl';
                print '<div class="page-content-wrapper">';
                    include 'core/page_switch.php';
                print '</div>';
            include 'inc/quicksidebar.tmpl';
            print '</div>';
        include 'inc/footer.tmpl';
        print '</body>';
    print '</html>';
} else {
    include 'pages/accesso.php';
}
?>