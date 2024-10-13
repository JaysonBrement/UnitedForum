<?php

use Framework\Affichage;
use Framework\model\GetData;

 ob_start() ?>
<?php 


?>

<main>
    <div class="containerpush"></div>
    <div class="containeraccueil">
        <div class="threadgroup">
            <div class="threadheader">
                <div class="titleheader"><h3 class="topic">Topic</h3></div>
                <div class="categoryheader"><h3>Category</h3></div>
                <div class="likesheader"><h3>Likes</h3></div>
                <div class="viewsheader"><h3>Views</h3></div>
                <div class="activityheader"><h3>Creation date</h3></div>
            </div>
           <?php 
           if(isset($_GET['query'])){
               Affichage::threadDisplayMasher(GetData::getThreadsByQuery($_GET['query']));
           }else{
            Affichage::threadDisplayMasher(GetData::getThreads());
           }
           
            ?>

            
        </div>
        <script></script>
    </div>
    <div class="containerpush"></div>
</main>
<script src="../javascript/script.js"></script>
<?php
$content =ob_get_clean();
require "template.php";
?>  
