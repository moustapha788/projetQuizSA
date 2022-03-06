<section class="content-register">
    <!-- // todo check information to sign in -->
    <div class="check-info" id="check-info">
        <!-- // ! libele -->
        <div class="libele-form-register">
            <h2>S'inscrire</h2>
            <small>Pour proposer des quizz</small>
        </div>
        <!-- // ! the form -->
        <form class="connexion-form-inscrip" id="connexion-form-inscrip" novalidate action="<?= WEB_ROOT?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="securite">
            <input type="hidden" name="action" value="inscription">


            <div class="control-group-inscription">


                <!--//! prenom -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="prenom">Prénom</Label>
                    <input class="input-register" type="text"   name="prenom" id="prenom" class="prenom" autofocus placeholder="entrez votre prenom">
                    <small class="the_error_small"></small>
                </div>


                <!--//! nom -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="nom">Nom</Label>
                    <input class="input-register" type="text"  name="nom" id="nom" class="nom" placeholder="entrez votre nom">
                    <small class="the_error_small">erro</small>
                </div>



                <!--//! login -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="login">Login</Label>
                    <input class="input-register" type="email"  name="login" id="email" class="login" placeholder="entrez votre email">
                    <small class="the_error_small"></small>
                </div>


                <!--//! password1 -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="password1">Password</Label>
                    <input class="input-register" type="password"  name="password1" id="password1" class="password1" placeholder="votre mot de passe">
                    <small class="the_error_small"></small>
                </div>


                <!--//! password2 -->
                <div class="forms-group-inscrip">
                    <Label class="label-connexion" for="password2">Confirm password</Label>
                    <input class="input-register" type="password"  name="password2" id="password2" class="password2" placeholder="confirmez votre mot de passe">
                    <small class="the_error_small"></small>
                </div>




                <!--//! fichier -->
                <div class="forms-group-inscrip choose-file">
                    <Label class="label-connexion" for="file">Avatar</Label>
                    <input class="input-register" type="file" name="file" accept="image/jpg, image/png, image/jpeg" id="file" placeholder="Choississez votre avatar">
                    <label class="btn-upload" for="file" >Choisir un fichier</label>
                    <small class="the_error_small"></small>
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
            <img src="<?=  WEB_PUBLIC.'img'.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR.'generatedPhotos'  ?>" alt="avatar joueur" srcset="">
        </figure>
    </div>


</section>
