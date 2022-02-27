
<link rel="stylesheet" href="<?= WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.connexion.css" ?>">

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

<script src="<?=WEB_PUBLIC."js".DIRECTORY_SEPARATOR."script.js"?>"></script>

<!--  -->
<?php
echo '<pre>';
var_dump($_SESSION);

