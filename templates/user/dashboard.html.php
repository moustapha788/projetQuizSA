<div class="dashboard" id="dashboard">

    <!-- //*TOP  -->
    <section class="libele-settings" id="libele-settings">
        <div>
            <h1>CRÉER ET PARAMÉTRER VOS QUIZZ </h1>
            <a href="<?=WEB_ROOT.'?controller=securite&action=deconnexion'?>">Déconnexion</a>
        </div>
    </section>

    <!-- //*BOTTOM  -->
    <section class="dashboard-views">

        <!-- //! menu tableau de bord  -->
        <div class="dashboard-menu" id="dashboard-menu">
            <!-- //? profile of admin -->
            <div class="profile-admin" id="profile-admin">
                
            </div>
            
            <!-- //? profile of admin -->
            <div class="nav-admin">
                <ul>
                    <!-- // todo Liste Questions-->
                    <li class="nav-items-amdin active-setting" id="nav-items-amdin">
                        <small>Liste Questions</small>
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=liste.questions' ?>" class="nav-items-link" id="nav-items-link-lq"><img src="<?=WEB_PUBLIC.'img'.DIRECTORY_SEPARATOR.'icones'.DIRECTORY_SEPARATOR.'ic-liste.png'?>" alt="" srcset=""></a>
                    </li>

                    <!-- // todo Créer Admin-->
                    <li class="nav-items-amdin" id="nav-items-amdin">
                        <small>Créer Admin</small>
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=creer.admin' ?>" class="nav-items-link" id="nav-items-link-cr"><img src="<?=WEB_PUBLIC.'img'.DIRECTORY_SEPARATOR.'icones'.DIRECTORY_SEPARATOR.'ic-ajout.png'?>" alt="" srcset=""></a>
                    </li>

                    <!-- // todo Liste Joueurs-->
                    <li class="nav-items-amdin" id="nav-items-amdin">
                        <small>Liste Joueurs</small>
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=liste.joueurs' ?>" class="nav-items-link" id="nav-items-link-lj"><img src="<?=WEB_PUBLIC.'img'.DIRECTORY_SEPARATOR.'icones'.DIRECTORY_SEPARATOR.'ic-liste.png'?>" alt="" srcset=""></a>
                    </li>
                    
                    <!-- // todo Créer Questions-->
                    <li class="nav-items-amdin" id="nav-items-amdin">
                        <small>Créer Questions</small>
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=creer.questions' ?>" class="nav-items-link" id="nav-items-link-cq"><img src="<?=WEB_PUBLIC.'img'.DIRECTORY_SEPARATOR.'icones'.DIRECTORY_SEPARATOR.'ic-ajout.png'?>" alt="" srcset=""></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- //! affichage de la view  d'un item-menu-->
        <div class="view-admin">
            <?php
                /*****
                **** PARTIE VARIABLE: contenu des vues
                *****/
                if(isset($content_for_layout)){
                    echo $content_for_layout;
                }
                /*****
                **** 
                *****/
            ?>
        </div>

    </section>
</div>