<div>
    <div>
        <div class="main-menu">
        <?php
        foreach($article_list as $a) {
            $a_title = $a["title"];
            $a_subtitle = $a["subtitle"];
            $a_link = $a["url"];
            $a_img = $a["main_image"];

            echo 
                "<a href='$a_link'>
                    <img src='$a_img' />
                    <div class='text'>
                        <h5>$a_title</h5>
                        <h6>$a_subtitle</h6>
                    </div>
                </a>";
        }
        ?>
        </div>
    </div>
</div>