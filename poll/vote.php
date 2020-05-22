<?php
require_once "models/Database.php";
require_once "models/Poll.php";
require_once "models/PollRepository.php";
require_once "models/Option.php";
require_once "models/OptionRepository.php";

$poll_id = $_POST['poll_id'];
$options_list = $_POST['options'];

$poll = PollRepository::find($poll_id);
$options = OptionRepository::getPollOptions($poll_id);

$poll->vote();
foreach ($options as $option) {
    if(in_array($option->id, $options_list)) {
        $option->vote();
    }
}

// Display results
echo "<h1>" . $poll->title . "</h1>";
echo "<h2>Results</h2>";
echo "<ul>";
foreach ($options as $option) {
    echo "<li>" . $option->name . " (" . $option->votes . ")</li>";
}