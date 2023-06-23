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
            if ($results) {
                echo ('<h3>Liste des disponibilités ajoutés :</h3>');
                echo ('<ul>');
                foreach ($results as $unRDV) {
                    echo '<li>' . $unRDV->getDateRDV() . '</li>';
                }
                echo('</ul>');
            } else {
                echo ('<h3>Problème d\'insertion des nouveaux rendez-vous</h3>');
            }

            echo('</div>');
            
            include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
        ?>   
    