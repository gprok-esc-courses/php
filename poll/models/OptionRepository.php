<?php

class OptionRepository
{
    public static function getPollOptions($poll_id)
    {
        $db = Database::getConnection();
        $result = $db->query("SELECT * FROM options WHERE poll_id=" . $poll_id);
        $options = [];

        foreach ($result as $row)
        {
            $option = new Option([
                'id' => $row['id'],
                'name' => $row['name'],
                'votes' => $row['votes'],
                'poll_id' => $row['poll_id']
            ]);

            $options[] = $option;
        }

        return $options;
    }
}