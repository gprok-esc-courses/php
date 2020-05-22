<?php
require_once "models/Database.php";
require_once "models/Poll.php";
require_once "models/PollRepository.php";
?>

<h1>Polls</h1>
<?php
$polls = PollRepository::getAll();

foreach ($polls as $poll) {
    echo "<a href='poll.php?poll_id=" . $poll->id . "'>" . $poll->title . "</a><br>";
}
