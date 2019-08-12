<?php
    include './filesForInclude.php';

    $author = $_POST['author'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    if(empty($author)){
        redirectTo("create.php");
    }

    if(empty($title)){
        redirectTo("create.php");
    }

    if(empty($body)){
        redirectTo("create.php");
    }
        
    $date = date('Y-m-d H:i:s');
         $sqlCreate = "INSERT INTO posts (title, body, author, created_at) VALUES ('{$title}', '{$body}', '{$author}', '{$date}');";
         $statementCreate = $databaseConnection->prepare($sqlCreate);
         $statementCreate->execute();
         $statementCreate->setFetchMode(PDO::FETCH_ASSOC);

    redirectToHome();
?> 