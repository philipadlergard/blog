<?php 

require "functions.php";

$data = file_get_contents("php://input");
$request = json_decode($data);
    
$post = new Post();

$post->header = $request->header;
$post->text = $request->text;
$post->url = $request->url;

checkDB();
savePost($post);

class Post
{
    var $header = '';
    var $text = '';
    var $url = '';
}
?>