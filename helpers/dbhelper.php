<?php

require_once("./helpers/helper.php");

function get_article_list()
{
    $query = "SELECT title, subtitle, url, main_image FROM article WHERE Active=1
                ORDER BY created DESC";
    $res = query_result($query);

    return $res;
}

function get_article($slug)
{
    $query = "SELECT * FROM article WHERE url='$slug'";
    $res = query_result($query);

    return $res[0];
}
