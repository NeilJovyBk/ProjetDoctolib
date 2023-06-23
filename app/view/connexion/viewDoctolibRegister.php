<?php 
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3>Formulaire d'inscription</h3>

        <form role='form' method='get' action='router.php'>
            <div class='form-group'>
                <input type='hidden' name='action' value='doctolibRegistered'>

                <label for='nom'>Nom : </label><br>
                <input type='text' name='nom' size='30'><br>
                <br>
                <label for='prenom'>Prenom : </label><br>
                <input type='text' name='prenom' size='30'><br>
                <br>
                <label for='adresse'>Adresse : </label><br>
                <input type='text' name='adresse' size='100'><br>
                <br>
                <label for='login'>Login : </label><br>
                <input type='text' name='login' size='30'><br>
                <br>
                <label for='password'>Mot de passe : </label><br>
                <input type='password' name='password' size='30'><br>
                <br>
                <label for='statut'>Sélectionnez votre rôle :</label>
                <select class='form-control' id='statut' name='statut' style='width: 400px'>
                    <option value=<?php echo ModelPersonne::ADMINISTRATEUR; ?>>Administrateur</option>
                    <option value=<?php echo ModelPersonne::PRATICIEN; ?>>Praticien</option>
                    <option value=<?php echo ModelPersonne::PATIENT; ?>>Patient</option>
                </select>
                <br>
                <label for='idSpecialite'>Si vous êtes un praticien, sélectionnez votre spécialité :</label>
                <select class='form-control' id='idSpecialite' name='idSpecialite' style='width: 400px'>
                    <?php
                    foreach ($lesSpecialites as $uneSpecialite) {
                        echo '<option value=' . $uneSpecialite->getIdSpecialite() . '>' . $uneSpecialite->getLabel() . '</option>';
                    }
                    ?>
                </select>
            </div>
            <p>
            <br> 
            <button class='btn btn-success' type='submit'>S'inscrire</button>
        </form>
        <p>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
