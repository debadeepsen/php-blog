<div class="article-container">
    <img src="<?php __($article_image) ?>" />
    <h1>
        <?php __($article_title); ?>
    </h1>
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
</div>