<?php

require_once("./helpers/dbhelper.php");

$header_url = "./views/header.php";

// check if it has a slug
$slug = get_slug();
if ($slug) {
    // we will show the article page
    $article = get_article($slug);
    $article_title = $article["title"];
    $article_body = $article["text"];
    $article_image = $article["main_image"];
    $page_url = "./views/article.php";
} else {
    // we will show the list of articles
    $article_list = get_article_list();

    $article_title = "Articles";
    $page_url = "./views/main.php";
}
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Caveat&family=Rock+Salt&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="./main.css" rel="stylesheet" />
    <title><?php __($article_title) ?></title>
</head>

<body>
    <?php include_once($header_url) ?>
    <div class="main-container">
        <?php include_once($page_url) ?>
    </div>
</body>

</html>