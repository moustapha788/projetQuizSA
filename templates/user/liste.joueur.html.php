
<div class="table-joueurs" id="table-joueurs">
    <h2>Liste des joueurs par score</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; foreach($tab_joueurs as $joueur):?>
                <tr>
                    <td><?=$joueur['nom']?></td>
                    <td><?=$joueur['prenom']?></td>
                    <td><?=$joueur['score']." pts"?></td>
                    
                </tr>
            <?php $i++; 
                if($i%10==0){break;} 
                endforeach; 
                ?>
        </tbody>
    </table>
    <div class="bascule">
        <button>Précédent</button>
        <button>Suivant</button>
    </div>
</div>



