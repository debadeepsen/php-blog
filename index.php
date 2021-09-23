<?php

const START = 0;

require_once './helpers/constants.php';
require_once './helpers/dbhelper.php';

// default title
$title = CAPTION;

// for prefetching article links
$prefetched_links = '';

// check if it has a slug
$slug = get_slug();
if ($slug) {
    elseif ($slug == 'about') {
        $title = 'About | ' . CAPTION;
        $page = './views/about.php';
    } elseif ($slug == 'about/terms') {
        $title = 'Terms and Conditions | ' . CAPTION;
        $page = './views/terms.php';
    } elseif ($slug == 'about/privacy') {
        $title = 'Privacy Policy | ' . CAPTION;
        $page = './views/privacy.php';
    } else {
        // we will show the article page
        $article = get_article($slug);
        $title = $article['title'];
        $article_body = $article['text'];
        $article_image = $article['main_image'];
        $page = './views/article.php';
    }
} else {
    // we will show the list of articles
    $article_list = get_article_list();
    foreach ($article_list as $value) {
        $prefetched_links .=
            "<link rel='prerender' href='" . BASE . $value['url'] . "'>\n\t";
    }
    $page = './views/main.php';
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php echo $prefetched_links; ?>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Caveat&family=Rock+Salt&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="<?php echo BASE; ?>main.css" rel="stylesheet" />
    <title><?php __($title); ?></title>
</head>

<body>
    <?php include_once HEADER; ?>
    <main>
        <?php include_once $page; ?>
    </main>
    <?php include_once FOOTER; ?>
</body>

</html>