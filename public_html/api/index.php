<?php

require '../vendor/autoload.php';
require '../functions.php';
require_once '../Post.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new Slim\App();

$app->get('/getTopics', function(){
    echo json_encode(getTopics());
});
$app->get('/getPostsByTopic[/{topic}]', function (ServerRequestInterface $request, ResponseInterface $response, $args){
    echo json_encode(getPosts($args[topic]));
});

$app->post('/authorize', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $body = $request->getParsedBody();
    
    $datas = file_get_contents("php://input");
    $request = json_decode($datas);
    $result = authorize($body[user], $body[password]);
    echo json_encode($result);
});

$app->post('/newPost', function (ServerRequestInterface $request, ResponseInterface $response, $args){
    $body = $request->getParsedBody();
    $post = new Post($body[header], $body[url], $body[text], $body[topic]);
    savePost($post);
});

$app->run();