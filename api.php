<?php
require "functions.php";

function getPosts()
{
    checkDB();
    return getPostsFromDb();
}

function auth()
{
    $data = file_get_contents("php://input");
    $request = json_decode($data);

    $username = $request->user;
    $password = $request->password;
    
    return authorize($username, $password);
}

$url_actions = array("get_posts", "authorize");

if (isset($_GET["action"]) && in_array($_GET["action"], $url_actions))
{
    switch ($_GET["action"])
    {
        case "get_posts";
            $data = getPosts();
            break;
    }
    
    exit (json_encode($data));
}

if (isset($_POST["action"]))
{
    switch ($_POST["action"])
    {
        case "authorize";
            $data = auth();
            break;
    }
    
    exit (json_encode($data));
}
?>