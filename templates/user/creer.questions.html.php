<!-- <div>
    <h2 style="color: red;">La partie créer questions n'est pas encore disponible</h2>
</div> -->

<div class="creer-questions" id="creer-questions">
    <div class="libele-params">
        <h1>PARAMÉTRER VOTRE QUESTION</h1>
    </div>
    <div class="questions-settings" id="questions-settings">
        <form action="" method="POST">
            <!-- Questions -->
            <div class="question-form-group">
                <label for="libele-question">Questions</label>
                <textarea name="libeleQuestions" id="libele-question">A question ?</textarea>
            </div>

            <!-- Nombre de points -->
            <div class="question-form-group">
                <label for="nbr-points">Nombre de points</label>
                <input type="number" name="nbrPoints" id="nbr-points" >
            </div>

            <!-- Type de réponse -->
            <div class="question-form-group">
                <label for="type-question">Type de réponse</label>
                <select name="typeQuestion" id="type-question" size="1" label="Donnez le type de réponse">
                    <option value="simple">choix simple</option>
                    <option value="multiple">choix multiple</option>
                    <option value="texte">texte</option>
                </select>
                <p class="btn-add" id="btn-add"><img src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="ajouter" srcset=""></p>
            </div>

            <!-- Réponse -->
            <div class="question-form-group reponse-class">
                <label for="reponse1">Réponse 1</label>
                <input type="text" name="reponse1" value="" class="" id="reponse1">
                <input type="checkbox" name="" id="">
                <input type="radio" name="" id="">
                <p class="btn-delete" id="btn-delete"><img src="<?=WEB_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-supprimer.png"?>" alt="" srcset=""></p>
            </div>


            <div class="save-question" id="save-question">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>