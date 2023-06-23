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
            if ($rdv) {
                echo ('<h3> Merci Pour votre feedback</h3>');
                echo '<ul>';
                echo '<li>Date du rendez-vous : <b>' . $rdv->getDateRDV(). '</b></li>';
                echo '<li>Avec: <b>' . $lePraticien->getPrenom() . ' ' . $lePraticien->getNom() . '</b></li>';
                echo '<li>Note: <b>' . $rdv->getNote(). '</b></li>';
                echo '</ul>';
            } else {
                echo ('<h3>Problème d\'enregistrement de votre rendez-vous</h3>');
            }

            echo('</div>');
            
            include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
        ?>   
    