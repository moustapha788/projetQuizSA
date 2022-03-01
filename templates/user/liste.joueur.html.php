


<div class="table-joueurs">
    <h2>Liste des joueurs</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tab_joueurs as $joueur):?>
                <tr>
                    <td><?=$joueur['nom']?></td>
                    <td><?=$joueur['prenom']?></td>
                    <td><?=$joueur['score']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



