<?php

class Database
{
    public static function getConnection()
    {
        $db = new PDO("mysql:host=localhost;dbname=poll", "test", "test");
        return $db;
    }
}