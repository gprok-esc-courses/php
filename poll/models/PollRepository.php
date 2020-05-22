<?php

class PollRepository
{
    public static function getAll()
    {
        $db = Database::getConnection();
        $result = $db->query("SELECT * FROM polls");
        $polls = [];

        foreach ($result as $row) {
            //echo "<a href='poll.php?poll_id=" . $row['id'] . "'>" . $row['title'] . "</a><br>";
            $poll = new Poll([
                'id' => $row['id'],
                'title' => $row['title'],
                'votes' => $row['votes'],
                'type' => $row['type']
            ]);

            $polls[] = $poll;
        }

        return $polls;
    }

    public static function find($id)
    {
        $db = Database::getConnection();
        $result = $db->query("SELECT * FROM polls WHERE id=" . $id);
        if ($result->rowCount() == 0) {
            return None;
        }
        else {
            $row = $result->fetch();
            $poll = new Poll([
                'id' => $row['id'],
                'title' => $row['title'],
                'votes' => $row['votes'],
                'type' => $row['type']
            ]);
            return $poll;
        }
    }
}
