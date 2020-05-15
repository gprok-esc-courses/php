<?php

class Post
{
    var $id;
    var $title;
    var $content;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->content = $args['content'] ?? '';
    }
}
