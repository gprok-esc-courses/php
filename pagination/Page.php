<?php
require_once "database.php";
require_once "Post.php";

class Page
{
    var $page_no;
    var $number_of_posts;

    public function __construct($page_no)
    {
         $this->page_no = $page_no;
         $this->number_of_posts = 50;
    }

    public function getPosts()
    {
        global $db;
        $from = ($this->page_no - 1) * $this->number_of_posts;
        try {
            $result = $db->query("SELECT * FROM posts LIMIT $from, $this->number_of_posts");
        }
        catch(Exception $e) {
            echo $e;
        }
        $posts = [];
        foreach ($result as $row) {
            $post = new Post([
                'id' => $row['id'],
                'title' => $row['title'],
                'content' => $row['content']
            ]);
            $posts[] = $post;
        }
        return $posts;
    }

    public function getNumberOfPages() {
        $total = Page::getNumberOfPosts();
        $pages = $total / $this->number_of_posts;
        return $pages;
    }

    public static function getNumberOfPosts() {
        global $db;
        $result = $db->query("SELECT COUNT(*) as total FROM posts");
        $row = $result->fetch();
        $total = $row['total'];
        return $total;
    }
}
