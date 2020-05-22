<?php
require_once "models/Database.php";
require_once "models/Poll.php";
require_once "models/PollRepository.php";
require_once "models/Option.php";
require_once "models/OptionRepository.php";
$poll_id = $_GET['poll_id'];

$poll = PollRepository::find($poll_id);
if ($poll == None) {
    echo "<h2>ERROR: Poll " . $poll_id . " does not exist</h2>";
    die();
}
$options = OptionRepository::getPollOptions($poll_id);

echo "<h1>" . $poll->title . "</h1>";
?>

<form action="vote.php" method="post">
    <input type="text" value="<?=$poll_id;?>" hidden name="poll_id">
<?php
foreach ($options as $option) {
    echo "<input name='options[]' type='" . $poll->type . "' value='" . $option->id . "'><label>" .$option->name . "</label><br>";
}
?>
    <button type="submit">Vote</button>
</form>
