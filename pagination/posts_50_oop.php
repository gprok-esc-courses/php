<?php
require_once "error_reporting.php";
require_once "Page.php";
$page_no = $_GET['page'] ?? 1;
$page = new Page($page_no);
?>

<h1>Posts - page <?=$page_no;?></h1>
<?php
$posts = $page->getPosts();

foreach ($posts as $post) {
    echo $post->id . ". " . $post->title . "<br>";
}
?>

<hr>

<?php
$pages = $page->getNumberOfPages();

echo "<a href='posts_50.php?page=1'> << </a>";
echo "<a href='posts_50.php?page=" . ($page_no-1) . "'> < </a>";
for($i = 1; $i <= $pages; $i++) {
    if ($i == $page_no) {
        echo " $i ";
    }
    else {
        echo "<a href='posts_50.php?page=$i'> $i </a>";
    }
}
echo "<a href='posts_50.php?page=" . ($page_no+1) . "'> > </a>";
echo "<a href='posts_50.php?page=$pages'> >> </a>";

?>