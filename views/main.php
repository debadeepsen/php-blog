<?php if (!defined('START')) {
    die();
}
?>
<nav class="main-menu">
    <?php foreach ($article_list as $a) {
        $a_title = $a['title'];
        $a_subtitle = $a['subtitle'];
        $a_link = $a['url'];
        $full_img = $a['main_image'];
        $a_img = explode('.webp', $full_img)[0] . '-t.webp';

        $tags = explode(',', $a['tag_list']);
        $a_tags = '';
        foreach ($tags as $tag) {
            $a_tags .= "<span class='tag'>$tag</span>";
        }

        __("<a href='$a_link'>
            <img src='$a_img' class='img-cover' width='100%' height='180' />
            <div class='text'>
                <h5>$a_title</h5>
                <h6>$a_subtitle</h6>
                <div style='margin-top:10px'>$a_tags</div>
            </div>
        </a>");
    } ?>
</nav>