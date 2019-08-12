<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include ('filesForInclude.php'); 

?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">

</head>

<?php

    $post_id = (int)$_GET['post_id'];

    $sql = "SELECT posts.id, posts.title, posts.created_at, posts.author, posts.body
    FROM posts WHERE posts.id = ? ";

    $statement = $databaseConnection->prepare($sql);
    $statement->execute([$post_id]);
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $databaseResponse = $statement->fetchAll();

    $post = null;

    if(!$databaseResponse || empty($databaseResponse)){
        $error = 'Post not found';
    }
    else {
        $first = $databaseResponse[0];
        $post = new \classes\Post($first['author'], $first['title'], $first['body'], $first['id'], $first['created_at']);
    }

?>

<body>

<?php include './partials/header.php'; ?>

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php 
                if($post){
                    $post->print(); ?>
                    <form method="POST" action="delete-post.php" name="deletePostForm">
                        <button id="deletePost" class="btn btn-primary" >Delete this post</button>
                        <input type="hidden" value="<?php echo $post_id ?>" name="id"/>
                    </form>
                    <br>
                <?php
                    include './create-comment-form.php';
                    include './comments.php';
                }else{
                    echo $error;
                }
            ?>
        </div>
    
        <?php include './partials/sidebar.php' ?>

    </div>

</main>

<?php include './partials/footer.php' ?>
<script>
    document.getElementById("deletePost").addEventListener("click", function(event){
        console.log('asdasd');
        event.preventDefault()
        if(window.confirm("Do you really want to delete this post?")){
            document.deletePostForm.submit();
        }
    });
</script>
</body>
</html>