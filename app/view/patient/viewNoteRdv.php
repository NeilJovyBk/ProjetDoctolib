<?php 
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3 class='text-danger'>Noter rdv</h3>

        <form role='form' method='get' action='router.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='noterUnRdv2'>

                <label for='dateRdv'>Sélectionnez un rendez-vous :</label>
                <select class='form-control' id='dateRdv' name='idRendezVous' style='width: 400px'>
                    <?php
                    foreach ($results as $ligne) {
                        echo '<option value='.$ligne['id'].'> Avec '.$ligne['nom'].' '.$ligne['prenom'].' le '. $ligne['rdv_date'].'</option>';
                    }
                    ?>
                </select>
                <br>
                <label for='dateRdv'>Notez ce rendezvous (de 0 à 5)</label><br>
                <input type="number" min="0" max="10" name='noteVal' value="5"></input>
            </div>
            <p>
            <br> 
            <button class='btn btn-success' type='submit'>Suivant</button>
        </form>
        <p>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
