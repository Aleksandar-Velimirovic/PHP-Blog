<?php
    $post_id = (int)$_GET['post_id'];

    $sqlComments = "SELECT posts.id, comments.id, comments.author, comments.post_id, comments.text
    FROM posts JOIN comments ON comments.post_id = posts.id WHERE posts.id = ?";
    
    $statementComments = $databaseConnection->prepare($sqlComments);
    $statementComments->execute([$post_id]);
    $statementComments->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statementComments->fetchAll();
?>

<button class="btn btn-default" id="button" onclick="hideComment()">Hide Comments</button>

<hr>
    <ul id='postComments'>
    <?php foreach($comments as $comment){
        $comment = new \classes\Comment($comment['post_id'], $comment['author'], $comment['text'], $comment['id']);
        $comment->print();
    }
    ?>
</ul>

<script>
    var comments = document.getElementById('postComments')
    var button = document.getElementById('button')
    function hideComment(){
        
        if(button.innerHTML == "Show Comments"){
            comments.classList.remove("hide")
            button.innerHTML = "Hide Comments"
        } else{
            comments.className = "hide"
            button.innerHTML = "Show Comments"
        }
    }
</script>