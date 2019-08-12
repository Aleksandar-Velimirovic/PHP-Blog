<?php

namespace classes;

use interfaces\IsPrintableInterface;

class Comment implements IsPrintableInterface {
    protected $id;
    protected $author;
    protected $text;
    protected $post_id;

    function __construct(int $post_id, string $author, string $text, int $id = null){
        $this->id = $id;
        $this->author = $author;
        $this->text = $text;
        $this->post_id = $post_id;
    }

    public function print() : void {
        echo "<li>
            <h6>{$this->author}</h6>
            <p>{$this->text}</p>
            <form method=\"POST\" action=\"delete-comment.php\" >
                <button id=\"delete\" class=\"btn btn-default\">Delete</button>
                <input type=\"hidden\" value=\"{$this->id}\" name=\"id\"/>
                <input type=\"hidden\" value=\"{$this->post_id}\" name=\"post_id\"/>
            </form>
        </li>
        <hr>";
    }
}

?>