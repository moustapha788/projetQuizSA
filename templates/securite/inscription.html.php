<?php

if(isset($_SESSION[KEY_ERRORS])){
    $errors=$_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
}
?>

<section class="content-register">
    <!-- // todo check information to sign in -->
    <div class="check-info" id="check-info">
        <!-- // ! libele -->
        <div class="libele-form-register">
            <h2>S'inscrire</h2>
            <?php /* player */ if(!is_connect()): ?>
                <small>Pour Tester votre niveau de culture générale</small>
            <?php endif; ?>
            <?php /* admin */ if(is_admin()): ?>
                <small>Pour proposer des quizz</small>
            <?php endif; ?>
        </div>
        
        <!-- // ! the form -->
        <form class="connexion-form-inscrip" id="connexion-form-inscrip" novalidate action="<?= WEB_ROOT?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="securite">
            <input type="hidden" name="action" value="inscription">
            <input type="hidden" name="inscription" value="ins">

            <div class="control-group-inscription">


                <!--//! prenom -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="prenom">Prénom</Label>
                    <input class="input-register" type="text"   name="prenom" id="prenom" class="prenom" autofocus placeholder="entrez votre prenom">
                    <small class="the_error_small">                    </small>
                    <p class="the_error_small RED-ERROR">
                        <?php if (isset($errors['prenom'])){echo $errors['prenom'];}?>
                    </p>
                </div>


                <!--//! nom -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="nom">Nom</Label>
                    <input class="input-register" type="text"  name="nom" id="nom" class="nom" placeholder="entrez votre nom">
                    <small class="the_error_small"></small>
                    <p class="the_error_small RED-ERROR">
                        <?php if (isset($errors['nom'])){echo $errors['nom'];}?>
                    </p>
                </div>



                <!--//! login -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="login">Login</Label>
                    <input class="input-register" type="email"  name="login" id="email" class="login" placeholder="entrez votre email">
                    <small class="the_error_small"></small>
                    <p class="the_error_small RED-ERROR">
                        <?php if (isset($errors['loginReg'])){echo $errors['loginReg'];}?>
                        <?php if (isset($errors['already_log_in'])){echo $errors['already_log_in'];}?>
                    </p>
                </div>



                <!--//! password1 -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="password1">Password</Label>
                    <input class="input-register" type="password"  name="password1" id="password1" class="password1" placeholder="votre mot de passe">
                    <small class="the_error_small"></small>
                    <p class="the_error_small RED-ERROR">
                        <?php if (isset($errors['password1'])){echo $errors['password1'];}?>
                    </p>
                </div>
                
            


                <!--//! password2 -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="password2">Confirm password</Label>
                    <input class="input-register" type="password"  name="password2" id="password2" class="password2" placeholder="confirmez votre mot de passe">
                    <small class="the_error_small"></small>
                    <p class="the_error_small RED-ERROR">
                        <?php if (isset($errors['password2'])){echo $errors['password2'];}?>
                    </p>
                </div>




                <!--//! fichier -->
                <div class="forms-group-inscrip choose-file">
                    <Label class="label-connexion" id="label-connexion" for="fileUpload">Avatar</Label>
                    <input class="input-register" type="file" name="fileUpload" accept="image/jpg, image/png, image/jpeg" id="fileUpload" value="" placeholder="Choississez votre avatar">
                    <label class="btn-upload" for="fileUpload" id="btn-upload" >Choisir un fichier</label>
                </div>


                <!-- //!press on submit button -->
                <div class="last-control">
                    <button id="register" type="submit" >Créer un compte</button>
                </div>
            </div>
        </form>
    </div>
    <!-- // todo choose your avatar -->
    <div class="choose-avatar" id="choose-avatar">
        <figure>
            <!-- image uploadé par défaut -->
            <small >Veilllez choisir un avatar</small>
        </figure>
        

        <?php /* erreur de chargement php */ if(isset($errors)):?>
            <p class="error-of-upload-file RED-ERROR text-center">
                <?php if (isset($errors['upload'])){ echo $errors['upload'];} ?>
            </p>
        <?php endif;?>

        <!-- erreur de chargement js -->
        <p class="" id="upload-file"></p> 
    </div>
</section>
