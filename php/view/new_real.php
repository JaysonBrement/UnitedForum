<?php

use Framework\Affichage;
use Framework\model\GetData;

?>

<div class="new-thread-form">
    <h1>Create a New Thread</h1>
    <form action="/controle?action=newThread" method="post">
    <select class="" name="category_name" required>
    <?php Affichage::categoryMenuDisplayMasher(GetData::getCategory()) ?>
    </select>
        <div class="form-group">
            <label for="threadTitle">Title:</label>
            <input type="text" id="threadTitle" name="title" required>
        </div>
        <div class="form-group">
            <label for="threadContent">Content:</label>
            <textarea id="threadContent" name="description" required></textarea>
        </div>
        <button class ="submitthread"type="submit">Post</button>
    </form>
</div>

<?php
$content =ob_get_clean();
require "template.php";
?>