<?php
//! header
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.inc.html.php");
?>

<form action="<?= WEB_ROOT ?>" method="POST">
<input type="hidden" name="controller" value="securite">
<input type="hidden" name="action" value="connexion">
    <div class="forms-group">
        <Label for="login">login</Label>
        <input type="text"  name="login" id="login" class="login">
    </div>
    <!-- <small class="error"></small> -->
    <div class="forms-group">
        <Label for="password" >password</Label>
        <input type="password"  name="password" id="password" class="password">
    </div>
    <button type="submit">connexion</button>
    
</form>


<!--  -->
<?php
echo '<pre>';
var_dump($_SESSION);
?>

<?php
//! footer
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.inc.html.php");
?>

