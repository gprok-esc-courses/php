<?php

class Poll
{
    var $id;
    var $title;
    var $votes;
    var $type;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->votes = $args['votes'] ?? '';
        $this->type = $args['type'] ?? '';
    }

    public function vote()
    {
        $this->votes++;
        $db = Database::getConnection();
        $db->exec("UPDATE polls SET votes=" . $this->votes . " WHERE id=" . $this->id);
    }
}
