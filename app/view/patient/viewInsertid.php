<?php 
require_once $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3 class='text-danger'>Prendre votre rendez-vous : Sélection d'un praticien</h3>

        <form role='form' method='get' action='router.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='createRDVavecPraticienForm2'>

                <label for='idPraticien'>Sélectionnez un praticien :</label>
                <select class='form-control' id='idPraticien' name='idPraticien' style='width: 400px'>
                    <?php
                    foreach ($lesPraticiens as $unPraticien) {
                        echo '<option value='.$unPraticien->getId() . '>'.$unPraticien->getPrenom() . ' '.$unPraticien->getNom() . '</option>';
                    }
                    ?>
                </select>
            </div>
            <p>
            <br> 
            <button class='btn btn-success' type='submit'>Suivant</button>
        </form>
        <p>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
