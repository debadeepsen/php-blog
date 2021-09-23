
<?php if (!defined('START')) {
    die();
}
?>
<article>
    <img src="<?php __($article_image) ?>" alt="Main article image" />
    <h2>
        <?php __($title); ?>
    </h2>
    <div style="margin-top: 6px; margin-bottom: 6px">
        <?php
            $tags = explode(",", $article["tag_list"]);
            $a_tags = "";
            foreach ($tags as $tag) {
                __("<span class='tag'>$tag</span>");
            }
        ?>
    </div>
    <div>
        <?php __($article_body); ?>
    </div>
</article>