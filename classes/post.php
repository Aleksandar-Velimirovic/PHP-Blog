<?php

namespace classes;

use interfaces\IsPrintableInterface;

class Post {
    protected $id;
    protected $author;
    protected $title;
    protected $body;
    protected $created_at;

    function __construct(string $author, string $title, string $body, int $id = null, string $created_at = null) {
        $this->author = $author;
        $this->title = $title;
        $this->body = $body;
        $this->id = $id;
        $this->created_at = $created_at;
    }

    public function print() : void {
        echo "
            <div class=\"blog-post\">
                <a href= \"single-post.php?post_id={$this->id}\"><h2 class=\"blog-post-title\">{$this->title}</h2></a>
                <p class=\"blog-post-meta\">{$this->created_at} by <a href=\"#\">{$this->author}</a></p>

                {$this->body}
            </div><!-- /.blog-post -->
        ";
    }
}
?>