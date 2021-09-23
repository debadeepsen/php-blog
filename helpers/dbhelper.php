<?php

if (!defined('START')) {
    die;
}

require_once("./helpers/helper.php");

function get_article_list($all = false, $start = 0, $limit = 0)
{
    $cond = $all? '1' : 'a.active';
    $limit_by = ($limit > 0) ? "LIMIT $start,$limit" : "";
    $day_threshold_for_new = 5;
    $query = "SELECT a.*, group_concat(t.tag_text) AS tag_list, timestampdiff(DAY, a.created, now()) < $day_threshold_for_new is_new 
                FROM article a 
                LEFT JOIN articletags atg on a.id = atg.article_id 
                LEFT JOIN tags t on t.id = atg.tag_id
                WHERE $cond = 1
                GROUP BY a.id
                ORDER BY a.created desc, a.updated desc
                $limit_by";
    $res = query_result($query);

    return $res;
}

function get_article($slug)
{
    $query = "SELECT a.*, group_concat(t.tag_text) AS tag_list 
                FROM article a 
                LEFT JOIN articletags atg on a.id = atg.article_id 
                LEFT JOIN tags t on t.id = atg.tag_id 
                WHERE a.active = 1
                AND a.url = '$slug' 
                GROUP BY a.id
                ORDER BY a.created desc, a.updated desc";
    $res = query_result($query);

    return $res[0];
}

/*
public function get_article_list($all = false, $start = 0, $limit = 0) {

    $cond = $all? '1' : 'a.active';
    $limit_by = ($limit > 0) ? "LIMIT $start,$limit" : "";
    $day_threshold_for_new = intval(config_item('day_threshold_for_new'));
    return $this->db->query()->result_array();
}

public function get_articles_by_tag($tag) {
    return $this->db->query("SELECT a.* , t.tag_text
                            FROM  article a  
                            JOIN articletags atg on a.id = atg.article_id
                            JOIN tags t on t.id = atg.tag_id
                            WHERE  a.active = 1
                            AND t.tag_text like '%$tag%'
                            ORDER BY a.created desc, a.updated desc")->result_array();
}

public function get_article($id) {
    return $this->db->query('SELECT * FROM article WHERE id = ?', [$id])->result_array();
}

public function get_article_by_url($url) {
    $url = trim($url);
    return $this->db->query("SELECT a.*, group_concat(t.tag_text) AS tag_list 
                            FROM article a 
                            LEFT JOIN articletags atg on a.id = atg.article_id 
                            LEFT JOIN tags t on t.id = atg.tag_id 
                            WHERE a.active = 1
                            AND a.url = '$url' 
                            GROUP BY a.id
                            ORDER BY a.created desc, a.updated desc")->row_array();
}

public function record_article_view($article_id, $json) {
    return $this->db->query("insert into articleclicks (article_id, ip_json) values (?, ?)", [$article_id, $json]);
}
*/