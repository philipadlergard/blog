<?php

class Post {
    var $header;
    var $url;
    var $text;
    var $topic;
    
    function __construct($header, $url, $text, $topic) {
        $this->header = $header;
        $this->text = $text;
        $this->url = $url;
        $this->topic = $topic;
    }
}

