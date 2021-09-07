<?php

function mysqli_object()
{
    $mysqli = new mysqli("localhost:3306", "root", "", "nerdtown_blog_live");

    // this is done to be able to store 
    // unicode utf8 properly
    $mysqli->query("SET NAMES utf8;");
    return $mysqli;
}

function __($obj)
{
    echo $obj;
}

function req_body()
{
    $body = json_decode(file_get_contents("php://input"), true);
    return $body;
}

function query_result($query)
{
    $mysqli = mysqli_object();
    if ($mysqli->connect_errno) {
        return (["error" => "Failed to connect to MySQL: " . $mysqli->connect_error]);
    }

    $sql = $query;
    $result = $mysqli->query($sql);
    $data = $result->fetch_all(MYSQLI_ASSOC);

    $result->free_result();
    $mysqli->close();

    return $data;
}


function get_slug()
{
    if (array_key_exists("path", $_GET)) {
        $path = $_GET["path"];
        return $path;
    }

    return "";
}


function prt($obj)
{
    echo '<pre>' . print_r($obj, true) . '</pre>';
}
