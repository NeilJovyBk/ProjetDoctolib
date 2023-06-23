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
                echo ('<h3>Votre rendez-vous a bien été enregistré :</h3>');
                echo '<ul>';
                echo '<li>Date du rendez-vous : <b>' . $leRDV->getDateRDV() . '</b></li>';
                echo '<li>Avec <b>' . $lePraticien->getPrenom() . ' ' . $lePraticien->getNom() . '</b></li>';
                echo '</ul>';
            } else {
                echo ('<h3>Problème d\'enregistrement de votre rendez-vous</h3>');
            }

            echo('</div>');
            
            include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
        ?>   
    