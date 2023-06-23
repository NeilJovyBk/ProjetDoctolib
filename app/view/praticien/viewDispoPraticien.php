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
            echo ('<h3>Liste de mes disponibilités :</h3>');
            echo ('<ul>');
            foreach ($results as $ligne) {
                echo '<li>'.$ligne['rdv_date'].'</li>';
            }
            echo ('</ul>');
        ?>

        </div>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
        ?>
    