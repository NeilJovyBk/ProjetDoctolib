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
            echo ('<h3>Vos informations :</h3>');
            echo "<table class='table table-striped table-bordered table-sm'>";
            echo '<tbody>';
            
            echo '<tr>';
            echo '<th>idPersonne</th>';
            echo '<th>nom</th>';
            echo '<th>prenom</th>';
            echo '<th>adresse</th>';
            echo '<th>login</th>';
            echo '<th>password</th>';
            echo '<th>statut</th>';
            echo '<th>idSpecialite</th>';
            echo '</tr>';
            
            echo '<tr>';
            echo '<td>' . $results->getId() . '</td>';
            echo '<td>' . $results->getNom() . '</td>';
            echo '<td>' . $results->getPrenom() . '</td>';
            echo '<td>' . $results->getAdresse() . '</td>';
            echo '<td>' . $results->getLogin() . '</td>';
            echo '<td>' . $results->getPassword() . '</td>';
            echo '<td>' . $results->getStatut() . '</td>';
            echo '<td>' . $results->getIdSpecialite() . '</td>';
            echo '</tr>';
            
            echo '</tbody>';
            echo '</table>';            
        ?>

        </div>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
        ?>
    