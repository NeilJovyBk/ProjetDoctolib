<nav class='navbar navbar-expand-lg bg-success fixed-top navbar-dark'>
    <div class='container-fluid'>
        <a class='navbar-brand' href='router.php?action=doctolibAccueil'>NEIL-TEMTSA |  
            <?php
            if (isset($_SESSION['statut'])&& $_SESSION['statut'] != 'vide') {
                switch ($_SESSION['statut']) {
                    case ModelPersonne::ADMINISTRATEUR:
                        $statutTexte = 'Administrateur';
                        break;
                    case ModelPersonne::PRATICIEN:
                        $statutTexte = 'Praticien';
                        break;
                    case ModelPersonne::PATIENT:
                        $statutTexte = 'Patient';
                        break;
                    default:
                        $statutTexte = '';
                        break;
                }
                if($_SESSION['id']!=0)
                echo $_SESSION['prenom'] . ' '.$_SESSION['nom'] . ' ('.$statutTexte.')';
            }
            ?>
        </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <?php
                if (isset($_SESSION['statut']) && $_SESSION['statut'] != 'vide') {
                    switch ($_SESSION['statut']) {
                        case ModelPersonne::ADMINISTRATEUR:
                            echo "
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Administrateur</a>
                                <ul class='dropdown-menu'>
                                    <li><a class='dropdown-item' href='router.php?action=specialiteReadAll'>Liste des spécialités</a></li>
                                    <li><a class='dropdown-item' href='router.php?action=specialiteReadId'>Sélection d'une spécialité par son id</a></li>
                                    <li><a class='dropdown-item' href='router.php?action=specialiteCreate'>Insertion d'une nouvelle spécialité</a></li>
                                    <div class='dropdown-divider'></div>
                                    <li><a class='dropdown-item' href='router.php?action=administrateurReadPraticiensAvecSpecialite'>Liste des praticiens avec leur spécialité</a></li>
                                    <li><a class='dropdown-item' href='router.php?action=administrateurReadNbPraticiensParPatient'>Nombre de praticiens par patient</a></li>
                                    <div class='dropdown-divider'></div>
                                    <li><a class='dropdown-item' href='router.php?action=administrateurReadInfos'>Infos</a></li>
                                </ul>
                            </li>
                            <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Innovations</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=getNotePraticien'>Consulter notes de Rdv d'un patricien</a></li>
                        <li><a class='dropdown-item' href='router.php?action=doctolibPropositionAmelioMVC'>Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Mon Compte</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=doctolibDisconnect'>Se déconnecter</a></li>
                    </ul>
                </li>";
                            break;
                        case ModelPersonne::PRATICIEN:
                            echo "
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Praticien</a>
                                <ul class='dropdown-menu'>
                                    <li><a class='dropdown-item' href='router.php?action=readListeDispo'>Liste de mes disponlibilités</a></li>
                                    <li><a class='dropdown-item' href='router.php?action=rdvCreate'>Ajout de nouvelles disponibilités</a></li>
                                    <div class='dropdown-divider'></div>
                                    <li><a class='dropdown-item' href='router.php?action=readListeRDV'>Liste des rendez-vous avec le nom des patients</a></li>
                                    <li><a class='dropdown-item' href='router.php?action=readListeMesPatients'>Liste de mes patients (sans doublon)</a></li>
                                </ul>
                            </li>
                            <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Innovations</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=readNotesRdv'>Consulter les notes de mes Rendezvous</a></li>
                        <li><a class='dropdown-item' href='router.php?action=doctolibPropositionAmelioMVC'>Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Mon Compte</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=doctolibDisconnect'>Se déconnecter</a></li>
                    </ul>
                </li>";
                            break;
                        case ModelPersonne::PATIENT:
                            echo "
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Patient</a>
                                <ul class='dropdown-menu'>
                                    <li><a class='dropdown-item' href='router.php?action=readInfosMonCompte'>Mes Informations</a></li>
                                    <li><a class='dropdown-item' href='router.php?action=readListeRDVPatients'>Liste de mes rendez-vous</a></li>
                                    <li><a class='dropdown-item' href='router.php?action=createRDVavecPraticien'>Prendre un rendez-vous avec un praticien</a></li>
                                </ul>
                            </li>
                            
                            <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Innovations</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=noterUnRdv'>Noter un Rendezvous</a></li>
                        <li><a class='dropdown-item' href='router.php?action=doctolibPropositionAmelioMVC'>Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Mon Compte</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=doctolibDisconnect'>Se déconnecter</a></li>
                    </ul>
                </li>";
                            break;
                        default:
                            echo "   
                            <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Innovations</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=PropositionOriginale'>Proposez une fonctionnalité originale</a></li>
                        <li><a class='dropdown-item' href='router.php?action=doctolibPropositionAmelioMVC'>Proposez une amélioration du code MVC</a></li>
                    </ul>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Se connecter</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=doctolibConnect'>Login</a></li>
                        <li><a class='dropdown-item' href='router.php?action=doctolibRegister'>S'inscrire</a></li>
                    </ul>
                </li>";
                            break;
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
