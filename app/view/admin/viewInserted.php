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
            if ($results>0) {
                echo ('<h3>Une nouvelle spécialité a été ajoutée</h3>');
                echo('<ul>');
                echo ('<li>id = ' . $results . '</li>');
                echo ('<li>label = ' . $_GET['label'] . '</li>');
                echo('</ul>');
            } else {
                echo ('<h3>Problème d\'insertion de la Spécialite</h3>');
                echo ('id = ' . $_GET['id']);
            }

            echo('</div>');
            
            include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
        ?>   
    