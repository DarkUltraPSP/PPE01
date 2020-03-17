<?php

include_once 'include/header.php';
?>
<form method="POST" action="bannir.php">
    <textarea placeholder="Donnez une raison a ce banissement" name="raisonBan"></textarea>
    <input type="submit" value="Bannir">
</form>
<?php
include_once 'include/footer.php';