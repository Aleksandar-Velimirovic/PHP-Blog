<?php
     
    include("./filesForInclude.php");

    $id = (int)$_POST['id'];
    $post_id = (int)$_POST['post_id'];
    $sqlDeleteComment= "DELETE FROM comments WHERE id = ? ;";
    $statementDeleteComment = $databaseConnection->prepare($sqlDeleteComment);
    $statementDeleteComment->execute([$id]);
    $statementDeleteComment ->setFetchMode(PDO::FETCH_ASSOC);

    redirectTo("single-post?post_id={$post_id}");

?>