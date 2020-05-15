<?php
$page = $_GET['page'] ?? 1;
$number_of_posts = 50;
$from = ($page - 1) * $number_of_posts;
?>

<h1>Posts - page <?=$page;?></h1>
<?php
$db = new PDO('mysql:host=localhost;dbname=test', 'test', 'test');

$result = $db->query("SELECT * FROM posts LIMIT $from, $number_of_posts");

foreach ($result as $row) {
    echo $row['id'] . ". " . $row['title'] . "<br>";
}
?>

<hr>

<?php
$result = $db->query("SELECT COUNT(*) as total FROM posts");
$row = $result->fetch();
$total = $row['total'];
$pages = $total / $number_of_posts;

echo "<a href='posts_50.php?page=1'> << </a>";
echo "<a href='posts_50.php?page=" . ($page-1) . "'> < </a>";
for($i = 1; $i <= $pages; $i++) {
    if ($i == $page) {
        echo " $i ";
    }
    else {
        echo "<a href='posts_50.php?page=$i'> $i </a>";
    }
}
echo "<a href='posts_50.php?page=" . ($page+1) . "'> > </a>";
echo "<a href='posts_50.php?page=$pages'> >> </a>";

?>