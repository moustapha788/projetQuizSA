<header class="main-header">
    <nav class="nav">
        <ul class="navbar">
            <li id="logo"><a href="<?= WEB_ROOT ?>"><img src="<?= WEB_PUBLIC."img".DIRECTORY_SEPARATOR."logo-QuizzSA.png" ?>" alt=""></a></li>
            
            <li id="label-game"><h1>Le plaisir de jouer</h1></li>

            <?php /* deconnexion  */ if(is_connect() && is_player())   :?>
                <li id="log-out"><a href="<?=WEB_ROOT."?controller=securite&action=deconnexion"?>">Déconnexion</a></li>
            <?php endif; ?>                
        </ul>
    </nav>
</header>
