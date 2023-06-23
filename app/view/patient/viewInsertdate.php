<?php 
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3 class='text-danger'>Prendre votre rendez-vous: Sélection d'une date de rendez-vous</h3>

        <form role='form' method='get' action='router.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='createdRDVavecPraticien'>

                <label for='dateRdv'>Sélectionnez une date de rendez-vous :</label>
                <select class='form-control' id='dateRdv' name='idRendezvous' style='width: 400px'>
                    <?php
                    foreach ($results as $ligne) {
                        echo '<option value='.$ligne['id'].'>'.$ligne['rdv_date'].'</option>';
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
