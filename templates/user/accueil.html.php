<?php
// todo !!! layout ou page de présentation
//! header of html
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.inc.html.php");

// !MENU
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.inc.html.php");
?>
    

<div class="home_content">
    <?php
    /*****
    **** PARTIE VARIABLE: contenu des vues
    *****/
        if(isset($content_for_views)){
            echo $content_for_views;
        }
    /*****
    **** 
    *****/?>
</div>

    

<?php
//! footer of html
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.inc.html.php");
?>