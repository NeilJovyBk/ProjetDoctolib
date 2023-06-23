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
                    <?php
                    $cols = $results[0];
                    foreach ($cols as $uneColonne) {
                        echo "<th scope='col'>".$uneColonne.'</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $datas = $results[1];
                foreach ($datas as $ligne) {
                    echo '<tr>';
                    foreach ($cols as $uneColonne) {
                        echo '<td>'.$ligne[$uneColonne].'</td>';
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
