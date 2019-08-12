<?php
     
    include("database.php");

    $id = (int)$_POST['id'];
    $sqlDeletePost = "DELETE FROM posts WHERE id = ? ;";
    $statementDeletePost = $databaseConnection->prepare($sqlDeletePost);
    $statementDeletePost->execute([$id]);
    $statementDeletePost->setFetchMode(PDO::FETCH_ASSOC);

    redirectToHome();

?>