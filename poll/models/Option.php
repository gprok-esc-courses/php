<?php

class Option
{
    var $id;
    var $name;
    var $votes;
    var $poll_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->votes = $args['votes'] ?? '';
        $this->poll_id = $args['poll_id'] ?? '';
    }

    public function vote()
    {
        $this->votes++;
        $db = Database::getConnection();
        $db->exec("UPDATE options SET votes=" . $this->votes . " WHERE id=" . $this->id);
    }
}