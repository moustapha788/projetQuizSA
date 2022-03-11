<?php

$taille_tab = count( $tab_joueurs );
$nbr_pages = ceil( $taille_tab/NBR_VALEURS_PAR_PAGE );

if ( isset( $_GET[ 'page' ] ) ) {
    // click
    $page_actuelle = $_GET[ 'page' ];
    if ( $page_actuelle>$nbr_pages ) {
        $page_actuelle = $nbr_pages;
        header( 'Location:'.WEB_ROOT.'?controller=user&action=dashboard&view=liste.joueurs&page='.$page_actuelle );
        exit();
    }
    if ( $page_actuelle<=0 ) {
        $page_actuelle = 1;
        header( 'Location:'.WEB_ROOT.'?controller=user&action=dashboard&view=liste.joueurs&page=1' );
        exit();
    }
} else {
    // page par défaut première fois
    $page_actuelle = 1;
    header( 'Location:'.WEB_ROOT.'?controller=user&action=dashboard&view=liste.joueurs&page=1' );
    exit();
}

$indexBegin = ( $page_actuelle-1 )*NBR_VALEURS_PAR_PAGE;
$indexEnd = $indexBegin + NBR_VALEURS_PAR_PAGE -1;

?>
