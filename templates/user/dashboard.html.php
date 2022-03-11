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
                <!-- photo profile -->
                <a  href="<?=""?>"><img src="<?=WEB_PHOTOS.upload_photo_user('avatar')?>" alt="avatar admin" ></a>
                <!-- nom et prénom admin -->
                <h1>
                    <small><?= get_first_name_admin('prenom')?></small>
                    <small><?= get_last_name_admin('nom')?></small>
                </h1>
            </div>
            

            
            <!-- //? profile of admin -->
            <div class="nav-admin">
                <ul>
                    <!-- // todo Liste Questions-->
                    <li class="<?= active_class_color('liste.questions')."nav-items-amdin"?>" id="nav-items-amdin">
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=liste.questions' ?>" class="nav-items-link"  id="nav-items-link-lq">
                            <small >Liste Questions</small>
                            <small>
                                <img src="<?=change_image_when_active('liste.questions','ic-liste.png','ic-liste-active.png')?>" alt="" srcset="">
                            </small>
                        </a>
                    </li>

                    <!-- // todo Créer Admin-->
                    <li class="<?=active_class_color('creer.admin')."nav-items-amdin"?>" id="nav-items-amdin">
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=creer.admin' ?>" class="nav-items-link" id="nav-items-link-cr">
                            <small >Créer Admin</small>
                            <small>
                                <img src="<?=change_image_when_active('creer.admin','ic-ajout.png','ic-ajout-active.png')?>" alt="" srcset="">
                            </small>
                        </a>
                    </li>

                    <!-- // todo Liste Joueurs-->
                    <li class="<?=active_class_color('liste.joueurs')."nav-items-amdin"?>" id="nav-items-amdin">
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=liste.joueurs' ?>" class="nav-items-link" id="nav-items-link-lj">
                            <small>Liste Joueurs</small>
                            <small>
                                <img src="<?=change_image_when_active('liste.joueurs','ic-liste.png','ic-liste-active.png')?>" alt="" srcset="">
                            </small>
                        </a>
                    </li>
                    
                    <!-- // todo Créer Questions-->
                    <li class="<?=active_class_color('creer.questions')."nav-items-amdin"?>" id="nav-items-amdin">
                        <a href="<?= WEB_ROOT.'?controller=user&action=dashboard&view=creer.questions' ?>" class="nav-items-link" id="nav-items-link-cq">
                            <small>Créer Questions</small>
                            <small>
                                <img src="<?=change_image_when_active('creer.questions','ic-ajout.png','ic-ajout-active.png')?>" alt="" srcset="">
                            </small>
                        </a>
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