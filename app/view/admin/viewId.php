<?php 
require_once ROOT . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include ROOT . '/app/view/fragment/fragmentDoctolibMenu.php';
        include ROOT . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

    <form role='form' method='get' action='router.php'>
        <div class='form-group'>
            <input type='hidden' name='action' value='specialiteReadOne'>
            <label for='id'>id :</label>
            <select class='form-control' id='id' name='id' style='width: 100px'>
                <?php
                foreach ($results as $id) {
                    echo ('<option>' . $id . '</option>');
                }
                ?>
            </select>
        </div>
        <p>
        <br>
        <button class='btn btn-success' type='submit'>Valider</button>
    </form>
    <p>
    </div>

    <?php include ROOT . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
