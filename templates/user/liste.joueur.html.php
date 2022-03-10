<?php

$taille_tab=count($tab_joueurs);
$nbr_pages=ceil($taille_tab/NBR_VALEURS_PAR_PAGE);



if(isset($_GET['page'])){
    // click
    $page_actuelle=$_GET['page'];
    if($page_actuelle>$nbr_pages){
        $page_actuelle=$nbr_pages;
        header("Location:".WEB_ROOT."?controller=user&action=dashboard&view=liste.joueurs&page=".$page_actuelle);
        exit();
    }
    if($page_actuelle<0){
        $page_actuelle=1;
        header("Location:".WEB_ROOT."?controller=user&action=dashboard&view=liste.joueurs&page=1");
        exit();
    }
}else{
    // page par défaut première fois
    $page_actuelle=1;
    header("Location:".WEB_ROOT."?controller=user&action=dashboard&view=liste.joueurs&page=1");
    exit();
}

$indexBegin=($page_actuelle-1)*NBR_VALEURS_PAR_PAGE;
$indexEnd= $indexBegin + NBR_VALEURS_PAR_PAGE -1;
 
?>


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
            <?php 
            for($i=$indexBegin; $i <= $indexEnd ; $i++): 
                if(isset($tab_joueurs[$i])):?>
                <tr>
                    <td><?=$tab_joueurs[$i]['nom']?></td>
                    <td><?=$tab_joueurs[$i]['prenom']?></td>
                    <td><?=$tab_joueurs[$i]['score']." pts"?></td>
                </tr>
            <?php endif;
            endfor;?>
        </tbody>
    </table>
    <div class="bascule">
        <!-- précédent -->
        <button><a href="<?=""?>">Précédent</a></button>
        <!-- accés rapide -->
        <div class="menu-pagination">
            <?php for ($page=1; $page <= $nbr_pages ; $page++):
                ?>
                
                <small>
                    <?=A_HREF_DOUBLE_QUOTE_BEGIN.''. LISTE_ROOT.$page. "\" >".$page.A_HREF_END;?>
                </small>
            <?php endfor; ?>
        </div>
        <!-- suivant -->
        <button><a href="<?=""?>">Suivant</a></button>
    </div>
</div>
