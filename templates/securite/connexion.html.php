<?php

if(isset($_SESSION[KEY_ERRORS])){
    $errors=$_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
}

?>
<section class="content-form">
    <form class="connexion-form" id="connexion-form" action="<?= WEB_ROOT ?>" method="POST">
        <input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="connexion">
        <div class="libele-form-connect">
            <h2>Login Form</h2>
        </div>
        
        <div class="control-group-connect">
            <?php /* gestion des erreurs */  if (isset($errors['connexion'])):?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['connexion'] ?></small>
            <?php endif; ?>

            <!--//!login -->
            <div class="forms-group">
                <input class="input-connexion" type="text"  name="login" id="login" autofocus class="login" value="<?php if (!isset($errors['login']) && isset($_SESSION['POST'])) echo $post['login']; ?>" placeholder="Login">
                <small class="ic-connexion"><img src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-login.png"?>" alt=""></small>
            </div>
            <p class="ERROR-LAY"></p>
            <?php /* gestion des erreurs */ if (isset($errors['login'])):?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['login'] ?></small>
            <?php endif; ?>

            <!-- //!password -->
            <div class="forms-group">
                <input class="input-connexion" type="password"  name="password" id="password" class="password" placeholder="Password">
                <small class="ic-connexion"><img src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-password.png"?>" alt=""></small>
            </div>
            <p class="ERROR-LAY"></p>
            <?php /* todogestion des erreurs */  if (isset($errors['password'])):?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['password'] ?></small>
            <?php endif; ?>
                
            <!-- //!press on submit button -->
            <div class="last-control">
                <button id="connect" type="submit" >Connexion</button>
                <a href="<?= WEB_ROOT."?controller=securite&action=inscription" ?>">S'inscrire pour jouer </a>
            </div>
        </div>        
    </form>
</section>






