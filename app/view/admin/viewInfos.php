<?php
require $root . '/app/view/fragment/fragmentDoctolibHeader.html';
?>

<body>
    <div class='container'>
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <h3>Liste des spécialités :</h3>
        <table class = 'table table-striped table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>id</th>
                    <th scope='col'>label</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listeSpecialites as $element) {
                    echo '<tr>
                            <td>' . $element->getId(). '</td>
                            <td>' . $element->getLabel() . '</td>
                         </tr>';
                }
                ?>
            </tbody>
        </table>
        <br>

        <h3>Liste des praticiens :</h3>
        <table class = 'table table-striped table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>idPersonne</th>
                    <th scope='col'>nom</th>
                    <th scope='col'>prenom</th>
                    <th scope='col'>adresse</th>
                    <th scope='col'>login</th>
                    <th scope='col'>password</th>
                    <th scope='col'>statut</th>
                    <th scope='col'>idSpecialite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listePraticiens as $element) {
                    echo '<tr>
                    <td>' . $element->getId() . '</td>
                    <td>' . $element->getNom() . '</td>
                    <td>' . $element->getPrenom() . '</td>
                    <td>' . $element->getAdresse() . '</td>
                    <td>' . $element->getLogin() . '</td>
                    <td>' . $element->getPassword() . '</td>
                    <td>' . $element->getStatut() . '</td>
                    <td>' . $element->getIdSpecialite() . '</td>
                 </tr>';
                }
                ?>
            </tbody>
        </table>
        <br>

        <h3>Liste des administrateurs :</h3>
        <table class = 'table table-striped table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>idPersonne</th>
                    <th scope='col'>nom</th>
                    <th scope='col'>prenom</th>
                    <th scope='col'>adresse</th>
                    <th scope='col'>login</th>
                    <th scope='col'>password</th>
                    <th scope='col'>statut</th>
                    <th scope='col'>idSpecialite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listeAdministrateurs as $element) {
                    echo '<tr>
                    <td>' . $element->getId() . '</td>
                    <td>' . $element->getNom() . '</td>
                    <td>' . $element->getPrenom() . '</td>
                    <td>' . $element->getAdresse() . '</td>
                    <td>' . $element->getLogin() . '</td>
                    <td>' . $element->getPassword() . '</td>
                    <td>' . $element->getStatut() . '</td>
                    <td>' . $element->getIdSpecialite() . '</td>
                 </tr>';
                }
                ?>
            </tbody>
        </table>
        <br>

        <h3>Liste des patients :</h3>
        <table class = 'table table-striped table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>idPersonne</th>
                    <th scope='col'>nom</th>
                    <th scope='col'>prenom</th>
                    <th scope='col'>adresse</th>
                    <th scope='col'>login</th>
                    <th scope='col'>password</th>
                    <th scope='col'>statut</th>
                    <th scope='col'>idSpecialite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listePatients as $element) {
                    echo '<tr>
                    <td>' . $element->getId() . '</td>
                    <td>' . $element->getNom() . '</td>
                    <td>' . $element->getPrenom() . '</td>
                    <td>' . $element->getAdresse() . '</td>
                    <td>' . $element->getLogin() . '</td>
                    <td>' . $element->getPassword() . '</td>
                    <td>' . $element->getStatut() . '</td>
                    <td>' . $element->getIdSpecialite() . '</td>
                 </tr>';
                }
                ?>
            </tbody>
        </table>
        <br>

        <h3>Liste des RDVs :</h3>
        <table class = 'table table-striped table-bordered'>
            <thead>
                <tr>
                    <th scope='col'>idRendezvous</th>
                    <th scope='col'>patient_id</th>
                    <th scope='col'>praticien_id</th>
                    <th scope='col'>rdv_date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listeRdv as $element) {
                    echo '<tr>
                    <td>' . $element->getIdRendezvous() . '</td>
                    <td>' . $element->getPatientId() . '</td>
                    <td>' . $element->getPraticienId() . '</td>
                    <td>' . $element->getDateRDV() . '</td>
                 </tr>';
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
