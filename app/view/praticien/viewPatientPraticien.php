<?php
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <table class = 'table table-striped table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>Nom</th>
                    <th scope='col'>Prénom</th>
                    <th scope='col'>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $ligne) {
                    echo '<tr>';
                    foreach ($ligne as $uneColonne) {
                        echo '<td>'.$uneColonne.'</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
