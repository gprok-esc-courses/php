<?php
header('Content-Type: application/json');
require_once "Page.php";

$action = $_GET['action'];
$page_no = $_GET['page'];

switch ($action) {
    case 'nop':
        $page = new Page(1);
        $total = $page->getNumberOfPages();
        echo json_encode(['total' => $total]);
        break;
    case 'posts':
        $page = new Page($page_no);
        $posts = $page->getPosts();
        echo json_encode($posts);
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}

