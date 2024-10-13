<?php

use Framework\Affichage;
use Framework\model\GetData;

 ob_start() ?>


<div onload=updateDatabase() class="reddit-style-thread">


<?php Affichage::postHeaderMasher(GetData::getPostHeader($_GET['id'])) ?>
<?php Affichage::postContentMasher(GetData::getPostContent($_GET['id'])) ?>

    <div class="horilinepost"></div>
    <?php 
    if(isset($_SESSION['username'])){
        echo '<div class="reply-input">
        <form action="/controle?action=newPost" method="POST">
        <input type="hidden" name="thread_id" value="';
        echo htmlspecialchars($_GET["id"]);
        echo '">
        <textarea id="reply-text" name ="content" placeholder="Ecrivez votre reponse"></textarea>
        <button class ="submitpost"id="submit-reply" type="submit">Soumettre</button>
        </form>

    </div>';
    }
    
    ?>
</div>

<script>
        
            
            var threadId = <?php echo $_GET['id']; ?>;

            
            $.ajax({
                url: '/controle?action=updateViewCount', 
                method: 'POST',
                data: { action: 'update', id: threadId },
                success: function(response) {
                    console.log('Database update successful');
                },
                error: function(xhr, status, error) {
                    console.error('Database update failed:', error);
                }
            });
        
    </script>

<?php
$content =ob_get_clean();
require "template.php";
?>