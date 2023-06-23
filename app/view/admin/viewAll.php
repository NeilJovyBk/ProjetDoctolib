<?php
require_once ROOT . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include ROOT . '/app/view/fragment/fragmentDoctolibMenu.php';
        include ROOT . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <table class = 'table table-striped table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>id</th>
                    <th scope='col'>label</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    echo '<tr>
                            <td>' . $element->getId() . '</td>
                            <td>' . $element->getLabel() . '</td>
                         </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include ROOT . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
