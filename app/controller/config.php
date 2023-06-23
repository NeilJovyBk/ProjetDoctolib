
<!-- ----- debut config -->
<?php

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

// ===============
// Configuration de la base de données sur dev-isi
$dsn = 'mysql:dbname=temtsate;host=localhost;charset=utf8';
$username = 'temtsate';
$password = 'lbZjtesL';

if (!defined('LOCAL')) {
    define('LOCAL', FALSE);
}

if (LOCAL) {
    // Configuration de la base de données sur localhost
    $dsn = 'mysql:dbname=neil-jom;host=localhost;charset=utf8';
    $username = 'root';
    $password = '';
}
// Chemin absolu vers le répertoire du projet (NE PAS TOUCHER)
if (!defined('ROOT')) {
    define('ROOT', dirname(dirname(__DIR__)) . '/');
}
 
// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

<!-- ----- fin config -->



