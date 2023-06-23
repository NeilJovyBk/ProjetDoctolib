<?php
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <?php
            echo ('<h3>Nombre de praticiens par patient</h3>');
            echo ('<ul>');
            foreach ($results as $ligne) {
                echo '<li>'.$ligne['nom'].' '.$ligne['prenom'].' : '.$ligne['nbPraticiens'].'</li>';
            }
            echo ('</ul>');
        ?>

        </div>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
        ?>
    