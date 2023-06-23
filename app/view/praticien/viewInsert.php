<?php 
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <form role='form' method='get' action='router.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='rdvCreated'>

                <label for='rdv_date'>Sélectionnez une date :</label>
                <input type='date' class='form-control' name='rdv_date' value=<?php echo date_default_timezone_set('Europe/Paris'); date('Y-m-d'); ?> style='width: 150px'>  
                
                <label for='nbRdv'>Quantité :</label>
                <input type='number' class='form-control' name='nbRdv' value='1' min='1' max='10' style='width: 70px'>       
                <p>  
            </div>
            <p>
            <button class='btn btn-success' type='submit'>Valider</button>
        </form>
        <p>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
