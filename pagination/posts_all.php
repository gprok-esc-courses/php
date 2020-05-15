<h1>Posts</h1>
<?php
$db = new PDO('mysql:host=localhost;dbname=test', 'test', 'test');

$result = $db->query("SELECT * FROM posts");

foreach ($result as $row) {
    echo $row['id'] . ". " . $row['title'] . "<br>";
}
