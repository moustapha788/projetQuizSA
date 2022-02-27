<header class="main-header">
    <nav class="nav">
        <ul class="navbar">
            <li id="home"><a href="<?= /* Accueil */WEB_ROOT."?controller=user&action=accueil"?>">Accueil</a></li>

            <?php /* liste des joueurs */ if(is_admin()):?>
                <li><a href="<?=WEB_ROOT?>">liste des joueurs</a></li>
            <?php endif; ?>
            
            <?php /* inscription */ if(!is_connect()):?>
                <li id="sign-in"><a href="<?=WEB_ROOT ?>">S'inscrire</a></li>
            <?php endif; ?>

            <?php /* deconnexion */ if(is_connect()):?>
                <li id="log-out"><a href="<?=WEB_ROOT."?controller=securite&action=deconnexion"?>">Déconnexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>



