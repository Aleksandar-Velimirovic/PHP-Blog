<?php

    include './filesForInclude.php';

    $post_id = (int)$_POST['post_id'];
    $author = $_POST['author'];
    $text = $_POST['comment'];

    if(!$post_id){
        echo 'Post id is not provided, save failed';
        //redirectToHome();
    }

    if(!$author){
        echo 'Author id is not provided, save failed';
        redirectTo("single-post?post_id={$post_id}");
    }

    if(!$text){
        echo 'Text id is not provided, save failed';
        redirectTo("single-post?post_id={$post_id}");
    }

    $sqlInsert = "INSERT INTO comments (author, text, post_id) VALUES ('{$author}', '{$text}', {$post_id});";
        
    $statementInsert = $databaseConnection->prepare($sqlInsert);
    $statementInsert->execute();
    $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
    
    redirectTo("single-post?post_id={$post_id}");
    
?>